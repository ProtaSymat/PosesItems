<div class="container">
    <div class="commandes form content">
        <?= $this->Form->create(null, ['id' => 'formCommande']) ?>
        <fieldset>
            <legend>Ajouter une Commande</legend>
            
            <?= $this->Form->control('nom_client', ['label' => 'Nom du Client:', 'type' => 'text', 'id' => 'nom_client']) ?>
            
            <select name="materiels" id="materiels">
                <option value="">Choisir un matériel</option>
                <?php foreach ($materiels as $materiel) : ?>
                    <option value="<?= h($materiel->id) ?>" data-prix="<?= h($materiel->prix_location) ?>">
                        <?= h($materiel->nom) ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <button type="button" id="addMateriel">Ajouter Matériel</button>
            <div id="listeMateriels"></div>
            <label>Prix Total: <input type="text" id="prixTotal" name="prix_total" readonly value="0"></label>
        </fieldset>
        <?= $this->Form->button(__('Soumettre')) ?>
        <?= $this->Form->end() ?>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    let materielIndex = 0;
    document.getElementById('addMateriel').addEventListener('click', function() {
        const materielsSelect = document.getElementById('materiels');
        const selectedOption = materielsSelect.options[materielsSelect.selectedIndex];
        if(selectedOption.value === "") return; // S'assure qu'un matériel est sélectionné
        
        const nomMateriel = selectedOption.text;
        const materielId = selectedOption.value;
        const prix = parseFloat(selectedOption.getAttribute('data-prix'));

        const liste = document.getElementById('listeMateriels');
        const item = document.createElement('div');
        
        // Création du contenu de l'item avec gestion de la quantité et du prix
        item.innerHTML = `${nomMateriel} - Prix: ${prix.toFixed(2)}€ Quantité: <input type="number" value="1" class="quantiteMateriel" style="width: 50px;"> <button type="button" class="deleteMateriel">X</button>`;
        item.innerHTML += `<input type="hidden" name="details[${materielIndex}][materiel_id]" value="${materielId}">`;
        item.innerHTML += `<input type="hidden" name="details[${materielIndex}][prix_total]" class="prixTotalMateriel" value="${prix}">`;
        item.innerHTML += `<input type="hidden" name="details[${materielIndex}][quantite]" class="quantiteMaterielHidden" value="1">`;

        liste.appendChild(item);

        const quantiteInput = item.querySelector('.quantiteMateriel');
        const deleteButton = item.querySelector('.deleteMateriel');
        
        // Mise à jour du prix total lors de la modification de la quantité
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