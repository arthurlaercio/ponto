<?= $this->Html->css('dataTables.bootstrap.css') ?>
<?php echo $this->Html->script('jquery.dataTables') ?>
<?php echo $this->Html->script('dataTables.bootstrap') ?>

<script>
    $(document).ready(function () {
        /*var table = $('#dataTables-example').DataTable({
            "order": [[ 0, 'desc' ]]
        });*/
    });
    
    $(document).ready(function () {
        $('#dataTables-example').dataTable();
    });

</script>

<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="page-title">
      <div class="title_left">
        <h3><i class="fa fa-file-text"></i> Importacao: <?php echo $apuracoesImportaco->arquivo_nome; ?></h3>
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
          <?php echo $this->Html->link('<i class="fa fa-plus"></i> Adicionar', ['action'=>'adicionar_documentos_clientes', $cliente->id], ['escape'=>false, 'class' => 'btn btn-success btn-sm','data-toggle'=>'modal','data-target'=>'#AdicionarNovoDocumento']); ?>
          <div class="clearfix"></div>
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12">
            <?= $this->Flash->render() ?>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <table id="dataTables-example" class="table table-striped dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
              <tr role="row">
                  <th>Categoria</th>
                  <th>Titulo</th>
                  <th>Data</th>
                  <th>Ações</th>
              </tr>
            </thead>
            <tbody>
                <?php foreach ($documentos as $documento):?>
                    <tr class="tooltip-demo">
                        <td><?php echo $documento->documento->categorias_documento->nome; ?></td>
                        <td><?php echo $documento->documento->titulo; ?></td>
                        <td><?php echo $documento->documento->created->format('d/m/Y'); ?></td>
                        <td><center>
                          <div class="btn-group">
                            <?php echo $this->Html->link('<i class="fa fa-eye"></i> Visualizar', $dominio_sistema."/media/documentos/".$documento->documento->arquivo,['escape'=>false,'class'=>'btn btn-default btn-xs', 'target'=>'_blank', 'type' => 'button']); 
                            ?>
                            <?php echo $this->Form->postLink('<i class="fa fa-trash"></i> Excluir', ['action' => 'excluirDocumentosClientes', $documento->documento->id, $documento->cliente_id], ['confirm' => 'Tem certeza?','class'=>'btn btn-default btn-xs','escape'=>false, 'type' => 'button']); ?>
                          </div>
                        </center></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade bs-example-modal" tabindex="-1" role="dialog" aria-hidden="true"  id="AdicionarNovoDocumento">
    <div class="modal-dialog">
      <div class="modal-content">

      </div>
    </div>
</div>
