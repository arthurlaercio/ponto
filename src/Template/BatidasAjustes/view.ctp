<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BatidasAjuste $batidasAjuste
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Batidas Ajuste'), ['action' => 'edit', $batidasAjuste->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Batidas Ajuste'), ['action' => 'delete', $batidasAjuste->id], ['confirm' => __('Are you sure you want to delete # {0}?', $batidasAjuste->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Batidas Ajustes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Batidas Ajuste'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="batidasAjustes view large-9 medium-8 columns content">
    <h3><?= h($batidasAjuste->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Motivo') ?></th>
            <td><?= h($batidasAjuste->motivo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($batidasAjuste->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($batidasAjuste->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Criado Por') ?></th>
            <td><?= $this->Number->format($batidasAjuste->criado_por) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modificado Por') ?></th>
            <td><?= $this->Number->format($batidasAjuste->modificado_por) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($batidasAjuste->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($batidasAjuste->modified) ?></td>
        </tr>
    </table>
</div>
