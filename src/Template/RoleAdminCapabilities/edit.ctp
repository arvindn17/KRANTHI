<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $roleAdminCapability->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $roleAdminCapability->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Role Admin Capabilities'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Admin Capabilities'), ['controller' => 'AdminCapabilities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Admin Capability'), ['controller' => 'AdminCapabilities', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="roleAdminCapabilities form large-9 medium-8 columns content">
    <?= $this->Form->create($roleAdminCapability) ?>
    <fieldset>
        <legend><?= __('Edit Role Admin Capability') ?></legend>
        <?php
            echo $this->Form->control('role_id', ['options' => $roles]);
            echo $this->Form->control('admin_capability_id', ['options' => $adminCapabilities]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
