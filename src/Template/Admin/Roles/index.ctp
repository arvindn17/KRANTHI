<div class="content-wrapper">
    <div class="msg-show"><?= $this->Flash->render() ?></div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           <?= __('Roles') ?>
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
                        <h3><?= $this->Html->link(__('New Role'), ['action' => 'add']) ?></h3>
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
                                        <th scope="col"><?= $this->Paginator->sort('role') ?></th>
                                        <th scope="col"><?= $this->Paginator->sort('role_desc') ?></th>
                                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                                </tr>
                            </thead>
                            <tbody>

                        <?php foreach ($roles as $role): ?>
                                  <tr>
                                      <td><?= $this->Number->format($role->id) ?></td>
                                      <td><?= h($role->role) ?></td>
                                      <td><?= h($role->role_desc) ?></td>
                                      <td class="actions">
                                          <?= $this->Html->link(__('View'), ['action' => 'view', $role->id]) ?>
                                          <?= $this->Html->link(__('Edit'), ['action' => 'edit', $role->id]) ?>
                                          <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $role->id], ['confirm' => __('Are you sure you want to delete # {0}?', $role->id)]) ?>
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
