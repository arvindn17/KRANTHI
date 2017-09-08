<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Admin Capabilities'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Role Admin Capabilities'), ['controller' => 'RoleAdminCapabilities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Role Admin Capability'), ['controller' => 'RoleAdminCapabilities', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="adminCapabilities form large-9 medium-8 columns content">
    <?= $this->Form->create($adminCapability) ?>
    <fieldset>
        <legend><?= __('Add Admin Capability') ?></legend>
        <?php
            echo $this->Form->control('slug');
            echo $this->Form->control('description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
