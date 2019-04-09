<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Relogio Entity
 *
 * @property int $id
 * @property string $nome
 * @property string $serial
 * @property string|null $tipo
 * @property int $status
 * @property int $criado_por
 * @property \Cake\I18n\FrozenTime $created
 * @property int $modificado_por
 * @property \Cake\I18n\FrozenTime $modified
 */
class Relogio extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'nome' => true,
        'serial' => true,
        'tipo' => true,
        'status' => true,
        'criado_por' => true,
        'created' => true,
        'modificado_por' => true,
        'modified' => true
    ];
}
