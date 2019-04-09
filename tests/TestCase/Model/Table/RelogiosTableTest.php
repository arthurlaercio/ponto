<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RelogiosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RelogiosTable Test Case
 */
class RelogiosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RelogiosTable
     */
    public $Relogios;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Relogios'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Relogios') ? [] : ['className' => RelogiosTable::class];
        $this->Relogios = TableRegistry::getTableLocator()->get('Relogios', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Relogios);

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
