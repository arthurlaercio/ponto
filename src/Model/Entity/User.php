<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;
/**
 * User Entity
 *
 * @property int $id
 * @property string $nome
 * @property string $username
 * @property string $password
 * @property string $email
 * @property int $status
 * @property int $criado_por
 * @property \Cake\I18n\FrozenTime $created
 * @property int $modificado_por
 * @property \Cake\I18n\FrozenTime $modified
 * @property \Cake\I18n\FrozenTime $tipo
 * @property int $funcionario_id
 *
 * @property \App\Model\Entity\User $user
 */
class User extends Entity
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
        'username' => true,
        'password' => true,
        'email' => true,
        'status' => true,
        'criado_por' => true,
        'created' => true,
        'modificado_por' => true,
        'modified' => true,
        'tipo' => true,
        'funcionario_id' => true,
        'user' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected function _setPassword($password)
    {
        if (strlen($password) > 0) {
            $hasher = new DefaultPasswordHasher();
            return $hasher->hash($password);
        }
    }
}
