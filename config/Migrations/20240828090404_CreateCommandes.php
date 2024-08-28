<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateCommandes extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change(): void
    {
        $table = $this->table('commandes');
        $table->addColumn('nom_client', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('date_commande', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('rendue', 'boolean', [
            'default' => null,
            'null' => false,
        ]);
        $table->create();
    }
}
