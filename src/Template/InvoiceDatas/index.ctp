<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\InvoiceData[]|\Cake\Collection\CollectionInterface $invoiceDatas
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Invoice Data'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Statuses'), ['controller' => 'Statuses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Status'), ['controller' => 'Statuses', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="invoiceDatas index large-9 medium-8 columns content">
    <h3><?= __('Invoice Datas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('district') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pincode') ?></th>
                <th scope="col"><?= $this->Paginator->sort('invoice_number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('vehicle_number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('starting_reding') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ending_reding') ?></th>
                <th scope="col"><?= $this->Paginator->sort('number_of_kilometers') ?></th>
                <th scope="col"><?= $this->Paginator->sort('number_of_animals') ?></th>
                <th scope="col"><?= $this->Paginator->sort('rupees_per_kilometer') ?></th>
                <th scope="col"><?= $this->Paginator->sort('total_amount') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('creation_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modification_date') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($invoiceDatas as $invoiceData): ?>
            <tr>
                <td><?= $this->Number->format($invoiceData->id) ?></td>
                <td><?= h($invoiceData->district) ?></td>
                <td><?= h($invoiceData->pincode) ?></td>
                <td><?= h($invoiceData->invoice_number) ?></td>
                <td><?= h($invoiceData->date) ?></td>
                <td><?= h($invoiceData->vehicle_number) ?></td>
                <td><?= h($invoiceData->starting_reding) ?></td>
                <td><?= h($invoiceData->ending_reding) ?></td>
                <td><?= h($invoiceData->number_of_kilometers) ?></td>
                <td><?= h($invoiceData->number_of_animals) ?></td>
                <td><?= $this->Number->format($invoiceData->rupees_per_kilometer) ?></td>
                <td><?= $this->Number->format($invoiceData->total_amount) ?></td>
                <td><?= $invoiceData->has('status') ? $this->Html->link($invoiceData->status->id, ['controller' => 'Statuses', 'action' => 'view', $invoiceData->status->id]) : '' ?></td>
                <td><?= h($invoiceData->creation_date) ?></td>
                <td><?= h($invoiceData->modification_date) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $invoiceData->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $invoiceData->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $invoiceData->id], ['confirm' => __('Are you sure you want to delete # {0}?', $invoiceData->id)]) ?>
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