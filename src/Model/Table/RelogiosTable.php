<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Relogios Model
 *
 * @method \App\Model\Entity\Relogio get($primaryKey, $options = [])
 * @method \App\Model\Entity\Relogio newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Relogio[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Relogio|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Relogio saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Relogio patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Relogio[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Relogio findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class RelogiosTable extends Table
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

        $this->setTable('relogios');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->belongsTo('Users', [
            'foreignKey' => 'criado_por',
            'joinType' => 'INNER'
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
            ->maxLength('nome', 100)
            ->requirePresence('nome', 'create')
            ->allowEmptyString('nome', false);

        $validator
            ->scalar('serial')
            ->maxLength('serial', 255)
            ->requirePresence('serial', 'create')
            ->allowEmptyString('serial', false);

        $validator
            ->scalar('tipo')
            ->maxLength('tipo', 255)
            ->allowEmptyString('tipo');

        $validator
            ->integer('status')
            ->requirePresence('status', 'create')
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
}
