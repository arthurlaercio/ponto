<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Batida $batida
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $batida->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $batida->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Batidas'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Funcionarios'), ['controller' => 'Funcionarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Funcionario'), ['controller' => 'Funcionarios', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="batidas form large-9 medium-8 columns content">
    <?= $this->Form->create($batida) ?>
    <fieldset>
        <legend><?= __('Edit Batida') ?></legend>
        <?php
            echo $this->Form->control('funcionario_id', ['options' => $funcionarios]);
            echo $this->Form->control('status');
            echo $this->Form->control('criado_por');
            echo $this->Form->control('modificado_por');
            echo $this->Form->control('apuracao_importacao_id');
            echo $this->Form->control('batida_ajuste_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
