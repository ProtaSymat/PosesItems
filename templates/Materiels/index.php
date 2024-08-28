<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Materiel> $materiels
 */
?>
<div class="materiels index content vh-100 ">
    <?= $this->Html->link(__('Ajouter un matériel'), ['action' => 'add'], ['class' => 'btn btn-success float-right']) ?>
    <h3><?= __('Materiels') ?></h3>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="thead-light">
                <tr>
                    <th><?= $this->Paginator->sort('nom') ?></th>
                    <th><?= $this->Paginator->sort('quantite_disponible') ?></th>
                    <th><?= $this->Paginator->sort('prix_location') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($materiels as $materiel): ?>
                <tr>
                    <td><?= h($materiel->nom) ?></td>
                    <td><?= $this->Number->format($materiel->quantite_disponible) ?></td>
                    <td><?= $this->Number->format($materiel->prix_location) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Voir'), ['action' => 'view', $materiel->id], ['class' => 'btn btn-sm btn-primary']) ?>
                        <?= $this->Html->link(__('Modifier'), ['action' => 'edit', $materiel->id], ['class' => 'btn btn-sm btn-secondary']) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first'), ['class' => 'page-link']) ?>
            <?= $this->Paginator->prev('< ' . __('previous'), ['class' => 'page-link']) ?>
            <?= $this->Paginator->numbers(['class' => 'page-link']) ?>
            <?= $this->Paginator->next(__('next') . ' >', ['class' => 'page-link']) ?>
            <?= $this->Paginator->last(__('last') . ' >>', ['class' => 'page-link']) ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>