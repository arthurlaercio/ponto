<?= $this->Html->css('chosen.css') ?>

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title" id="myModalLabel">Editar Usuário</h4>
</div>
<?php echo $this->Form->create($user,['role'=>'form']); ?>
<div class="modal-body">
    <div class="row">
        <div class="col-md-6">
            <?php echo $this->Form->input('nome',['class'=>'form-control']); ?>
        </div>
        <div class="col-md-6">
            <?php echo $this->Form->input('email',['class'=>'form-control']); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?php echo $this->Form->input('username',['class'=>'form-control']); ?>
        </div>
        <div class="col-md-6">
            <?php echo $this->Form->input('password',['type' => 'password','class'=>'form-control','label' => 'Senha']);  ?>
        </div>
    </div>
</div>
<div class="modal-footer">
    <div class="row">
        <div class="col-md-12">
            <?php echo $this->Form->button('Cadastrar',['class'=>'btn btn-success']); ?>
            <?php echo $this->Form->button('Limpar',['type'=>'reset', 'class'=>'btn btn-warning']); ?>
        </div>
    </div>  
</div>
<?php echo $this->Form->end(); ?>

<?php echo $this->Html->script('chosen.jquery') ?>
<script>
    $(function () { 
        $(".chzn-select").chosen();

        $('body').on('hidden.bs.modal', '.modal', function () {
            $(this).removeData('bs.modal');
        });
    });
</script>