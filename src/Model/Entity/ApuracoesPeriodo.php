<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ApuracoesPeriodo Entity
 *
 * @property int $id
 * @property string $nome
 * @property string $data_encerra
 * @property string $data_inicio
 * @property string $data_fim
 * @property int $status
 * @property int $criado_por
 * @property \Cake\I18n\FrozenTime $created
 * @property int $modificado_por
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
 */
class ApuracoesPeriodo extends Entity
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
        'data_encerra' => true,
        'data_inicio' => true,
        'data_fim' => true,
        'status' => true,
        'criado_por' => true,
        'created' => true,
        'modificado_por' => true,
        'modified' => true,
        'user' => true
    ];
}
