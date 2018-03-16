[[if $view_status eq 'Download']]
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<style>
.own-table{
    width: 100%;
}

.own-table th,.own-table td,.own-table {
    border: 1px solid black;
    border-collapse: collapse;
}

.own-td-1{
    padding : 5px 5px 5px 40px;
}

.own-td-2{
    padding: 5px;
    font-size: 14px;
}

.own-td-3{
    padding-bottom: 200px;
}

.own-td-4{
    padding-bottom: 10px;
    font-size: 14px;
}

.own-td-5{
    padding-bottom: 100px;
}
</style>
<body>
[[/if]]
[[if $view_status neq 'Download']]
<hr/>
[[/if]]
<div class="col-lg-12" style="margin-top: 50px;">
	[[if $view_status neq 'Download']]
	<button class="btn btn-primary" style="float: right;margin-bottom: 10px;" onclick="downloadAsPdfPODetails()">Download as PDF</button>
	<button class="btn btn-primary" style="float: right;margin-bottom: 10px;margin-right: 10px;" onclick='addAdditionalCharges([[$searchPoData[0]|@json_encode]])'>Add Additional Charges</button>
	[[/if]]
	<table class="own-table">
		<tr>
        	<table class="own-table">
        		<tr>
        			[[if $view_status eq 'Download']]
        			<td width="15%" style="padding: 20px 15px 28px 40px;border: 0px;">
        				[[if $view_status neq 'Download']]
        				<img src="assets/img/TMAR LOGO.jpg" width="100" height="100"/>
        				[[else]]
        				<img src="../../assets/img/TMAR LOGO.jpg" width="100" height="100"/>
        				<!-- <img src="/home/Staging/workSpace/Juntos/assets/img/TMAR LOGO.jpg" width="100" height="100"/> -->
        				<!-- <img src="http://juntossoft.com/tmar/TMAR%20LOGO.jpg" width="100" height="100"/> -->
        				[[/if]]
        			</td>
		         	<td width="45%" style="border: 0px;">
		         		<h3><b>T.M.ABDUL RAHMAN & SONS</b></h3>
						<h4 style="font-weight: normal;">MANUFACTURES & EXPORTERS OF FINISHED LEATHER & SHOES</h4>
		         	</td>
		         	[[else]]
		         	<td width="15%" style="padding: 20px 0px 28px 40px;border: 0px;">
        				[[if $view_status neq 'Download']]
        				<img src="assets/img/TMAR LOGO.jpg" width="100" height="100"/>
        				[[else]]
        				<img src="http://juntossoft.com/tmar/TMAR%20LOGO.jpg" width="100" height="100"/>
        				[[/if]]
        			</td>
		         	<td width="45%" style="border: 0px;">
		         		<h4><b>T.M.ABDUL RAHMAN & SONS</b></h4>
						<h5 style="font-weight: normal;">MANUFACTURES & EXPORTERS OF FINISHED LEATHER & SHOES</h5>
		         	</td>
		         	[[/if]]
		         	<td width="40%" style="border: 0px;padding-right: 20px;" align="right">
		         		<h5 style="text-align: justify;margin-left:50px;"><b>43J / 45C Ammoor Road,RANIPET - 632-401</br>
	        			Tel : 91-4172-272470,272480</br>
	        			Email : purchaseddept@tmargroup.in </br>
	        			Email : soles@tmargroup.in</b></h5>

	        			<h5 style="text-align: justify;margin-left:50px;"><b>
	        			H.O : 48(Old No.49) Wuthucattan Street,</br>
	        			Periamet,CHENNAI-600 003.INDIA</br>
	        			Tel : 91-44-25612164,25610078</br>
	        			Email : headoffice@tmargroup.in</br>
	        			GSTIN : 33AABFT2029F1Z0</b></h5>
		         	</td>
        		</tr>
        	</table>
        </tr>
        <tr>
        	<table class="own-table">
        		<tr style="font-weight: bold;">
        			<td align="center" class="own-td-1" width="100%">PURCHASE ORDER</td>
        		</tr>
        	</table>
        </tr>
        <tr>
        	<table class="own-table">
        		<tr>
        			<td class="own-td-1" width="40%"><b>To</b></td>
		         	<td class="own-td-1" width="30%"><b>LH.Po.No</b></td>
		         	<td class="own-td-1" width="30%">[[$searchPoData[0].full_po_number]]</td>
        		</tr>
        	</table>
        </tr>
        <tr>
        	<table class="own-table">
        		<tr>
        			<td class="own-td-1" width="40%">[[$searchPoData[0].supplier_name]]</td>
		         	<td class="own-td-1" width="30%"><b>Date</b></td>
		         	<td class="own-td-1" width="30%">[[$searchPoData[0].po_date]]</td>
        		</tr>
        	</table>
        </tr>
        <tr>
        	<table class="own-table">
        		<tr>
        			<td class="own-td-1" width="40%">[[$searchPoData[0].origin]]</td>
		         	<td class="own-td-1" width="30%"><b>Ord Ref</b></td>
		         	<td class="own-td-1" width="30%">[[$searchPoData[0].order_reference]]</td>
        		</tr>
        	</table>
        </tr>
        <tr>
        	<table class="own-table">
        		<tr>
        			<td class="own-td-1" width="40%"><b>GSTIN : </b>[[$searchPoData[0].gst_no]]</td>
		         	<td class="own-td-1" width="30%"><b>Delivery Date</b></td>
		         	<td class="own-td-1" width="30%">[[$searchPoData[0].delivery_date]]</td>
        		</tr>
        	</table>
        </tr>
        <tr>
        	<table class="own-table">
        		[[if $view_status eq 'Download']]
        		<tr style="font-weight: bold;font-size: 14px;">
        		[[else]]
        		<tr style="font-weight: bold;">
        		[[/if]]
        			<td align="center" width="5%">S.No</td>
		         	<td align="center" width="20%">DESCRIPTION</td>
		         	<td align="center" width="10%">HSN Code</td>
		         	<td align="center" width="5%">QTY</td>
		         	<td align="center" width="10%">UOM</td>
		         	<td align="center" width="5%">PRICE</td>
		         	<td align="center" width="10%">DISCOUNT</td>
		         	[[if $searchPoData[0]['type'] neq 'Import' AND $searchPoData[0]['type'] neq 'Sample_Import']]
			         	[[if $searchPoData[0]['state_code'] eq 33]]
				         	<td align="center" width="10%">CGST</td>
				         	<td align="center" width="10%">SGST</td>
			         	[[/if]]
			         	[[if $searchPoData[0]['state_code'] neq 33]]
			         		<td align="center" width="10%" >IGST</td>
			         	[[/if]]
			        [[/if]]
		         	<td align="center" width="10%">TOTAL AMOUNT</td>
		         	[[if $view_status neq 'Download']]
		         	<td align="center" width="10%">Action</td>
		         	[[/if]]
        		</tr>
        	</table>
        </tr>
        [[assign var=GrandTotal value= 0]]
        [[assign var=CGSTTotalValue value=0]]
        [[assign var=IGSTTotalValue value=0]]
        [[assign var=SGSTTotalValue value=0]]
        [[foreach from=$searchPoData key=k item=v]]
        <tr>
        	<table class="own-table">
        		<tr>
        			<td align="center" width="5%"  class="own-td-2">[[$k+1]]</td>
		         	<td align="center" width="20%" class="own-td-2">[[$v.material_name]]</td>
		         	<td align="center" width="10%" class="own-td-2">[[$v.material_hsn_code]]</td>
		         	<td align="center" width="5%"  class="own-td-2">[[$v.qty]]</td>
		         	<td align="center" width="10%" class="own-td-2">[[$v.material_uom]]</td>
		         	<td align="center" width="5%" class="own-td-2">[[$v.price]]</td>

		         	[[if $v.discount_price_status eq 'Amount']]
		         		[[assign var=DISCOUNTTotalValue value=[[$v.discount]]]]
		         	[[else]]
		         		[[assign var=DISCOUNTTotalValue value=[[(($v.discount/100) * $v.price ) * $v.qty]]]]
		         	[[/if]]

		         	<td align="center" width="10%" class="own-td-2">
		         		[[$v.discount]][[if $v.discount_price_status neq 'Amount']] % [[/if]]
		         		[[if $v.discount_price_status neq 'Amount']]
		         		</br>
		         		[ [[$DISCOUNTTotalValue]] ]
		         		[[/if]]
		         	</td>
		         	[[if $searchPoData[0]['type'] neq 'Import' AND $searchPoData[0]['type'] neq 'Sample_Import']]
			         	[[if $searchPoData[0]['state_code'] eq 33]]
				         	[[assign var=CGSTTotalValue value=[[(($v.CGST/100) * $v.price ) * $v.qty]]]]
				         	<td align="center" width="10%" class="own-td-2">
				         		[[$v.CGST]]% 
				         		</br>[ [[$CGSTTotalValue]] ]
				         	</td>

				         	[[assign var=SGSTTotalValue value=[[(($v.SGST/100) * $v.price ) * $v.qty]]]]
				         	<td align="center" width="10%" class="own-td-2">
				         		[[$v.SGST]]% 
				         		</br>[ [[$SGSTTotalValue]] ]
				         	</td>
			         	[[/if]]


			         	[[if $searchPoData[0]['state_code'] neq 33]]
				         	[[assign var=IGSTTotalValue value=[[(($v.IGST/100) * $v.price ) * $v.qty]]]]
				         	<td align="center" width="10%" class="own-td-2">
				         		[[$v.IGST]]% 
				         		</br>[ [[$IGSTTotalValue]] ]
				         	</td>
			         	[[/if]]
			        [[/if]]

		         	[[assign var=totalPriceValue value=[[($v.qty*$v.price) + $IGSTTotalValue + $SGSTTotalValue + $CGSTTotalValue - $DISCOUNTTotalValue]]]]

		         	<td align="center" width="10%" class="own-td-2"><b>[[$totalPriceValue]]</b></td>

		         	
		         	[[$GrandTotal = $GrandTotal + $totalPriceValue]]
		         	[[if $view_status neq 'Download']]
		         	<td align="center" width="10%" class="own-td-2">
		         		<a href="#" onclick='editPoDetails([[$v|@json_encode]])'>
				          <span class="glyphicon glyphicon-edit"></span>
				        </a>
				        <br/>
				        <br/>
				        <a href="#" onclick='deletePoDetails([[$v|@json_encode]])'>
				          <span class="glyphicon glyphicon-trash"></span>
				        </a>
		         	</td>
		         	[[/if]]
        		</tr>
        	</table>
        </tr>
        [[/foreach]]
        <tr>
        	<table class="own-table">
        		<tr>
        			<td align="center" width="5%"  class="own-td-3"></td>
		         	<td align="center" width="20%" class="own-td-3"></td>
		         	<td align="center" width="10%" class="own-td-3"></td>
		         	<td align="center" width="5%"  class="own-td-3"></td>
		         	<td align="center" width="10%" class="own-td-3"></td>
		         	<td align="center" width="5%" class="own-td-3"></td>
		         	[[if $searchPoData[0]['type'] neq 'Import' AND $searchPoData[0]['type'] neq 'Sample_Import']]
			         	[[if $searchPoData[0]['state_code'] eq 33]]
			         	<td align="center" width="10%" class="own-td-3"></td>
			         	<td align="center" width="10%" class="own-td-3"></td>
			         	[[/if]]
			         	[[if $searchPoData[0]['state_code'] neq 33]]
			         	<td align="center" width="10%" class="own-td-3"></td>
			         	[[/if]]
		         	[[/if]]
		         	<td align="center" width="10%" class="own-td-3"></td>
		         	<td align="center" width="10%" class="own-td-3"></td>
		         	[[if $view_status neq 'Download']]
		         	<td align="center" width="10%" class="own-td-3"></td>
		         	[[/if]]
        		</tr>
        	</table>
        </tr>
        [[assign var=GrandTotal1 value= 0]]
        [[assign var=totalPriceValue1 value= 0]]
        [[assign var=CGSTTotalValue value=0]]
        [[assign var=IGSTTotalValue value=0]]
        [[assign var=SGSTTotalValue value=0]]
        [[if $otherAdditionalCharges|@count neq 0]]
        <tr>
        	<table class="own-table">
        		<tr style="font-weight: bold;">
		         	<td align="center" width="40%" class="own-td-2">PARTICULARS</td>
		         	<td align="center" width="10%" class="own-td-2">HSN CODE</td>
		         	<td align="center" width="10%" class="own-td-2">Amount</td>
		         	[[if $searchPoData[0]['type'] neq 'Import' AND $searchPoData[0]['type'] neq 'Sample_Import']]
		         	[[if $searchPoData[0]['state_code'] eq 33]]
		         	<td align="center" width="10%" class="own-td-2">CGST</td>
		         	<td align="center" width="10%" class="own-td-2">SGST</td>
		         	[[else]]
		         	<td align="center" width="10%" class="own-td-2">IGST</td>
		         	[[/if]]
		         	[[/if]]
		         	<td align="center" width="10%" class="own-td-2">Total Amount</td>
		         	[[if $view_status neq 'Download']]
		         	<td align="center" width="10%" class="own-td-2">Action</td>
		         	[[/if]]
        		</tr>
        	</table>
        </tr>
        [[foreach from=$otherAdditionalCharges key=k item=v]]
        <tr>
        	<table class="own-table">
        		<tr>
		         	<td align="center" width="40%" class="own-td-2">[[$v.name]]</td>
		         	<td align="center" width="10%" class="own-td-2">[[$v.hsn_code]]</td>
		         	[[if $v.amount_type eq 'Amount']]
		         		[[assign var=other_total_amount value=[[$v.amount]]]]
		         	[[else]]
		         		[[assign var=other_total_amount value=[[(($v.amount/100) * $GrandTotal )]]]]
		         	[[/if]]
		         	<td align="center" width="10%" class="own-td-2">
		         		[[if $v.amount_type neq 'Amount']] [[$v.amount]] % <br/>[[/if]]
		         		[ [[$other_total_amount]] ]
		         	</td>
		         	[[if $searchPoData[0]['type'] neq 'Import' AND $searchPoData[0]['type'] neq 'Sample_Import']]
		         		[[if $searchPoData[0]['state_code'] eq 33]]
			         	[[assign var=CGSTTotalValue value=[[(($v.CGST/100) * $other_total_amount )]]]]
			         	[[assign var=SGSTTotalValue value=[[(($v.SGST/100) * $other_total_amount )]]]]

			         	<td align="center" width="10%" class="own-td-2">[[$CGSTTotalValue]]</td>
			         	<td align="center" width="10%" class="own-td-2">[[$SGSTTotalValue]]</td>
			         	[[else]]
			         	[[assign var=IGSTTotalValue value=[[(($v.IGST/100) * $other_total_amount )]]]]
			         	<td align="center" width="10%" class="own-td-2">[[$IGSTTotalValue]]</td>
			         	[[/if]]
			        [[/if]]
			        

		         	[[assign var=totalPriceValue1 value=[[$SGSTTotalValue + $CGSTTotalValue + $other_total_amount + $IGSTTotalValue]]]]
					[[$GrandTotal1 = $GrandTotal1 + $totalPriceValue1]]

		         	<td align="center" width="10%" class="own-td-2">[[$totalPriceValue1]]</td>
		         	[[if $view_status neq 'Download']]
		         	<td align="center" width="10%" class="own-td-2">
		         		<!-- <a href="#" onclick='editPoDetails([[$v|@json_encode]])'>
				          <span class="glyphicon glyphicon-edit"></span>
				        </a> -->
				        <a href="#" onclick='deletePoOtherAdditionalCharges([[$v|@json_encode]])' style="margin-left: 10px;">
				          <span class="glyphicon glyphicon-trash"></span>
				        </a>
		         	</td>
		         	[[/if]]
        		</tr>
        	</table>
        </tr>
        [[/foreach]]
        [[/if]]
        <tr>
        	<table class="own-table">
        		<tr>
        			<!-- <td align="center" width="5%"  class="own-td-2"></td> -->
		         	<td align="center" width="60%" class="own-td-2" id="numberToWord"></td>
		         	<td align="center" width="25%" class="own-td-2"><b>TOTAL AMOUNT INR</b></td>
		         	<td align="center" width="15%" class="own-td-2" id="GrandTotal"><b>[[$GrandTotal + $GrandTotal1]]</b></td>
        		</tr>
        	</table>
        </tr>
        <tr>
        	<table class="own-table">
        		<tr>
        			<td align="center" width=60%"  class="own-td-4">
        				<div style="float: left;text-align: left;margin-left: 10px;font-size:16px;">
        					[[if $searchPoData[0]['type'] eq 'Import' OR $searchPoData[0]['type'] eq 'Sample_Import']]
        					<h5>
        						<b>Delivery Date        :    
        						[[$importAdditionalCharges[0].delivery_date]]</b>
        						[[if $view_status neq 'Download']]
        						<a href="" style="float: right;margin-left:20px;text-decoration: underline;" onclick='editImportOtherDetails([[$importAdditionalCharges|@json_encode]])'> 
        							<span class="glyphicon glyphicon-edit"></span>
        						</a>
        						[[/if]]
        					</h5>
        					<h5><b>Incoterms            :    [[$importAdditionalCharges[0].incoterms]]</b></h5>
        					<h5><b>Payment Terms        :    [[$importAdditionalCharges[0].payment_terms]]</b></h5>
        					<h5><b>Shipment             :    [[$importAdditionalCharges[0].Shipment]]</b></h5>
        					[[/if]]
        					<h5 style="margin-top: 5px;"><b>Terms & Condition :</b></h5>
        				</div>
        				[[if $view_status eq 'Download']]
        				<ul style="float: left;margin:2px; text-align: justify;font-size: 12px;">
        				[[else]]
        				<ul style="float: left;margin:2px; text-align: justify;font-size: 14px;">
        				[[/if]]
        					<li style="font-weight: bold;">Original invoice with 2 duplicate copies should be submitted at the time of delivering the goods.Products HSN code should be mentioned on the invoice.</li>
        					<li style="margin-top: 3px;font-weight: bold;">Please quote our purchase order number on the invoice.</li>
        					<li style="margin-top: 3px;font-weight: bold;">The material will not be allowed inside our premises on non-working hours and holidays.</li>
        					<li style="margin-top: 3px;font-weight: bold;">Replacement of damages and defects required.We reserve the right to cancel the orders which are delayed / defective.Any further claims from our buyer in respect to quality of the materials supplied by you and incidental expenses therefore will be entirely at your cost.</li>
        					<li style="margin-top: 3px;font-weight: bold;">Freight to be paid as agreed between the parties.</li>
        					<li style="margin-top: 3px;font-weight: bold;">Failing to file a tax return on time.We reserved the right to deduct the tax amount from your payment.</li>
        					<li style="margin-top: 3px;font-weight: bold;">The product supplied should meet reach (European) Standards.Non-compliance will result in penalties.</li>
        				</ul>
        			</td>
        			[[if $view_status eq 'Download']]
		         	<td align="center" width="50%"  class="own-td-4">
		         		<h4 style="float: left;margin:10px 0px 0px 20px;"><b>Incharge</b></h4>
		         		<h4 style="float: right;margin:10px 20px 0px 20px;"><b>For T.M.Abdul Rahman & Sons</b></h4>
		         		</br>
		         		</br>
		         		<h4 style="float: left;margin:100px 0px 0px 20px;"><b>Signature</b></h4>
		         		<h4 style="float: right;margin:100px 20px 0px 20px;"><b>Authozised & Signature</b></h4>
		         	</td>
		         	[[else]]
		         	<td align="center" width="50%"  class="own-td-4">
		         		<h5 style="float: left;margin:10px 0px 0px 20px;"><b>Incharge</b></h5>
		         		<h5 style="float: right;margin:10px 20px 0px 20px;"><b>For T.M.Abdul Rahman & Sons</b></h5>
		         		</br>
		         		</br>
		         		<h5 style="float: left;margin:100px 0px 0px 20px;"><b>Signature</b></h5>
		         		<h5 style="float: right;margin:100px 20px 0px 20px;"><b>Authozised & Signature</b></h5>
		         	</td>
		         	[[/if]]
        		</tr>
        	</table>
        </tr>
	</table>
</div>
[[if $view_status eq 'Download']]
<script>
	[[literal]]
	var number = [[/literal]] [[$GrandTotal]]; [[literal]]
	document.getElementById('numberToWord').innerHTML = "<b>Amount In Words : </b> "+number2text(parseInt(number));
    
	function number2text(value) {
	    var fraction = Math.round(frac(value)*100);
	    var f_text  = "";
	    if(fraction > 0) {
	        f_text = "AND "+convert_number(fraction)+" PAISE";
	    }
	    return convert_number(value)+" RUPEE "+f_text+" ONLY";
	}

	function frac(f) {
	    return f % 1;
	}

	function convert_number(number)
	{
	    if ((number < 0) || (number > 999999999)) 
	    { 
	        return "NUMBER OUT OF RANGE!";
	    }
	    var Gn = Math.floor(number / 10000000);  /* Crore */ 
	    number -= Gn * 10000000; 
	    var kn = Math.floor(number / 100000);     /* lakhs */ 
	    number -= kn * 100000; 
	    var Hn = Math.floor(number / 1000);      /* thousand */ 
	    number -= Hn * 1000; 
	    var Dn = Math.floor(number / 100);       /* Tens (deca) */ 
	    number = number % 100;               /* Ones */ 
	    var tn= Math.floor(number / 10); 
	    var one=Math.floor(number % 10); 
	    var res = ""; 

	    if (Gn>0) 
	    { 
	        res += (convert_number(Gn) + " CRORE"); 
	    } 
	    if (kn>0) 
	    { 
	            res += (((res=="") ? "" : " ") + 
	            convert_number(kn) + " LAKH"); 
	    } 
	    if (Hn>0) 
	    { 
	        res += (((res=="") ? "" : " ") +
	            convert_number(Hn) + " THOUSAND"); 
	    } 

	    if (Dn) 
	    { 
	        res += (((res=="") ? "" : " ") + 
	            convert_number(Dn) + " HUNDRED"); 
	    } 


	    var ones = Array("", "ONE", "TWO", "THREE", "FOUR", "FIVE", "SIX","SEVEN", "EIGHT", "NINE", "TEN", "ELEVEN", "TWELVE", "THIRTEEN","FOURTEEN", "FIFTEEN", "SIXTEEN", "SEVENTEEN", "EIGHTEEN","NINETEEN"); 
		var tens = Array("", "", "TWENTY", "THIRTY", "FOURTY", "FIFTY", "SIXTY","SEVENTY", "EIGHTY", "NINETY"); 

	    if (tn>0 || one>0) 
	    { 
	        if (!(res=="")) 
	        { 
	            res += " AND "; 
	        } 
	        if (tn < 2) 
	        { 
	            res += ones[tn * 10 + one]; 
	        } 
	        else 
	        { 

	            res += tens[tn];
	            if (one>0) 
	            { 
	                res += ("-" + ones[one]); 
	            } 
	        } 
	    }

	    if (res=="")
	    { 
	        res = "zero"; 
	    } 
	    return res;
	}
	[[/literal]]
</script>
[[/if]]
</body>
</html>