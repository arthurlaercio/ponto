<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * FuncionariosQuadrosRelogios Controller
 *
 * @property \App\Model\Table\FuncionariosQuadrosRelogiosTable $FuncionariosQuadrosRelogios
 *
 * @method \App\Model\Entity\FuncionariosQuadrosRelogio[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FuncionariosQuadrosRelogiosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Funcionarios', 'Relogios', 'QuadrosHoras']
        ];
        $funcionariosQuadrosRelogios = $this->paginate($this->FuncionariosQuadrosRelogios);

        $this->set(compact('funcionariosQuadrosRelogios'));
    }

    /**
     * View method
     *
     * @param string|null $id Funcionarios Quadros Relogio id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $funcionariosQuadrosRelogio = $this->FuncionariosQuadrosRelogios->get($id, [
            'contain' => ['Funcionarios', 'Relogios', 'QuadrosHoras']
        ]);

        $this->set('funcionariosQuadrosRelogio', $funcionariosQuadrosRelogio);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($id = null)
    {
        $funcionario = $this->FuncionariosQuadrosRelogios->Funcionarios->find()->contain(['Empresas'])->where(['Funcionarios.id' => $id])->first();
        //pr($funcionario);exit;
        $funcionariosQuadrosRelogio = $this->FuncionariosQuadrosRelogios->newEntity();
        if ($this->request->is('post')) {
            $funcionariosQuadrosRelogio = $this->FuncionariosQuadrosRelogios->patchEntity($funcionariosQuadrosRelogio, $this->request->getData());
            $funcionariosQuadrosRelogio->funcionario_id = $funcionario->id;
            $funcionariosQuadrosRelogio->status = 1;
            $funcionariosQuadrosRelogio->criado_por = $this->retornarIdUsuarioAtivo();
            $funcionariosQuadrosRelogio->modificado_por = $this->retornarIdUsuarioAtivo();
            $funcionariosQuadrosRelogio->data_inicio = date('d/m/Y');
            //pr($funcionariosQuadrosRelogio);exit;
            $funcionariosQuadrosRelogioAnterior = $this->FuncionariosQuadrosRelogios->find()->where(['FuncionariosQuadrosRelogios.funcionario_id' => $funcionariosQuadrosRelogio->funcionario_id, 'FuncionariosQuadrosRelogios.status' => 1])->first();
            if(!empty($funcionariosQuadrosRelogioAnterior)){
                $funcionariosQuadrosRelogioAnterior->status = 0;
                $funcionariosQuadrosRelogioAnterior->data_fim = date('y/m/d');
                if ($this->FuncionariosQuadrosRelogios->save($funcionariosQuadrosRelogioAnterior)) {
                    if ($this->FuncionariosQuadrosRelogios->save($funcionariosQuadrosRelogio)) {
                        $this->Flash->success(__('O enquadramento do funcionário foi efetuado com sucesso!'));

                        return $this->redirect(['controller' => 'Funcionarios','action' => 'index']);
                    }
                }
            }else{
                if ($this->FuncionariosQuadrosRelogios->save($funcionariosQuadrosRelogio)) {
                        $this->Flash->success(__('O enquadramento do funcionário foi efetuado com sucesso!'));

                        return $this->redirect(['controller' => 'Funcionarios','action' => 'index']);
                    }
            }
            
            $this->Flash->error(__('O enquadramento do funcionário não pode ser efetivado, por favor tente novamente.'));
        }
        //$funcionarios = $this->FuncionariosQuadrosRelogios->Funcionarios->find('list', ['limit' => 200]);
        $relogios = $this->FuncionariosQuadrosRelogios->Relogios->find('list', ['limit' => 200]);
        $quadroHoras = $this->FuncionariosQuadrosRelogios->QuadrosHoras->find('list', ['limit' => 200]);
        $this->set(compact('funcionariosQuadrosRelogio', 'relogios', 'quadroHoras','funcionario'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Funcionarios Quadros Relogio id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $funcionariosQuadrosRelogio = $this->FuncionariosQuadrosRelogios->get($id, [
            'contain' => ['Funcionarios']
        ]);
        //pr($funcionariosQuadrosRelogio);exit;
        if ($this->request->is(['patch', 'post', 'put'])) {
            $funcionariosQuadrosRelogio = $this->FuncionariosQuadrosRelogios->patchEntity($funcionariosQuadrosRelogio, $this->request->getData());
            //$funcionariosQuadrosRelogio->status = 0;
            if ($this->FuncionariosQuadrosRelogios->save($funcionariosQuadrosRelogio)) {
                $this->Flash->success(__('O enquadramento do funcionário foi efetuado com sucesso!'));

                return $this->redirect(['action' => 'escalaFuncionario',$funcionariosQuadrosRelogio->funcionario_id]);
            }
            $this->Flash->error(__('O enquadramento do funcionário não pode ser efetivado, por favor tente novamente.'));
        }
        $funcionarios = $this->FuncionariosQuadrosRelogios->Funcionarios->find('list', ['limit' => 200]);
        $relogios = $this->FuncionariosQuadrosRelogios->Relogios->find('list', ['limit' => 200]);
        $quadroHoras = $this->FuncionariosQuadrosRelogios->QuadrosHoras->find('list', ['limit' => 200]);
        $this->set(compact('funcionariosQuadrosRelogio', 'funcionarios', 'relogios', 'quadroHoras'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Funcionarios Quadros Relogio id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $funcionariosQuadrosRelogio = $this->FuncionariosQuadrosRelogios->get($id);
        if ($this->FuncionariosQuadrosRelogios->delete($funcionariosQuadrosRelogio)) {
            $this->Flash->success(__('O enquadramento do funcionário foi efetuado com sucesso!'));
        } else {
            $this->Flash->error(__('O enquadramento do funcionário não pode ser deletado, por favor verifique os vínculos e tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function escalaFuncionario($id = null)
    {
        $funcionario = $this->FuncionariosQuadrosRelogios->Funcionarios->find()->contain(['Empresas'])->where(['Funcionarios.id' => $id])->first();
        //pr($funcionario);exit;
        $this->paginate = [
            'contain' => ['Funcionarios', 'Relogios', 'QuadrosHoras'],
            'where' => ['funcionario_id' => $id]
        ];
        $funcionariosQuadrosRelogios = $this->paginate($this->FuncionariosQuadrosRelogios);
        $funcionariosQuadrosRelogios = $this->FuncionariosQuadrosRelogios->find()->contain(['Funcionarios.Empresas','Relogios','QuadrosHoras'])->where(['funcionario_id' => $id])->all();
        //pr($funcionariosQuadrosRelogios);exit;
        $this->set(compact('funcionariosQuadrosRelogios','funcionario'));
    }
}