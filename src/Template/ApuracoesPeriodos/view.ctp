<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ApuracoesPeriodo $apuracoesPeriodo
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Apuracoes Periodo'), ['action' => 'edit', $apuracoesPeriodo->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Apuracoes Periodo'), ['action' => 'delete', $apuracoesPeriodo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $apuracoesPeriodo->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Apuracoes Periodos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Apuracoes Periodo'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="apuracoesPeriodos view large-9 medium-8 columns content">
    <h3><?= h($apuracoesPeriodo->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nome') ?></th>
            <td><?= h($apuracoesPeriodo->nome) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data Encerra') ?></th>
            <td><?= h($apuracoesPeriodo->data_encerra) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data Inicio') ?></th>
            <td><?= h($apuracoesPeriodo->data_inicio) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data Fim') ?></th>
            <td><?= h($apuracoesPeriodo->data_fim) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $apuracoesPeriodo->has('user') ? $this->Html->link($apuracoesPeriodo->user->username, ['controller' => 'Users', 'action' => 'view', $apuracoesPeriodo->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($apuracoesPeriodo->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($apuracoesPeriodo->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modificado Por') ?></th>
            <td><?= $this->Number->format($apuracoesPeriodo->modificado_por) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($apuracoesPeriodo->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($apuracoesPeriodo->modified) ?></td>
        </tr>
    </table>
</div>
