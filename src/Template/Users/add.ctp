<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Adicionar Usuário') ?></legend>
        <?php
            echo $this->Form->control('nome');
            echo $this->Form->control('username');
            echo $this->Form->control('password');
            echo $this->Form->control('email');
            echo $this->Form->input('status',['options' => ['1' => 'ativo','0' => 'inativo']]);
            //echo $this->Form->control('criado_por');
            //echo $this->Form->control('modificado_por');
        ?>
    </fieldset>
    <?php echo $this->Form->button('<i class="icon-eraser"></i> Limpar',['class'=>'btn btn-warning','type'=>'reset']); ?>
    <?= $this->Form->button(__('Salvar')) ?>
    <?= $this->Form->end() ?>
</div>
