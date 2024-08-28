<div class="container">
    <div class="commandes form content">
        <?= $this->Form->create(null, ['id' => 'formCommande', 'class' => 'needs-validation', 'novalidate' => true]) ?>
        <fieldset>
            <legend>Ajouter une Commande</legend>
            
            <?= $this->Form->control('nom_client', [
                'label' => 'Nom du Client:',
                'type' => 'text',
                'id' => 'nom_client',
                'class' => 'form-control mb-3'
            ]) ?>
            
            <div class="mb-3">
                <select name="materiels" id="materiels" class="form-select">
                    <option value="">Choisir un matériel</option>
                    <?php foreach ($materiels as $materiel) : ?>
                        <option value="<?= h($materiel->id) ?>" data-prix="<?= h($materiel->prix_location) ?>">
                            <?= h($materiel->nom) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <div class="mb-3">
                <button type="button" id="addMateriel" class="btn btn-primary">Ajouter Matériel</button>
            </div>
            
            <div id="listeMateriels" class="mb-3"></div>
            
            <div class="mb-3">
                <label for="prixTotal" class="form-label">Prix Total:</label>
                <input type="text" id="prixTotal" name="prix_total" class="form-control" readonly value="0">
            </div>
        </fieldset>
        <?= $this->Form->button(__('Soumettre'), ['class' => 'btn btn-success']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    let materielIndex = 0;
    document.getElementById('addMateriel').addEventListener('click', function() {
        const materielsSelect = document.getElementById('materiels');
        const selectedOption = materielsSelect.options[materielsSelect.selectedIndex];
        if(selectedOption.value === "") return;
        
        const nomMateriel = selectedOption.text;
        const materielId = selectedOption.value;
        const prix = parseFloat(selectedOption.getAttribute('data-prix'));

        const liste = document.getElementById('listeMateriels');
        const item = document.createElement('div');
        
        item.innerHTML = `${nomMateriel} - Prix: ${prix.toFixed(2)}€ Quantité: <input type="number" value="1" class="quantiteMateriel" style="width: 50px;"> <button type="button" class="deleteMateriel">X</button>`;
        item.innerHTML += `<input type="hidden" name="details[${materielIndex}][materiel_id]" value="${materielId}">`;
        item.innerHTML += `<input type="hidden" name="details[${materielIndex}][prix_total]" class="prixTotalMateriel" value="${prix}">`;
        item.innerHTML += `<input type="hidden" name="details[${materielIndex}][quantite]" class="quantiteMaterielHidden" value="1">`;

        liste.appendChild(item);

        const quantiteInput = item.querySelector('.quantiteMateriel');
        const deleteButton = item.querySelector('.deleteMateriel');
        
        quantiteInput.addEventListener('input', function() {
            const quantite = parseInt(this.value, 10) || 1;
            const prixTotal = quantite * prix;
            item.querySelector('.prixTotalMateriel').value = prixTotal.toFixed(2);
            item.querySelector('.quantiteMaterielHidden').value = quantite;
            updatePrixTotal();
        });

        deleteButton.addEventListener('click', function() {
            item.remove();
            updatePrixTotal();
        });

        materielIndex++;
        updatePrixTotal();
    });

    function updatePrixTotal() {
        let total = 0;
        document.querySelectorAll('.prixTotalMateriel').forEach(function(input) {
            total += parseFloat(input.value) || 0;
        });
        document.getElementById('prixTotal').value = total.toFixed(2);
    }
});
</script>