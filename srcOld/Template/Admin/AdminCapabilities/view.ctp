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
</div>
