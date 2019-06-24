<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ApuracoesPeriodosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ApuracoesPeriodosTable Test Case
 */
class ApuracoesPeriodosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ApuracoesPeriodosTable
     */
    public $ApuracoesPeriodos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ApuracoesPeriodos',
        'app.Users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ApuracoesPeriodos') ? [] : ['className' => ApuracoesPeriodosTable::class];
        $this->ApuracoesPeriodos = TableRegistry::getTableLocator()->get('ApuracoesPeriodos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ApuracoesPeriodos);

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
}
