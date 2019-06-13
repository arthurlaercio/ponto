<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * FuncionariosQuadrosRelogios Model
 *
 * @property \App\Model\Table\FuncionariosTable|\Cake\ORM\Association\BelongsTo $Funcionarios
 * @property \App\Model\Table\RelogiosTable|\Cake\ORM\Association\BelongsTo $Relogios
 * @property \App\Model\Table\QuadroHorasTable|\Cake\ORM\Association\BelongsTo $QuadroHoras
 *
 * @method \App\Model\Entity\FuncionariosQuadrosRelogio get($primaryKey, $options = [])
 * @method \App\Model\Entity\FuncionariosQuadrosRelogio newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\FuncionariosQuadrosRelogio[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\FuncionariosQuadrosRelogio|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FuncionariosQuadrosRelogio saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FuncionariosQuadrosRelogio patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\FuncionariosQuadrosRelogio[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\FuncionariosQuadrosRelogio findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class FuncionariosQuadrosRelogiosTable extends Table
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

        $this->setTable('funcionarios_quadros_relogios');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Funcionarios', [
            'foreignKey' => 'funcionario_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Relogios', [
            'foreignKey' => 'relogio_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('QuadrosHoras', [
            'foreignKey' => 'quadro_hora_id',
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
            ->scalar('cartao_ponto')
            ->maxLength('cartao_ponto', 20)
            ->allowEmptyString('cartao_ponto', false);

        $validator
            ->integer('data_inicio')
            ->requirePresence('status', 'create')
            ->allowEmptyString('status', false);

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

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['funcionario_id'], 'Funcionarios'));
        $rules->add($rules->existsIn(['relogio_id'], 'Relogios'));
        $rules->add($rules->existsIn(['quadro_hora_id'], 'QuadrosHoras'));

        return $rules;
    }
}
