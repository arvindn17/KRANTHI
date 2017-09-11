<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\RoleAdminCapability[]|\Cake\Collection\CollectionInterface $roleAdminCapabilities
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Role Admin Capability'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="roleAdminCapabilities index large-9 medium-8 columns content">
    <?= $this->Flash->render() ?>
    <h3><?= __('Role Admin Capabilities') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('role_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('admin_capability_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($roleAdminCapabilities as $roleAdminCapability): ?>
            <tr>
                <td><?= $this->Number->format($roleAdminCapability->id) ?></td>
                <td><?= $roleAdminCapability->has('role') ? $this->Html->link($roleAdminCapability->role->role, ['controller' => 'Roles', 'action' => 'view', $roleAdminCapability->role->id]) : '' ?></td>
                <td><?= $roleAdminCapability->has('admin_capability') ? $this->Html->link($roleAdminCapability->admin_capability->slug, ['controller' => 'AdminCapabilities', 'action' => 'view', $roleAdminCapability->admin_capability->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $roleAdminCapability->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $roleAdminCapability->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $roleAdminCapability->id], ['confirm' => __('Are you sure you want to delete # {0}?', $roleAdminCapability->id)]) ?>
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
