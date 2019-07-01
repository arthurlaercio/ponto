<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;
use Cake\Event\Event;
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
        $batidas = $this->Batidas->find()->contain(['Funcionarios', 'ApuracoesImportacoes', 'BatidasAjustes'])->all();
       // pr($batida);exit;
        //$batidas = $this->paginate($this->Batidas);
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
            $batida->apuracao_importacao_id = 1;
            $batida->batida_ajuste_id = 1;
            $batida->batida = date('d/m/Y H:i:s');
            $batida->status = 1;
            $batida->criado_por = $this->retornarIdUsuarioAtivo();
            $batida->modificado_por = $this->retornarIdUsuarioAtivo();
            
            //pr($batida);exit;
            if ($this->Batidas->save($batida)) {
                $this->Flash->success(__('The batida has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The batida could not be saved. Please, try again.'));
            return $this->redirect(['action' => 'index']);
        }
        $funcionarios = $this->Batidas->Funcionarios->find('list', ['limit' => 2000]);
        $apuracoesImportacoes = $this->Batidas->ApuracoesImportacoes->find('list', ['limit' => 2000]);
        $batidasAjustes = $this->Batidas->BatidasAjustes->find('list', ['limit' => 2000]);
        $this->set(compact('batida', 'funcionarios', 'apuracoesImportacoes', 'batidasAjustes'));
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
            'contain' => ['Funcionarios']
        ]);
       
        if ($this->request->is(['patch', 'post', 'put'])) {
            $batida = $this->Batidas->patchEntity($batida, $this->request->getData());
            $batida->modificado_por = $this->retornarIdUsuarioAtivo();
            //pr($batida);exit;
            if ($this->Batidas->save($batida)) {
                $this->Flash->success(__('The batida has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The batida could not be saved. Please, try again.'));
        }
        $funcionario = $this->Batidas->Funcionarios->find('list', ['limit' => 200])->where(['id' => $batida->funcionario->id])->all();
        $batidasAjustes = $this->Batidas->BatidasAjustes->find('list', ['limit' => 200]);
        $batidasAjustes = $this->Batidas->BatidasAjustes->find('list', ['limit' => 200]);
        $this->set(compact('batida', 'funcionario','batidasAjustes'));
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

    public function realizarBatida(){
        $batida = $this->Batidas->newEntity();
        $funcUsuarioTable = TableRegistry::get('Users');
        $funcUser = $funcUsuarioTable->find()->contain(['Funcionarios'])->where(['Users.id' => $this->retornarIdUsuarioAtivo()])->first();
        //pr($this->retornarIdUsuarioAtivo());exit;
        $funcionario = $funcUser->funcionario;
        if ($this->request->is('post')) {
            $batida = $this->Batidas->patchEntity($batida, $this->request->getData());
            $batida->apuracao_importacao_id = 1;
            $batida->batida_ajuste_id = 1;
            $batida->batida = date('d/m/Y H:i:s');
            $batida->status = 1;
            $batida->criado_por = $this->retornarIdUsuarioAtivo();
            $batida->modificado_por = $this->retornarIdUsuarioAtivo();
            
            
            if ($this->Batidas->save($batida)) {
                $this->Flash->success(__('The batida has been saved.'));

                return $this->redirect(['action' => 'indexFuncionario',$funcionario->id]);
            }
            $this->Flash->error(__('The batida could not be saved. Please, try again.'));
            return $this->redirect(['action' => 'indexFuncionario',$funcionario->id]);
        }
        
        $this->set(compact('batida', 'funcionario'));
    }

    public function indexFuncionario($id = null)
    {
        $this->paginate = [
            'contain' => ['Funcionarios', 'ApuracoesImportacoes', 'BatidasAjustes'],
            'where' => ['funcionario_Id' => $id]
        ];
        $query = $this->Batidas->find()->contain(['Funcionarios', 'ApuracoesImportacoes', 'BatidasAjustes'])->where(['Batidas.funcionario_id' => $id]);
        $batidas = $this->paginate($query); 
        //pr($batidas);exit;
        $this->set(compact('batidas'));
    }

    //relatorios

    public function relatorioPorPeriodo(){
        /*$this->viewBuilder()->options([
            'pdfConfig' => [
                'orientation' => 'portrait',
                'filename' => 'Relatorio'
            ]
        ]);*/
        
        $conditions = array();
        if ($this->request->is('post','put')){
            $filtro = $this->request->data['Relatorio'];
            //pr($this->request->data);exit;
            if(!empty($filtro['data_inicio'])){
                $filtro['data_inicio'] = implode('-', array_reverse(explode('/', $filtro['data_inicio'])));
                $data_inicio = date('Y-m-d 00:00:00', strtotime($filtro['data_inicio']));
                $conditions += (['Batidas.created >=' => $data_inicio]);
            }
            if(!empty($filtro['data_fim'])){
                $filtro['data_fim'] = implode('-', array_reverse(explode('/', $filtro['data_fim'])));
                $data_fim = date('Y-m-d 23:59:59', strtotime($filtro['data_fim']));
                $conditions +=(['Batidas.created <=' => $data_fim]);
            } 
            $conditions +=(['Batidas.status' => 1]);
            $conditions +=(['Batidas.funcionario_id <>' => 1]);
        }

        $batidas = $this->Batidas->find()
                ->contain(['Funcionarios','BatidasAjustes'])
                ->where($conditions)
                ->order(['Funcionarios.nome'=>'ASC'])
                ->group(['Batidas.id'])
                ->all();
        $mesesAno = array(['01' => 'Janeiro','02' => 'Fevereiro','03' => 'Março','04' => 'Abril', '05' => 'Maio', '06' => 'Junho','07' => 'Julho', '08' => 'Agosto', '09' => 'Setembro','10' => 'Outubro', '11' => 'Novembro', '12' => 'Dezembro']);
        $diasemana = array('Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sabado');
        $diasMes29 = array(['01' => '01','02' => '02','03' => '03','04' => '04', '05' => '05', '06' => '06','07' => '07', '08' => '08', '09' => '09','10' => '10', '11' => '11', '12' => '12', '13' => '13', '14' => '14', '15' => '15', '16' => '16', '17' => '17', '18' => '18', '19' => '19', '20' => '20', '21' => '21', '22' => '22', '23' => '23', '24' => '24', '25' => '25', '26' => '26', '27' => '27', '28' => '28', '29' => '29']);
        $diasMes30 = array(['01' => '01','02' => '02','03' => '03','04' => '04', '05' => '05', '06' => '06','07' => '07', '08' => '08', '09' => '09','10' => '10', '11' => '11', '12' => '12', '13' => '13', '14' => '14', '15' => '15', '16' => '16', '17' => '17', '18' => '18', '19' => '19', '20' => '20', '21' => '21', '22' => '22', '23' => '23', '24' => '24', '25' => '25', '26' => '26', '27' => '27', '28' => '28', '29' => '29', '30' => '30']);
        $diasMes31 = array(['01' => '01','02' => '02','03' => '03','04' => '04', '05' => '05', '06' => '06','07' => '07', '08' => '08', '09' => '09','10' => '10', '11' => '11', '12' => '12', '13' => '13', '14' => '14', '15' => '15', '16' => '16', '17' => '17', '18' => '18', '19' => '19', '20' => '20', '21' => '21', '22' => '22', '23' => '23', '24' => '24', '25' => '25', '26' => '26', '27' => '27', '28' => '28', '29' => '29', '30' => '30']);
        $diasteste = array(['01','02']);
        $relatorio = array();

        $funcionariosQuadrosRelogios = TableRegistry::get('FuncionariosQuadrosRelogios');
        //$escala = $funcionariosQuadrosRelogios->find()->contain(['QuadrosHoras'])->where(['FuncionariosQuadrosRelogios.id'=> 2])->first();
        //pr($escala);exit;
        foreach ($batidas as $key => $value) {
           // pr($value->funcionario_id);exit;
            $partes = explode("/", $value->created->format('d/m/Y'));        
            $dia = $partes[0];
            $mes = $partes[1];
            $ano = $partes[2];
            
            //trazedo a escala
            
            $escala = $funcionariosQuadrosRelogios->find()->contain(['QuadrosHoras'])->where(['FuncionariosQuadrosRelogios.funcionario_id'=> $value->funcionario_id, 'FuncionariosQuadrosRelogios.status' => 1])->first();

            
            if($mes == 1 || $mes == 3 || $mes == 5 || $mes == 7 || $mes == 8 || $mes == 10 || $mes == 12){
                foreach ($diasMes31 as $key => $dias) {
                    $valor = $dias.'/'.$partes[1].'/'.$ano;
                    $valor2 = $ano.'-'.$partes[1].'-'.$dias;
                    $date_sql = date('Y-m-d', strtotime($valor2));
                    $dados = array();
                    $diasemana_numero = date('w', strtotime($date_sql));
                    
                    if($dia == $dias){
                        $dados['dia_semana'] = $diasemana[$diasemana_numero];
                        $dados['data'] = $valor;
                        $dados['status'] = '';
                        $dados['funcionario_nome'] = $value->funcionario->nome;
                        $dados['batida'] = $value->created->format('d/m/Y H:i:s');
                        
                        $dados['motivo'] = $value->batidas_ajuste->motivo;
                        
                        if($diasemana_numero == 0 && $escala->quadros_hora->domingo == 1 || $diasemana_numero == 1 && $escala->quadros_hora->segunda == 1 || $diasemana_numero == 2 && $escala->quadros_hora->terca == 1 || $diasemana_numero == 3 && $escala->quadros_hora->quarta == 1 || $diasemana_numero == 4 && $escala->quadros_hora->quinta == 1 || $diasemana_numero == 5 && $escala->quadros_hora->sexta == 1 || $diasemana_numero == 6 && $escala->quadros_hora->sabado == 1){
                            if(!empty($relatorio[$mesesAno[0][$mes]][$value->funcionario_id][$valor]))
                                $dados['status'] = 'Presente';
                        }else{
                            if(!empty($relatorio[$mesesAno[0][$mes]][$value->funcionario_id][$valor]))
                                $dados['status'] = 'Extra';
                        }

                        $relatorio[$mesesAno[0][$mes]][$value->funcionario_id][$valor][] = $dados;
                    }
                    else{
                        if($diasemana_numero == 0 && $escala->quadros_hora->domingo == 1 || $diasemana_numero == 1 && $escala->quadros_hora->segunda == 1 || $diasemana_numero == 2 && $escala->quadros_hora->terca == 1 || $diasemana_numero == 3 && $escala->quadros_hora->quarta == 1 || $diasemana_numero == 4 && $escala->quadros_hora->quinta == 1 || $diasemana_numero == 5 && $escala->quadros_hora->sexta == 1 || $diasemana_numero == 6 && $escala->quadros_hora->sabado == 1) {
                            if(empty($relatorio[$mesesAno[0][$mes]][$value->funcionario_id][$valor])){

                                $dados['dia_semana'] = $diasemana[$diasemana_numero];
                                $dados['data'] = $valor;
                                $dados['funcionario_nome'] = $value->funcionario->nome;
                                $dados['batida'] = '';
                                $dados['motivo'] = '';
                                $dados['status'] = 'Falta';
                                $dados['id'] = $value->id;
                            }
                        }else{
                            $dados['dia_semana'] = $diasemana[$diasemana_numero];
                            $dados['data'] = $valor;
                            $dados['status'] = '';
                            $dados['funcionario_nome'] = $value->funcionario->nome;
                            $dados['batida'] = '';
                            $dados['motivo'] = '';
                            $dados['status'] = 'Folga';
                        }
                        
                        $relatorio[$mesesAno[0][$mes]][$value->funcionario_id][$valor][0] = $dados;
                    }
                }
            }else if($mes == 4 || $mes == 6 || $mes == 9 || $mes == 11){

                foreach ($diasMes30[0] as $key => $dias) {
                    $valor = $dias.'/'.$partes[1].'/'.$ano;
                    $valor2 = $ano.'-'.$partes[1].'-'.$dias;
                    $date_sql = date('Y-m-d', strtotime($valor2));
                    $dados = array();
                    $diasemana_numero = date('w', strtotime($date_sql));
                    
                    if($dia == $dias){
                        $dados['dia_semana'] = $diasemana[$diasemana_numero];
                        $dados['data'] = $valor;
                        $dados['status'] = '';
                        $dados['funcionario_nome'] = $value->funcionario->nome;
                        $dados['batida'] = $value->created->format('d/m/Y H:i:s');
                        
                        $dados['motivo'] = $value->batidas_ajuste->motivo;
                        
                        if($diasemana_numero == 0 && $escala->quadros_hora->domingo == 1 || $diasemana_numero == 1 && $escala->quadros_hora->segunda == 1 || $diasemana_numero == 2 && $escala->quadros_hora->terca == 1 || $diasemana_numero == 3 && $escala->quadros_hora->quarta == 1 || $diasemana_numero == 4 && $escala->quadros_hora->quinta == 1 || $diasemana_numero == 5 && $escala->quadros_hora->sexta == 1 || $diasemana_numero == 6 && $escala->quadros_hora->sabado == 1){
                            if(!empty($relatorio[$mesesAno[0][$mes]][$value->funcionario_id][$valor]))
                                $dados['status'] = 'Presente';
                        }else{
                            if(!empty($relatorio[$mesesAno[0][$mes]][$value->funcionario_id][$valor]))
                                $dados['status'] = 'Extra';
                        }

                        $relatorio[$mesesAno[0][$mes]][$value->funcionario_id][$valor][] = $dados;
                    }
                    else{
                        if($diasemana_numero == 0 && $escala->quadros_hora->domingo == 1 || $diasemana_numero == 1 && $escala->quadros_hora->segunda == 1 || $diasemana_numero == 2 && $escala->quadros_hora->terca == 1 || $diasemana_numero == 3 && $escala->quadros_hora->quarta == 1 || $diasemana_numero == 4 && $escala->quadros_hora->quinta == 1 || $diasemana_numero == 5 && $escala->quadros_hora->sexta == 1 || $diasemana_numero == 6 && $escala->quadros_hora->sabado == 1) {
                            if(empty($relatorio[$mesesAno[0][$mes]][$value->funcionario_id][$valor])){

                                $dados['dia_semana'] = $diasemana[$diasemana_numero];
                                $dados['data'] = $valor;
                                $dados['funcionario_nome'] = $value->funcionario->nome;
                                $dados['batida'] = '';
                                $dados['motivo'] = '';
                                $dados['status'] = 'Falta';
                                $dados['id'] = $value->id;
                            }
                        }else{
                            $dados['dia_semana'] = $diasemana[$diasemana_numero];
                            $dados['data'] = $valor;
                            $dados['status'] = '';
                            $dados['funcionario_nome'] = $value->funcionario->nome;
                            $dados['batida'] = '';
                            $dados['motivo'] = '';
                            $dados['status'] = 'Folga';
                        }
                        
                        $relatorio[$mesesAno[0][$mes]][$value->funcionario_id][$valor][0] = $dados;
                    }
                }
             
            }else if($mes == 2){
                foreach ($diasMes29 as $key => $dias) {
                    $valor = $dias.'/'.$partes[1].'/'.$ano;
                    $valor2 = $ano.'-'.$partes[1].'-'.$dias;
                    $date_sql = date('Y-m-d', strtotime($valor2));
                    $dados = array();
                    $diasemana_numero = date('w', strtotime($date_sql));
                    
                    if($dia == $dias){
                        $dados['dia_semana'] = $diasemana[$diasemana_numero];
                        $dados['data'] = $valor;
                        $dados['status'] = '';
                        $dados['funcionario_nome'] = $value->funcionario->nome;
                        $dados['batida'] = $value->created->format('d/m/Y H:i:s');
                        
                        $dados['motivo'] = $value->batidas_ajuste->motivo;
                        
                        if($diasemana_numero == 0 && $escala->quadros_hora->domingo == 1 || $diasemana_numero == 1 && $escala->quadros_hora->segunda == 1 || $diasemana_numero == 2 && $escala->quadros_hora->terca == 1 || $diasemana_numero == 3 && $escala->quadros_hora->quarta == 1 || $diasemana_numero == 4 && $escala->quadros_hora->quinta == 1 || $diasemana_numero == 5 && $escala->quadros_hora->sexta == 1 || $diasemana_numero == 6 && $escala->quadros_hora->sabado == 1){
                            if(!empty($relatorio[$mesesAno[0][$mes]][$value->funcionario_id][$valor]))
                                $dados['status'] = 'Presente';
                        }else{
                            if(!empty($relatorio[$mesesAno[0][$mes]][$value->funcionario_id][$valor]))
                                $dados['status'] = 'Extra';
                        }

                        $relatorio[$mesesAno[0][$mes]][$value->funcionario_id][$valor][] = $dados;
                    }
                    else{
                        if($diasemana_numero == 0 && $escala->quadros_hora->domingo == 1 || $diasemana_numero == 1 && $escala->quadros_hora->segunda == 1 || $diasemana_numero == 2 && $escala->quadros_hora->terca == 1 || $diasemana_numero == 3 && $escala->quadros_hora->quarta == 1 || $diasemana_numero == 4 && $escala->quadros_hora->quinta == 1 || $diasemana_numero == 5 && $escala->quadros_hora->sexta == 1 || $diasemana_numero == 6 && $escala->quadros_hora->sabado == 1) {
                            if(empty($relatorio[$mesesAno[0][$mes]][$value->funcionario_id][$valor])){

                                $dados['dia_semana'] = $diasemana[$diasemana_numero];
                                $dados['data'] = $valor;
                                $dados['funcionario_nome'] = $value->funcionario->nome;
                                $dados['batida'] = '';
                                $dados['motivo'] = '';
                                $dados['status'] = 'Falta';
                                $dados['id'] = $value->id;
                            }
                        }else{
                            $dados['dia_semana'] = $diasemana[$diasemana_numero];
                            $dados['data'] = $valor;
                            $dados['status'] = '';
                            $dados['funcionario_nome'] = $value->funcionario->nome;
                            $dados['batida'] = '';
                            $dados['motivo'] = '';
                            $dados['status'] = 'Folga';
                        }
                        
                        $relatorio[$mesesAno[0][$mes]][$value->funcionario_id][$valor][0] = $dados;
                    }
                }
            }
            //$relatorio[$mesesAno[0][$mes]][] = $value;
            //$relatorio[$mesesAno[0][$mes]][$value->funcionario_id][] = $value;
            //pr($relatorio);exit;
        }
        //pr($relatorio);exit;
        
        
        //pr($relatorio);exit;
        $this->set(compact('relatorio'));
    }
}
