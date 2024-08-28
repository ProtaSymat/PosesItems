<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Materiel $materiel
 */
?>
<div class="container">
    <div class="">
        <div class="materiels form content py-5 my-5">
            <?= $this->Form->create($materiel, ['type' => 'file', 'class' => 'needs-validation', 'novalidate' => true]) ?>
            <fieldset>
                <legend class="pb-2"><?= __('Ajout de Materiel') ?></legend>
                <div class="form-group">
                    <?= $this->Form->control('nom', ['class' => 'form-control', 'placeholder' => 'Nom', 'label' => 'Nom du matériel', 'required' => true]); ?>
                </div>
                <div class="form-group mt-3">
                    <?= $this->Form->control('quantite_disponible', ['class' => 'form-control', 'placeholder' => 'Quantité Disponible', 'label' => 'Quantité Disponible', 'required' => true, 'type' => 'number']); ?>
                </div>
                <div class="form-group mt-3">
                    <?= $this->Form->control('prix_location', ['class' => 'form-control', 'placeholder' => 'Prix de Location', 'label' => 'Prix de Location (par jour)', 'required' => true, 'type' => 'number', 'step' => '0.01']); ?>
                </div>
                <div class="form-group mt-3">
                    <?= $this->Form->control('image', ['class' => 'form-control', 'placeholder' => 'Image du matériel', 'label' => 'Image du matériel', 'required' => true]); ?>
                </div>
                <div class="form-group mt-3">
                    <?= $this->Form->control('description', ['class' => 'form-control', 'placeholder' => 'Description', 'label' => 'Description du matériel', 'type' => 'textarea', 'rows' => '3']); ?>
                </div>
            </fieldset>
            <?= $this->Form->button(__('Ajouter'), ['class' => 'btn btn-success mt-5']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

<script>
// Exemple de script pour la validation côté client (facultatif)
(function() {
  'use strict';
  window.addEventListener('load', function() {
    var forms = document.getElementsByClassName('needs-validation');
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
