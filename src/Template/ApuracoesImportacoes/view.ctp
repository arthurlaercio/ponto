<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ApuracoesImportaco $apuracoesImportaco
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Apuracoes Importaco'), ['action' => 'edit', $apuracoesImportaco->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Apuracoes Importaco'), ['action' => 'delete', $apuracoesImportaco->id], ['confirm' => __('Are you sure you want to delete # {0}?', $apuracoesImportaco->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Apuracoes Importacoes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Apuracoes Importaco'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Relogios'), ['controller' => 'Relogios', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Relogio'), ['controller' => 'Relogios', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="apuracoesImportacoes view large-9 medium-8 columns content">
    <h3><?= h($apuracoesImportaco->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Relogio') ?></th>
            <td><?= $apuracoesImportaco->has('relogio') ? $this->Html->link($apuracoesImportaco->relogio->nome, ['controller' => 'Relogios', 'action' => 'view', $apuracoesImportaco->relogio->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Arquivo Nome') ?></th>
            <td><?= h($apuracoesImportaco->arquivo_nome) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($apuracoesImportaco->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Apuracao Periodo Id') ?></th>
            <td><?= $this->Number->format($apuracoesImportaco->apuracao_periodo_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Arquivo Tamanho') ?></th>
            <td><?= $this->Number->format($apuracoesImportaco->arquivo_tamanho) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Criado Por') ?></th>
            <td><?= $this->Number->format($apuracoesImportaco->criado_por) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modificado Por') ?></th>
            <td><?= $this->Number->format($apuracoesImportaco->modificado_por) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($apuracoesImportaco->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($apuracoesImportaco->modified) ?></td>
        </tr>
    </table>
</div>
