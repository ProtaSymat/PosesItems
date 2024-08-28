<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Materiel $materiel
 */
?>
<div class="row">
    <div class="column column-80">
        <div class="materiels view content">
            <h3><?= h($materiel->nom) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nom') ?></th>
                    <td><?= h($materiel->nom) ?></td>
                </tr>
                <tr>
                    <th><?= __('Image') ?></th>
                    <td><?= h($materiel->image) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($materiel->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Quantite Disponible') ?></th>
                    <td><?= $this->Number->format($materiel->quantite_disponible) ?></td>
                </tr>
                <tr>
                    <th><?= __('Prix Location') ?></th>
                    <td><?= $this->Number->format($materiel->prix_location) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Description') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($materiel->description)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Details Commande') ?></h4>
                <?php if (!empty($materiel->details_commande)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Commande Id') ?></th>
                            <th><?= __('Materiel Id') ?></th>
                            <th><?= __('Quantite') ?></th>
                            <th><?= __('Prix Total') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($materiel->details_commande as $detailsCommande) : ?>
                        <tr>
                            <td><?= h($detailsCommande->id) ?></td>
                            <td><?= h($detailsCommande->commande_id) ?></td>
                            <td><?= h($detailsCommande->materiel_id) ?></td>
                            <td><?= h($detailsCommande->quantite) ?></td>
                            <td><?= h($detailsCommande->prix_total) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'DetailsCommande', 'action' => 'view', $detailsCommande->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'DetailsCommande', 'action' => 'edit', $detailsCommande->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'DetailsCommande', 'action' => 'delete', $detailsCommande->id], ['confirm' => __('Are you sure you want to delete # {0}?', $detailsCommande->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
