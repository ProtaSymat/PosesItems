<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\DetailsCommande> $detailsCommande
 */
?>
<div class="detailsCommande index content">
    <?= $this->Html->link(__('New Details Commande'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Details Commande') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('commande_id') ?></th>
                    <th><?= $this->Paginator->sort('materiel_id') ?></th>
                    <th><?= $this->Paginator->sort('quantite') ?></th>
                    <th><?= $this->Paginator->sort('prix_total') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($detailsCommande as $detailsCommande): ?>
                <tr>
                    <td><?= $this->Number->format($detailsCommande->id) ?></td>
                    <td><?= $detailsCommande->hasValue('commande') ? $this->Html->link($detailsCommande->commande->nom_client, ['controller' => 'Commandes', 'action' => 'view', $detailsCommande->commande->id]) : '' ?></td>
                    <td><?= $detailsCommande->hasValue('materiel') ? $this->Html->link($detailsCommande->materiel->nom, ['controller' => 'Materiels', 'action' => 'view', $detailsCommande->materiel->id]) : '' ?></td>
                    <td><?= $this->Number->format($detailsCommande->quantite) ?></td>
                    <td><?= $this->Number->format($detailsCommande->prix_total) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $detailsCommande->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $detailsCommande->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $detailsCommande->id], ['confirm' => __('Are you sure you want to delete # {0}?', $detailsCommande->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
