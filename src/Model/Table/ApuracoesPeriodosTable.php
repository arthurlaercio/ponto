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
            ->date('data_encerra')
            ->requirePresence('data_encerra', 'create')
            ->allowEmptyDate('data_encerra', false);

        $validator
            ->date('data_inicio')
            ->requirePresence('data_inicio', 'create')
            ->allowEmptyDate('data_inicio', false);

        $validator
            ->date('data_fim')
            ->requirePresence('data_fim', 'create')
            ->allowEmptyDate('data_fim', false);

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
