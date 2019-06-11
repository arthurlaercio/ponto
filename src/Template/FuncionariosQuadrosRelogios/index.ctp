<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FuncionariosQuadrosRelogio[]|\Cake\Collection\CollectionInterface $funcionariosQuadrosRelogios
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Funcionarios Quadros Relogio'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Funcionarios'), ['controller' => 'Funcionarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Funcionario'), ['controller' => 'Funcionarios', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Relogios'), ['controller' => 'Relogios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Relogio'), ['controller' => 'Relogios', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="funcionariosQuadrosRelogios index large-9 medium-8 columns content">
    <h3><?= __('Funcionarios Quadros Relogios') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('funcionario_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('relogio_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('quadro_hora_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cartao_ponto') ?></th>
                <th scope="col"><?= $this->Paginator->sort('data_inicio') ?></th>
                <th scope="col"><?= $this->Paginator->sort('data_fim') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('criado_por') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modificado_por') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($funcionariosQuadrosRelogios as $funcionariosQuadrosRelogio): ?>
            <tr>
                <td><?= $this->Number->format($funcionariosQuadrosRelogio->id) ?></td>
                <td><?= $funcionariosQuadrosRelogio->has('funcionario') ? $this->Html->link($funcionariosQuadrosRelogio->funcionario->id, ['controller' => 'Funcionarios', 'action' => 'view', $funcionariosQuadrosRelogio->funcionario->id]) : '' ?></td>
                <td><?= $funcionariosQuadrosRelogio->has('relogio') ? $this->Html->link($funcionariosQuadrosRelogio->relogio->id, ['controller' => 'Relogios', 'action' => 'view', $funcionariosQuadrosRelogio->relogio->id]) : '' ?></td>
                <td><?= $this->Number->format($funcionariosQuadrosRelogio->quadro_hora_id) ?></td>
                <td><?= h($funcionariosQuadrosRelogio->cartao_ponto) ?></td>
                <td><?= h($funcionariosQuadrosRelogio->data_inicio) ?></td>
                <td><?= h($funcionariosQuadrosRelogio->data_fim) ?></td>
                <td><?= $this->Number->format($funcionariosQuadrosRelogio->status) ?></td>
                <td><?= $this->Number->format($funcionariosQuadrosRelogio->criado_por) ?></td>
                <td><?= h($funcionariosQuadrosRelogio->created) ?></td>
                <td><?= $this->Number->format($funcionariosQuadrosRelogio->modificado_por) ?></td>
                <td><?= h($funcionariosQuadrosRelogio->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $funcionariosQuadrosRelogio->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $funcionariosQuadrosRelogio->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $funcionariosQuadrosRelogio->id], ['confirm' => __('Are you sure you want to delete # {0}?', $funcionariosQuadrosRelogio->id)]) ?>
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
