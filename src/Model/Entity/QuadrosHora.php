<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * QuadrosHora Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenTime $hora_entrada
 * @property \Cake\I18n\FrozenTime $hora_saida
 * @property \Cake\I18n\FrozenTime|null $tolerancia
 * @property string $dia
 * @property int $status
 * @property int $criado_por
 * @property \Cake\I18n\FrozenTime $created
 * @property int $modificado_por
 * @property \Cake\I18n\FrozenTime $modified
 */
class QuadrosHora extends Entity
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
        'hora_entrada' => true,
        'hora_saida' => true,
        'tolerancia' => true,
        'dia' => true,
        'status' => true,
        'criado_por' => true,
        'created' => true,
        'modificado_por' => true,
        'modified' => true
    ];
}
