<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Relogio $relogio
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Relogio'), ['action' => 'edit', $relogio->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Relogio'), ['action' => 'delete', $relogio->id], ['confirm' => __('Are you sure you want to delete # {0}?', $relogio->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Relogios'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Relogio'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="relogios view large-9 medium-8 columns content">
    <h3><?= h($relogio->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nome') ?></th>
            <td><?= h($relogio->nome) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Serial') ?></th>
            <td><?= h($relogio->serial) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tipo') ?></th>
            <td><?= h($relogio->tipo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($relogio->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($relogio->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Criado Por') ?></th>
            <td><?= $this->Number->format($relogio->criado_por) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modificado Por') ?></th>
            <td><?= $this->Number->format($relogio->modificado_por) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($relogio->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($relogio->modified) ?></td>
        </tr>
    </table>
</div>
