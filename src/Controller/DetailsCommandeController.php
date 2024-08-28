<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * DetailsCommande Controller
 *
 * @property \App\Model\Table\DetailsCommandeTable $DetailsCommande
 */
class DetailsCommandeController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->DetailsCommande->find()
            ->contain(['Commandes', 'Materiels']);
        $detailsCommande = $this->paginate($query);

        $this->set(compact('detailsCommande'));
    }

    /**
     * View method
     *
     * @param string|null $id Details Commande id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $detailsCommande = $this->DetailsCommande->get($id, contain: ['Commandes', 'Materiels']);
        $this->set(compact('detailsCommande'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $detailsCommande = $this->DetailsCommande->newEmptyEntity();
        if ($this->request->is('post')) {
            $detailsCommande = $this->DetailsCommande->patchEntity($detailsCommande, $this->request->getData());
            if ($this->DetailsCommande->save($detailsCommande)) {
                $this->Flash->success(__('The details commande has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The details commande could not be saved. Please, try again.'));
        }
        $commandes = $this->DetailsCommande->Commandes->find('list', limit: 200)->all();
        $materiels = $this->DetailsCommande->Materiels->find('list', limit: 200)->all();
        $this->set(compact('detailsCommande', 'commandes', 'materiels'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Details Commande id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $detailsCommande = $this->DetailsCommande->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $detailsCommande = $this->DetailsCommande->patchEntity($detailsCommande, $this->request->getData());
            if ($this->DetailsCommande->save($detailsCommande)) {
                $this->Flash->success(__('The details commande has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The details commande could not be saved. Please, try again.'));
        }
        $commandes = $this->DetailsCommande->Commandes->find('list', limit: 200)->all();
        $materiels = $this->DetailsCommande->Materiels->find('list', limit: 200)->all();
        $this->set(compact('detailsCommande', 'commandes', 'materiels'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Details Commande id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $detailsCommande = $this->DetailsCommande->get($id);
        if ($this->DetailsCommande->delete($detailsCommande)) {
            $this->Flash->success(__('The details commande has been deleted.'));
        } else {
            $this->Flash->error(__('The details commande could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
