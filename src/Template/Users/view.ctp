<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Menu') ?></li>
        <li><?= $this->Html->link(__('Editar Usuário'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Deletar Usuário'), ['action' => 'delete', $user->id], ['confirm' => __('Tem certeza que deseja deletar o usuário? # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('Listar Usuários'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Criar usuário'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->nome) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Usuário') ?></th>
            <td><?= h($user->username) ?></td>
        </tr>
        <!--<tr>
            <th scope="row"><?= __('Senha') ?></th>
            <td><?php //echo($user->password) ?></td>
        </tr>-->
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?php if($user->status == 1) echo "ativo"; else echo "inativo";?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Criado Por') ?></th>
            <td><?= $this->Number->format($user->criado_por) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modificado Por') ?></th>
            <td><?= $this->Number->format($user->modificado_por) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($user->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($user->modified) ?></td>
        </tr>
    </table>
</div>
