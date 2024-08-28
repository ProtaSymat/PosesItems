<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Materiel $materiel
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $materiel->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $materiel->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Materiels'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="materiels form content">
            <?= $this->Form->create($materiel) ?>
            <fieldset>
                <legend><?= __('Edit Materiel') ?></legend>
                <?php
                    echo $this->Form->control('nom');
                    echo $this->Form->control('quantite_disponible');
                    echo $this->Form->control('prix_location');
                    echo $this->Form->control('image');
                    echo $this->Form->control('description');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
