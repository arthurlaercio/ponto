<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * FuncionariosQuadrosRelogio Entity
 *
 * @property int $id
 * @property int $funcionario_id
 * @property int $relogio_id
 * @property int $quadro_hora_id
 * @property string $cartao_ponto
 * @property \Cake\I18n\FrozenDate $data_inicio
 * @property \Cake\I18n\FrozenDate $data_fim
 * @property int $status
 * @property int $criado_por
 * @property \Cake\I18n\FrozenTime $created
 * @property int $modificado_por
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Funcionario $funcionario
 * @property \App\Model\Entity\Relogio $relogio
 * @property \App\Model\Entity\QuadroHora $quadro_hora
 */
class FuncionariosQuadrosRelogio extends Entity
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
        'funcionario_id' => true,
        'relogio_id' => true,
        'quadro_hora_id' => true,
        'cartao_ponto' => true,
        'data_inicio' => true,
        'data_fim' => true,
        'status' => true,
        'criado_por' => true,
        'created' => true,
        'modificado_por' => true,
        'modified' => true,
        'funcionario' => true,
        'relogio' => true,
        'quadro_hora' => true
    ];
}
