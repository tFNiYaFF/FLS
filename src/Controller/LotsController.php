<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;
use DateTime;

/**
 * Lot Controller
 *
 *
 * @method \App\Model\Entity\Lot[] paginate($object = null, array $settings = [])
 */
class LotsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $lots = $this->paginate($this->Lots);

        foreach ($lots as $lot) {
            $date = $lot->deadline;
            $date = DateTime::createFromFormat("d.m.y, G:i", $date);
            $date = $date->getTimestamp();
            if ($date < time()) {
                $lot->active = 0;
                $this->Lots->save($lot, ['associated' => ['Choises']]);
            }
        }
        $this->set(compact('lots'));
        $this->set('_serialize', ['lots']);
    }

    /**
     * View method
     *
     * @param string|null $id Lot id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $lot = $this->Lots->get($id, [
            'contain' => ['Choises','Bets']
        ]);
        $this->set('lot', $lot);
        $this->set('_serialize', ['lot']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $lot = $this->Lots->newEntity();
        if ($this->request->is('post')) {
            $lot = $this->Lots->patchEntity($lot, $this->request->getData());
            if ($this->Lots->save($lot,['associated' => ['Choises']])) {
                $this->Flash->success(__('The lot has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The lot could not be saved. Please, try again.'));
        }
        $this->set(compact('lot'));
        $this->set('_serialize', ['lot']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Lot id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $lot = $this->Lots->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $lot = $this->Lots->patchEntity($lot, $this->request->getData());
            if ($this->Lots->save($lot)) {
                $this->Flash->success(__('The lot has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The lot could not be saved. Please, try again.'));
        }
        $this->set(compact('lot'));
        $this->set('_serialize', ['lot']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Lot id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $lot = $this->Lots->get($id);
        if ($this->Lots->delete($lot)) {
            $this->Flash->success(__('The lot has been deleted.'));
        } else {
            $this->Flash->error(__('The lot could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
