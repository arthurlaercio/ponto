<?php
namespace App\Controller;

use Cake\ORM\TableRegistry;
use Cake\Event\Event;
use Cake\Auth\Auth;
use App\Controller\AppController;
/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
        $this->Auth->allow(['add', 'logout']);
    }

    public function login()
    {
        $this->viewBuilder()->layout("externo");
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();

            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Usuário ou senha ínvalido, tente novamente'));
        }
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    public function index()
    {
        //$users = $this->paginate($this->Users);
        $users = $this->Users->find()->all();
        //pr($users);exit;
        $this->set(compact('users'));
    }

  
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        //pr($user);exit;
        $this->set('user', $user);
    }

 
    public function add()
    {
        $user = $this->Users->newEntity();
        //pr($user);exit;
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user->criado_por = $this->retornarIdUsuarioAtivo();
            $user->modificado_por = $this->retornarIdUsuarioAtivo();
            $user->status = 1;
            //pr($user);exit;
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Usuário criado com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Algo deu errado, tente novamente.'));
        }
        $this->set(compact('user'));
    }

  
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
            'order' => ['status DESC']
        ]);
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user->modificado_por = $this->retornarIdUsuarioAtivo();
            //pr($user);exit;
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

 
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function home(){

    }

    
}
