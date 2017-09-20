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
                ['action' => 'delete', $adminCapability->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $adminCapability->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Admin Capabilities'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="adminCapabilities form large-9 medium-8 columns content">
    <?= $this->Flash->render() ?>
    <?= $this->Form->create($adminCapability) ?>
    <fieldset>
        <legend><?= __('Edit Admin Capability') ?></legend>
        <?php
            echo $this->Form->control('slug');
            echo $this->Form->control('description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
