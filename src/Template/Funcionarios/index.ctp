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
                        <h3><i class="fa fa-sitemap"></i> Funcionários </h3>
                    </div>
                        <div class="pull-right">
                            <?php echo $this->Html->link('<i class="fa fa-plus"></i> Adicionar', ['action'=>'add'], ['escape'=>false, 'class' => 'btn btn-success btn-sm','data-toggle'=>'modal','data-target'=>'#AdicionarFuncionario']); ?>
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
                                <th>Status</th>
                                <th>CPF</th>
                                <th>Email</th>
                                <th>Telefone</th>
                                <th>Opções</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($funcionarios as $funcionario): ?>
                                <?php if($funcionario->id != 1){ ?> <!-- Linha para ocultar o funcionário "não associar" -->
                                <tr>
                                    
                                        <td><?php echo $funcionario->id; ?></td>
                                        <td><?php echo $funcionario->nome; ?></td>
                                        <td><?php if($funcionario->data_demissao == null) echo "ativo"; else echo "Inativo"; ?></td>
                                        <td><?php echo $funcionario->cpf; ?></td>
                                        <td><?php echo $funcionario->email; ?></td>
                                        <td><?php echo $funcionario->telefone; ?></td>
                                        <td>
                                            <?php echo $this->Html->link('<i class="fa fa-eye"></i> Detalhes', ['action' => 'view', $funcionario->id],['class'=>'btn btn-default btn-xs', 'data-toggle'=>'modal','data-target'=>'#ViewFuncionario','escape'=>false]); ?>
                                            <?php echo $this->Html->link('<i class="fa fa-edit"></i> Editar', ['action' => 'edit', $funcionario->id],['class'=>'btn btn-warning btn-xs', 'data-toggle'=>'modal','data-target'=>'#EditarFuncionario','escape'=>false]); ?>
                                            <?php echo $this->Form->postLink('<i class="fa fa-trash"></i> Excluir', ['action' => 'delete', $funcionario->id], ['confirm' => 'Tem certeza?','class'=>'btn btn-danger btn-xs', 'escape'=>false]); ?>
                                            <?php echo $this->Html->link('<i class="icon-plus"></i> Escalas', ['controller'=>'FuncionariosQuadrosRelogios','action' => 'escala_funcionario', $funcionario->id],['escape'=>false, 'class' => 'btn btn-info btn-xs']); ?>
                                            <?php //echo $this->Html->link('<i class="icon-plus"></i> Adicionar Escala', ['controller'=>'FuncionariosQuadrosRelogios','action' => 'add', $funcionario->id],['escape'=>false, 'class' => 'btn btn-info btn-xs']); ?>
                                        </td>
                                <?php } ?>     
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bs-example-modal" tabindex="-1" role="dialog" aria-hidden="true"  id="ViewFuncionario">
    <div class="modal-dialog">
      <div class="modal-content">

      </div>
    </div>
</div>

<div class="modal fade bs-example-modal" tabindex="-1" role="dialog" aria-hidden="true"  id="AdicionarFuncionario">
    <div class="modal-dialog">
      <div class="modal-content">

      </div>
    </div>
</div>

<div class="modal fade bs-example-modal" tabindex="-1" role="dialog" aria-hidden="true"  id="EditarFuncionario">
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