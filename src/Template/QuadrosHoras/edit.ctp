<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\QuadrosHora $quadrosHora
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $quadrosHora->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $quadrosHora->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Quadros Horas'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="quadrosHoras form large-9 medium-8 columns content">
    <?= $this->Form->create($quadrosHora) ?>
    <fieldset>
        <legend><?= __('Edit Quadros Hora') ?></legend>
        <?php
            echo $this->Form->control('hora_entrada');
            echo $this->Form->control('hora_saida');
            echo $this->Form->control('tolerancia', ['empty' => true]);
            echo $this->Form->control('dia');
            echo $this->Form->control('status');
            echo $this->Form->control('criado_por');
            echo $this->Form->control('modificado_por');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
