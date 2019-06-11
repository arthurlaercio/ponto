<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FuncionariosQuadrosRelogio $funcionariosQuadrosRelogio
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Funcionarios Quadros Relogio'), ['action' => 'edit', $funcionariosQuadrosRelogio->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Funcionarios Quadros Relogio'), ['action' => 'delete', $funcionariosQuadrosRelogio->id], ['confirm' => __('Are you sure you want to delete # {0}?', $funcionariosQuadrosRelogio->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Funcionarios Quadros Relogios'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Funcionarios Quadros Relogio'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Funcionarios'), ['controller' => 'Funcionarios', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Funcionario'), ['controller' => 'Funcionarios', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Relogios'), ['controller' => 'Relogios', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Relogio'), ['controller' => 'Relogios', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="funcionariosQuadrosRelogios view large-9 medium-8 columns content">
    <h3><?= h($funcionariosQuadrosRelogio->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Funcionario') ?></th>
            <td><?= $funcionariosQuadrosRelogio->has('funcionario') ? $this->Html->link($funcionariosQuadrosRelogio->funcionario->id, ['controller' => 'Funcionarios', 'action' => 'view', $funcionariosQuadrosRelogio->funcionario->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Relogio') ?></th>
            <td><?= $funcionariosQuadrosRelogio->has('relogio') ? $this->Html->link($funcionariosQuadrosRelogio->relogio->id, ['controller' => 'Relogios', 'action' => 'view', $funcionariosQuadrosRelogio->relogio->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cartao Ponto') ?></th>
            <td><?= h($funcionariosQuadrosRelogio->cartao_ponto) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($funcionariosQuadrosRelogio->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quadro Hora Id') ?></th>
            <td><?= $this->Number->format($funcionariosQuadrosRelogio->quadro_hora_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($funcionariosQuadrosRelogio->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Criado Por') ?></th>
            <td><?= $this->Number->format($funcionariosQuadrosRelogio->criado_por) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modificado Por') ?></th>
            <td><?= $this->Number->format($funcionariosQuadrosRelogio->modificado_por) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data Inicio') ?></th>
            <td><?= h($funcionariosQuadrosRelogio->data_inicio) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data Fim') ?></th>
            <td><?= h($funcionariosQuadrosRelogio->data_fim) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($funcionariosQuadrosRelogio->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($funcionariosQuadrosRelogio->modified) ?></td>
        </tr>
    </table>
</div>
