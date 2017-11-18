<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BetsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BetsTable Test Case
 */
class BetsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BetsTable
     */
    public $Bets;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.bets',
        'app.lots',
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
        $config = TableRegistry::exists('Bets') ? [] : ['className' => BetsTable::class];
        $this->Bets = TableRegistry::get('Bets', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Bets);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
