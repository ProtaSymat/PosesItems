<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DetailsCommandeTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DetailsCommandeTable Test Case
 */
class DetailsCommandeTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DetailsCommandeTable
     */
    protected $DetailsCommande;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.DetailsCommande',
        'app.Commandes',
        'app.Materiels',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('DetailsCommande') ? [] : ['className' => DetailsCommandeTable::class];
        $this->DetailsCommande = $this->getTableLocator()->get('DetailsCommande', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->DetailsCommande);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\DetailsCommandeTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\DetailsCommandeTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
