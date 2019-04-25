<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * QuadrosHoras Model
 *
 * @method \App\Model\Entity\QuadrosHora get($primaryKey, $options = [])
 * @method \App\Model\Entity\QuadrosHora newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\QuadrosHora[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\QuadrosHora|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\QuadrosHora saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\QuadrosHora patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\QuadrosHora[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\QuadrosHora findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class QuadrosHorasTable extends Table
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

        $this->setTable('quadros_horas');
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
            ->time('hora_entrada')
            ->requirePresence('hora_entrada', 'create')
            ->allowEmptyTime('hora_entrada', false);

        $validator
            ->time('hora_saida')
            ->requirePresence('hora_saida', 'create')
            ->allowEmptyTime('hora_saida', false);

        $validator
            ->time('tolerancia')
            ->allowEmptyTime('tolerancia');

        $validator
            ->scalar('dia')
            ->maxLength('dia', 255)
            ->requirePresence('dia', 'create')
            ->allowEmptyString('dia', false);

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
