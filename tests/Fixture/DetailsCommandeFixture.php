<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DetailsCommandeFixture
 */
class DetailsCommandeFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public string $table = 'details_commande';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'commande_id' => 1,
                'materiel_id' => 1,
                'quantite' => 1,
                'prix_total' => 1.5,
            ],
        ];
        parent::init();
    }
}
