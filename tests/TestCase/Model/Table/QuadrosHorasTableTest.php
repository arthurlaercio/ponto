<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\QuadrosHorasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\QuadrosHorasTable Test Case
 */
class QuadrosHorasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\QuadrosHorasTable
     */
    public $QuadrosHoras;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.QuadrosHoras',
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
        $config = TableRegistry::getTableLocator()->exists('QuadrosHoras') ? [] : ['className' => QuadrosHorasTable::class];
        $this->QuadrosHoras = TableRegistry::getTableLocator()->get('QuadrosHoras', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->QuadrosHoras);

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
