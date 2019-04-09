<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\QuadrosHora[]|\Cake\Collection\CollectionInterface $quadrosHoras
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Quadros Hora'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="quadrosHoras index large-9 medium-8 columns content">
    <h3><?= __('Quadros Horas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('hora_entrada') ?></th>
                <th scope="col"><?= $this->Paginator->sort('hora_saida') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tolerancia') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dia') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('criado_por') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modificado_por') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($quadrosHoras as $quadrosHora): ?>
            <tr>
                <td><?= $this->Number->format($quadrosHora->id) ?></td>
                <td><?= h($quadrosHora->hora_entrada) ?></td>
                <td><?= h($quadrosHora->hora_saida) ?></td>
                <td><?= h($quadrosHora->tolerancia) ?></td>
                <td><?= h($quadrosHora->dia) ?></td>
                <td><?= $this->Number->format($quadrosHora->status) ?></td>
                <td><?= $this->Number->format($quadrosHora->criado_por) ?></td>
                <td><?= h($quadrosHora->created) ?></td>
                <td><?= $this->Number->format($quadrosHora->modificado_por) ?></td>
                <td><?= h($quadrosHora->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $quadrosHora->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $quadrosHora->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $quadrosHora->id], ['confirm' => __('Are you sure you want to delete # {0}?', $quadrosHora->id)]) ?>
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
