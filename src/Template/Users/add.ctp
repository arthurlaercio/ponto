<?= $this->Html->css('chosen.css') ?>

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title" id="myModalLabel">Adicionar Usuário</h4>
</div>
<?php echo $this->Form->create($user,['role'=>'form','id'=>'inline-validate']); ?>
<div class="modal-body">
    <div class="row">
        <div class="col-md-6">
            <?php echo $this->Form->input('nome',['class'=>'form-control', 'maxlength'=>'150']); ?>
        </div>
        <div class="col-md-6">
            <?php echo $this->Form->input('email',['class'=>'form-control']); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?php echo $this->Form->input('username',['class'=>'form-control', 'maxlength'=>'20']); ?>
        </div>
        <div class="col-md-6">
            <?php echo $this->Form->input('tipo',['type'=>'select','class'=>'form-control','options'=>['1'=>'Administrador', '2'=>'Colaborador']]); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?php echo $this->Form->input('password',['type' => 'password', 'class'=>'form-control', 'label' => 'Senha']);  ?>
        </div>
        <div class="col-md-6">
            <?php echo $this->Form->input('confirmar',['type' => 'password', 'class'=>'form-control']);  ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?php echo $this->Form->input('funcionario_Id',['type'=>'select','class'=>'form-control','options'=>$funcionarios,'label' => 'Associar a funcionário']); ?>
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
        $('#inline-validate').validate({
            rules: {
                nome: {
                    required: true
                },
                username: {
                    required: true
                },
                password: {
                    required: true
                },
                confirmar: {
                    required: true,
                    equalTo: "#password"
                }
            },
            errorClass: 'help-block col-md-12',
            errorElement: 'span',
            highlight: function (element, errorClass, validClass) {
                $(element).parents('.form-group').removeClass('has-success').addClass('has-error');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).parents('.form-group').removeClass('has-error').addClass('has-success');
            }
        });
    /*----------- END validate CODE -------------------------*/
    }
</script>