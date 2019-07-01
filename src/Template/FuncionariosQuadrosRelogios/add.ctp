<?= $this->Html->css('chosen.css') ?>

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title" id="myModalLabel">Atribuir Escala</h4>
</div>
<?php echo $this->Form->create($funcionariosQuadrosRelogio,['role'=>'form','id'=>'inline-validate']); ?>
<div class="modal-body">
    <div class="row">
        <div class="col-md-6">
            <?php echo $this->Form->input('nome', ['class'=>'form-control','value'=>$funcionario->nome,'disabled' => 'disabled']); ?>
        </div>
       <div class="col-md-6">
            <?php echo $this->Form->input('cpf', ['class'=>'form-control','value'=>$funcionario->cpf,'disabled' => 'disabled']); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?php echo $this->Form->control('quadro_hora_id', ['options' => $quadroHoras,'label' => 'Quadro de horas','class'=>'form-control']);  ?>
        </div>
       <div class="col-md-6">
            <?php echo $this->Form->input('empresa', ['class'=>'form-control','value'=>$funcionario->empresa->nome,'disabled' => 'disabled']); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?php echo $this->Form->control('relogio_id', ['options' => $relogios,'class'=>'form-control']);  ?>
        </div>
       <div class="col-md-6">
            <?php echo $this->Form->input('cartao_ponto', ['class'=>'form-control']); ?>
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
    });

</script>