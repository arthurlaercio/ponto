<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Batidas Controller
 *
 * @property \App\Model\Table\BatidasTable $Batidas
 *
 * @method \App\Model\Entity\Batida[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BatidasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Funcionarios', 'ApuracoesImportacoes', 'BatidasAjustes']
        ];
        $batidas = $this->paginate($this->Batidas);
        //pr($batidas);exit;
        $this->set(compact('batidas'));
    }

    /**
     * View method
     *
     * @param string|null $id Batida id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $batida = $this->Batidas->get($id, [
            'contain' => ['Funcionarios', 'ApuracoesImportacoes', 'BatidasAjustes']
        ]);

        $this->set('batida', $batida);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $batida = $this->Batidas->newEntity();
        if ($this->request->is('post')) {
            $batida = $this->Batidas->patchEntity($batida, $this->request->getData());
            $batida->criado_por = $this->retornarIdUsuarioAtivo();
            $batida->modificado_por = $this->retornarIdUsuarioAtivo();
            $batida->status = 1;
            $batida->apuracao_importacao_id = 1;
            $batida->batida_ajuste_id = 1;
            if ($this->Batidas->save($batida)) {
                $this->Flash->success(__('The batida has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The batida could not be saved. Please, try again.'));
        }
        $funcionarios = $this->Batidas->Funcionarios->find('list', ['limit' => 200]);
        $apuracaoImportacaos = $this->Batidas->ApuracoesImportacoes->find('list', ['limit' => 200]);
        $batidaAjustes = $this->Batidas->BatidasAjustes->find('list', ['limit' => 200]);
        $this->set(compact('batida', 'funcionarios', 'apuracaoImportacaos', 'batidaAjustes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Batida id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $batida = $this->Batidas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $batida = $this->Batidas->patchEntity($batida, $this->request->getData());
            if ($this->Batidas->save($batida)) {
                $this->Flash->success(__('The batida has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The batida could not be saved. Please, try again.'));
        }
        $funcionarios = $this->Batidas->Funcionarios->find('list', ['limit' => 200]);
        $apuracaoImportacaos = $this->Batidas->ApuracoesImportacoes->find('list', ['limit' => 200]);
        $batidaAjustes = $this->Batidas->BatidasAjustes->find('list', ['limit' => 200]);
        $this->set(compact('batida', 'funcionarios', 'apuracaoImportacaos', 'batidaAjustes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Batida id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $batida = $this->Batidas->get($id);
        if ($this->Batidas->delete($batida)) {
            $this->Flash->success(__('The batida has been deleted.'));
        } else {
            $this->Flash->error(__('The batida could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
