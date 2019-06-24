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
        //pr($quadrosHoras);exit;
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
        $quadrosHora = $this->QuadrosHoras->find()->contain(['Users'])->where(['QuadrosHoras.id' => $id])->first();

        //pr($quadrosHora);exit;
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
        //pr($quadrosHora);exit;
        if ($this->request->is('post')) {
            $quadrosHora = $this->QuadrosHoras->patchEntity($quadrosHora, $this->request->getData());
            $quadrosHora->criado_por = $this->retornarIdUsuarioAtivo();
            $quadrosHora->modificado_por = $this->retornarIdUsuarioAtivo();
            $quadrosHora->status = 1;

            //pr($quadrosHora);exit;
            foreach ($this->request->data['Dias'] as $key => $value) {
                if($value == 1)
                    $quadrosHora->segunda = 1;
                else if($value == 2)
                    $quadrosHora->terca = 1;
                else if($value == 3)
                    $quadrosHora->quarta = 1;
                else if($value == 4)
                    $quadrosHora->quinta = 1;
                else if($value == 5)
                    $quadrosHora->sexta = 1;
                else if($value == 6)
                    $quadrosHora->sabado = 1;
                else if($value == 7)
                    $quadrosHora->domingo = 1;
            }
            if ($this->QuadrosHoras->save($quadrosHora)) {
                $this->Flash->success(__('Salvo com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Algo deu errado, tente novamenete!'));
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
        //pr($quadrosHora);exit;
        $checked = array();
        if($quadrosHora->segunda == 1) $checked['1'] = 'Segunda';if($quadrosHora->terca == 1) $checked['2'] = 'Terça';if($quadrosHora->quarta == 1) $checked['3'] = 'Quarta';if($quadrosHora->quinta == 1) $checked['4'] = 'Quinta';if($quadrosHora->sexta == 1) $checked['5'] = 'Sexta';if($quadrosHora->sabado == 1) $checked['6'] = 'Sabado';if($quadrosHora->domingo == 1) $checked['7'] = 'Domingo';
        if ($this->request->is(['patch', 'post', 'put'])) {
            $quadrosHora = $this->QuadrosHoras->patchEntity($quadrosHora, $this->request->getData());
            $quadrosHora->modificado_por = $this->retornarIdUsuarioAtivo();
            //pr($quadrosHora);exit;
            if ($this->QuadrosHoras->save($quadrosHora)) {
                $this->Flash->success(__('O quadro de horas foi alterado com sucesso.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Algo deu errado, tente novamente!'));
            return $this->redirect(['action' => 'index']);
        }
        $this->set(compact('quadrosHora','checked'));
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
