<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Funcionario Entity
 *
 * @property int $id
 * @property int $empresa_id
 * @property string $nome
 * @property string $endereco
 * @property string $cpf
 * @property string|null $rg
 * @property string|null $email
 * @property string|null $telefone
 * @property string|null $data_nascimento
 * @property string $sexo
 * @property string|null $pis
 * @property string|null $ctps_numero
 * @property string|null $ctps_serie
 * @property string|null $ctps_uf
 * @property string|null $data_admissao
 * @property string|null $data_demissao
 * @property int $status
 * @property int $criado_por
 * @property \Cake\I18n\FrozenTime $created
 * @property int $modificado_por
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Usuario $usuario
 * @property \App\Model\Entity\Empresa $empresa
 * @property \App\Model\Entity\Batida[] $batidas
 */
class Funcionario extends Entity
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
        'empresa_id' => true,
        'nome' => true,
        'endereco' => true,
        'cpf' => true,
        'rg' => true,
        'email' => true,
        'telefone' => true,
        'data_nascimento' => true,
        'sexo' => true,
        'pis' => true,
        'ctps_numero' => true,
        'ctps_serie' => true,
        'ctps_uf' => true,
        'data_admissao' => true,
        'data_demissao' => true,
        'status' => true,
        'criado_por' => true,
        'created' => true,
        'modificado_por' => true,
        'modified' => true,
        'user' => true,
        'usuario' => true,
        'empresa' => true,
        'batidas' => true
    ];
}
