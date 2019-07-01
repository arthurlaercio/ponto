<?php echo $this->Html->css('dataTables.bootstrap.css') ?>
<?php echo $this->Html->script('jquery.dataTables') ?>
<?php echo $this->Html->script('dataTables.bootstrap') ?>


<?php echo $this->Html->css('responsive.bootstrap.css') ?>
<?php echo $this->Html->script('dataTables.responsive') ?>
<?php echo $this->Html->script('responsive.bootstrap') ?>
<?php echo $this->Html->script('bootstrap-datepicker') ?>

<div class="">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <div class="row">
                    <div class="col-md-6">
                        <h3><i class="fa fa-sitemap"></i> Batidas </h3>
                    </div>
                            <div class="pull-right">
                                <?php echo $this->Html->link('<i class="fa fa-plus"></i> Adicionar', ['action'=>'add'], ['escape'=>false, 'class' => 'btn btn-success btn-sm','data-toggle'=>'modal','data-target'=>'#AdicionarApuracao']); ?>
                                <div class="btn-group">
                                <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle btn-sm" type="button" aria-expanded="false" style="margin-bottom: 5px">Relatórios <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropBatidas">
                                    <li class="liDrop">
                                        <?php echo $this->Html->link('<i class="fa fa-book"></i>Por Período', '#', ['escape'=>false,'id'=>'btn-relatorio-periodo']); ?>
                                    </li>
                                    <li class="liDrop">
                                        <?php echo $this->Html->link('<i class="fa fa-book"></i> Por funcionario', '#', ['escape'=>false,'id'=>'btn-relatorio-funcionario']); ?>
                                    </li>
                                    <li class="liDrop">
                                        <?php echo $this->Html->link('<i class="fa fa-book"></i> Por empresa', '#', ['escape'=>false,'id'=>'btn-relatorio-empresa']); ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12" id="AreaRelatorioPeriodo" style="display:none; margin: 0px; padding: 0px;">
                        </br>
                        <div class="x_panel" style="margin: 0px; padding: 0px; border: 0px;">
                            <div class="x_title">
                                <h2><i class="fa fa-book"></i> Procura por Período </h2>
                                <ul class="nav navbar-right panel_toolbox" style="min-width: 22px">
                                    <li>
                                        <a id="fechar-relatorio-periodo" class="fa fa-close"></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>  
                            <div class="x_content">
                                <?php echo $this->Form->create(null,['url'=> ['action'=>'relatorioPorPeriodo'],'id'=>'FormFiltroRelatorioProcuraPeriodo','name'=>'Filtro','target' => '_blank']); ?>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                        <?php 
                                            echo $this->Form->input('Relatorio.data_inicio',['class'=>'form-control has-feedback-left','data-date-format'=>'dd/mm/yyyy','id'=>'DataInicioRelatorioPeriodo','placeholder' => 'Data Inicial', 'label' => false]);
                                        ?>
                                        <span class="fa fa-calendar form-control-feedback left" aria-hidden="true" style="margin-top: 5px"></span>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                        <?php 
                                            echo $this->Form->input('Relatorio.data_fim',['label'=>false, 'class'=>'form-control has-feedback-right text-right','data-date-format'=>'dd/mm/yyyy','id'=>'DataFinalRelatorioPeriodo','placeholder' => 'Data Final']);
                                        ?>
                                        <span class="fa fa-calendar form-control-feedback right" aria-hidden="true" style="margin-top: 5px"></span>
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <div class="container-fluid">
                                        <?php echo $this->Form->button('<i class="fa fa-search"></i> Gerar Relatório', ['type' => 'submit','escape'=>false,'class' => 'btn btn-block btn-primary btn-sm','style' => "margin-top:2px"]); ?> 
                                    </div>
                                    </div>
                                </div>                                 
                                <?php echo $this->Form->end(); ?>
                            </div>  
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
                                <th>Funcionario</th>
                                <th>Hora da batida</th>
                                <th>Ajuste</th>
                                <th>Status</th>
                                <th>Opções</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($batidas as $batida): ?>
                                <tr>
                                    <td><?php echo $batida->id; ?></td>
                                    <td><?php echo $batida->funcionario->nome; ?></td>
                                    <td><?php echo $batida->batida; ?></td>
                                    <td><?php echo $batida->batidas_ajuste->motivo; ?></td>
                                    <td><?php if($batida->status == 1) echo "Válida"; else echo "Desconsiderada"; ?></td>
                                     <td>
                                        <?php echo $this->Html->link('<i class="fa fa-edit"></i> Ajustar batida', ['action' => 'edit', $batida->id],['class'=>'btn btn-default btn-xs', 'data-toggle'=>'modal','data-target'=>'#EditarBatida','escape'=>false]); ?>
                                        <?php //echo $this->Html->link('<i class="fa fa-edit"></i> Editar', ['action' => 'edit', $batida->id],['class'=>'btn btn-warning btn-xs', 'data-toggle'=>'modal','data-target'=>'#EditarApuracao','escape'=>false]); ?>
                                        <?php //echo $this->Form->postLink('<i class="fa fa-trash"></i> Excluir', ['action' => 'delete', $batida->id], ['confirm' => 'Tem certeza?','class'=>'btn btn-danger btn-xs', 'escape'=>false]); ?>
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


<div class="modal fade bs-example-modal" tabindex="-1" role="dialog" aria-hidden="true"  id="AdicionarApuracao">
    <div class="modal-dialog">
      <div class="modal-content">

      </div>
    </div>
</div>

<div class="modal fade bs-example-modal" tabindex="-1" role="dialog" aria-hidden="true"  id="EditarBatida">
    <div class="modal-dialog">
      <div class="modal-content">

      </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#dataTables-example').dataTable();

        //datas

        $('#DataInicioRelatorioPeriodo').datepicker().on('changeDate', function(ev)
        {                 
             $('.datepicker').hide();
        });

        $('#DataFinalRelatorioPeriodo').datepicker().on('changeDate', function(ev)
        {                 
             $('.datepicker').hide();
        });

        //botoes relatórios

        $('#btn-relatorio-empresa').on("click", function() {
            $('.filtro').hide();
            $('#AreaRelatorioEmpresa').slideToggle();
        });

        $('#btn-relatorio-periodo').on("click", function() {
            $('.filtro').hide();
            $('#AreaRelatorioPeriodo').slideToggle();
        });
        $('#btn-relatorio-funcionario').on("click", function(){
            $('.filtro').hide();
            $('#AreaRelatorioFuncionario').slideToggle();
        });


        //botoes fechar relatorios
        $('#fechar-relatorio-periodo').on("click", function(){
            $('.filtro').hide();
            $('#AreaRelatorioPeriodo').slideToggle();
        });

        $('#fechar-relatorio-empresa').on("click", function(){
            $('.filtro').hide();
            $('#AreaRelatorioEmpresa').slideToggle();
        });

        $('#fechar-relatorio-funcionario').on("click", function(){
            $('.filtro').hide();
            $('#AreaRelatorioFuncionario').slideToggle();
        });
    });
</script>
