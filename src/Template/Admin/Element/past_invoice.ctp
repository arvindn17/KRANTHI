<?php
//echo "<pre>",print_R($invoiceData);
extract($invoiceData);
$f = new NumberFormatter('en', NumberFormatter::SPELLOUT);


$date2 = $date1= date('Y-m-d', strtotime($date));

$sno = $id;

$kms = $number_of_kilometers;
$animals = $number_of_animals;
$rate_per_km = $rupees_per_kilometer;

$net_amount = $total_amount;
$amount_words = strtoupper($f->format($total_amount));
$vevical_number  = $vehicle_number;
$html ='
<style>
	
	table thead tr th, table tbody tr td{text-align: center; 0;}
	table thead tr th{padding: 5px 0;}
	table tbody tr td{padding: 10px 0px;}
	table tbody tr td table tr td{border-top:0; }
	
</style>
<div style="border:2px solid #000000; width:100%; float:left;">
  <div style="width:100%; float:left; padding:10px; text-align:center;">
     <div style="width:30%; float:left;">
        <img style="vertical-align: top" src="'.$this->request->webroot.'img/assets/logo.jpg" width="210" />
     </div>
     <div style="width:65%; float:left;">
         <div style="font-size:36px; font-family:arial,sans-sarif; font-weight: 900;">KRANTHI</div>
         <div style="font-size:22px; font-family:arial,sans-sarif;  font-weight: 900;">COASTAL IMPEX PVT. LTD.</div>
         <div style="font-size:18px; font-family:arial,sans-sarif; font-weight: 900;">CIN:U74999AP2017PTC105567</div>
     </div>
  </div>
  <div style="text-align:left; padding-left:10px;">To</div>
  <div style="width:100%; float:left; margin-bottom:40px;">
     <div style="width:50%; margin-left:30px; float:left; padding:2px; border:1px solid #000000;">
       <div style="display:block;">The District Collector</div>
       <div style="display:block;">Medak Dist</div>
       <div style="display:block;">Telanagana</div>
       <div style="display:block;">Pin Code: 502220</div>
     </div>
     <div style="width:30%; float:right;">
       <div style="border:1px solid #000;">
         <div style="border-bottom:1px solid #000; padding:0px 2px;">
           <div style="width:48%; padding-left:2px; float:left; border-right:1px solid #000;">Invoice No:</div>
           <div style="width:48%; padding-left:2px; float:left;">'.$invoice_number.'</div>
         </div>
         <div>
           <div style="width:48%; padding-left:2px; float:left; border-right:1px solid #000;">Date</div>
           <div style="width:48%; padding-left:2px; float:left;">'.date("Y-m-d", strtotime($date)).'</div>
         </div>
       </div>
     </div>
  </div> 

  <div style="width:100%; float:left;">

	    

    <div style="width:100%; border:1px solid #000; position:relative;">
       <table class="table table-bordered">
       <thead>
       <tr> 
         <th style="width: 6%; border-left: 0;">S No</th>
         <th style="width: 10%">Date</th>
         <th style="width: 12%">Vevicle No</th>
         <th style="width: 12%">Starting<br>Reading</th>
         <th style="width: 12%">Ending<br>Reading</th>
         <th style="width: 12%">No.of KMs</th>
         <th style="width: 12%">No.<br>Animals</th>
         <th style="width: 12%">Rs. Per KM</th>
         <th style="width: 12%; border-right: 0;">Amount</th>
       </tr>
       </thead>
       <tbody>
       <tr>
			<td style="border-bottom: 0;  border-left: 0;">'.$sno.'</td>
			<td>'.$date2.'
				<table style="width: 100%;" border: 0;>
			        <tr style=" margin-top: 5px">
			        	<td style="border:0px;"></td>  
			        </tr>
			    </table>
			</td>
			<td style="height:50px; vertical-align:top;">'.$vevical_number.'</td>
			<td style="height:50px; vertical-align:top;">'.$starting_reding.'</td>
			<td style="height:50px; vertical-align:top;">'.$ending_reding.'</td>
			<td style="height:50px; vertical-align:top;">'.$kms.'</td>
			<td style="height:50px; vertical-align:top;">'.$animals.'</td>
			<td style="height:50px; vertical-align:top; border-bottom: 0; border-top: 0;">'.$rate_per_km.'</td>
			<td style="height:50px; vertical-align:top; border-bottom: 0; border-right: 0;">'.$total_amount.'</td>
       </tr>
        <tr>
            <th style="border:0px;  border-left: 0;">&nbsp;</th>
			<th colspan="3" style="text-align:center; padding: 5px 0;">Starting Point</th>
			<th colspan="3" style="text-align:center;">Ending Point</th>
			<th style=" border-bottom: 0; border-top: 0;"></th>
			
	    </tr>
	   
	   
	    <tr>
	    	
	    </style>>		
			<td style="border-bottom: 0; border-top: 0; height: 100px;  border-left: 0;">			
			<td colspan="3" style="text-align:center; white-space:pre-wrap ; word-wrap:break-word;">'.$starting_point.'</td>
			<td colspan="3" style="text-align:center; white-space:pre-wrap ; word-wrap:break-word;">'.$ending_point.'</td>
			<td style=" border-bottom: 0; border-top: 0;"></td>
			<td style=" border-bottom: 0; border-top: 0; border-right: 0;"></td>
		</tr>
		<tr>
       <td style="border-top:0px;  border-left: 0;"></td>
       <td></td>
       <td></td>
       <td></td>
       <td></td>
       <td></td>
       <td></td>
       <td style="border-bottom: 0; border-top: 0;"></td>
       <td style="border-bottom: 0; border-top: 0; border-right: 0;"><br/><br/><br/><br/></td>
       </tr>
       <tr>
       <td colspan="8" style="text-align:right; padding-right: 10px;  border-left: 0; border-right: 0;">Net Amount</td>
       <td>'.$net_amount.'</td>
       </tr>
       <tr>
			<td colspan="9" style="text-align:left; padding-left:2px;  border-left: 0; border-right: 0;">Amount In Words:</td>
       </tr>
       <tr style="border-bottom: 0; margin-bottom: 0; padding-bottom: 0;">
			<td colspan="9" style="text-align:left; padding-left:2px;  border-left: 0; border-right: 0;">'.$amount_words.' ONLY</td>
       </tr>
       </tbody>
       </table>

	      
	     
    </div>
  </div>

<div style="width:100%; float:left; margin-bottom:0px;">
<div style="border-bottom: 2px solid #000000; padding-bottom: 30px;">
	<h4 style="padding-left:4px;">Account Details</h4>
     <div style="width:60%; float:left; border:2px solid #000000; border-left: 0;">
      <div style="width: 100%; float: left; border-bottom:1px solid #000000;">
		<div style="width: 28%; padding-left:2px; float: left; border-right:2px solid #000000;">Account No</div>
		<div style="width: 70%; padding-left:2px; float: left;">36905193146</div>
      </div>
       <div style="width: 100%; float: left; border-bottom:1px solid #000000;">
		<div style="width: 28%; padding-left:2px; float: left; border-right:2px solid #000000;">Name</div>
		<div style="width: 70%; padding-left:2px; float: left;">KRANTHI COASTAL IMPEX PVT LTD</div>
      </div>
       <div style="width: 100%; float: left; border-bottom:1px solid #000000;">
		<div style="width: 28%; padding-left:2px; float: left; border-right:2px solid #000000;">Bank Name</div>
		<div style="width: 70%; padding-left:2px; float: left;">STATEBANK Of INDIA</div>
      </div>
       <div style="width: 100%; float: left; border-bottom:1px solid #000000;">
		<div style="width: 28%; padding-left:2px; float: left; border-right:2px solid #000000;">Branch Name</div>
		<div style="width: 70%; padding-left:2px; float: left;">NR PET ELURU .AP</div>
      </div>
       <div style="width: 100%; float: left;">
		<div style="width: 28%; padding-left:2px; float: left; border-right:2px solid #000000;">IFSC Code</div>
		<div style="width: 70%; padding-left:2px; float: left;">SBIN0000836</div>
      </div>
     
     </div>
     <div style="width:38%; float:right; padding-right: 10px;">
       <h4 style="font-size: 14px; font-weight: bold; text-align: right; padding-top: 0">For Kranthi Coastal Impex Pvt Ltd</h4>
       <h5 style="font-size: 12px; font-weight: bold; text-align: right; padding-top: 50px;">Authorised Signatory</h5>
     </div>
     </div>
     <h6 style="text-align: center; width: 100%; height: 20px;">H No:8-2-293/82/J/A/120 Journalist colony, Road no:70 jubilee hills Hyderabad-33</h6>
     <h6 style="text-align: center; width: 100%; height: 20px;">PH No:9949553355,9849553355 ID:kranthicoastalimpex@gmail.com WWW.kranthicoastalimpex.com</h6>

  </div>
</div>';
echo $html;