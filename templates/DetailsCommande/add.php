<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DetailsCommande $detailsCommande
 * @var \Cake\Collection\CollectionInterface|string[] $commandes
 * @var \Cake\Collection\CollectionInterface|string[] $materiels
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Details Commande'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="detailsCommande form content">
            <?= $this->Form->create($detailsCommande) ?>
            <fieldset>
                <legend><?= __('Add Details Commande') ?></legend>
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
