<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ApuracoesImportaco[]|\Cake\Collection\CollectionInterface $apuracoesImportacoes
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Apuracoes Importaco'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Relogios'), ['controller' => 'Relogios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Relogio'), ['controller' => 'Relogios', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="apuracoesImportacoes index large-9 medium-8 columns content">
    <h3><?= __('Apuracoes Importacoes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('relogio_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('apuracao_periodo_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('arquivo_nome') ?></th>
                <th scope="col"><?= $this->Paginator->sort('arquivo_tamanho') ?></th>
                <th scope="col"><?= $this->Paginator->sort('criado_por') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modificado_por') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($apuracoesImportacoes as $apuracoesImportaco): ?>
            <tr>
                <td><?= $this->Number->format($apuracoesImportaco->id) ?></td>
                <td><?= $apuracoesImportaco->has('relogio') ? $this->Html->link($apuracoesImportaco->relogio->nome, ['controller' => 'Relogios', 'action' => 'view', $apuracoesImportaco->relogio->id]) : '' ?></td>
                <td><?= $this->Number->format($apuracoesImportaco->apuracao_periodo_id) ?></td>
                <td><?= h($apuracoesImportaco->arquivo_nome) ?></td>
                <td><?= $this->Number->format($apuracoesImportaco->arquivo_tamanho) ?></td>
                <td><?= $this->Number->format($apuracoesImportaco->criado_por) ?></td>
                <td><?= h($apuracoesImportaco->created) ?></td>
                <td><?= $this->Number->format($apuracoesImportaco->modificado_por) ?></td>
                <td><?= h($apuracoesImportaco->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $apuracoesImportaco->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $apuracoesImportaco->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $apuracoesImportaco->id], ['confirm' => __('Are you sure you want to delete # {0}?', $apuracoesImportaco->id)]) ?>
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
