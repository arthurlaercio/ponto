<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Funcionario $funcionario
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $funcionario->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $funcionario->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Funcionarios'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Empresas'), ['controller' => 'Empresas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Empresa'), ['controller' => 'Empresas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Batidas'), ['controller' => 'Batidas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Batida'), ['controller' => 'Batidas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="funcionarios form large-9 medium-8 columns content">
    <?= $this->Form->create($funcionario) ?>
    <fieldset>
        <legend><?= __('Edit Funcionario') ?></legend>
        <?php
            echo $this->Form->control('users_id', ['options' => $users]);
            echo $this->Form->control('empresa_id', ['options' => $empresas]);
            echo $this->Form->control('nome');
            echo $this->Form->control('endereco');
            echo $this->Form->control('cpf');
            echo $this->Form->control('rg');
            echo $this->Form->control('email');
            echo $this->Form->control('telefone');
            echo $this->Form->control('data_nascimento', ['empty' => true]);
            echo $this->Form->control('sexo');
            echo $this->Form->control('pis');
            echo $this->Form->control('ctps_numero');
            echo $this->Form->control('ctps_serie');
            echo $this->Form->control('ctps_uf');
            echo $this->Form->control('data_admissao', ['empty' => true]);
            echo $this->Form->control('data_demissao', ['empty' => true]);
            echo $this->Form->control('status');
            echo $this->Form->control('criado_por');
            echo $this->Form->control('modificado_por');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
