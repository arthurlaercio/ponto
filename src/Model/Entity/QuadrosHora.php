<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * QuadrosHora Entity
 *
 * @property int $id
 * @property string $descricao
 * @property \Cake\I18n\FrozenTime $hora_entrada
 * @property \Cake\I18n\FrozenTime $hora_saida
 * @property \Cake\I18n\FrozenTime $intervalo_entrada
 * @property \Cake\I18n\FrozenTime $intervalo_saida
 * @property \Cake\I18n\FrozenTime|null $tolerancia
 * @property int|null $segunda
 * @property int|null $terca
 * @property int|null $quarta
 * @property int|null $quinta
 * @property int|null $sexta
 * @property int|null $sabado
 * @property int|null $domingo
 * @property int $status
 * @property int $criado_por
 * @property \Cake\I18n\FrozenTime $created
 * @property int $modificado_por
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
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
        'descricao' => true,
        'hora_entrada' => true,
        'hora_saida' => true,
        'intervalo_entrada' => true,
        'intervalo_saida' => true,
        'tolerancia' => true,
        'segunda' => true,
        'terca' => true,
        'quarta' => true,
        'quinta' => true,
        'sexta' => true,
        'sabado' => true,
        'domingo' => true,
        'status' => true,
        'criado_por' => true,
        'created' => true,
        'modificado_por' => true,
        'modified' => true,
        'user' => true
    ];
}
