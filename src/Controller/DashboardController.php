<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\EventInterface;

class DashboardController extends AppController
{
    protected $Materiels;
    protected $Commandes;
    
    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Materiels = $this->fetchTable('Materiels');
        $this->Commandes = $this->fetchTable('Commandes');
    }
    
    public function index()
    {
        $materiels = $this->Materiels->find('all');
        $commandes = $this->Commandes->find('all', [
            'contain' => ['DetailsCommande', 'DetailsCommande.Materiels']
        ])->toArray();
        if (empty($commandes)) {
            $commandes = [];
        }
        $this->set(compact('materiels', 'commandes'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
    
        $commandesTable = $this->fetchTable('Commandes');
    
        $commande = $commandesTable->get($id, [
            'contain' => ['DetailsCommande'],
        ]);
    
        if ($commandesTable->delete($commande)) {
            foreach ($commande->details_commande as $detail) {
                $commandesTable->DetailsCommande->delete($detail);
            }
            $this->Flash->success(__('La commande a été restituée avec succès.'));
        } else {
            $this->Flash->error(__('La commande n\'a pas pu être restituée. Veuillez réessayer.'));
        }
    
        return $this->redirect(['action' => 'index']);
    }
}