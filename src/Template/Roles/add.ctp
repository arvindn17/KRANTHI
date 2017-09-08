<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Roles'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Admin Users'), ['controller' => 'AdminUsers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Admin User'), ['controller' => 'AdminUsers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Role Admin Capabilities'), ['controller' => 'RoleAdminCapabilities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Role Admin Capability'), ['controller' => 'RoleAdminCapabilities', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="roles form large-9 medium-8 columns content">
    <?= $this->Form->create($role) ?>
    <fieldset>
        <legend><?= __('Add Role') ?></legend>
        <?php
            echo $this->Form->control('role');
            echo $this->Form->control('role_desc');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
