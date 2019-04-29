<?= $this->Html->css('chosen.css') ?>

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title" id="myModalLabel">Detalhes Quadro Horas</h4>
</div>
<?php echo $this->Form->create($funcionario,['role'=>'form']); ?>
<div class="modal-body">
    <div class="row">
        <div class="col-md-6">
            <label>Id:</label>
            <?php echo $funcionario->id; ?>
        </div>
        <div class="col-md-6">
            <label>Usuário:</label>
            <?php echo $funcionario->user->nome; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label>Empresa:</label>
            <?php echo $funcionario->empresa->nome; ?>
        </div>
        <div class="col-md-6">
            <label>Nome:</label>
            <?php echo $funcionario->nome; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label>Endereço:</label>
            <?php echo $funcionario->endereco; ?>
        </div>
        <div class="col-md-6">
            <label>Cpf:</label>
            <?php echo $funcionario->cpf; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label>RG:</label>
            <?php echo $funcionario->rg; ?>
        </div>
        <div class="col-md-6">
            <label>email:</label>
            <?php echo $funcionario->email; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label>Telefone:</label>
            <?php echo $funcionario->telefone; ?>
        </div>
        <div class="col-md-6">
            <label>Sexo:</label>
            <?php if($funcionario->sexo == 1) echo "Masculino"; else echo "Feminino"; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label>Pis:</label>
            <?php echo $funcionario->pis; ?>
        </div>
        <div class="col-md-6">
            <label>CTPS Número:</label>
            <?php echo $funcionario->ctps_numero; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label>CTPS Série:</label>
            <?php echo $funcionario->ctps_serie; ?>
        </div>
        <div class="col-md-6">
            <label>CTPS UF:</label>
            <?php echo $funcionario->ctps_uf; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label>Data adminissão:</label>
            <?php echo $funcionario->data_admissao->format('d/m/Y'); ?>
        </div>
        <div class="col-md-6">
            <label>Data demissão:</label>
            <?php if(!empty($funcionario->data_demissao)) echo $funcionario->data_demissao->format('d/m/Y'); else echo "Ainda ativo na empresa"; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label>Status:</label>
            <?php if($funcionario->status == 1) echo "Ativo"; else echo "Inativo"; ?>
        </div>
        <div class="col-md-6">
            <label>Criado Por:</label>
            <?php echo $funcionario->user->nome; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label>Data criação:</label>
            <?php echo $funcionario->created->format('d/m/Y'); ?>
        </div>
        <div class="col-md-6">
            <label>Última modificação:</label>
            <?php echo $funcionario->modified->format('d/m/Y');  ?>
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