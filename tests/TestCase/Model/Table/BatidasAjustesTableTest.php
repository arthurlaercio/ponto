<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BatidasAjustesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BatidasAjustesTable Test Case
 */
class BatidasAjustesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\BatidasAjustesTable
     */
    public $BatidasAjustes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.BatidasAjustes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('BatidasAjustes') ? [] : ['className' => BatidasAjustesTable::class];
        $this->BatidasAjustes = TableRegistry::getTableLocator()->get('BatidasAjustes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->BatidasAjustes);

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
