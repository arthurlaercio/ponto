<?php echo $this->Html->css('dataTables.bootstrap.css') ?>
<?php echo $this->Html->script('jquery.dataTables') ?>
<?php echo $this->Html->script('dataTables.bootstrap') ?>

<div class="">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <div class="row">
                    <div class="col-md-6">
                        <h3><i class="fa fa-sitemap"></i> Relógios </h3>
                    </div>
                        <div class="pull-right">
                            <?php echo $this->Html->link('<i class="fa fa-plus"></i> Adicionar', ['action'=>'add'], ['escape'=>false, 'class' => 'btn btn-success btn-sm','data-toggle'=>'modal','data-target'=>'#AdicionarRelogio']); ?>
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
                                <th>Nome</th>
                                <th>Serial</th>
                                <th>Tipo</th>
                                <th>Status</th>
                                <th>Opções</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($relogios as $relogio): ?>
                                <tr>
                                    <td><?php echo $relogio->id; ?></td>
                                    <td><?php echo $relogio->nome; ?></td>
                                    <td><?php echo $relogio->serial; ?></td>
                                    <td><?php echo $relogio->tipo; ?></td>
                                    <td><?php if($relogio->status == 1) echo "Ativo"; else echo "Inativo"; ?></td>
                                    <td>
                                        <?php echo $this->Html->link('<i class="fa fa-eye"></i> Detalhes', ['action' => 'view', $relogio->id],['class'=>'btn btn-default btn-xs', 'data-toggle'=>'modal','data-target'=>'#ViewRelogio','escape'=>false]); ?>
                                        <?php echo $this->Html->link('<i class="fa fa-edit"></i> Editar', ['action' => 'edit', $relogio->id],['class'=>'btn btn-warning btn-xs', 'data-toggle'=>'modal','data-target'=>'#EditarRelogio','escape'=>false]); ?>
                                        <?php echo $this->Form->postLink('<i class="fa fa-trash"></i> Excluir', ['action' => 'delete', $relogio->id], ['confirm' => 'Tem certeza?','class'=>'btn btn-danger btn-xs', 'escape'=>false]); ?>
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

<div class="modal fade bs-example-modal" tabindex="-1" role="dialog" aria-hidden="true"  id="ViewRelogio">
    <div class="modal-dialog">
      <div class="modal-content">

      </div>
    </div>
</div>

<div class="modal fade bs-example-modal" tabindex="-1" role="dialog" aria-hidden="true"  id="AdicionarRelogio">
    <div class="modal-dialog">
      <div class="modal-content">

      </div>
    </div>
</div>

<div class="modal fade bs-example-modal" tabindex="-1" role="dialog" aria-hidden="true"  id="EditarRelogio">
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