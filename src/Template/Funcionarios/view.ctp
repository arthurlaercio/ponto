<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Funcionario $funcionario
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Funcionario'), ['action' => 'edit', $funcionario->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Funcionario'), ['action' => 'delete', $funcionario->id], ['confirm' => __('Are you sure you want to delete # {0}?', $funcionario->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Funcionarios'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Funcionario'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Empresas'), ['controller' => 'Empresas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Empresa'), ['controller' => 'Empresas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Batidas'), ['controller' => 'Batidas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Batida'), ['controller' => 'Batidas', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="funcionarios view large-9 medium-8 columns content">
    <h3><?= h($funcionario->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $funcionario->has('user') ? $this->Html->link($funcionario->user->id, ['controller' => 'Users', 'action' => 'view', $funcionario->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Empresa') ?></th>
            <td><?= $funcionario->has('empresa') ? $this->Html->link($funcionario->empresa->id, ['controller' => 'Empresas', 'action' => 'view', $funcionario->empresa->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nome') ?></th>
            <td><?= h($funcionario->nome) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Endereco') ?></th>
            <td><?= h($funcionario->endereco) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cpf') ?></th>
            <td><?= h($funcionario->cpf) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rg') ?></th>
            <td><?= h($funcionario->rg) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($funcionario->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Telefone') ?></th>
            <td><?= h($funcionario->telefone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sexo') ?></th>
            <td><?= h($funcionario->sexo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pis') ?></th>
            <td><?= h($funcionario->pis) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ctps Numero') ?></th>
            <td><?= h($funcionario->ctps_numero) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ctps Serie') ?></th>
            <td><?= h($funcionario->ctps_serie) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ctps Uf') ?></th>
            <td><?= h($funcionario->ctps_uf) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($funcionario->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($funcionario->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Criado Por') ?></th>
            <td><?= $this->Number->format($funcionario->criado_por) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modificado Por') ?></th>
            <td><?= $this->Number->format($funcionario->modificado_por) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data Nascimento') ?></th>
            <td><?= h($funcionario->data_nascimento) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data Admissao') ?></th>
            <td><?= h($funcionario->data_admissao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data Demissao') ?></th>
            <td><?= h($funcionario->data_demissao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($funcionario->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($funcionario->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Batidas') ?></h4>
        <?php if (!empty($funcionario->batidas)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Funcionario Id') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Criado Por') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modificado Por') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($funcionario->batidas as $batidas): ?>
            <tr>
                <td><?= h($batidas->id) ?></td>
                <td><?= h($batidas->funcionario_id) ?></td>
                <td><?= h($batidas->status) ?></td>
                <td><?= h($batidas->criado_por) ?></td>
                <td><?= h($batidas->created) ?></td>
                <td><?= h($batidas->modificado_por) ?></td>
                <td><?= h($batidas->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Batidas', 'action' => 'view', $batidas->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Batidas', 'action' => 'edit', $batidas->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Batidas', 'action' => 'delete', $batidas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $batidas->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
