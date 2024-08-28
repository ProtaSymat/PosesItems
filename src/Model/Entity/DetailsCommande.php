<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DetailsCommande Entity
 *
 * @property int $id
 * @property int $commande_id
 * @property int $materiel_id
 * @property int $quantite
 * @property string $prix_total
 *
 * @property \App\Model\Entity\Commande $commande
 * @property \App\Model\Entity\Materiel $materiel
 */
class DetailsCommande extends Entity
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
        'commande_id' => true,
        'materiel_id' => true,
        'quantite' => true,
        'prix_total' => true,
        'commande' => true,
        'materiel' => true,
    ];
}
