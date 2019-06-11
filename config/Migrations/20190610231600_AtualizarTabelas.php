<?php
use Migrations\AbstractMigration;

class AtualizarTabelas extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $this->table('apuracoes_importacoes')
            ->addColumn('relogio_id', 'integer', [
                'default' => null,
                'limit' => 100,
                'null' => false,
            ])
            ->addColumn('apuracao_periodo_id', 'integer', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('arquivo', 'blob', [
                'default' => null,
            ])
            ->addColumn('arquivo_nome', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => false,
            ])
            ->addColumn('arquivo_tamanho', 'integer', [
                'default' => null,
            ])
            ->addColumn('criado_por', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('modificado_por', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->create();

        $this->table('apuracoes_periodo')
            ->addColumn('data_encerra', 'date', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('data_inicio', 'date', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('data_fim', 'date', [
                'default' => null,
                'limit' => null,
            ])
            ->addColumn('status', 'integer', [
                'default' => null,
                'limit' => 11,
            ])
            ->addColumn('criado_por', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('modificado_por', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->create();

        $this->table('batidas_ajustes')
            ->addColumn('motivo', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('status', 'integer', [
                'default' => null,
                'limit' => 11,
            ])
            ->addColumn('criado_por', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('modificado_por', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->create();

        $this->table('funcionarios_quadros_relogios')
            ->addColumn('funcionario_id', 'integer', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('relogio_id', 'integer', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('quadro_hora_id', 'integer', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('quadro_hora_id', 'integer', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('cartao_ponto', 'string', [
                'default' => null,
                'limit' => 20,
            ])
            ->addColumn('data_inicio', 'date', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('data_fim', 'date', [
                'default' => null,
                'limit' => null,
            ])
            ->addColumn('status', 'integer', [
                'default' => null,
                'limit' => 11,
            ])
            ->addColumn('criado_por', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('modificado_por', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->create();

        $this->table('batidas')
            ->addColumn('apuracao_importacao_id','integer', [
                'default' => null,
                'limit' => 11,
            ])
            ->addColumn('batida_ajuste_id','integer', [
                'default' => null,
                'limit' => 11,
            ])
            ->update();

        $this->table('quadros_horas')
            ->addColumn('intervalo_entrada','time', [
                'default' => null,
            ])
            ->addColumn('intervalo_saida','time', [
                'default' => null,
            ])
            ->update();

        $this->table('users')
            ->addColumn('tipo','time', [
                'default' => null,
            ])
            ->addColumn('funcionario_id','integer', [
                'default' => null,
                'limit' => 11,
            ])
            ->update();

        $this->table('funcionarios')
            ->removeColumn('user_id')
            ->update();
    }
}
