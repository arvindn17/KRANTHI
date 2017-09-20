<div class="content-wrapper">
    <div class="msg-show"><?= $this->Flash->render() ?></div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           Admin Users
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= Cake\Routing\Router::url(["controller" => "Index", "action" => "index"]) ?>"><i class="fa fa-dashboard"></i> KRANTHI
                </a></li>
            <li> <a class="active" href="<?= Cake\Routing\Router::url(["controller" => "AdminUsers", "action" => "index"]) ?>">Admin Users</a></li>

        </ol>
        
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        
                        <?= $this->Flash->render() ?>
                        <h3><?= $this->Html->link(__('New Admin User'), ['action' => 'add']) ?></h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('role_id') ?></th>
                                    <th scope="col"><?= __('Status') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('creation_date') ?></th>
                                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($adminUsers as $adminUser): ?>
                                <tr>
                                    <td><?= $this->Number->format($adminUser->id) ?></td>
                                    <td><?= h($adminUser->name) ?></td>
                                    <td><?= h($adminUser->email) ?></td>
                                    <td><?= $adminUser->has('role') ? $this->Html->link($adminUser->role->role, ['controller' => 'Roles', 'action' => 'view', $adminUser->role->id]) : '' ?></td>
                                    <td><?= h($adminUser->status->status_name) ?></td>
                                    <td><?= h(($adminUser->creation_date)) ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link(__('View'), ['action' => 'view', $adminUser->id]) ?>
                                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $adminUser->id]) ?>
                                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $adminUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $adminUser->id)]) ?>
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

