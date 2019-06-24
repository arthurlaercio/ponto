<?php echo $this->Html->css('dataTables.bootstrap.css') ?>
<?php echo $this->Html->script('jquery.dataTables') ?>
<?php echo $this->Html->script('dataTables.bootstrap') ?>

<div class="row">
    <div class="col-md-9 col-sm-12 col-xs-12">
        <div class="page-title">
            <div class="title_left">
                <h3><i class="fa fa-sitemap"></i> Usuários </h3>
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
                            <?php echo $this->Html->link('<i class="fa fa-plus"></i> Adicionar', ['action'=>'add'], ['escape'=>false, 'class' => 'btn btn-success btn-sm','data-toggle'=>'modal','data-target'=>'#AdicionarUsuario']); ?>
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
                                <th>Username</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Nível de Acesso</th>
                                <th>Data de Criação</th>
                                <th>Opções</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($users as $usuario): ?>
                                <tr>
                                    <td><?php echo $usuario->id; ?></td>
                                    <td><?php echo $usuario->nome; ?></td>
                                    <td><?php echo $usuario->username; ?></td>
                                    <td><?php echo $usuario->email; ?></td>
                                    <td><?php if($usuario->status == 1) echo "Ativo"; else echo "Inativo"; ?></td>
                                    <td><?php if($usuario->tipo == 1) echo "Administrador"; else echo "Colaborador"; ?></td>
                                    <td><?php echo $usuario->created->format('d/m/Y'); ?></td>
                                    <td>
                                        <?php echo $this->Html->link('<i class="fa fa-eye"></i> Detalhes', ['action' => 'view', $usuario->id],['class'=>'btn btn-default btn-xs', 'data-toggle'=>'modal','data-target'=>'#ViewUsuario','escape'=>false]); ?>
                                        <?php echo $this->Html->link('<i class="fa fa-edit"></i> Editar', ['action' => 'edit', $usuario->id],['class'=>'btn btn-warning btn-xs', 'data-toggle'=>'modal','data-target'=>'#EditarUsuario','escape'=>false]); ?>
                                        <?php echo $this->Form->postLink('<i class="fa fa-trash"></i> Excluir', ['action' => 'delete', $usuario->id], ['confirm' => 'Tem certeza?','class'=>'btn btn-danger btn-xs', 'escape'=>false]); ?>
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

<div class="modal fade bs-example-modal" tabindex="-1" role="dialog" aria-hidden="true"  id="ViewUsuario">
    <div class="modal-dialog">
      <div class="modal-content">

      </div>
    </div>
</div>

<div class="modal fade bs-example-modal" tabindex="-1" role="dialog" aria-hidden="true"  id="AdicionarUsuario">
    <div class="modal-dialog">
      <div class="modal-content">

      </div>
    </div>
</div>

<div class="modal fade bs-example-modal" tabindex="-1" role="dialog" aria-hidden="true"  id="EditarUsuario">
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