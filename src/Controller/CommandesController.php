<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Commandes Controller
 *
 * @property \App\Model\Table\CommandesTable $Commandes
 */
class CommandesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Commandes->find();
        $commandes = $this->paginate($query);

        $this->set(compact('commandes'));
    }

    /**
     * View method
     *
     * @param string|null $id Commande id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $commande = $this->Commandes->get($id, contain: ['DetailsCommande']);
        $this->set(compact('commande'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
{ 
    $commande = $this->Commandes->newEmptyEntity(); 
    $materielsTable = $this->fetchTable('Materiels');
    $materiels = $materielsTable->find()
    ->select(['id', 'nom', 'quantite_disponible', 'prix_location'])
    ->toArray();

    $this->set(compact('materiels'));
        
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $data['date_commande'] = date("Y-m-d H:i:s"); // Définir la date et heure actuelle
            $data['rendue'] = 0; // Définir rendue à 0
            
            $commande = $this->Commandes->patchEntity($commande, $data);
            if ($this->Commandes->save($commande)) {
                $details = $this->request->getData('details');
                foreach ($details as $detail) {
                    $detailEntity = $this->Commandes->DetailsCommande->newEntity([
                        'commande_id' => $commande->id,
                        'materiel_id' => $detail['materiel_id'],
                        'quantite' => $detail['quantite'],
                        'prix_total' => $detail['prix_total'],
                    ]);
                    $this->Commandes->DetailsCommande->save($detailEntity);
                }
        
                $this->Flash->success(__('The commande has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The commande could not be saved. Please, try again.'));
        }
        $this->set(compact('commande'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Commande id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $commande = $this->Commandes->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $commande = $this->Commandes->patchEntity($commande, $this->request->getData());
            if ($this->Commandes->save($commande)) {
                $this->Flash->success(__('The commande has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The commande could not be saved. Please, try again.'));
        }
        $this->set(compact('commande'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Commande id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $commande = $this->Commandes->get($id, [
            'contain' => ['DetailsCommande'],
        ]);
    
        if ($this->Commandes->delete($commande)) {
            // Supprime également les détails de la commande
            foreach ($commande->details_commande as $detail) {
                $this->Commandes->DetailsCommande->delete($detail);
            }
            $this->Flash->success('La commande a été restituée avec succès.');
        } else {
            $this->Flash->error('La commande n\'a pas pu être restituée. Veuillez réessayer.');
        }
    
        return $this->redirect(['action' => 'index']);
    }
}
