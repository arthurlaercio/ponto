<?= $this->Html->css('chosen.css') ?>

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title" id="myModalLabel">Detalhes Quadro Horas</h4>
</div>
<?php echo $this->Form->create($quadrosHora,['role'=>'form']); ?>
<div class="modal-body">
    <div class="row">
        <div class="col-md-6">
            <label>Id:</label>
            <?php echo $quadrosHora->id; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label>Hora Entrada:</label>
            <?php echo $quadrosHora->hora_entrada->format('H:i'); ?>
        </div>
        <div class="col-md-6">
            <label>Hora Saída:</label>
            <?php echo $quadrosHora->hora_saida->format('H:i'); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label>Intervalo Entrada:</label>
            <?php echo $quadrosHora->intervalo_entrada->format('H:i'); ?>
        </div>
        <div class="col-md-6">
            <label>Intervalo Saída:</label>
            <?php echo $quadrosHora->intervalo_saida->format('H:i'); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label>Tolerância:</label>
            <?php echo $quadrosHora->tolerancia->format('H:i'); ?>
        </div>
    </div>  
    <div class="row">
        <div class="col-md-6">
            <label>Data criação:</label>
            <?php echo $quadrosHora->created->format('d/m/Y'); ?>
        </div>
        <div class="col-md-6">
            <label>Última modificação:</label>
            <?php echo $quadrosHora->modified->format('d/m/Y');  ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label>Status:</label>
            <?php if($quadrosHora->status == 1) echo "Ativo"; else echo "Inativo"; ?>
        </div>
        <div class="col-md-6">
            <label>Criado Por:</label>
            <?php echo $quadrosHora->user->nome; ?>
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