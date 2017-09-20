<div class="content-wrapper">
    <div class="msg-show"><?= $this->Flash->render() ?></div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           Roles
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= Cake\Routing\Router::url(["controller" => "Index", "action" => "index"]) ?>"><i class="fa fa-dashboard"></i> KRANTHI
                </a></li>
            <li> <a class="active" href="<?= Cake\Routing\Router::url(["controller" => "Roles", "action" => "index"]) ?>">Roles</a></li>

        </ol>
        
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        
                        <?= $this->Flash->render() ?>
                        <h3><?= $this->Html->link(__('List Roles'), ['action' => 'index']) ?></h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- /.box-header -->
                    <div class="box-body">
                             <?= $this->Flash->render() ?>
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
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>



<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Roles'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="roles form large-9 medium-8 columns content">
    <?= $this->Flash->render() ?>
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
