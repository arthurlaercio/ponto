<?= $this->Html->css('chosen.css') ?>

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title" id="myModalLabel">Adicionar Empresa</h4>
</div>
<?php echo $this->Form->create($empresa,['role'=>'form','id'=>'inline-validate']); ?>
<div class="modal-body">
    <div class="row">
        <div class="col-md-12">
            <?php echo $this->Form->input('nome',['class'=>'form-control', 'placeholder'=>'Nome da empresa', 'maxlength'=>'80']); ?>
            <?php echo $this->Form->input('cnpj',['class'=>'form-control', 'placeholder'=>'CNPJ / CPF do responsável']); ?>
            <?php echo $this->Form->input('endereco',['class'=>'form-control', 'placeholder'=>'Localização',]); ?>
        </div>
    </div>
</div>
<div class="modal-footer">
    <div class="row">
        <div class="col-md-12">
            <?php echo $this->Form->button('<i class="icon-ok"></i> Cadastrar',['class'=>'btn btn-block btn-success']); ?>
            <?php echo $this->Form->button('<i class="icon-repeat"></i> Limpar',['type'=>'reset', 'class'=>'btn btn-block btn-warning']); ?>
        </div>
    </div>  
</div>
<?php echo $this->Form->end(); ?>

<?php echo $this->Html->script('chosen.jquery') ?>
<?php echo $this->Html->script('jquery.validate') ?>
<?php echo $this->Html->script('bootstrap-inputmask') ?>
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
