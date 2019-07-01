<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Relogios Controller
 *
 * @property \App\Model\Table\RelogiosTable $Relogios
 *
 * @method \App\Model\Entity\Relogio[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RelogiosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $relogios = $this->paginate($this->Relogios);

        $this->set(compact('relogios'));
    }

    /**
     * View method
     *
     * @param string|null $id Relogio id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $relogio = $this->Relogios->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('relogio', $relogio);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $relogio = $this->Relogios->newEntity();
        if ($this->request->is('post')) {
            $relogio = $this->Relogios->patchEntity($relogio, $this->request->getData());
            $relogio->criado_por = $this->retornarIdUsuarioAtivo();
            $relogio->modificado_por = $this->retornarIdUsuarioAtivo();
            $relogio->status = 1;
            if ($this->Relogios->save($relogio)) {
                $this->Flash->success(__('Relógio criado com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Algo deu errado, tente novamente!'));
        }
        $this->set(compact('relogio'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Relogio id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $relogio = $this->Relogios->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $relogio = $this->Relogios->patchEntity($relogio, $this->request->getData());
            $relogio->modificado_por = $this->retornarIdUsuarioAtivo();
            if ($this->Relogios->save($relogio)) {
                $this->Flash->success(__('O relógio foi salvo com sucesso!'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O relógio não pôde ser salvo, por favor tente novamente.'));
        }
        $this->set(compact('relogio'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Relogio id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $relogio = $this->Relogios->get($id);
        if ($this->Relogios->delete($relogio)) {
            $this->Flash->success(__('O relógio foi deletado com sucesso!'));
        } else {
            $this->Flash->error(__('O relógio não pôde ser deletado, por favor verifique os vínculos e tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}