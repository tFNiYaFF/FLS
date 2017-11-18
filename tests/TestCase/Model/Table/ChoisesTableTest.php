<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ChoisesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ChoisesTable Test Case
 */
class ChoisesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ChoisesTable
     */
    public $Choises;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.choises',
        'app.lots',
        'app.bets'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Choises') ? [] : ['className' => ChoisesTable::class];
        $this->Choises = TableRegistry::get('Choises', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Choises);

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
