<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DetailsCommande $detailsCommande
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Details Commande'), ['action' => 'edit', $detailsCommande->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Details Commande'), ['action' => 'delete', $detailsCommande->id], ['confirm' => __('Are you sure you want to delete # {0}?', $detailsCommande->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Details Commande'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Details Commande'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="detailsCommande view content">
            <h3><?= h($detailsCommande->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Commande') ?></th>
                    <td><?= $detailsCommande->hasValue('commande') ? $this->Html->link($detailsCommande->commande->nom_client, ['controller' => 'Commandes', 'action' => 'view', $detailsCommande->commande->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Materiel') ?></th>
                    <td><?= $detailsCommande->hasValue('materiel') ? $this->Html->link($detailsCommande->materiel->nom, ['controller' => 'Materiels', 'action' => 'view', $detailsCommande->materiel->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($detailsCommande->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Quantite') ?></th>
                    <td><?= $this->Number->format($detailsCommande->quantite) ?></td>
                </tr>
                <tr>
                    <th><?= __('Prix Total') ?></th>
                    <td><?= $this->Number->format($detailsCommande->prix_total) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
