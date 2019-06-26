<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ApuracoesPeriodos Model
 *
 * @method \App\Model\Entity\ApuracoesPeriodo get($primaryKey, $options = [])
 * @method \App\Model\Entity\ApuracoesPeriodo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ApuracoesPeriodo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ApuracoesPeriodo|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ApuracoesPeriodo saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ApuracoesPeriodo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ApuracoesPeriodo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ApuracoesPeriodo findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ApuracoesPeriodosTable extends Table
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

        $this->setTable('apuracoes_periodos');
        $this->setDisplayField('data_fim');
        $this->setPrimaryKey('id');
        $this->belongsTo('Users', [
            'foreignKey' => 'criado_por',
            'joinType' => 'INNER'
        ]);
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
            ->scalar('nome')
            ->maxLength('nome', 255)
            ->requirePresence('nome', 'create')
            ->allowEmptyString('nome', false);

        $validator
            ->scalar('data_inicio')
            ->maxLength('data_inicio', 255)
            ->requirePresence('data_inicio', 'create')
            ->allowEmptyString('data_inicio', false);

        $validator
            ->scalar('data_fim')
            ->maxLength('data_fim', 255)
            ->requirePresence('data_fim', 'create')
            ->allowEmptyString('data_fim', false);

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
