<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Batida $batida
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Batida'), ['action' => 'edit', $batida->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Batida'), ['action' => 'delete', $batida->id], ['confirm' => __('Are you sure you want to delete # {0}?', $batida->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Batidas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Batida'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Funcionarios'), ['controller' => 'Funcionarios', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Funcionario'), ['controller' => 'Funcionarios', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="batidas view large-9 medium-8 columns content">
    <h3><?= h($batida->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Funcionario') ?></th>
            <td><?= $batida->has('funcionario') ? $this->Html->link($batida->funcionario->id, ['controller' => 'Funcionarios', 'action' => 'view', $batida->funcionario->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($batida->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($batida->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Criado Por') ?></th>
            <td><?= $this->Number->format($batida->criado_por) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modificado Por') ?></th>
            <td><?= $this->Number->format($batida->modificado_por) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Apuracao Importacao Id') ?></th>
            <td><?= $this->Number->format($batida->apuracao_importacao_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Batida Ajuste Id') ?></th>
            <td><?= $this->Number->format($batida->batida_ajuste_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($batida->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($batida->modified) ?></td>
        </tr>
    </table>
</div>
