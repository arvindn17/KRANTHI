<?php
//echo '<pre>';print_r($districtFlag);die;
$rate=$districtFlag==true?'Per Km. @ Rs. '.$data[0]['rupees_per_kilometer'].' paisa':'Rupees per Kms';
//$rate='Rupees per Kms';
$html='
    <style>	
	table thead tr th, table tbody tr td{text-align: center; 0;}
	table thead tr th{padding: 5px 0;}
	table tbody tr td{padding: 10px 0px;}
	table tbody tr td table tr td{border-top:0; }	
    </style>
    <div style="width:100%; border:1px solid #000; position:relative;">
        <p style="text-align:centre">TRANSPORTATION OF SHEEP UNITS FROM  KRANTHI COASTAL IMPEX PVT. LTD.</p>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>S.No.</th>
                    <th>Date</th>
                    <th>Vehicle No.</th>
                    <th>Starting / Loading Reading</th>
                    <th>Ending / Unload Reading</th>
                    <th>From</th>
                    <th>To</th>
                    <th>No. of Animals</th>
                    <th>Total No. of KMs as Per reading</th>
                    <th>'.$rate.'</th>
                    <th>Total Amount to be paid in Rs.</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>2</td>
                    <td>3</td>
                    <td>4</td>
                    <td>5</td>
                    <td>6</td>
                    <td>7</td>
                    <td>8</td>
                    <td>9</td>
                    <td>10</td>
                    <td>11</td>
                </tr>';
        $i=1;
        foreach ($data as $v) {
            $html.='
                <tr>
                    <td>'.$i.'</td>
                    <td>'.$v['date'].'</td>
                    <td>'.$v['vehicle_number'].'</td>
                    <td>'.$v['starting_reding'].'</td>
                    <td>'.$v['ending_reding'].'</td>
                    <td>'.$v['starting_point'].'</td>
                    <td>'.$v['ending_point'].'</td>
                    <td>'.$v['number_of_animals'].'</td>
                    <td>'.$v['number_of_kilometers'].'</td>
                    <td>'.$v['rupees_per_kilometer'].'</td>
                    <td>'.$v['total_amount'].'</td>
                </tr>
            ';
            $i++;
        }
    $html.= '
            </tbody>
        </table>
    </div>
';
echo $html;