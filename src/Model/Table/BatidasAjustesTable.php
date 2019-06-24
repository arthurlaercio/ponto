<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * BatidasAjustes Model
 *
 * @method \App\Model\Entity\BatidasAjuste get($primaryKey, $options = [])
 * @method \App\Model\Entity\BatidasAjuste newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\BatidasAjuste[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\BatidasAjuste|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BatidasAjuste saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BatidasAjuste patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\BatidasAjuste[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\BatidasAjuste findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class BatidasAjustesTable extends Table
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

        $this->setTable('batidas_ajustes');
        $this->setDisplayField('motivo');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
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
            ->scalar('motivo')
            ->maxLength('motivo', 255)
            ->requirePresence('motivo', 'create')
            ->allowEmptyString('motivo', false);

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
