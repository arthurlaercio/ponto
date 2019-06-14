<?php
namespace App\Model\Table;

use App\Model\Entity\ApuracoesImportaco;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;
use Cake\Utility\Inflector;

class ApuracoesImportacoesTable extends Table
{
  
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
     
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['relogio_id'], 'Relogios'));
        $rules->add($rules->existsIn(['apuracao_periodo_id'], 'ApuracoesPeriodos'));

        return $rules;
    }*/

    public function salvarArquivo($arquivo = array()){

        $diretorio = MEDIA .DS. 'documentos' .DS;

        if(($arquivo['error']!=0) and ($arquivo['size']==0)) {
            // Processo caso dê algum erro
        }

        $this->checarDiretorio($diretorio);
        //$arquivo = $this->checarNome($arquivo, $diretorio);
        $arquivo = $this->mudarNome($arquivo);

        $this->moverArquivos($arquivo, $diretorio);

        return $arquivo['name'];
    }

    public function mudarNome($arquivo){
        $arquivo_info = pathinfo($arquivo['name']);
        $novoNomeArquivo = md5(time()) .'.'.$arquivo_info['extension'];

        $arquivo['name'] = $novoNomeArquivo;
        return $arquivo;
    }

    public function checarDiretorio($dir){
        $folder = new Folder();
        if (!is_dir($dir)){
            $folder->create($dir);
        }
    }

    public function checarNome($arquivo, $dir){
        $arquivo_info = pathinfo($dir.$arquivo['name']);
        $arquivoNome = $this->tratarNome($arquivo_info['filename']).'.'.$arquivo_info['extension'];
        
        $contador = 2;
        while (file_exists($dir.$arquivoNome)) {
            $arquivoNome  = $this->tratarNome($arquivo_info['filename']).'-'.$contador;
            $arquivoNome .= '.'.$arquivo_info['extension'];
            $contador++;
        }

        $arquivo['name'] = $arquivoNome;
        return $arquivo;
    }

    public function tratarNome($arquivoNome)
    {
        $arquivo_nome = strtolower(Inflector::slug($arquivoNome,'-'));
        return $arquivo_nome;
    }

    public function moverArquivos($arquivo, $dir)
    {
        $arquivoNovo = new File($arquivo['tmp_name']);
        $arquivoNovo->copy($dir.$arquivo['name']);
        $arquivoNovo->close();
    }

    public function deletarArquivo($arquivo){
        $diretorio = MEDIA .DS. 'documentos' .DS;

        $arquivo = new File($diretorio.$arquivo, false);
        $arquivo->delete();
    }
}
