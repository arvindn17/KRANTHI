<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $invoice->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $invoice->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Invoices'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="invoices form large-9 medium-8 columns content">
    <?= $this->Form->create($invoice) ?>
    <fieldset>
        <legend><?= __('Edit Invoice') ?></legend>
        <?php
            echo $this->Form->control('invoice_key');
            echo $this->Form->control('invoice_data');
            echo $this->Form->control('reg_date');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
