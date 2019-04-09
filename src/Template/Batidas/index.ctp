<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Batida[]|\Cake\Collection\CollectionInterface $batidas
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Batida'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Funcionarios'), ['controller' => 'Funcionarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Funcionario'), ['controller' => 'Funcionarios', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="batidas index large-9 medium-8 columns content">
    <h3><?= __('Batidas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('funcionario_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('criado_por') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modificado_por') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($batidas as $batida): ?>
            <tr>
                <td><?= $this->Number->format($batida->id) ?></td>
                <td><?= $batida->has('funcionario') ? $this->Html->link($batida->funcionario->id, ['controller' => 'Funcionarios', 'action' => 'view', $batida->funcionario->id]) : '' ?></td>
                <td><?= $this->Number->format($batida->status) ?></td>
                <td><?= $this->Number->format($batida->criado_por) ?></td>
                <td><?= h($batida->created) ?></td>
                <td><?= $this->Number->format($batida->modificado_por) ?></td>
                <td><?= h($batida->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $batida->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $batida->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $batida->id], ['confirm' => __('Are you sure you want to delete # {0}?', $batida->id)]) ?>
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
