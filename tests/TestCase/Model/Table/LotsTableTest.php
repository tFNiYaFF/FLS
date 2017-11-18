<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LotsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LotsTable Test Case
 */
class LotsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\LotsTable
     */
    public $Lots;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.lots',
        'app.bets',
        'app.choises'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Lots') ? [] : ['className' => LotsTable::class];
        $this->Lots = TableRegistry::get('Lots', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Lots);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
