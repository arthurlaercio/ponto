<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BatidasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BatidasTable Test Case
 */
class BatidasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\BatidasTable
     */
    public $Batidas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Batidas',
        'app.Funcionarios'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Batidas') ? [] : ['className' => BatidasTable::class];
        $this->Batidas = TableRegistry::getTableLocator()->get('Batidas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Batidas);

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
