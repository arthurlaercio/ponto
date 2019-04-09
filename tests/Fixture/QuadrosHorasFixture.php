<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * QuadrosHorasFixture
 */
class QuadrosHorasFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 10, 'autoIncrement' => true, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'hora_entrada' => ['type' => 'time', 'length' => null, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null],
        'hora_saida' => ['type' => 'time', 'length' => null, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null],
        'tolerancia' => ['type' => 'time', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'dia' => ['type' => 'string', 'length' => 255, 'default' => null, 'null' => false, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'status' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'criado_por' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'created' => ['type' => 'timestamp', 'length' => null, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null],
        'modificado_por' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'modified' => ['type' => 'timestamp', 'length' => null, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
        ],
    ];
    // @codingStandardsIgnoreEnd
    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'hora_entrada' => '18:30:25',
                'hora_saida' => '18:30:25',
                'tolerancia' => '18:30:25',
                'dia' => 'Lorem ipsum dolor sit amet',
                'status' => 1,
                'criado_por' => 1,
                'created' => 1554759025,
                'modificado_por' => 1,
                'modified' => 1554759025
            ],
        ];
        parent::init();
    }
}
