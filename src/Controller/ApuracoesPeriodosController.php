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
        //pr($apuracoesPeriodos);exit;
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
            'contain' => []
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
            if ($this->ApuracoesPeriodos->save($apuracoesPeriodo)) {
                $this->Flash->success(__('The apuracoes periodo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The apuracoes periodo could not be saved. Please, try again.'));
        }
        $this->set(compact('apuracoesPeriodo'));
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
            if ($this->ApuracoesPeriodos->save($apuracoesPeriodo)) {
                $this->Flash->success(__('The apuracoes periodo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The apuracoes periodo could not be saved. Please, try again.'));
        }
        $this->set(compact('apuracoesPeriodo'));
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
            $this->Flash->success(__('The apuracoes periodo has been deleted.'));
        } else {
            $this->Flash->error(__('The apuracoes periodo could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
