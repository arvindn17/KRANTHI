<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\InvoiceData $invoiceData
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Invoice Data'), ['action' => 'edit', $invoiceData->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Invoice Data'), ['action' => 'delete', $invoiceData->id], ['confirm' => __('Are you sure you want to delete # {0}?', $invoiceData->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Invoice Datas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Invoice Data'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Statuses'), ['controller' => 'Statuses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Status'), ['controller' => 'Statuses', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="invoiceDatas view large-9 medium-8 columns content">
    <h3><?= h($invoiceData->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('District') ?></th>
            <td><?= h($invoiceData->district) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pincode') ?></th>
            <td><?= h($invoiceData->pincode) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Invoice Number') ?></th>
            <td><?= h($invoiceData->invoice_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($invoiceData->date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Vehicle Number') ?></th>
            <td><?= h($invoiceData->vehicle_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Starting Reding') ?></th>
            <td><?= h($invoiceData->starting_reding) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ending Reding') ?></th>
            <td><?= h($invoiceData->ending_reding) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Number Of Kilometers') ?></th>
            <td><?= h($invoiceData->number_of_kilometers) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Number Of Animals') ?></th>
            <td><?= h($invoiceData->number_of_animals) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $invoiceData->has('status') ? $this->Html->link($invoiceData->status->id, ['controller' => 'Statuses', 'action' => 'view', $invoiceData->status->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($invoiceData->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rupees Per Kilometer') ?></th>
            <td><?= $this->Number->format($invoiceData->rupees_per_kilometer) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total Amount') ?></th>
            <td><?= $this->Number->format($invoiceData->total_amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Creation Date') ?></th>
            <td><?= h($invoiceData->creation_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modification Date') ?></th>
            <td><?= h($invoiceData->modification_date) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Starting Point') ?></h4>
        <?= $this->Text->autoParagraph(h($invoiceData->starting_point)); ?>
    </div>
    <div class="row">
        <h4><?= __('Ending Point') ?></h4>
        <?= $this->Text->autoParagraph(h($invoiceData->ending_point)); ?>
    </div>
</div>
