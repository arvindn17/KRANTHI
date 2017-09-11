<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Role Admin Capabilities'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="roleAdminCapabilities form large-9 medium-8 columns content">
    <?= $this->Flash->render() ?>
    <?= $this->Form->create($roleAdminCapability) ?>
    <fieldset>
        <legend><?= __('Add Role Admin Capability') ?></legend>
        <?php
            echo $this->Form->control('role_id', ['options' => $roles]);
            echo $this->Form->control('admin_capability_id', ['options' => $adminCapabilities]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
