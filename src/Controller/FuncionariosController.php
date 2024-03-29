<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\ORM\ResultSet;
/**
 * Funcionarios Controller
 *
 * @property \App\Model\Table\FuncionariosTable $Funcionarios
 *
 * @method \App\Model\Entity\Funcionario[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FuncionariosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Empresas']
        ];
        $funcionarios = $this->paginate($this->Funcionarios);

        $this->set(compact('funcionarios'));
    }

    /**
     * View method
     *
     * @param string|null $id Funcionario id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $funcionario = $this->Funcionarios->get($id, [
            'contain' => ['Users', 'Empresas', 'Batidas']
        ]);

        $this->set('funcionario', $funcionario);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $funcionario = $this->Funcionarios->newEntity();
        if ($this->request->is('post')) {
           
            $funcionario = $this->Funcionarios->patchEntity($funcionario, $this->request->getData());
            $funcionario->criado_por = $this->retornarIdUsuarioAtivo();
            $funcionario->modificado_por = $this->retornarIdUsuarioAtivo();
            $funcionario->status = 1;
            //pr($funcionario);exit;
            if ($this->Funcionarios->save($funcionario)) {
                $this->Flash->success(__('O funcionário foi salvo com sucesso!'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O funcionário não pôde ser salvo, por favor tente novamente.'));
        }
        $users = $this->Funcionarios->Users->find('list', ['limit' => 200]);
        $empresas = $this->Funcionarios->Empresas->find('list', ['limit' => 200]);
        $this->set(compact('funcionario', 'users', 'empresas'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Funcionario id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $funcionario = $this->Funcionarios->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $funcionario = $this->Funcionarios->patchEntity($funcionario, $this->request->getData());
            $funcionario->modificado_por = $this->retornarIdUsuarioAtivo();
            //pr($this->request->data);exit;
            //pr($funcionario);exit;
            if ($this->Funcionarios->save($funcionario)) {
                $this->Flash->success(__('O funcionário foi salvo com sucesso!'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O funcionário não pôde ser salvo, por favor tente novamente.'));
        }
        $users = $this->Funcionarios->Users->find('list', ['limit' => 200]);
        $empresas = $this->Funcionarios->Empresas->find('list', ['limit' => 200]);
        $this->set(compact('funcionario', 'users', 'empresas'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Funcionario id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $funcionario = $this->Funcionarios->get($id);
        if ($this->Funcionarios->delete($funcionario)) {
            $this->Flash->success(__('O funcionário foi deletado com sucesso!'));
        } else {
            $this->Flash->error(__('O funcionário não pôde ser deletado, por favor verifique os vínculos e tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
