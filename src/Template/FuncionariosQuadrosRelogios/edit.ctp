<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FuncionariosQuadrosRelogio $funcionariosQuadrosRelogio
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $funcionariosQuadrosRelogio->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $funcionariosQuadrosRelogio->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Funcionarios Quadros Relogios'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Funcionarios'), ['controller' => 'Funcionarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Funcionario'), ['controller' => 'Funcionarios', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Relogios'), ['controller' => 'Relogios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Relogio'), ['controller' => 'Relogios', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="funcionariosQuadrosRelogios form large-9 medium-8 columns content">
    <?= $this->Form->create($funcionariosQuadrosRelogio) ?>
    <fieldset>
        <legend><?= __('Edit Funcionarios Quadros Relogio') ?></legend>
        <?php
            echo $this->Form->control('funcionario_id', ['options' => $funcionarios]);
            echo $this->Form->control('relogio_id', ['options' => $relogios]);
            echo $this->Form->control('quadro_hora_id');
            echo $this->Form->control('cartao_ponto');
            echo $this->Form->control('data_inicio');
            echo $this->Form->control('data_fim');
            echo $this->Form->control('status');
            echo $this->Form->control('criado_por');
            echo $this->Form->control('modificado_por');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
