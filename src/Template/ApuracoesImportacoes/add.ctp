<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ApuracoesImportaco $apuracoesImportaco
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Apuracoes Importacoes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Relogios'), ['controller' => 'Relogios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Relogio'), ['controller' => 'Relogios', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="apuracoesImportacoes form large-9 medium-8 columns content">
    <?= $this->Form->create($apuracoesImportaco) ?>
    <fieldset>
        <legend><?= __('Add Apuracoes Importaco') ?></legend>
        <?php
            echo $this->Form->control('relogio_id', ['options' => $relogios]);
            echo $this->Form->control('apuracao_periodo_id');
            echo $this->Form->control('arquivo_nome');
            echo $this->Form->control('arquivo_tamanho');
            echo $this->Form->control('criado_por');
            echo $this->Form->control('modificado_por');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
