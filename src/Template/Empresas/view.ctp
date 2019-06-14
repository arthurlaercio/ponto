<?= $this->Html->css('chosen.css') ?>

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title" id="myModalLabel">Detalhes</h4>
</div>
<?php echo $this->Form->create($empresa,['role'=>'form','id'=>'inline-validate']); ?>
<div class="modal-body">
    <div class="row">
        <div class="col-md-6">
            <?php echo $this->Form->input('nome',['class'=>'form-control','disabled' => 'disabled']); ?>
        </div>
        <div class="col-md-6">
            <?php echo $this->Form->input('cnpj',['class'=>'form-control','disabled' => 'disabled']); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?php echo $this->Form->input('endereco',['class'=>'form-control','disabled' => 'disabled']); ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-9 col-sm-12 col-xs-12">
        <div class="page-title">
            <div class="title_left">
                <h3><i class="fa fa-user-plus"></i> Funcionários </h3>
            </div>
        </div>
    </div>
</div>
<div class="">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
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
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($empresa->funcionarios as $funcionario): ?>
                                <tr>
                                    <td><?php echo $funcionario->id; ?></td>
                                    <td><?php echo $funcionario->nome; ?></td>
                                    <td><?php if($funcionario->data_demissao == null) echo "ativo"; else echo "Inativo"; ?></td>
                                    <td><?php echo $funcionario->cpf; ?></td>
                                    <td><?php echo $funcionario->email; ?></td>
                                    <td><?php echo $funcionario->telefone; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
<?php echo $this->Form->end(); ?>

<?php echo $this->Html->script('chosen.jquery') ?>
<?php echo $this->Html->script('jquery.validate') ?>
<script>
    $(function () { 
        $(".chzn-select").chosen();

        $('body').on('hidden.bs.modal', '.modal', function () {
            $(this).removeData('bs.modal');
        });

        formValidation();
    });


    ﻿function formValidation() {
        "use strict";

        /*----------- BEGIN validate CODE -------------------------*/
        
    /*----------- END validate CODE -------------------------*/
    }
</script>

