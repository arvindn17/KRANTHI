<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Statuses'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Invoice Datas'), ['controller' => 'InvoiceDatas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Invoice Data'), ['controller' => 'InvoiceDatas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="statuses form large-9 medium-8 columns content">
    <?= $this->Form->create($status) ?>
    <fieldset>
        <legend><?= __('Add Status') ?></legend>
        <?php
            echo $this->Form->control('status_name');
            echo $this->Form->control('sort_order');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
