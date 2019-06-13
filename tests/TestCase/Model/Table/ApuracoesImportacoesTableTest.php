<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ApuracoesImportacoesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ApuracoesImportacoesTable Test Case
 */
class ApuracoesImportacoesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ApuracoesImportacoesTable
     */
    public $ApuracoesImportacoes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ApuracoesImportacoes',
        'app.Relogios',
        'app.ApuracaoPeriodos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ApuracoesImportacoes') ? [] : ['className' => ApuracoesImportacoesTable::class];
        $this->ApuracoesImportacoes = TableRegistry::getTableLocator()->get('ApuracoesImportacoes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ApuracoesImportacoes);

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
