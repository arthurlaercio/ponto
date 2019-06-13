<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * BatidasAjustes Controller
 *
 * @property \App\Model\Table\BatidasAjustesTable $BatidasAjustes
 *
 * @method \App\Model\Entity\BatidasAjuste[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BatidasAjustesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $batidasAjustes = $this->paginate($this->BatidasAjustes);

        $this->set(compact('batidasAjustes'));
    }

    /**
     * View method
     *
     * @param string|null $id Batidas Ajuste id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $batidasAjuste = $this->BatidasAjustes->get($id, [
            'contain' => []
        ]);

        $this->set('batidasAjuste', $batidasAjuste);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $batidasAjuste = $this->BatidasAjustes->newEntity();
        if ($this->request->is('post')) {
            $batidasAjuste = $this->BatidasAjustes->patchEntity($batidasAjuste, $this->request->getData());
            if ($this->BatidasAjustes->save($batidasAjuste)) {
                $this->Flash->success(__('The batidas ajuste has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The batidas ajuste could not be saved. Please, try again.'));
        }
        $this->set(compact('batidasAjuste'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Batidas Ajuste id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $batidasAjuste = $this->BatidasAjustes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $batidasAjuste = $this->BatidasAjustes->patchEntity($batidasAjuste, $this->request->getData());
            if ($this->BatidasAjustes->save($batidasAjuste)) {
                $this->Flash->success(__('The batidas ajuste has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The batidas ajuste could not be saved. Please, try again.'));
        }
        $this->set(compact('batidasAjuste'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Batidas Ajuste id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $batidasAjuste = $this->BatidasAjustes->get($id);
        if ($this->BatidasAjustes->delete($batidasAjuste)) {
            $this->Flash->success(__('The batidas ajuste has been deleted.'));
        } else {
            $this->Flash->error(__('The batidas ajuste could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
