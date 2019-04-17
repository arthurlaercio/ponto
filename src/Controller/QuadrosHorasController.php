<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * QuadrosHoras Controller
 *
 * @property \App\Model\Table\QuadrosHorasTable $QuadrosHoras
 *
 * @method \App\Model\Entity\QuadrosHora[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class QuadrosHorasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $quadrosHoras = $this->paginate($this->QuadrosHoras);

        $this->set(compact('quadrosHoras'));
    }

    /**
     * View method
     *
     * @param string|null $id Quadros Hora id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $quadrosHora = $this->QuadrosHoras->get($id, [
            'contain' => []
        ]);

        $this->set('quadrosHora', $quadrosHora);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $quadrosHora = $this->QuadrosHoras->newEntity();
        if ($this->request->is('post')) {
            $quadrosHora = $this->QuadrosHoras->patchEntity($quadrosHora, $this->request->getData());
            if ($this->QuadrosHoras->save($quadrosHora)) {
                $this->Flash->success(__('The quadros hora has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The quadros hora could not be saved. Please, try again.'));
        }
        $this->set(compact('quadrosHora'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Quadros Hora id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $quadrosHora = $this->QuadrosHoras->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $quadrosHora = $this->QuadrosHoras->patchEntity($quadrosHora, $this->request->getData());
            if ($this->QuadrosHoras->save($quadrosHora)) {
                $this->Flash->success(__('The quadros hora has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The quadros hora could not be saved. Please, try again.'));
        }
        $this->set(compact('quadrosHora'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Quadros Hora id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $quadrosHora = $this->QuadrosHoras->get($id);
        if ($this->QuadrosHoras->delete($quadrosHora)) {
            $this->Flash->success(__('The quadros hora has been deleted.'));
        } else {
            $this->Flash->error(__('The quadros hora could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}