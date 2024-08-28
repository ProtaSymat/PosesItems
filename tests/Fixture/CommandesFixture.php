<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CommandesFixture
 */
class CommandesFixture extends TestFixture
{
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
                'nom_client' => 'Lorem ipsum dolor sit amet',
                'date_commande' => '2024-08-28 09:12:26',
                'rendue' => 1,
            ],
        ];
        parent::init();
    }
}
