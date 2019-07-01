<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ApuracoesPeriodos Controller
 *
 * @property \App\Model\Table\ApuracoesPeriodosTable $ApuracoesPeriodos
 *
 * @method \App\Model\Entity\ApuracoesPeriodo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ApuracoesPeriodosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $apuracoesPeriodos = $this->paginate($this->ApuracoesPeriodos);

        $this->set(compact('apuracoesPeriodos'));
    }

    /**
     * View method
     *
     * @param string|null $id Apuracoes Periodo id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $apuracoesPeriodo = $this->ApuracoesPeriodos->get($id, [
            'contain' => ['Users']
        ]);
        
        $this->set('apuracoesPeriodo', $apuracoesPeriodo);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $apuracoesPeriodo = $this->ApuracoesPeriodos->newEntity();
        if ($this->request->is('post')) {
            $apuracoesPeriodo = $this->ApuracoesPeriodos->patchEntity($apuracoesPeriodo, $this->request->getData());
            $apuracoesPeriodo->criado_por = $this->retornarIdUsuarioAtivo();
            $apuracoesPeriodo->modificado_por = $this->retornarIdUsuarioAtivo();
            $apuracoesPeriodo->status = 1;
            //pr($apuracoesPeriodo);exit;
            if ($this->ApuracoesPeriodos->save($apuracoesPeriodo)) {
                $this->Flash->success(__('O período de apuração foi salvo com sucesso!'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O período de apuração não pôde ser salvo, por favor tente novamente.'));
        }
        $users = $this->ApuracoesPeriodos->Users->find('list', ['limit' => 200]);
        $this->set(compact('apuracoesPeriodo', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Apuracoes Periodo id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $apuracoesPeriodo = $this->ApuracoesPeriodos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $apuracoesPeriodo = $this->ApuracoesPeriodos->patchEntity($apuracoesPeriodo, $this->request->getData());
            $apuracoesPeriodo->modificado_por = $this->retornarIdUsuarioAtivo();
            if ($this->ApuracoesPeriodos->save($apuracoesPeriodo)) {
                $this->Flash->success(__('O período de apuração foi salvo com sucesso!'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O período de apuração não pôde ser salvo, por favor tente novamente.'));
        }
        $users = $this->ApuracoesPeriodos->Users->find('list', ['limit' => 200]);
        $this->set(compact('apuracoesPeriodo', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Apuracoes Periodo id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $apuracoesPeriodo = $this->ApuracoesPeriodos->get($id);
        if ($this->ApuracoesPeriodos->delete($apuracoesPeriodo)) {
            $this->Flash->success(__('O período de apuração foi salvo com sucesso!'));
        } else {
            $this->Flash->error(__('O período de apuração não pôde ser deletado, por favor verifique os vínculos e tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
