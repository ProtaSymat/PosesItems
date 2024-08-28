<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Materiels Controller
 *
 * @property \App\Model\Table\MaterielsTable $Materiels
 */
class MaterielsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Materiels->find();
        $materiels = $this->paginate($query);

        $this->set(compact('materiels'));
    }

    /**
     * View method
     *
     * @param string|null $id Materiel id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $materiel = $this->Materiels->get($id, contain: ['DetailsCommande']);
        $this->set(compact('materiel'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $materiel = $this->Materiels->newEmptyEntity();
        if ($this->request->is('post')) {
            $materiel = $this->Materiels->patchEntity($materiel, $this->request->getData());
            if ($this->Materiels->save($materiel)) {
                $this->Flash->success(__('The materiel has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The materiel could not be saved. Please, try again.'));
        }
        $this->set(compact('materiel'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Materiel id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $materiel = $this->Materiels->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $materiel = $this->Materiels->patchEntity($materiel, $this->request->getData());
            if ($this->Materiels->save($materiel)) {
                $this->Flash->success(__('The materiel has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The materiel could not be saved. Please, try again.'));
        }
        $this->set(compact('materiel'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Materiel id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $materiel = $this->Materiels->get($id);
        if ($this->Materiels->delete($materiel)) {
            $this->Flash->success(__('The materiel has been deleted.'));
        } else {
            $this->Flash->error(__('The materiel could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
