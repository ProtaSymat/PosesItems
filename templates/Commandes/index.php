<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Commande> $commandes
 */
?>
<div class="commandes index content">
    <?= $this->Html->link(__('Ajouter une commande'), ['action' => 'add'], ['class' => 'btn btn-success float-right']) ?>
    <h3><?= __('Commandes') ?></h3>
    <div class="table-responsive">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('nom_client') ?></th>
                    <th><?= $this->Paginator->sort('date_commande') ?></th>
                    <th><?= $this->Paginator->sort('rendue') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($commandes as $commande): ?>
                <tr>
                    <td><?= $this->Number->format($commande->id) ?></td>
                    <td><?= h($commande->nom_client) ?></td>
                    <td><?= h($commande->date_commande) ?></td>
                    <td><?= $commande->rendue ? __('Yes') : __('No') ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Voir'), ['action' => 'view', $commande->id], ['class' => 'btn btn-sm btn-primary']) ?>
                        <?= $this->Html->link(__('Modifier'), ['action' => 'edit', $commande->id], ['class' => 'btn btn-sm btn-secondary']) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first'), ['class' => 'page-item']) ?>
            <?= $this->Paginator->prev('< ' . __('previous'), ['class' => 'page-item']) ?>
            <?= $this->Paginator->numbers(['class' => 'page-item']) ?>
            <?= $this->Paginator->next(__('next') . ' >', ['class' => 'page-item']) ?>
            <?= $this->Paginator->last(__('last') . ' >>', ['class' => 'page-item']) ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>