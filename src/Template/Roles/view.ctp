<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Role $role
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Role'), ['action' => 'edit', $role->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Role'), ['action' => 'delete', $role->id], ['confirm' => __('Are you sure you want to delete # {0}?', $role->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Roles'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Role'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Admin Users'), ['controller' => 'AdminUsers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Admin User'), ['controller' => 'AdminUsers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Role Admin Capabilities'), ['controller' => 'RoleAdminCapabilities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Role Admin Capability'), ['controller' => 'RoleAdminCapabilities', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="roles view large-9 medium-8 columns content">
    <h3><?= h($role->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Role') ?></th>
            <td><?= h($role->role) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Role Desc') ?></th>
            <td><?= h($role->role_desc) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($role->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Admin Users') ?></h4>
        <?php if (!empty($role->admin_users)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Password') ?></th>
                <th scope="col"><?= __('Role Id') ?></th>
                <th scope="col"><?= __('Creation Date') ?></th>
                <th scope="col"><?= __('Modification Date') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($role->admin_users as $adminUsers): ?>
            <tr>
                <td><?= h($adminUsers->id) ?></td>
                <td><?= h($adminUsers->name) ?></td>
                <td><?= h($adminUsers->email) ?></td>
                <td><?= h($adminUsers->password) ?></td>
                <td><?= h($adminUsers->role_id) ?></td>
                <td><?= h($adminUsers->creation_date) ?></td>
                <td><?= h($adminUsers->modification_date) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'AdminUsers', 'action' => 'view', $adminUsers->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'AdminUsers', 'action' => 'edit', $adminUsers->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'AdminUsers', 'action' => 'delete', $adminUsers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $adminUsers->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Role Admin Capabilities') ?></h4>
        <?php if (!empty($role->role_admin_capabilities)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Role Id') ?></th>
                <th scope="col"><?= __('Admin Capability Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($role->role_admin_capabilities as $roleAdminCapabilities): ?>
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
