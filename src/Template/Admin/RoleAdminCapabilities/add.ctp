<div class="content-wrapper">
    <div class="msg-show"><?= $this->Flash->render() ?></div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           Role Admin Capability
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= Cake\Routing\Router::url(["controller" => "Index", "action" => "index"]) ?>"><i class="fa fa-dashboard"></i> KRANTHI
                </a></li>
            <li> <a class="active" href="<?= Cake\Routing\Router::url(["controller" => "RoleAdminCapabilities", "action" => "index"]) ?>">Role Admin Capability</a></li>

        </ol>
        
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        
                        <?= $this->Flash->render() ?>
                        <h3><?= $this->Html->link(__('List Role Admin Capabilities'), ['action' => 'index']) ?></h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- /.box-header -->
                    <div class="box-body">
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

