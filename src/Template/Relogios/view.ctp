<?= $this->Html->css('chosen.css') ?>

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title" id="myModalLabel">Detalhes Relógio</h4>
</div>
<?php echo $this->Form->create($relogio,['role'=>'form']); ?>
<div class="modal-body">
    <div class="row">
        <div class="col-md-6">
            <label>Id:</label>
            <?php echo $relogio->id; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <label>Nome:</label>
            <?php echo $relogio->nome; ?>
        </div>
        <div class="col-md-4">
            <label>Tipo:</label>
            <?php echo $relogio->tipo; ?>
        </div>
        <div class="col-md-4">
            <label>Serial:</label>
            <?php echo $relogio->serial; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label>Data criação:</label>
            <?php echo $relogio->created->format('d/m/Y'); ?>
        </div>
        <div class="col-md-6">
            <label>Última modificação:</label>
            <?php echo $relogio->modified->format('d/m/Y');  ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label>Status:</label>
            <?php if($relogio->status == 1) echo "Ativo"; else echo "Inativo"; ?>
        </div>
        <div class="col-md-6">
            <label>Criado Por:</label>
            <?php echo $relogio->user->nome; ?>
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