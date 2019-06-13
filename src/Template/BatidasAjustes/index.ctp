<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BatidasAjuste[]|\Cake\Collection\CollectionInterface $batidasAjustes
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Batidas Ajuste'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="batidasAjustes index large-9 medium-8 columns content">
    <h3><?= __('Batidas Ajustes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('motivo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('criado_por') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modificado_por') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($batidasAjustes as $batidasAjuste): ?>
            <tr>
                <td><?= $this->Number->format($batidasAjuste->id) ?></td>
                <td><?= h($batidasAjuste->motivo) ?></td>
                <td><?= $this->Number->format($batidasAjuste->status) ?></td>
                <td><?= $this->Number->format($batidasAjuste->criado_por) ?></td>
                <td><?= h($batidasAjuste->created) ?></td>
                <td><?= $this->Number->format($batidasAjuste->modificado_por) ?></td>
                <td><?= h($batidasAjuste->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $batidasAjuste->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $batidasAjuste->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $batidasAjuste->id], ['confirm' => __('Are you sure you want to delete # {0}?', $batidasAjuste->id)]) ?>
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
