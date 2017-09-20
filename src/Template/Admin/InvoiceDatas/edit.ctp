<?php
echo $this->element('script',$dataArr);
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $invoiceData->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $invoiceData->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Invoice Datas'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="invoiceDatas form large-9 medium-8 columns content">
    <?= $this->Form->create($invoiceData) ?>
    <fieldset>
        <legend><?= __('Edit Invoice Data') ?></legend>
        <div class="input select required">
            <label for="district">District</label>
            <select name="district" required="required" id="district">
                <option value="">Select District</option>
                <?php
                foreach ($districtList as $k => $v) {
                    ?>
                    <option value="<?=$v['district']?>" data-pincode="<?=$k?>" data-rate="<?=$v['rate']?>"
                        <?=$invoiceData->district==$v['district']?'Selected':'';?>><?=$v['district']?></option> 
                    <?php
                }
                ?>
            </select>
            <!--<input name="district" required="required" maxlength="50" id="district" type="text">-->
        </div>
        <?php
//            echo $this->Form->control('district');
            echo $this->Form->control('pincode');
            echo $this->Form->control('invoice_number');
//            echo $this->Form->control('date');
        ?>
        <div class="input text required">
            <label for="date">Date</label>
            <input name="date" required="required" id="date_pdf" type="text" value="<?=date('Y-m-d', strtotime($invoiceData->date))?>"/>
        </div>   
        <?php
            echo $this->Form->control('vehicle_number');
            echo $this->Form->control('starting_reding');
            echo $this->Form->control('ending_reding');
            echo $this->Form->control('number_of_kilometers');
            echo $this->Form->control('number_of_animals');
            echo $this->Form->control('rupees_per_kilometer');
            echo $this->Form->control('total_amount');
//            echo $this->Form->control('starting_point');
//            echo $this->Form->control('ending_point');
            $starting_point= explode(',',$invoiceData->starting_point );
            $ending_point= explode(',',$invoiceData->ending_point );
        ?>
        <div class="input text required">
            <label for="starting_point1">Starting Point</label>
            <input id="starting_point1" name="starting_point1" required="required" style="width: 24%;" type="text" 
                   value="<?=!empty($starting_point[0])?$starting_point[0]:''?>"/>
            <input id="starting_point2" name="starting_point2" style="width: 24%; margin: -53px 0px 0px 183px;" type="text"
                   value="<?=!empty($starting_point[1])?$starting_point[1]:''?>"/>
            <input id="starting_point3" name="starting_point3" style="width: 24%; margin: -37px 0px 0px 366px;" type="text"
                   value="<?=!empty($starting_point[2])?$starting_point[2]:''?>"/>
            <input id="starting_point4" name="starting_point4" style="width: 24%; margin: -37px 0px 0px 547px;" type="text"
                   value="<?=!empty($starting_point[3])?$starting_point[3]:''?>"/>
        </div>
        <div class="input text required">
            <label for="ending_point1">Ending Point</label>
            <input id="ending_point1" name="ending_point1" required="required" style="width: 24%;" type="text" 
                   value="<?=!empty($ending_point[0])?$ending_point[0]:''?>"/>
            <input id="ending_point2" name="ending_point2" style="width: 24%; margin: -53px 0px 0px 183px;" type="text" 
                   value="<?=!empty($ending_point[1])?$ending_point[1]:''?>"/>
            <input id="ending_point3" name="ending_point3" style="width: 24%; margin: -37px 0px 0px 366px;" type="text" 
                   value="<?=!empty($ending_point[2])?$ending_point[2]:''?>"/>
            <input id="ending_point4" name="ending_point4" style="width: 24%; margin: -37px 0px 0px 547px;" type="text" 
                   value="<?=!empty($ending_point[3])?$ending_point[3]:''?>"/>
        </div>
        <?php
            echo $this->Form->control('status_id', ['options' => $statuses]);
//            echo $this->Form->control('creation_date');
//            echo $this->Form->control('modification_date', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
