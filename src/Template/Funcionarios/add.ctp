<?= $this->Html->css('chosen.css') ?>

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title" id="myModalLabel">Adicionar Funcionário</h4>
</div>
<?php echo $this->Form->create($funcionario,['role'=>'form','id'=>'inline-validate']); ?>
<div class="modal-body">
    <div class="row">
        <div class="col-md-6">
            <?php echo $this->Form->input('nome',['class'=>'form-control', 'maxlength'=>'150']); ?>
        </div>
        <div class="col-md-6">
            <?php echo $this->Form->input('endereco',['class'=>'form-control', 'maxlength'=>'150']); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?php echo $this->Form->input('cpf',['class'=>'form-control','data-mask'=>'999.999.999-99']); ?>
        </div>
        <div class="col-md-6">
            <?php echo $this->Form->input('rg',['class'=>'form-control', 'maxlength'=>'20']); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?php echo $this->Form->input('email',['class'=>'form-control', 'maxlength'=>'60']); ?>
        </div>
        <div class="col-md-6">
            <?php echo $this->Form->input('telefone',['class'=>'form-control','id' => 'telefone','data-mask'=>'(99) 99999-9999']); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?php  echo $this->Form->input('data_nascimento', array(
                                                'label' => 'Data de Nascimento','type'=>'text', 'class' => 'form-control','id'=>'DataNascimento','data-date-format'=>'dd/mm/yyyy', 'data-mask'=>'99/99/9999')); ?>
        </div>
        <div class="col-md-6">
            <?php echo $this->Form->input('sexo',['class'=>'form-control','options' => ['1' => 'Masculino','2' => 'Feminino']]); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">            
            <?php echo $this->Form->input('pis',['class'=>'form-control','data-mask'=>'999.99999.99-9']); ?>
        </div>
        <div class="col-md-6">
            <?php echo $this->Form->input('ctps_numero',['class'=>'form-control']); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?php echo $this->Form->input('ctps_serie',['class'=>'form-control', 'maxlength'=>'4']); ?>
        </div>
        <div class="col-md-6">
            <?php echo $this->Form->input('ctps_uf',['class'=>'form-control', 'maxlength'=>'2']); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?php  echo $this->Form->input('data_admissao', array(
                                                'label' => 'Data de Admissão','type'=>'text', 'class' => 'form-control','id'=>'DataAdmissao','data-date-format'=>'dd/mm/yyyy', 'data-mask'=>'99/99/9999')); ?>
        </div>
         <div class="col-md-6">
            <?php echo $this->Form->control('empresa_id', ['class'=>'form-control','options' => $empresas]);  ?>
        </div>
    </div>
            
</div>
<div class="modal-footer">
    <div class="row">
        <div class="col-md-12">
            <?php echo $this->Form->button('<i class="icon-ok"></i> Cadastrar',['class'=>'btn btn-success']); ?>
            <?php echo $this->Form->button('<i class="icon-repeat"></i> Limpar',['type'=>'reset', 'class'=>'btn btn-warning']); ?>
        </div>
    </div>  
</div>
<?php echo $this->Form->end(); ?>

<?php echo $this->Html->script('chosen.jquery') ?>
<?php echo $this->Html->script('jquery.validate') ?>
<?php echo $this->Html->script('bootstrap-inputmask') ?>
<?php echo $this->Html->script('bootstrap-datepicker') ?>
<script>
    $(function () { 
        $(".chzn-select").chosen();

        $('body').on('hidden.bs.modal', '.modal', function () {
            $(this).removeData('bs.modal');
        });

        formValidation();
    });
    $(document).ready(function () {
        $('#DataNascimento').datepicker().on('changeDate', function(ev)
        {                 
             $('.datepicker').hide();
        });
        $('#DataAdmissao').datepicker().on('changeDate', function(ev)
        {                 
             $('.datepicker').hide();
        });

    }); 

    ﻿function formValidation() {
        "use strict";

        /*----------- BEGIN validate CODE -------------------------*/
        
    /*----------- END validate CODE -------------------------*/
    }
</script>