<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\QuadrosHora $quadrosHora
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Quadros Hora'), ['action' => 'edit', $quadrosHora->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Quadros Hora'), ['action' => 'delete', $quadrosHora->id], ['confirm' => __('Are you sure you want to delete # {0}?', $quadrosHora->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Quadros Horas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Quadros Hora'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="quadrosHoras view large-9 medium-8 columns content">
    <h3><?= h($quadrosHora->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Dia') ?></th>
            <td><?= h($quadrosHora->dia) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($quadrosHora->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($quadrosHora->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Criado Por') ?></th>
            <td><?= $this->Number->format($quadrosHora->criado_por) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modificado Por') ?></th>
            <td><?= $this->Number->format($quadrosHora->modificado_por) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hora Entrada') ?></th>
            <td><?= h($quadrosHora->hora_entrada) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hora Saida') ?></th>
            <td><?= h($quadrosHora->hora_saida) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tolerancia') ?></th>
            <td><?= h($quadrosHora->tolerancia) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($quadrosHora->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($quadrosHora->modified) ?></td>
        </tr>
    </table>
</div>
