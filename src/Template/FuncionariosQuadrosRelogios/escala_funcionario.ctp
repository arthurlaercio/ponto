<?php echo $this->Html->css('dataTables.bootstrap.css') ?>
<?php echo $this->Html->script('jquery.dataTables') ?>
<?php echo $this->Html->script('dataTables.bootstrap') ?>

<div class="row">
    <div class="col-md-9 col-sm-12 col-xs-12">
        <div class="page-title">
            <div class="title_left">
                <h3><i class="fa fa-link"></i> Enquadramento de Funcionário </h3>
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
                            <?php echo $this->Html->link('<i class="fa fa-plus"></i> Adicionar', ['action'=>'add', $funcionario->id], ['escape'=>false, 'class' => 'btn btn-success btn-sm','data-toggle'=>'modal','data-target'=>'#AdicionarEscala']); ?>
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
                                <th>Data Inicio</th>
                                <th>Data Fim</th>
                                <th>Cartão de Ponto</th>
                                <th>Relógio</th>
                                <th>Quadro de Horas</th>
                                <th>Opções</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($funcionariosQuadrosRelogios as $funcionarioQuadroRelogio): ?>
                                <tr>
                                    <td><?php echo $funcionarioQuadroRelogio->id; ?></td>
                                    <td><?php echo $funcionario->nome; ?></td>
                                    <td><?php echo $funcionarioQuadroRelogio->data_inicio; ?></td>
                                    <td><?php if($funcionarioQuadroRelogio->data_fim == null) echo "Escala em uso"; else echo $funcionarioQuadroRelogio->data_fim; ?></td>
                                    <td><?php echo $funcionarioQuadroRelogio->cartao_ponto; ?></td>
                                    <td><?php echo $funcionarioQuadroRelogio->relogio->nome; ?></td>
                                    <td><?php echo $funcionarioQuadroRelogio->quadros_hora->id; ?></td>
                                    <td>
                                        <?php echo $this->Html->link('<i class="fa fa-edit"></i> Editar', ['action' => 'edit', $funcionarioQuadroRelogio->id],['class'=>'btn btn-warning btn-xs', 'data-toggle'=>'modal','data-target'=>'#DesativarEscala','escape'=>false]); ?>
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

<div class="modal fade bs-example-modal" tabindex="-1" role="dialog" aria-hidden="true"  id="AdicionarEscala">
    <div class="modal-dialog">
      <div class="modal-content">

      </div>
    </div>
</div>

<div class="modal fade bs-example-modal" tabindex="-1" role="dialog" aria-hidden="true"  id="DesativarEscala">
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