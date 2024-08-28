<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Commande $commande
 */
?>
<div class="row">
    <div class="column column-80">
        <div class="commandes view content">
            <h3><?= h($commande->nom_client) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nom Client') ?></th>
                    <td><?= h($commande->nom_client) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($commande->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Date Commande') ?></th>
                    <td><?= h($commande->date_commande) ?></td>
                </tr>
                <tr>
                    <th><?= __('Rendue') ?></th>
                    <td><?= $commande->rendue ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Details Commande') ?></h4>
                <?php if (!empty($commande->details_commande)) : ?>
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
                        <?php foreach ($commande->details_commande as $detailsCommande) : ?>
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
