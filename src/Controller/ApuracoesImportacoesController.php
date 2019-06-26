<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;
/**
 * ApuracoesImportacoes Controller
 *
 * @property \App\Model\Table\ApuracoesImportacoesTable $ApuracoesImportacoes
 *
 * @method \App\Model\Entity\ApuracoesImportaco[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ApuracoesImportacoesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Relogios', 'ApuracoesPeriodos']
        ];
        $apuracoesImportacoes = $this->paginate($this->ApuracoesImportacoes);
        //pr($apuracoesImportacoes);exit;
        $this->set(compact('apuracoesImportacoes'));
    }

    /**
     * View method
     *
     * @param string|null $id Apuracoes Importaco id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $apuracoesImportaco = $this->ApuracoesImportacoes->get($id, [
            'contain' => ['Relogios', 'ApuracoesPeriodos']
        ]);

        $this->set('apuracoesImportaco', $apuracoesImportaco);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $apuracoesImportacao = $this->ApuracoesImportacoes->newEntity();
        if ($this->request->is('post')) {

            if($this->request->data['arquivo']['error'] != 0){
                if($this->request->data['arquivo']['error'] == 1 || $this->request->data['arquivo']['error'] == 2)
                    $this->Flash->error(__('Erro ao anexar arquivo, o mesmo pode estar excedendo o tamanho de 1 MB!'));
                elseif($this->request->data['arquivo']['error'] == 4)
                    $this->Flash->error(__('Nenhum arquivo foi anexado!'));
                else
                    $this->Flash->error(__('Erro ao anexar arquivo, tente novamente!'));
                
                return $this->redirect(['action' => 'index']);
            }
           // pr($this->request->data['arquivo']['tmp_name']);exit;
            $arquivo_info = pathinfo($this->request->data['arquivo']['name']);


            $arquivo_tmp = $this->request->data['arquivo']['tmp_name'];

            $dados = file($arquivo_tmp);
            //pr($dados);exit;



            $this->request->data['extensao'] = $arquivo_info['extension'];
            $this->request->data['arquivo'] = $this->ApuracoesImportacoes->salvarArquivo($this->request->data['arquivo']);
            //pr($this->request->data);exit;
            
            $apuracoesImportacao = $this->ApuracoesImportacoes->patchEntity($apuracoesImportacao, $this->request->data);
            $apuracoesImportacao->arquivo_tamanho = 1;
            $apuracoesImportacao->status = 1;
            $apuracoesImportacao->criado_por = $this->retornarIdUsuarioAtivo();
            $apuracoesImportacao->modificado_por = $this->retornarIdUsuarioAtivo();
            
            if ($this->ApuracoesImportacoes->save($apuracoesImportacao)) {
                $funcionariosTable = TableRegistry::get('Funcionarios');
                $batidasTable = TableRegistry::get('Batidas');
                foreach($dados as $key => $linha){
                    if($key > 0){
                        //Retirar os espaços em branco no inicio e no final da string
                        $linha = trim($linha);
                        //Colocar em um array cada item separado pela virgula na string
                        $valor = explode('   ', $linha);
                        
                        //Recuperar o valor do array indicando qual posição do array requerido e atribuindo para um variável
                        $no = $valor[0];
                        $Mchn = $valor[1];
                        $EnNo = $valor[2];
                        $Name = $valor[3];
                        $Mode = $valor[4];
                        $IOMd = $valor[5];
                        $DateTime = $valor[6];
                        $var = $valor[7];
                        $var2 = $valor[8];
                        $funcionario = $funcionariosTable->find()->where(['id'=>$EnNo])->first();
                        if(!empty($funcionario)){
                            $batida = $batidasTable->newEntity();
                            $batida->funcionario_id = $funcionario->id;
                            $batida->apuracao_importacao_id = $apuracoesImportacao->id;
                            $batida->batida_ajuste_id = 1;
                            $batida->batida = $var2;
                            $batida->status = 1;
                            $batida->created = $var2;
                            $batida->criado_por = $this->retornarIdUsuarioAtivo();
                            $batida->modificado_por = $this->retornarIdUsuarioAtivo();
                            $batidasTable->save($batida);
                        }
                        //pr($EnNo);pr($Name);pr($var2);exit;
                    }        
                }
                $this->Flash->success(__('The apuracoes importaco has been saved.'));
                
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The apuracoes importaco could not be saved. Please, try again.'));
        }


        $relogios = $this->ApuracoesImportacoes->Relogios->find('list', ['limit' => 200]);
        $apuracaoPeriodos = $this->ApuracoesImportacoes->ApuracoesPeriodos->find('list', ['limit' => 200]);
        $this->set(compact('apuracoesImportacao', 'relogios', 'apuracaoPeriodos'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Apuracoes Importaco id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $apuracoesImportaco = $this->ApuracoesImportacoes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $apuracoesImportaco = $this->ApuracoesImportacoes->patchEntity($apuracoesImportaco, $this->request->getData());
            if ($this->ApuracoesImportacoes->save($apuracoesImportaco)) {
                $this->Flash->success(__('The apuracoes importaco has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The apuracoes importaco could not be saved. Please, try again.'));
        }
        $relogios = $this->ApuracoesImportacoes->Relogios->find('list', ['limit' => 200]);
        $apuracaoPeriodos = $this->ApuracoesImportacoes->ApuracaoPeriodos->find('list', ['limit' => 200]);
        $this->set(compact('apuracoesImportaco', 'relogios', 'apuracaoPeriodos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Apuracoes Importaco id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $apuracoesImportaco = $this->ApuracoesImportacoes->get($id);
        if ($this->ApuracoesImportacoes->delete($apuracoesImportaco)) {
            $this->Flash->success(__('The apuracoes importaco has been deleted.'));
        } else {
            $this->Flash->error(__('The apuracoes importaco could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function visualizarImportacao($id = null)
    {
        $apuracoesImportaco = $this->ApuracoesImportacoes->get($id, [
            'contain' => ['Relogios', 'ApuracoesPeriodos']
        ]);

        $this->set('apuracoesImportaco', $apuracoesImportaco);
    }
}