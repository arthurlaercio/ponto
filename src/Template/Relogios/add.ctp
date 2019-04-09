<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Relogio $relogio
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Relogios'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="relogios form large-9 medium-8 columns content">
    <?= $this->Form->create($relogio) ?>
    <fieldset>
        <legend><?= __('Add Relogio') ?></legend>
        <?php
            echo $this->Form->control('nome');
            echo $this->Form->control('serial');
            echo $this->Form->control('tipo');
            echo $this->Form->control('status');
            echo $this->Form->control('criado_por');
            echo $this->Form->control('modificado_por');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
