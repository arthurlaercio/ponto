<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Batida Entity
 *
 * @property int $id
 * @property int $funcionario_id
 * @property int $apuracao_importacao_id
 * @property int $batida_ajuste_id
 * @property string $batida
 * @property int $status
 * @property int $criado_por
 * @property \Cake\I18n\FrozenTime $created
 * @property int $modificado_por
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Funcionario $funcionario
 * @property \App\Model\Entity\ApuracoesImportaco $apuracoes_importaco
 * @property \App\Model\Entity\BatidasAjuste $batidas_ajuste
 */
class Batida extends Entity
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
        'apuracao_importacao_id' => true,
        'batida_ajuste_id' => true,
        'batida' => true,
        'status' => true,
        'criado_por' => true,
        'created' => true,
        'modificado_por' => true,
        'modified' => true,
        'funcionario' => true,
        'apuracoes_importaco' => true,
        'batidas_ajuste' => true
    ];
}
