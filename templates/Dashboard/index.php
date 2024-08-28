<?php $this->Html->css(['dashboard'], ['block' => true]); ?>
<?php $this->Html->script(['dashboard'], ['block' => true]); ?>

<div class="container mt-5">
    <h1 class="mb-4">Dashboard du materiel pour le Lac de Poses</h1>
    <div class="d-flex flex-column">
        <div class="mb-4">
        <div class="card">
    <div class="card-header">
        <h2>Matériels</h2>
    </div>
    <div class="card-body">
        <div class="row">
            <?php foreach ($materiels as $materiel): ?>
                <div class="col-md-4 mb-4">
                    <div class="thumbnail">
                        <img src="<?= h($materiel->image) ?>" alt="<?= h($materiel->nom) ?>" class="img-fluid object-fit-cover w-100" style="height:10vw;">
                        <div class="caption">
                            <h3>
                                <?= h($materiel->nom) ?>
                                <?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fas fa-pencil-alt']), ['controller' => 'Materiels', 'action' => 'edit', $materiel->id], ['class' => 'btn btn-sm btn-outline-secondary', 'escape' => false]) ?>
                            </h3>
                            <p>Quantité: <span class="badge bg-success"><?= h($materiel->quantite_disponible) ?></span></p>
                            <p>Prix: <span class="badge bg-info"><?= $this->Number->currency($materiel->prix_location, 'EUR') ?></span></p>
                            </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <?= $this->Html->link('Ajouter un Matériel', ['controller' => 'Materiels', 'action' => 'add'], ['class' => 'btn btn-primary']) ?>
    </div>
</div>
        </div>
        <div class="mb-4">
    <div class="card">
        <div class="card-header">
            <h2>Commandes</h2>
        </div>
        <div class="card-body">
            <?php if (!empty($commandes)): ?>
                <div class="list-group">
                <?php foreach ($commandes as $commande): ?>
    <div class="list-group-item list-group-item-action flex-column align-items-start">
        <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">Commande #<?= h($commande->id) ?></h5>
            <small>Date: <?= h($commande->date_commande->format('d/m/Y')) ?></small>
        </div>
        <p class="mb-1">Client: <?= h($commande->nom_client) ?></p>
        <small>Détails de la commande:</small>
        <ul>
            <?php foreach ($commande->details_commande as $detail): ?>
                <li><?= h($detail->materiel->nom) ?> - Quantité: <?= h($detail->quantite) ?> - Prix: <?= $this->Number->currency($detail->prix_total, 'EUR') ?></li>
            <?php endforeach; ?>
        </ul>
        <?= $this->Form->create(null, ['url' => ['action' => 'delete', $commande->id]]) ?>
            <?= $this->Form->button('Restituer la commande', ['class' => 'btn btn-danger', 'type' => 'submit']) ?>
            <?= $this->Form->end() ?>
    </div>
<?php endforeach; ?>
                </div>
            <?php else: ?>
                <p>Aucune commande trouvée.</p>
            <?php endif; ?>
        </div>
        <?= $this->Html->link('Ajouter une commande', ['controller' => 'Commandes', 'action' => 'add'], ['class' => 'btn btn-primary']) ?>

    </div>
</div>
    </div>
</div>