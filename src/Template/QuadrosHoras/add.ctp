<?= $this->Html->css('chosen.css') ?>
<?= $this->Html->css('bootstrap-datetimepicker.css') ?>

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title" id="myModalLabel">Adicionar quadro de horas</h4>
</div>
<?php echo $this->Form->create($quadrosHora,['role'=>'form','id'=>'inline-validate']); ?>
<div class="modal-body">
    <div class="row">
        <div class="col-md-12">
            <?php echo $this->Form->input('descricao',['class'=>'form-control','label' => 'Descrição']); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="controls input-append date form_time" data-date="" data-date-format="hh:ii" data-link-field="dtp_input3" data-link-format="hh:ii">
                <?php echo $this->Form->input('hora_entrada',['class'=>'form-control','type' => 'text','label' => 'Hora Entrada','data-mask'=>'99:99']); ?>
                <span class="add-on"><i class="icon-remove"></i></span>
                <span class="add-on"><i class="icon-th"></i></span>
                </span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="controls input-append date form_time" data-date="" data-date-format="hh:ii" data-link-field="dtp_input3" data-link-format="hh:ii">
                <?php echo $this->Form->input('hora_saida',['class'=>'form-control','type' => 'text','label' => 'Hora Saída','data-mask'=>'99:99']); ?>
                <span class="add-on"><i class="icon-remove"></i></span>
                <span class="add-on"><i class="icon-th"></i></span>
                </span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="controls input-append date form_time" data-date="" data-date-format="hh:ii" data-link-field="dtp_input3" data-link-format="hh:ii">
                <?php echo $this->Form->input('intervalo_entrada',['class'=>'form-control','type' => 'text','label' => 'Intervalo entrada','data-mask'=>'99:99']); ?>
                <span class="add-on"><i class="icon-remove"></i></span>
                <span class="add-on"><i class="icon-th"></i></span>
                </span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="controls input-append date form_time" data-date="" data-date-format="hh:ii" data-link-field="dtp_input3" data-link-format="hh:ii">
                <?php echo $this->Form->input('intervalo_saida',['class'=>'form-control','type' => 'text','label' => 'Intervalo saída','data-mask'=>'99:99']); ?>
                <span class="add-on"><i class="icon-remove"></i></span>
                <span class="add-on"><i class="icon-th"></i></span>
                </span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="controls input-append date form_time" data-date="" data-date-format="hh:ii" data-link-field="dtp_input3" data-link-format="hh:ii">
                <?php echo $this->Form->input('tolerancia',['class'=>'form-control','type' => 'text','label' => 'Tolerância','data-mask'=>'99:99']); ?>
                <span class="add-on"><i class="icon-remove"></i></span>
                <span class="add-on"><i class="icon-th"></i></span>
                </span>
            </div>
        </div>
        <div class="col-md-6 icheckbox_flat-green">
            <?php echo $this->Form->input('Dias',['type'=>'select','multiple'=>'checkbox','class'=>'flat','options'=>['1'=>'Segunda', '2'=>'Terça','3'=>'Quarta', '4'=>'Quinta','5'=>'Sexta', '6'=>'Sabado','7'=>'Domingo']]); ?>
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
<?php echo $this->Html->script('bootstrap-datetimepicker') ?>
<?php echo $this->Html->script('bootstrap-inputmask') ?>
<script>
    $('.form_date').datetimepicker({
        language:  'br',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0
    });
    $('.form_time').datetimepicker({
        language:  'br',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 1,
        minView: 0,
        maxView: 1,
        forceParse: 0
    });
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