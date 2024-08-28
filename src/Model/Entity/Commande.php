<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Commande Entity
 *
 * @property int $id
 * @property string $nom_client
 * @property \Cake\I18n\DateTime $date_commande
 * @property bool $rendue
 *
 * @property \App\Model\Entity\DetailsCommande[] $details_commande
 */
class Commande extends Entity
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
        'nom_client' => true,
        'date_commande' => true,
        'rendue' => true,
        'details_commande' => true,
    ];
}
