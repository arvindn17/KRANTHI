<?php
echo $this->element('search_filter',$conditions);
?>

<div class="invoiceDatas index large-9 medium-8 columns content">
	<?= $this->Flash->render() ?>
    <?php
    if (!empty($invoiceDatas)) {
        ?>
        <h3><?= __('Invoice Datas') ?></h3>
        <table cellpadding="0" cellspacing="0">
            <thead>
                <tr>
                    <td colspan="5" style="text-align: right">
                        <form name="annexure" id="annexure" action="<?= $this->request->webroot . 'admin/invoice-datas/generate-annexure' ?>" method="GET"
                              target="_blank">
                            <input type="hidden" value='<?= json_encode($conditions) ?>' name="conditions"/>   
                            <input type="submit" name="submit" value="Generate Annexure"/>
                        </form>

                    </td>
                </tr>
                <tr>
                    <th scope="col">S.No. </th>
                    <th scope="col"><?= $this->Paginator->sort('invoice_number') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('district') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('date') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                ;
                foreach ($invoiceDatas as $invoiceData):
                    ?>
                    <tr>
                        <!--<td><?php // echo $this->Number->format($invoiceData->id)  ?></td>-->
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
                            echo $this->Html->link($this->Html->image("pdf.png", ['alt' => 'logo']), ['action' => 'generateInvoice', $invoiceData->id], ['escape' => false]);
//                         echo  $this->Html->link(__('Invoice'), ['action' => 'generateInvoice', $invoiceData->id]) ;
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
        <?php }
    ?>
</div>