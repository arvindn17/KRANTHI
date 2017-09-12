<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\AdminUser[]|\Cake\Collection\CollectionInterface $adminUsers
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Admin User'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="adminUsers index large-9 medium-8 columns content">
    <?= $this->Flash->render() ?>
    <h3><?= __('Admin Users') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('role_id') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('creation_date') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($adminUsers as $adminUser): ?>
            <tr>
                <td><?= $this->Number->format($adminUser->id) ?></td>
                <td><?= h($adminUser->name) ?></td>
                <td><?= h($adminUser->email) ?></td>
                <td><?= $adminUser->has('role') ? $this->Html->link($adminUser->role->role, ['controller' => 'Roles', 'action' => 'view', $adminUser->role->id]) : '' ?></td>
                <td><?= h($adminUser->status->status_name) ?></td>
                <td><?= h(($adminUser->creation_date)) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $adminUser->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $adminUser->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $adminUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $adminUser->id)]) ?>
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
