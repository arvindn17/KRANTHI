<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Invoice Datas'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Statuses'), ['controller' => 'Statuses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Status'), ['controller' => 'Statuses', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="invoiceDatas form large-9 medium-8 columns content">
    <?= $this->Form->create($invoiceData) ?>
    <fieldset>
        <legend><?= __('Add Invoice Data') ?></legend>
        <?php
            echo $this->Form->control('district');
            echo $this->Form->control('pincode');
            echo $this->Form->control('invoice_number');
            echo $this->Form->control('date');
            echo $this->Form->control('vehicle_number');
            echo $this->Form->control('starting_reding');
            echo $this->Form->control('ending_reding');
            echo $this->Form->control('number_of_kilometers');
            echo $this->Form->control('number_of_animals');
            echo $this->Form->control('rupees_per_kilometer');
            echo $this->Form->control('total_amount');
            echo $this->Form->control('starting_point');
            echo $this->Form->control('ending_point');
            echo $this->Form->control('status_id', ['options' => $statuses]);
            echo $this->Form->control('creation_date');
            echo $this->Form->control('modification_date', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
