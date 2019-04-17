<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Menu') ?></li>
        <li><?= $this->Html->link(__('Novo Usuário'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="users index large-9 medium-8 columns content">
    <h3><?= __('Usuários') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nome') ?></th>
                <th scope="col"><?= $this->Paginator->sort('username') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
                <?php /* <!--<th scope="col"><?= $this->Paginator->sort('criado_por') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modificado_por') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>-->*/?>
                  
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $this->Number->format($user->id) ?></td>
                <td><?= h($user->nome) ?></td>
                <td><?= h($user->username) ?></td>
                <td><?= h($user->email) ?></td>
                <td><?php if($user->status == 1) echo "ativo"; else echo "inativo" ?></td>
                <?php /*<!--<td><?= $this->Number->format($user->criado_por) ?></td>
                <td><?= h($user->created) ?></td>
                <td><?= $this->Number->format($user->modificado_por) ?></td>
                <td><?= h($user->modified) ?></td> --> */?>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $user->id]) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $user->id]) ?>
                    <?= $this->Form->postLink(__('Deletar'), ['action' => 'delete', $user->id], ['confirm' => __('tem certeza que deseja deletar? # {0}?', $user->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?php //echo $this->Paginator->first('<< ' . __('primeiro')) ?>
            <?php echo $this->Paginator->prev('< ' . __('anterior')) ?>
            <?php // echo $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('próximo') . ' >') ?>
            <?php // $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <?php /*<!--<p><?= $this->Paginator->counter(['format' => __('Página {{page}} de {{pages}}, mostrando {{current}}  de {{count}} total')]) ?></p> --> */?>
    </div>
</div>
