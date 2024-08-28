<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Materiel Entity
 *
 * @property int $id
 * @property string $nom
 * @property int $quantite_disponible
 * @property string $prix_location
 * @property string $image
 * @property string $description
 *
 * @property \App\Model\Entity\DetailsCommande[] $details_commande
 */
class Materiel extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'nom' => true,
        'quantite_disponible' => true,
        'prix_location' => true,
        'image' => true,
        'description' => true,
        'details_commande' => true,
    ];
}
