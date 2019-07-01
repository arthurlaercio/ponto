<?= $this->Html->css('chosen.css') ?>

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title" id="myModalLabel">Editar Importação</h4>
</div>
<?= $this->Form->create($apuracoesPeriodo) ?>
<div class="modal-body">
    <div class="row">
        <div class="col-md-12">
            <?php echo $this->Form->input('nome',['class'=>'form-control', 'maxlength'=>'80']); ?>
            <?php echo $this->Form->input('data_encerra',['class'=>'form-control']); ?>
            <?php echo $this->Form->input('data_inicio',['class'=>'form-control']); ?>
            <?php echo $this->Form->input('data_fim',['class'=>'form-control']); ?>
            <?php echo $this->Form->input('status',['class'=>'form-control']); ?>
            <?php echo $this->Form->input('criado_por', ['options' => $users, 'class'=>'form-control']); ?>
            <?php echo $this->Form->input('modificado_por',['class'=>'form-control']); ?>
        </div>
    </div>
</div>
<div class="modal-footer">
    <div class="row">
        <div class="col-md-12">
            <?php echo $this->Form->button('<i class="icon-ok"></i> Salvar',['class'=>'btn btn-block btn-success']); ?>
            <?php echo $this->Form->button('<i class="icon-repeat"></i> Limpar',['type'=>'reset', 'class'=>'btn btn-block btn-warning']); ?>
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
