<?= $this->Html->css('chosen.css') ?>

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title" id="myModalLabel">Detalhes Usuário</h4>
</div>
<?php echo $this->Form->create($user,['role'=>'form']); ?>
<div class="modal-body">
    <div class="row">
        <div class="col-md-6">
            <label>Nome:</label>
            <?php echo $user->nome; ?>
        </div>
        <div class="col-md-6">
            <label>Email:</label>
            <?php echo $user->email; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label>Usuário:</label>
            <?php echo $user->username; ?>
        </div>
        <div class="col-md-6">
            <label>Última modificação:</label>
            <?php echo $user->modified->format('d/m/Y');  ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label>Status:</label>
            <?php if($user->status == 1) echo "Ativo"; else echo "Inativo"; ?>
        </div>
        <div class="col-md-6">
            <label>Status:</label>
            <?php if($user->tipo == 1) echo "Administrador"; else echo "Colaborador"; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label>Criado Por:</label>
            <?php echo $user->criado_por;  ?>
        </div>
        <div class="col-md-6">
            <label>Data criação:</label>
            <?php echo $user->created->format('d/m/Y'); ?>
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