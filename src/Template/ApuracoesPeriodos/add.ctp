<?= $this->Html->css('chosen.css') ?>

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title" id="myModalLabel">Adicionar Apuração</h4>
</div>
<?php echo $this->Form->create($apuracoesPeriodo,['role'=>'form','id'=>'inline-validate']); ?>
<div class="modal-body">
    <div class="row">        
       <div class="col-md-6">            
            <?php  echo $this->Form->input('data_inicio2', array('label' => 'Data de Inicio','type'=>'text', 'class' => 'form-control','id'=>'DataInicio','data-date-format'=>'dd/mm/yyyy')); ?>
       </div>             
       <div class="col-md-6">
            <?php  echo $this->Form->input('data_fim2', array('label' => 'Data Fim','type'=>'text', 'class' => 'form-control','id'=>'DataFim','data-date-format'=>'dd/mm/yyyy')); ?>
       </div>
    </div>
    <div class="row">        
        <div class="col-md-6">
            <?php  echo $this->Form->input('data_encerra2', array('label' => 'Data de Fechamento','type'=>'text', 'class' => 'form-control','id'=>'DataEncerra','data-date-format'=>'dd/mm/yyyy')); ?>    
        </div>
    </div>
            
</div>
<div class="modal-footer">
    <div class="row">
        <div class="col-md-12">
            <?php echo $this->Form->button('<i class="icon-ok"></i> Salvar',['class'=>'btn btn-success']); ?>
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
    });
    $(document).ready(function () {
        $('#DataEncerra').datepicker().on('changeDate', function(ev)
        {                 
             $('.datepicker').hide();
        });
        $('#DataInicio').datepicker().on('changeDate', function(ev)
        {                 
             $('.datepicker').hide();
        });
        $('#DataFim').datepicker().on('changeDate', function(ev)
        {                 
             $('.datepicker').hide();
        });
    }); 

</script>