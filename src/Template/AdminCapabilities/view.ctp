<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\AdminCapability $adminCapability
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Admin Capability'), ['action' => 'edit', $adminCapability->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Admin Capability'), ['action' => 'delete', $adminCapability->id], ['confirm' => __('Are you sure you want to delete # {0}?', $adminCapability->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Admin Capabilities'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Admin Capability'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Role Admin Capabilities'), ['controller' => 'RoleAdminCapabilities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Role Admin Capability'), ['controller' => 'RoleAdminCapabilities', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="adminCapabilities view large-9 medium-8 columns content">
    <h3><?= h($adminCapability->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Slug') ?></th>
            <td><?= h($adminCapability->slug) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($adminCapability->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($adminCapability->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Role Admin Capabilities') ?></h4>
        <?php if (!empty($adminCapability->role_admin_capabilities)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Role Id') ?></th>
                <th scope="col"><?= __('Admin Capability Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($adminCapability->role_admin_capabilities as $roleAdminCapabilities): ?>
            <tr>
                <td><?= h($roleAdminCapabilities->id) ?></td>
                <td><?= h($roleAdminCapabilities->role_id) ?></td>
                <td><?= h($roleAdminCapabilities->admin_capability_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'RoleAdminCapabilities', 'action' => 'view', $roleAdminCapabilities->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'RoleAdminCapabilities', 'action' => 'edit', $roleAdminCapabilities->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'RoleAdminCapabilities', 'action' => 'delete', $roleAdminCapabilities->id], ['confirm' => __('Are you sure you want to delete # {0}?', $roleAdminCapabilities->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
