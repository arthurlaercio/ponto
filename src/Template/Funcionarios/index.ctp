<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Funcionario[]|\Cake\Collection\CollectionInterface $funcionarios
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Funcionario'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Empresas'), ['controller' => 'Empresas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Empresa'), ['controller' => 'Empresas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Batidas'), ['controller' => 'Batidas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Batida'), ['controller' => 'Batidas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="funcionarios index large-9 medium-8 columns content">
    <h3><?= __('Funcionarios') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('users_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('empresa_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nome') ?></th>
                <th scope="col"><?= $this->Paginator->sort('endereco') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cpf') ?></th>
                <th scope="col"><?= $this->Paginator->sort('rg') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('telefone') ?></th>
                <th scope="col"><?= $this->Paginator->sort('data_nascimento') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sexo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pis') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ctps_numero') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ctps_serie') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ctps_uf') ?></th>
                <th scope="col"><?= $this->Paginator->sort('data_admissao') ?></th>
                <th scope="col"><?= $this->Paginator->sort('data_demissao') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('criado_por') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modificado_por') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($funcionarios as $funcionario): ?>
            <tr>
                <td><?= $this->Number->format($funcionario->id) ?></td>
                <td><?= $funcionario->has('user') ? $this->Html->link($funcionario->user->id, ['controller' => 'Users', 'action' => 'view', $funcionario->user->id]) : '' ?></td>
                <td><?= $funcionario->has('empresa') ? $this->Html->link($funcionario->empresa->id, ['controller' => 'Empresas', 'action' => 'view', $funcionario->empresa->id]) : '' ?></td>
                <td><?= h($funcionario->nome) ?></td>
                <td><?= h($funcionario->endereco) ?></td>
                <td><?= h($funcionario->cpf) ?></td>
                <td><?= h($funcionario->rg) ?></td>
                <td><?= h($funcionario->email) ?></td>
                <td><?= h($funcionario->telefone) ?></td>
                <td><?= h($funcionario->data_nascimento) ?></td>
                <td><?= h($funcionario->sexo) ?></td>
                <td><?= h($funcionario->pis) ?></td>
                <td><?= h($funcionario->ctps_numero) ?></td>
                <td><?= h($funcionario->ctps_serie) ?></td>
                <td><?= h($funcionario->ctps_uf) ?></td>
                <td><?= h($funcionario->data_admissao) ?></td>
                <td><?= h($funcionario->data_demissao) ?></td>
                <td><?= $this->Number->format($funcionario->status) ?></td>
                <td><?= $this->Number->format($funcionario->criado_por) ?></td>
                <td><?= h($funcionario->created) ?></td>
                <td><?= $this->Number->format($funcionario->modificado_por) ?></td>
                <td><?= h($funcionario->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $funcionario->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $funcionario->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $funcionario->id], ['confirm' => __('Are you sure you want to delete # {0}?', $funcionario->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
