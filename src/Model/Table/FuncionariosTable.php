<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Funcionarios Model
 *
 * @property \App\Model\Table\EmpresasTable|\Cake\ORM\Association\BelongsTo $Empresas
 * @property \App\Model\Table\BatidasTable|\Cake\ORM\Association\HasMany $Batidas
 * @property |\Cake\ORM\Association\HasMany $FuncionariosQuadrosRelogios
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\HasMany $Users
 *
 * @method \App\Model\Entity\Funcionario get($primaryKey, $options = [])
 * @method \App\Model\Entity\Funcionario newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Funcionario[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Funcionario|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Funcionario saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Funcionario patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Funcionario[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Funcionario findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class FuncionariosTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('funcionarios');
        $this->setDisplayField('nome');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Empresas', [
            'foreignKey' => 'empresa_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Batidas', [
            'foreignKey' => 'funcionario_id'
        ]);
        $this->hasMany('FuncionariosQuadrosRelogios', [
            'foreignKey' => 'funcionario_id'
        ]);
        $this->hasMany('Users', [
            'foreignKey' => 'funcionario_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', 'create');

        $validator
            ->scalar('nome')
            ->maxLength('nome', 255)
            ->requirePresence('nome', 'create')
            ->allowEmptyString('nome', false);

        $validator
            ->scalar('endereco')
            ->maxLength('endereco', 255)
            ->requirePresence('endereco', 'create')
            ->allowEmptyString('endereco', false);

        $validator
            ->scalar('cpf')
            ->maxLength('cpf', 255)
            ->requirePresence('cpf', 'create')
            ->allowEmptyString('cpf', false);

        $validator
            ->scalar('rg')
            ->maxLength('rg', 255)
            ->allowEmptyString('rg');

        $validator
            ->email('email')
            ->allowEmptyString('email');

        $validator
            ->scalar('telefone')
            ->maxLength('telefone', 255)
            ->allowEmptyString('telefone');

        $validator
            ->date('data_nascimento')
            ->allowEmptyDate('data_nascimento');

        $validator
            ->scalar('sexo')
            ->maxLength('sexo', 255)
            ->requirePresence('sexo', 'create')
            ->allowEmptyString('sexo', false);

        $validator
            ->scalar('pis')
            ->maxLength('pis', 255)
            ->allowEmptyString('pis');

        $validator
            ->scalar('ctps_numero')
            ->maxLength('ctps_numero', 255)
            ->allowEmptyString('ctps_numero');

        $validator
            ->scalar('ctps_serie')
            ->maxLength('ctps_serie', 255)
            ->allowEmptyString('ctps_serie');

        $validator
            ->scalar('ctps_uf')
            ->maxLength('ctps_uf', 255)
            ->allowEmptyString('ctps_uf');

        $validator
            ->date('data_admissao')
            ->allowEmptyDate('data_admissao');

        $validator
            ->date('data_demissao')
            ->allowEmptyDate('data_demissao');

        $validator
            ->integer('status')
            ->allowEmptyString('status', false);

        $validator
            ->integer('criado_por')
            ->requirePresence('criado_por', 'create')
            ->allowEmptyString('criado_por', false);

        $validator
            ->integer('modificado_por')
            ->requirePresence('modificado_por', 'create')
            ->allowEmptyString('modificado_por', false);

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['empresa_id'], 'Empresas'));

        return $rules;
    }
}
