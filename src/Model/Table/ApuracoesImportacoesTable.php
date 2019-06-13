<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ApuracoesImportacoes Model
 *
 * @property \App\Model\Table\RelogiosTable|\Cake\ORM\Association\BelongsTo $Relogios
 * @property \App\Model\Table\ApuracaoPeriodosTable|\Cake\ORM\Association\BelongsTo $ApuracaoPeriodos
 *
 * @method \App\Model\Entity\ApuracoesImportaco get($primaryKey, $options = [])
 * @method \App\Model\Entity\ApuracoesImportaco newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ApuracoesImportaco[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ApuracoesImportaco|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ApuracoesImportaco saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ApuracoesImportaco patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ApuracoesImportaco[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ApuracoesImportaco findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ApuracoesImportacoesTable extends Table
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

        $this->setTable('apuracoes_importacoes');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Relogios', [
            'foreignKey' => 'relogio_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('ApuracoesPeriodos', [
            'foreignKey' => 'apuracao_periodo_id',
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
            ->requirePresence('arquivo', 'create')
            ->allowEmptyString('arquivo', false);

        $validator
            ->scalar('arquivo_nome')
            ->maxLength('arquivo_nome', 100)
            ->requirePresence('arquivo_nome', 'create')
            ->allowEmptyString('arquivo_nome', false);

        $validator
            ->integer('arquivo_tamanho')
            ->requirePresence('arquivo_tamanho', 'create')
            ->allowEmptyString('arquivo_tamanho', false);

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
        $rules->add($rules->existsIn(['relogio_id'], 'Relogios'));
        $rules->add($rules->existsIn(['apuracao_periodo_id'], 'ApuracoesPeriodos'));

        return $rules;
    }
}
