<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Empresas Controller
 *
 * @property \App\Model\Table\EmpresasTable $Empresas
 *
 * @method \App\Model\Entity\Empresa[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EmpresasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $empresas = $this->paginate($this->Empresas->find()->where(['status' => 1]));

        $this->set(compact('empresas'));
    }

    /**
     * View method
     *
     * @param string|null $id Empresa id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $empresa = $this->Empresas->get($id, [
            'contain' => ['Funcionarios']
        ]);
        //pr($empresa);exit;
        $this->set('empresa', $empresa);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $empresa = $this->Empresas->newEntity();
        if ($this->request->is('post')) {
            $empresa = $this->Empresas->patchEntity($empresa, $this->request->getData());
            $empresa->criado_por = $this->retornarIdUsuarioAtivo();
            $empresa->modificado_por = $this->retornarIdUsuarioAtivo();
            $empresa->status = 1;
            if ($this->Empresas->save($empresa)) {
                $this->Flash->success(__('A empresa/responsável foi cadastrado(a) com sucesso!'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('A empresa/responsável não pôde ser cadastrado, por favor tente novamente.'));
        }
        $this->set(compact('empresa'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Empresa id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $empresa = $this->Empresas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $empresa = $this->Empresas->patchEntity($empresa, $this->request->getData());
            $empresa->modificado_por = $this->retornarIdUsuarioAtivo();
            if ($this->Empresas->save($empresa)) {
                $this->Flash->success(__('A empresa/responsável foi editado(a) com sucesso!'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('A empresa/responsável não pôde ser editado, por favor tente novamente.'));
        }
        $this->set(compact('empresa'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Empresa id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $empresa = $this->Empresas->get($id);
        $empresa->status = 0;
        if ($this->Empresas->save($empresa)) {
            $this->Flash->success(__('A empresa/responsável foi deletado(a) com sucesso!'));
        } else {
            $this->Flash->error(__('A empresa/responsável não pôde ser deletado, por favor tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
