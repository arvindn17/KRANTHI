<?php
echo $this->element('search_filter', $conditions);
?>

<div class="content-wrapper">
    <div class="msg-show"><?= $this->Flash->render() ?></div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Past Invoice
    <!--        <small>Invoices</small>-->
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= Cake\Routing\Router::url(["controller" => "Index", "action" => "index"]) ?>"><i class="fa fa-dashboard"></i> KRANTHI
                </a></li>
            <li> <a class="active" href="<?= Cake\Routing\Router::url(["controller" => "InvoiceDatas", "action" => "index"]) ?>">Past Invoice</a></li>

        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">            
                            <?php
                            if (in_array('manage_create_invoice', $this->request->session()->read('Auth')['Backend']['admin_capabilities'])) {
                                ?>
                                <tr>
                                    <td colspan="6" style="text-align: right">
                                        <?php
                                        echo $this->Html->link(__('Create Invoice'), ["controller" => "InvoiceDatas", "action" => "add"]);
                                        ?>
                                    </td>
                                </tr>    
                                <?php
                            }
                            ?></h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">S.No. </th>
                                    <th scope="col"><?= $this->Paginator->sort('invoice_number') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('district') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('date') ?></th>
                                    <td scope="col"><?= __('Status') ?></td>
                                    <th scope="col" class="actions"><?= __('Download') ?></th>
                                    <?php
                                    if (in_array('manage_edit_invoice', $this->request->session()->read('Auth')['Backend']['admin_capabilities'])) {
                                        ?>
                                        <th scope="col" class="actions"><?= __('Action') ?></th> 
                                        <?php
                                    }
                                    ?>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $i = 1;
                                foreach ($invoiceDatas as $invoiceData):
                                    ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= h($invoiceData->invoice_number) ?></td>
                                        <td><?= h($invoiceData->district) ?></td>
                                        <td><?= h($invoiceData->date) ?></td>
                                        <td id="change-status-<?= h($invoiceData->id) ?>">
                                            <?php
                                            if (in_array('manage_status_change', $this->request->session()->read('Auth')['Backend']['admin_capabilities']) &&
                                                    $invoiceData->status->id == 1) {
                                                ?>
                                                <a style="cursor: pointer" class="change-status" data-id="<?= h($invoiceData->id) ?>"
                                                   ><?= h($invoiceData->status->status_name); ?></a>  
                                                   <?php
                                               } else {
                                                   echo h($invoiceData->status->status_name);
                                               }
                                               ?>
                                        </td>
                                        <td class="actions">
                                            <?php
                                            echo $this->Html->link($this->Html->image("pdf.png", ['alt' => 'logo']), ['action' => 'generateInvoice', $invoiceData->id], ['escape' => false]);
                                            ?>
                                        </td>
                                        <?php
                                        if (in_array('manage_edit_invoice', $this->request->session()->read('Auth')['Backend']['admin_capabilities'])) {
                                            ?>
                                            <td><?= $this->Html->link(__('Edit'), ['action' => 'edit', $invoiceData->id]); ?></td>    
                                            <?php
                                        }
                                        ?>
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
