<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Status $status
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Status'), ['action' => 'edit', $status->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Status'), ['action' => 'delete', $status->id], ['confirm' => __('Are you sure you want to delete # {0}?', $status->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Statuses'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Status'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Invoice Datas'), ['controller' => 'InvoiceDatas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Invoice Data'), ['controller' => 'InvoiceDatas', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="statuses view large-9 medium-8 columns content">
    <h3><?= h($status->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Status Name') ?></th>
            <td><?= h($status->status_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($status->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sort Order') ?></th>
            <td><?= $this->Number->format($status->sort_order) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Invoice Datas') ?></h4>
        <?php if (!empty($status->invoice_datas)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('District') ?></th>
                <th scope="col"><?= __('Pincode') ?></th>
                <th scope="col"><?= __('Invoice Number') ?></th>
                <th scope="col"><?= __('Date') ?></th>
                <th scope="col"><?= __('Vehicle Number') ?></th>
                <th scope="col"><?= __('Starting Reding') ?></th>
                <th scope="col"><?= __('Ending Reding') ?></th>
                <th scope="col"><?= __('Number Of Kilometers') ?></th>
                <th scope="col"><?= __('Number Of Animals') ?></th>
                <th scope="col"><?= __('Rupees Per Kilometer') ?></th>
                <th scope="col"><?= __('Total Amount') ?></th>
                <th scope="col"><?= __('Starting Point') ?></th>
                <th scope="col"><?= __('Ending Point') ?></th>
                <th scope="col"><?= __('Status Id') ?></th>
                <th scope="col"><?= __('Creation Date') ?></th>
                <th scope="col"><?= __('Modification Date') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($status->invoice_datas as $invoiceDatas): ?>
            <tr>
                <td><?= h($invoiceDatas->id) ?></td>
                <td><?= h($invoiceDatas->district) ?></td>
                <td><?= h($invoiceDatas->pincode) ?></td>
                <td><?= h($invoiceDatas->invoice_number) ?></td>
                <td><?= h($invoiceDatas->date) ?></td>
                <td><?= h($invoiceDatas->vehicle_number) ?></td>
                <td><?= h($invoiceDatas->starting_reding) ?></td>
                <td><?= h($invoiceDatas->ending_reding) ?></td>
                <td><?= h($invoiceDatas->number_of_kilometers) ?></td>
                <td><?= h($invoiceDatas->number_of_animals) ?></td>
                <td><?= h($invoiceDatas->rupees_per_kilometer) ?></td>
                <td><?= h($invoiceDatas->total_amount) ?></td>
                <td><?= h($invoiceDatas->starting_point) ?></td>
                <td><?= h($invoiceDatas->ending_point) ?></td>
                <td><?= h($invoiceDatas->status_id) ?></td>
                <td><?= h($invoiceDatas->creation_date) ?></td>
                <td><?= h($invoiceDatas->modification_date) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'InvoiceDatas', 'action' => 'view', $invoiceDatas->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'InvoiceDatas', 'action' => 'edit', $invoiceDatas->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'InvoiceDatas', 'action' => 'delete', $invoiceDatas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $invoiceDatas->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
