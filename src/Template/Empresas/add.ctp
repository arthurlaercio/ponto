<?= $this->Html->css('chosen.css') ?>

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title" id="myModalLabel">Adicionar Empresa</h4>
</div>
<?php echo $this->Form->create($empresa,['role'=>'form','id'=>'inline-validate']); ?>
<div class="modal-body">
    <div class="row">
        <div class="col-md-6">
            <?php echo $this->Form->input('nome',['class'=>'form-control']); ?>
        </div>
        <div class="col-md-6">
            <?php echo $this->Form->input('cnpj',['class'=>'form-control','data-mask'=>'99.999.999/9999-99']); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?php echo $this->Form->input('endereco',['class'=>'form-control']); ?>
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
        
    /*----------- END validate CODE -------------------------*/
    }
</script>
