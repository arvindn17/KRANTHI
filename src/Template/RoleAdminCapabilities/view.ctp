<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\RoleAdminCapability $roleAdminCapability
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Role Admin Capability'), ['action' => 'edit', $roleAdminCapability->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Role Admin Capability'), ['action' => 'delete', $roleAdminCapability->id], ['confirm' => __('Are you sure you want to delete # {0}?', $roleAdminCapability->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Role Admin Capabilities'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Role Admin Capability'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Admin Capabilities'), ['controller' => 'AdminCapabilities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Admin Capability'), ['controller' => 'AdminCapabilities', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="roleAdminCapabilities view large-9 medium-8 columns content">
    <h3><?= h($roleAdminCapability->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Role') ?></th>
            <td><?= $roleAdminCapability->has('role') ? $this->Html->link($roleAdminCapability->role->id, ['controller' => 'Roles', 'action' => 'view', $roleAdminCapability->role->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Admin Capability') ?></th>
            <td><?= $roleAdminCapability->has('admin_capability') ? $this->Html->link($roleAdminCapability->admin_capability->id, ['controller' => 'AdminCapabilities', 'action' => 'view', $roleAdminCapability->admin_capability->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($roleAdminCapability->id) ?></td>
        </tr>
    </table>
</div>
