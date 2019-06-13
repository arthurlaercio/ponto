<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ApuracoesImportacoes Controller
 *
 * @property \App\Model\Table\ApuracoesImportacoesTable $ApuracoesImportacoes
 *
 * @method \App\Model\Entity\ApuracoesImportaco[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ApuracoesImportacoesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Relogios', 'ApuracaoPeriodos']
        ];
        $apuracoesImportacoes = $this->paginate($this->ApuracoesImportacoes);

        $this->set(compact('apuracoesImportacoes'));
    }

    /**
     * View method
     *
     * @param string|null $id Apuracoes Importaco id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $apuracoesImportaco = $this->ApuracoesImportacoes->get($id, [
            'contain' => ['Relogios', 'ApuracaoPeriodos']
        ]);

        $this->set('apuracoesImportaco', $apuracoesImportaco);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $apuracoesImportaco = $this->ApuracoesImportacoes->newEntity();
        if ($this->request->is('post')) {
            $apuracoesImportaco = $this->ApuracoesImportacoes->patchEntity($apuracoesImportaco, $this->request->getData());
            if ($this->ApuracoesImportacoes->save($apuracoesImportaco)) {
                $this->Flash->success(__('The apuracoes importaco has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The apuracoes importaco could not be saved. Please, try again.'));
        }
        $relogios = $this->ApuracoesImportacoes->Relogios->find('list', ['limit' => 200]);
        $apuracaoPeriodos = $this->ApuracoesImportacoes->ApuracaoPeriodos->find('list', ['limit' => 200]);
        $this->set(compact('apuracoesImportaco', 'relogios', 'apuracaoPeriodos'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Apuracoes Importaco id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $apuracoesImportaco = $this->ApuracoesImportacoes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $apuracoesImportaco = $this->ApuracoesImportacoes->patchEntity($apuracoesImportaco, $this->request->getData());
            if ($this->ApuracoesImportacoes->save($apuracoesImportaco)) {
                $this->Flash->success(__('The apuracoes importaco has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The apuracoes importaco could not be saved. Please, try again.'));
        }
        $relogios = $this->ApuracoesImportacoes->Relogios->find('list', ['limit' => 200]);
        $apuracaoPeriodos = $this->ApuracoesImportacoes->ApuracaoPeriodos->find('list', ['limit' => 200]);
        $this->set(compact('apuracoesImportaco', 'relogios', 'apuracaoPeriodos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Apuracoes Importaco id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $apuracoesImportaco = $this->ApuracoesImportacoes->get($id);
        if ($this->ApuracoesImportacoes->delete($apuracoesImportaco)) {
            $this->Flash->success(__('The apuracoes importaco has been deleted.'));
        } else {
            $this->Flash->error(__('The apuracoes importaco could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
