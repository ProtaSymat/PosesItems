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
}