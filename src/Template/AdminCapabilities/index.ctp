<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\AdminCapability[]|\Cake\Collection\CollectionInterface $adminCapabilities
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Admin Capability'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Role Admin Capabilities'), ['controller' => 'RoleAdminCapabilities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Role Admin Capability'), ['controller' => 'RoleAdminCapabilities', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="adminCapabilities index large-9 medium-8 columns content">
    <h3><?= __('Admin Capabilities') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('slug') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($adminCapabilities as $adminCapability): ?>
            <tr>
                <td><?= $this->Number->format($adminCapability->id) ?></td>
                <td><?= h($adminCapability->slug) ?></td>
                <td><?= h($adminCapability->description) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $adminCapability->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $adminCapability->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $adminCapability->id], ['confirm' => __('Are you sure you want to delete # {0}?', $adminCapability->id)]) ?>
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
