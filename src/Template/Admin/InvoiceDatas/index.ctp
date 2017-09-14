 <!-- Include Required Prerequisites -->
<script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />
 
<!-- Include Date Range Picker -->
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
    <?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\InvoiceData[]|\Cake\Collection\CollectionInterface $invoiceDatas
  */
echo $this->html->script( [ 
//    "jQuery-2.1.4.min", 'jquery-ui.min',
   // "bootstrap-datetimepicker.min" ,
    "custom"
    ] );
?>
<style>
   #daterangepicker_end, #daterangepicker_start, #date_from{
        width :40px;
    }
 </style> <?php
echo $this->element('search_filter');
 ?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Invoice Data'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Statuses'), ['controller' => 'Statuses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Status'), ['controller' => 'Statuses', 'action' => 'add']) ?></li>
    </ul>
</nav>

<div class="invoiceDatas index large-9 medium-8 columns content">
    <h3><?= __('Invoice Datas') ?></h3>
   
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <!--<th scope="col"><?php // echo  $this->Paginator->sort('id') ?></th>-->
                <th scope="col">serno </th>
                
                <th scope="col"><?= $this->Paginator->sort('invoice_number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('district') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date') ?></th>

<!--                <th scope="col"><?= $this->Paginator->sort('vehicle_number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('starting_reding') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ending_reding') ?></th>
                <th scope="col"><?= $this->Paginator->sort('number_of_kilometers') ?></th>
                <th scope="col"><?= $this->Paginator->sort('number_of_animals') ?></th>
                <th scope="col"><?= $this->Paginator->sort('rupees_per_kilometer') ?></th>
                <th scope="col"><?= $this->Paginator->sort('total_amount') ?></th>-->
                <!--<th scope="col"><?php // echo  $this->Paginator->sort('status_id') ?></th>-->
<!--                <th scope="col"><?php // echo $this->Paginator->sort('creation_date') ?></th>
                <th scope="col"><?php //echo  $this->Paginator->sort('modification_date') ?></th>-->
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $i=1;;
            foreach ($invoiceDatas as $invoiceData): ?>
            <tr>
                <!--<td><?php // echo $this->Number->format($invoiceData->id) ?></td>-->
                <td><?= $i++; ?></td>
                <td><?= h($invoiceData->invoice_number) ?></td>
                <td><?= h($invoiceData->district) ?></td>
                <td><?= h($invoiceData->date) ?></td>
                
<!--                <td><?= h($invoiceData->pincode) ?></td>
                <td><?= h($invoiceData->vehicle_number) ?></td>
                <td><?= h($invoiceData->starting_reding) ?></td>
                <td><?= h($invoiceData->ending_reding) ?></td>
                <td><?= h($invoiceData->number_of_kilometers) ?></td>
                <td><?= h($invoiceData->number_of_animals) ?></td>
                <td><?= $this->Number->format($invoiceData->rupees_per_kilometer) ?></td>
                <td><?= $this->Number->format($invoiceData->total_amount) ?></td>-->
                <td class="actions">
                    <?php
                     echo  $this->Html->link(__('Invoice'), ['action' => 'generateInvoice', $invoiceData->id]) ;
                     ?>
                
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
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
</div>