<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ApuracoesImportaco Entity
 *
 * @property int $id
 * @property int $relogio_id
 * @property int $apuracao_periodo_id
 * @property string|resource $arquivo
 * @property string $arquivo_nome
 * @property int $arquivo_tamanho
 * @property int $criado_por
 * @property \Cake\I18n\FrozenTime $created
 * @property int $modificado_por
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Relogio $relogio
 * @property \App\Model\Entity\ApuracaoPeriodo $apuracao_periodo
 */
class ApuracoesImportaco extends Entity
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
        'relogio_id' => true,
        'apuracao_periodo_id' => true,
        'arquivo' => true,
        'arquivo_nome' => true,
        'arquivo_tamanho' => true,
        'criado_por' => true,
        'created' => true,
        'modificado_por' => true,
        'modified' => true,
        'relogio' => true,
        'apuracao_periodo' => true
    ];
}
