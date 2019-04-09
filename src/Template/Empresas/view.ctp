<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Empresa $empresa
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Empresa'), ['action' => 'edit', $empresa->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Empresa'), ['action' => 'delete', $empresa->id], ['confirm' => __('Are you sure you want to delete # {0}?', $empresa->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Empresas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Empresa'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Funcionarios'), ['controller' => 'Funcionarios', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Funcionario'), ['controller' => 'Funcionarios', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="empresas view large-9 medium-8 columns content">
    <h3><?= h($empresa->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nome') ?></th>
            <td><?= h($empresa->nome) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cnpj') ?></th>
            <td><?= h($empresa->cnpj) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Endereco') ?></th>
            <td><?= h($empresa->endereco) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($empresa->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($empresa->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Criado Por') ?></th>
            <td><?= $this->Number->format($empresa->criado_por) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modificado Por') ?></th>
            <td><?= $this->Number->format($empresa->modificado_por) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($empresa->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($empresa->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Funcionarios') ?></h4>
        <?php if (!empty($empresa->funcionarios)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Users Id') ?></th>
                <th scope="col"><?= __('Empresa Id') ?></th>
                <th scope="col"><?= __('Nome') ?></th>
                <th scope="col"><?= __('Endereco') ?></th>
                <th scope="col"><?= __('Cpf') ?></th>
                <th scope="col"><?= __('Rg') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Telefone') ?></th>
                <th scope="col"><?= __('Data Nascimento') ?></th>
                <th scope="col"><?= __('Sexo') ?></th>
                <th scope="col"><?= __('Pis') ?></th>
                <th scope="col"><?= __('Ctps Numero') ?></th>
                <th scope="col"><?= __('Ctps Serie') ?></th>
                <th scope="col"><?= __('Ctps Uf') ?></th>
                <th scope="col"><?= __('Data Admissao') ?></th>
                <th scope="col"><?= __('Data Demissao') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Criado Por') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modificado Por') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($empresa->funcionarios as $funcionarios): ?>
            <tr>
                <td><?= h($funcionarios->id) ?></td>
                <td><?= h($funcionarios->users_id) ?></td>
                <td><?= h($funcionarios->empresa_id) ?></td>
                <td><?= h($funcionarios->nome) ?></td>
                <td><?= h($funcionarios->endereco) ?></td>
                <td><?= h($funcionarios->cpf) ?></td>
                <td><?= h($funcionarios->rg) ?></td>
                <td><?= h($funcionarios->email) ?></td>
                <td><?= h($funcionarios->telefone) ?></td>
                <td><?= h($funcionarios->data_nascimento) ?></td>
                <td><?= h($funcionarios->sexo) ?></td>
                <td><?= h($funcionarios->pis) ?></td>
                <td><?= h($funcionarios->ctps_numero) ?></td>
                <td><?= h($funcionarios->ctps_serie) ?></td>
                <td><?= h($funcionarios->ctps_uf) ?></td>
                <td><?= h($funcionarios->data_admissao) ?></td>
                <td><?= h($funcionarios->data_demissao) ?></td>
                <td><?= h($funcionarios->status) ?></td>
                <td><?= h($funcionarios->criado_por) ?></td>
                <td><?= h($funcionarios->created) ?></td>
                <td><?= h($funcionarios->modificado_por) ?></td>
                <td><?= h($funcionarios->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Funcionarios', 'action' => 'view', $funcionarios->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Funcionarios', 'action' => 'edit', $funcionarios->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Funcionarios', 'action' => 'delete', $funcionarios->id], ['confirm' => __('Are you sure you want to delete # {0}?', $funcionarios->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
