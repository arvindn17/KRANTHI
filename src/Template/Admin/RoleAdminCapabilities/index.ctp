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
                        <h3><?= $this->Html->link(__('New Role Admin Capability'), ['action' => 'add']) ?></h3>
<!--                        <ul class="side-nav">
                             <li class="heading"></li>
                                 <li></li>
                            </ul>-->
                    </div>
                    <!-- /.box-header -->
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('role_id') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('admin_capability_id') ?></th>
                                    <th scope="col" class="actions"><?= __('Actions') ?></th>                               </tr>
                            </thead>
                            <tbody>

                                <?php
                                $i = 1;
                                foreach ($roleAdminCapabilities as $roleAdminCapability):
                                    ?>
                                    <tr>
                                        <td><?= $this->Number->format($roleAdminCapability->id) ?></td>
                                        <td><?= $roleAdminCapability->has('role') ? $this->Html->link($roleAdminCapability->role->role, ['controller' => 'Roles', 'action' => 'view', $roleAdminCapability->role->id]) : '' ?></td>
                                        <td><?= $roleAdminCapability->has('admin_capability') ? $this->Html->link($roleAdminCapability->admin_capability->slug, ['controller' => 'AdminCapabilities', 'action' => 'view', $roleAdminCapability->admin_capability->id]) : '' ?></td>
                                        <td class="actions">
                                            <?= $this->Html->link(__('View'), ['action' => 'view', $roleAdminCapability->id]) ?>
                                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $roleAdminCapability->id]) ?>
                                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $roleAdminCapability->id], ['confirm' => __('Are you sure you want to delete # {0}?', $roleAdminCapability->id)]) ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>

                            </tbody>

                        </table>
                    </div>
                    <div class="paginator">
                        <ul class="pagination">
                            <?= $this->Paginator->first('<< ' . __('first')) ?>
                            <?= $this->Paginator->prev('< ' . __('previous')) ?>
                            <?= $this->Paginator->numbers() ?>
                            <?= $this->Paginator->next(__('next') . ' >') ?>
                            <?= $this->Paginator->last(__('last') . ' >>') ?>
                        </ul>
                        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
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

