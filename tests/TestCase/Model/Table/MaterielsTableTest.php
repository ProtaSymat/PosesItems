<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MaterielsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MaterielsTable Test Case
 */
class MaterielsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MaterielsTable
     */
    protected $Materiels;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Materiels',
        'app.DetailsCommande',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Materiels') ? [] : ['className' => MaterielsTable::class];
        $this->Materiels = $this->getTableLocator()->get('Materiels', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Materiels);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\MaterielsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
