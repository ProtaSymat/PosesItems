<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DetailsCommande $detailsCommande
 * @var string[]|\Cake\Collection\CollectionInterface $commandes
 * @var string[]|\Cake\Collection\CollectionInterface $materiels
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $detailsCommande->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $detailsCommande->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Details Commande'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="detailsCommande form content">
            <?= $this->Form->create($detailsCommande) ?>
            <fieldset>
                <legend><?= __('Edit Details Commande') ?></legend>
                <?php
                    echo $this->Form->control('commande_id', ['options' => $commandes]);
                    echo $this->Form->control('materiel_id', ['options' => $materiels]);
                    echo $this->Form->control('quantite');
                    echo $this->Form->control('prix_total');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
