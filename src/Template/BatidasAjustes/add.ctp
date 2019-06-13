<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BatidasAjuste $batidasAjuste
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Batidas Ajustes'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="batidasAjustes form large-9 medium-8 columns content">
    <?= $this->Form->create($batidasAjuste) ?>
    <fieldset>
        <legend><?= __('Add Batidas Ajuste') ?></legend>
        <?php
            echo $this->Form->control('motivo');
            echo $this->Form->control('status');
            echo $this->Form->control('criado_por');
            echo $this->Form->control('modificado_por');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
