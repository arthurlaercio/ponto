<?php echo $this->Html->css('dataTables.bootstrap.css') ?>
<?php echo $this->Html->script('jquery.dataTables') ?>
<?php echo $this->Html->script('dataTables.bootstrap') ?>

<div class="row">
    <div class="col-md-9 col-sm-12 col-xs-12">
        <div class="page-title">
            <div class="title_left">
                <h3><i class="fa fa-sitemap"></i> Importação de batidas </h3>
            </div>
        </div>
    </div>
</div>
<div class="">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">   
                    <div class="row">
                        <div class="pull-left">
                            <?php echo $this->Html->link('<i class="fa fa-plus"></i> Adicionar', ['action'=>'add'], ['escape'=>false, 'class' => 'btn btn-success btn-sm','data-toggle'=>'modal','data-target'=>'#AdicionarApuracoes']); ?>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <?= $this->Flash->render() ?>
                    <div class="clearfix"></div>
                </div>            
                <div class="x_content">
                    <table class="table table-striped dt-responsive nowrap" id="dataTables-example" aria-describedby="dataTables-example_info">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Relógio</th>
                                <th>Período de apuração</th>
                                <th>Arquivo</th>
                                <th>Opções</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($apuracoesImportacoes as $apuracaoImportacoes): ?>
                                <tr>
                                    <td><?php echo $apuracaoImportacoes->id; ?></td>
                                    <td><?php echo $apuracaoImportacoes->relogio->nome; ?></td>
                                    <td><?php echo $apuracaoImportacoes->apuracoes_periodo->data_inicio->format('d/m/Y') . ' até ' . $apuracaoImportacoes->apuracoes_periodo->data_fim->format('d/m/Y'); ?></td>
                                    <td><?php echo $apuracaoImportacoes->arquivo_nome; ?></td>
                                    <td>
                                        <?php echo $this->Html->link('<i class="fa fa-eye"></i> Visualizar', $dominio_sistema."/media/documentos/".$apuracaoImportacoes->arquivo,['escape'=>false,'class'=>'btn btn-default btn-xs', 'target'=>'_blank', 'type' => 'button']); 
                                        ?>
                                        <?php //echo $this->Html->link('<i class="fa fa-eye"></i> Detalhes', ['action' => 'view', $apuracaoImportacoes->id],['class'=>'btn btn-default btn-xs', 'data-toggle'=>'modal','data-target'=>'#ViewQuadroHoras','escape'=>false]); ?>
                                        <?php //echo $this->Html->link('<i class="fa fa-edit"></i> Editar', ['action' => 'edit', $apuracaoImportacoes->id],['class'=>'btn btn-warning btn-xs', 'data-toggle'=>'modal','data-target'=>'#EditarQuadroHoras','escape'=>false]); ?>
                                        <?php //echo $this->Form->postLink('<i class="fa fa-trash"></i> Excluir', ['action' => 'delete', $apuracaoImportacoes->id], ['confirm' => 'Tem certeza?','class'=>'btn btn-danger btn-xs', 'escape'=>false]); ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade bs-example-modal" tabindex="-1" role="dialog" aria-hidden="true"  id="AdicionarApuracoes">
    <div class="modal-dialog">
      <div class="modal-content">

      </div>
    </div>
</div>


<script>
    $(document).ready(function () {
        $('#dataTables-example').dataTable();
    });
</script>