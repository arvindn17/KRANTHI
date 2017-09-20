<?php
$range='';
$district='';
if(!empty($conditions)){
    $date1=!empty($conditions['date >= '])?date('m/d/Y', strtotime($conditions['date >= '])):'';
    $date2=!empty($conditions['date <= ']) && $date1!=''?date('m/d/Y', strtotime($conditions['date <= '])):'';
    $range=$date1.' - '.$date2;
    $district=!empty($conditions['district'])?$conditions['district']:'';
}
?>
<form type='post' action="">
    <table  border=2  align='center' width='30%' style="min-width: 400px;">
            <tr>
                <!--<th scope="col">Date Range</th>-->
                <th scope="col">  
                    <input type="text" name="date_from" class="fdate" id="date_from" readonly="" value="<?=$range?>" placeholder="Select Date Range"/>
                </th>
            </tr>
            <tr>
                <th>
                    <select name="district">
                        <option value="">Select District</option>
                        <?php
                        foreach ($districtList as $d){
                            echo '<option value="'.$d.'"';
                            if($d==$district) echo 'Selected';
                            echo '>'.$d.'</option>';
                        }
                        ?>
                    </select>
                </th>
            </tr>
            <tr>
                <th scope="col" colspan ='2' align='center'>
                    <input type='submit' value='search'>
                </th>

            </tr>
    </table>
</form>