<!DOCTYPE html>
<html>
<head>
	<title>Juntos Download</title>
</head>
<style>
	table td {
        border-bottom: 1px solid #000;
        border-top: 1px solid #000;
        border-right: 1px solid #000;
        padding: 4px 3px;
        font-size: 14px;
    }
    
    table tr td,
    table tr th {
        page-break-inside: avoid;
    }

    table { page-break-inside:auto }
    tr    { page-break-inside:avoid; page-break-after:auto }
    thead { display:table-header-group }
    tfoot { display:table-footer-group }
</style>
<body>
[[assign var=OTCcolspanCalc value=7]]
	[[if $searchPoData[0]['supplier_status'] neq 'UNREGISTERED']]
	[[assign var=OTCcolspanCalc value=$OTCcolspanCalc+1]]
[[/if]]

[[if $searchPoData[0]['supplier_status'] neq 'UNREGISTERED']]
	[[if $searchPoData[0]['state_code'] eq 33]]
		[[assign var=OTCcolspanCalc value=$OTCcolspanCalc+2]]
	[[else]]
		[[assign var=OTCcolspanCalc value=$OTCcolspanCalc+1]]
	[[/if]]
[[/if]]
<table cellspacing="0" cellpadding="0" border="0" style="height:100%;width:100%;">
	<thead>
		<tr> 
	        <td colspan="11" valign="top" style="padding:0px;border-left:1px solid #000;border-top:1px solid #000;">
	            <table cellspacing="0" cellpadding="0" width="100%" id="x">
	                <tr>
	                    <td align="center" width="15%" style="border:0px;"><img src="../assets/img/TMAR LOGO.jpg" width="100" height="100"/>
	                    </td>
	                    <td width="40%" style="border:0px;"><h1 style="margin-bottom: 2px">T.M.ABDUL RAHMAN & SONS</h1>
	                    <!-- <h6 style="font-weight: normal;margin: 0px;">MANUFACTURES & EXPORTERS OF FINISHED LEATHER & SHOES</h6></td> -->
	                    <h3 style="font-weight: normal;margin: 0px;">FINISHED LEATHER & SHOES</h3></td>
	                    <td width="25%" style="border:0px;"><font style="font:bold arial,helvetica,verdana; color:#000;">45J / 46C Ammoor Road,RANIPET - 632-401</br>
	                    Tel : 91-4172-272470,271835</br>
	                    Email : purchasedept@tmargroup.in </br>
	                    Email : soles@tmargroup.in</font><br/><br/>

	                    <font style="font:bold arial,helvetica,verdana; color:#000;">
	                    H.O : 48(Old No.49) Wuthucattan Street,</br>
	                    Periamet,CHENNAI-600 003.INDIA</br>
	                    Tel : 91-44-25612164,25610078</br>
	                    Email : headoffice@tmargroup.in</br>
	                    <b>GSTIN : 33AABFT2029F1ZO</b></font></td>
	                </tr>
	            </table>
	        </td>
	    </tr>
	    <tr>
	        <td align="center" colspan="10" style="font:bold arial,helvetica,verdana; color:#000;border-left:1px solid #000;">PURCHASE ORDER</td>
	    </tr>
	    <tr>
	        <td colspan="[[($OTCcolspanCalc*0.4)|round:0]]" style="font:normal arial,helvetica,verdana; color:#000;border-left:1px solid #000;">To</td>
	        <td colspan="[[($OTCcolspanCalc*0.2)|round:0]]" style="font:normal arial,helvetica,verdana; color:#000;">Po.No</td>
	        <td colspan="[[($OTCcolspanCalc*0.4)|round:0]]" style="font:normal arial,helvetica,verdana; color:#000;">[[$searchPoData[0].full_po_number]]</td>
	    </tr>
	    <tr>
	        <td colspan="[[($OTCcolspanCalc*0.4)|round:0]]" style="font:normal arial,helvetica,verdana; color:#000;border-left:1px solid #000;">M/s.[[$searchPoData[0].supplier_name]]</td>
	        <td colspan="[[($OTCcolspanCalc*0.2)|round:0]]" style="font:normal arial,helvetica,verdana; color:#000;">Date</td>
	        <td colspan="[[($OTCcolspanCalc*0.4)|round:0]]" style="font:normal arial,helvetica,verdana; color:#000;">[[$searchPoData[0].po_date|date_format:"%d-%m-%Y"]]</td>
	    </tr>
	    <tr>
	        <td colspan="[[($OTCcolspanCalc*0.4)|round:0]]" style="font:normal arial,helvetica,verdana; color:#000;border-left:1px solid #000;">[[$searchPoData[0].origin]]</td>
	        <td colspan="[[($OTCcolspanCalc*0.2)|round:0]]" style="font:normal arial,helvetica,verdana; color:#000;">OrderRef</td>
	        <td colspan="[[($OTCcolspanCalc*0.4)|round:0]]" style="font:normal arial,helvetica,verdana; color:#000;">[[$searchPoData[0].order_reference]]</td>
	    </tr>
	    <tr>
	        <td colspan="[[($OTCcolspanCalc*0.4)|round:0]]" style="font:normal; arial,helvetica,verdana; color:#000;border-left:1px solid #000;"><b>GSTIN : [[$searchPoData[0].gst_no]]</b></td>
	        <td colspan="[[($OTCcolspanCalc*0.2)|round:0]]" style="font:normal arial,helvetica,verdana; color:#000;">Delivery Date</td>
	        <td colspan="[[($OTCcolspanCalc*0.4)|round:0]]" style="font:normal arial,helvetica,verdana; color:#000;">[[$searchPoData[0].delivery_date|date_format:"%d-%m-%Y"]]</td>
	    </tr>
	    <tr>
	        <td align="center" width="5%" style="font:bold arial,helvetica,verdana; color:#000;border-left:1px solid #000;font-weight: bold;">S.NO</td>

	        [[if $searchPoData[0]['state_code'] eq 33]]
	        <td align="center" width="20%" style="font:bold arial,helvetica,verdana; color:#000;font-weight: bold;">DESCRIPTION</td>
	        [[/if]]
	        [[if $searchPoData[0]['state_code'] neq 33]]
	        <td align="center" width="30%" style="font:bold arial,helvetica,verdana; color:#000;font-weight: bold;">DESCRIPTION</td>
	        [[/if]]
	        [[if $searchPoData[0]['supplier_status'] neq 'UNREGISTERED']]
	        <td align="center" width="10%" style="font:bold arial,helvetica,verdana; color:#000;font-weight: bold;">HSN/SAC CODE</td>
	        [[/if]]
	        <td align="center" width="5%" style="font:bold arial,helvetica,verdana; color:#000;font-weight: bold;">QTY</td>
	        <td align="center" width="7%" style="font:bold arial,helvetica,verdana; color:#000;font-weight: bold;">UOM</td>
	        <td align="center" width="8%" style="font:bold arial,helvetica,verdana; color:#000;font-weight: bold;">PRICE</td>
	        <td align="center" width="10%" style="font:bold arial,helvetica,verdana; color:#000;font-weight: bold;">DISCOUNT</td>
	        [[if $searchPoData[0]['supplier_status'] neq 'UNREGISTERED']]
	            [[if $searchPoData[0]['state_code'] eq 33]]
	                <td align="center" width="10%" style="font:bold arial,helvetica,verdana; color:#000;font-weight: bold;">CGST</td>
	                <td align="center" width="10%" style="font:bold arial,helvetica,verdana; color:#000;font-weight: bold;">SGST</td>
	            [[/if]]
	            [[if $searchPoData[0]['state_code'] neq 33]]
	                <td align="center" width="10%" style="font:bold arial,helvetica,verdana; color:#000;font-weight: bold;">IGST</td>
	            [[/if]]
	        [[/if]]
	        <td align="center" width="10%" style="font:bold arial,helvetica,verdana; color:#000;font-weight: bold;">TOTAL <br/>AMOUNT</td>
	    </tr>
	</thead>
	<tbody>
	    [[assign var=GrandTotal value= 0]]
	    [[assign var=TcolspanCalc value=3]]
	    [[assign var=DcolspanCalc value=5]]
	    [[assign var=TCcolspanCalc value=7]]
	    [[assign var=OTHERPercGrandTotal value= 0]]
	    [[assign var=CGSTTotalValue value=0]]
	    [[assign var=IGSTTotalValue value=0]]
	    [[assign var=SGSTTotalValue value=0]]
	    [[foreach from=$searchPoData key=k item=v]]

	    <tr >
			<td width="5%" align="center" style="font:normal arial,helvetica,verdana; color:#000;border-left:1px solid #000;">[[$k+1]]</td>
		        [[if $searchPoData[0]['state_code'] eq 33]]
			     	<td width="20%" align="center" style="font:normal arial,helvetica,verdana; color:#000;">
			     		<div style="text-align: left;">
			                [[$v.material_master_name]]
			            </div>

			            <div style="margin-top: 5px;text-align:left;word-wrap: break-word;white-space: pre;">[[$v.po_description]]</div>
			     	</td>
			    [[/if]]
		        [[if $searchPoData[0]['state_code'] neq 33]]
		        	<td width="30%" align="center" style="font:normal arial,helvetica,verdana; color:#000;">
			     		<div style="text-align: left;">
			                [[$v.material_master_name]]
			            </div>

			            <div style="margin-top: 5px;text-align:left;word-wrap: break-word;white-space: pre;">[[$v.po_description]]</div>
			     	</td>
			    [[/if]]

	     	[[if $searchPoData[0]['supplier_status'] neq 'UNREGISTERED']]
	         	[[if $k eq 0]]
	         	[[assign var=TcolspanCalc value=$TcolspanCalc+1]]
	         	[[assign var=DcolspanCalc value=$DcolspanCalc+1]]
	         	[[assign var=TCcolspanCalc value=$TCcolspanCalc+1]]
	         	[[/if]]
	     	<td width="10%" align="center" style="font:normal arial,helvetica,verdana; color:#000;">[[$v.material_hsn_code]]</td>
	     	[[/if]]
	     	<td width="5%" align="center" style="font:normal arial,helvetica,verdana; color:#000;">[[$v.qty]]</td>
	     	<td width="7%" align="center" style="font:normal arial,helvetica,verdana; color:#000;">[[$v.material_uom]]</td>
	     	<td width="8%" align="right" style="font:normal arial,helvetica,verdana; color:#000;font-weight: bold;">
	     			[[$v.price|number_format:2]]<br/>
	     			[[if $v.price_status neq 'FINAL']]
	     			<span style="font-size: 10px">[ [[$v.price_status]] ]</span>
	                [[/if]]
	     	</td>

	     	[[if $v.discount_price_status eq 'AMOUNT']]
	     		[[assign var=DISCOUNTTotalValue value=[[$v.discount]]]]
	     	[[else]]
	     		[[assign var=DISCOUNTTotalValue value=(($v.discount/100) * $v.price ) * $v.qty]]
	     	[[/if]]

	     	<td width="10%" align="center" style="font:normal arial,helvetica,verdana; color:#000;">
	     		[[$v.discount|number_format:2]][[if $v.discount_price_status neq 'AMOUNT']] % [[/if]]
	     		[[if $v.discount_price_status neq 'AMOUNT']]
	     		</br>
	     		[ [[$DISCOUNTTotalValue|number_format:2]] ]
	     		[[/if]]
	     	</td>

	     	[[assign var=OTHERPercGrandTotal value=($OTHERPercGrandTotal + (($v.price* $v.qty) - $DISCOUNTTotalValue))]]

	     	[[if $searchPoData[0]['supplier_status'] neq 'UNREGISTERED']]
		     	[[if $searchPoData[0]['state_code'] eq 33]]
		         	[[assign var=CGSTTotalValue value=(($v.CGST/100) * (($v.price*$v.qty)))]]
		         	<td width="10%" align="center" style="font:normal arial,helvetica,verdana; color:#000;">
		         		[[$v.CGST]]% 
		         		</br>[ [[$CGSTTotalValue|number_format:2]] ]
		         	</td>
		         	[[if $k eq 0]]
		         	[[assign var=TcolspanCalc value=$TcolspanCalc+2]]
		         	[[assign var=DcolspanCalc value=$DcolspanCalc+2]]
		         	[[assign var=TCcolspanCalc value=$TCcolspanCalc+2]]
		         	[[/if]]
		         	[[assign var=SGSTTotalValue value=(($v.SGST/100) * (($v.price*$v.qty) ))]]
		         	<td width="10%" align="center" style="font:normal arial,helvetica,verdana; color:#000;">
		         		[[$v.SGST]]% 
		         		</br>[ [[$SGSTTotalValue|number_format:2]] ]
		         	</td>
		     	[[/if]]


		     	[[if $searchPoData[0]['state_code'] neq 33]]
		     		[[if $k eq 0]]
		     		[[assign var=TcolspanCalc value=$TcolspanCalc+1]]
		     		[[assign var=DcolspanCalc value=$DcolspanCalc+1]]
		     		[[assign var=TCcolspanCalc value=$TCcolspanCalc+1]]
		     		[[/if]]
		         	[[assign var=IGSTTotalValue value=[[(($v.IGST/100) * $v.price ) * $v.qty]]]]
		         	<td width="10%" align="center" style="font:normal arial,helvetica,verdana; color:#000;">
		         		[[$v.IGST]]% 
		         		</br>[ [[$IGSTTotalValue|number_format:2]] ]
		         	</td>
		     	[[/if]]
	     	[[/if]]
	     	[[assign var=totalPriceValue value=[[($v.qty*$v.price) + $IGSTTotalValue + $SGSTTotalValue + $CGSTTotalValue - $DISCOUNTTotalValue]]]]

	     	<td width="10%" align="right" style="font:bold arial,helvetica,verdana; color:#000;"><b>[[$totalPriceValue|number_format:2]]</b></td>

	     	
	     	[[$GrandTotal = $GrandTotal + $totalPriceValue]]
		</tr>
		[[/foreach]]

		[[assign var=GrandTotal1 value= 0]]
	    [[assign var=totalPriceValue1 value= 0]]
	    [[assign var=CGSTTotalValue value=0]]
	    [[assign var=IGSTTotalValue value=0]]
	    [[assign var=SGSTTotalValue value=0]]
	    [[if $otherAdditionalCharges|@count neq 0]]
	    [[foreach from=$otherAdditionalCharges key=k item=v]]
	    <tr>
			<td width="5%" style="font:normal arial,helvetica,verdana; color:#000;border-left:1px solid #000;"></td>
			[[if $searchPoData[0]['supplier_status'] neq 'UNREGISTERED']]
		 		[[if $searchPoData[0]['state_code'] eq 33]]
		     		<td width="20%" align="center" style="font:normal arial,helvetica,verdana; color:#000;">[[$v.name]]</td>
		     	[[/if]]
		     	[[if $searchPoData[0]['state_code'] neq 33]]
		     		<td width="30%" align="center" style="font:normal arial,helvetica,verdana; color:#000;">[[$v.name]]</td>
		     	[[/if]]
	     	[[/if]]
	     	[[if $searchPoData[0]['supplier_status'] neq 'UNREGISTERED']]
	     	<td width="10%" align="center" style="font:normal arial,helvetica,verdana; color:#000;">[[$v.hsn_code]]</td>
	     	[[/if]]
	     	<td width="5%" align="center" style="font:normal arial,helvetica,verdana; color:#000;"></td>
	     	<td width="7%" align="center" style="font:normal arial,helvetica,verdana; color:#000;"></td>
	     	[[if $v.amount_type eq 'AMOUNT']]
	     		[[assign var=other_total_AMOUNT value=[[$v.amount]]]]
	     	[[else]]
	     		[[assign var=other_total_AMOUNT value=[[(($v.amount/100) * $OTHERPercGrandTotal )]]]]
	     	[[/if]]
	     	<td width="8%" align="right" style="font:normal arial,helvetica,verdana; color:#000;font-weight: bold;">
	     		[[if $v.amount_type neq 'AMOUNT']] [[$v.amount]] % <br/>[[/if]]
	     		[[$other_total_AMOUNT|number_format:2]]
	     	</td>
	     	<td width="10%" align="center" style="font:normal arial,helvetica,verdana; color:#000;"></td>
	     	[[if $searchPoData[0]['supplier_status'] neq 'UNREGISTERED']]
	 		[[if $searchPoData[0]['state_code'] eq 33]]
	         	[[assign var=CGSTTotalValue value=[[(($v.CGST/100) * $other_total_AMOUNT )]]]]
	         	[[assign var=SGSTTotalValue value=[[(($v.SGST/100) * $other_total_AMOUNT )]]]]

	         	<td width="10%" align="center" style="font:normal arial,helvetica,verdana; color:#000;">[[$v.CGST]]%<br/>[ [[$CGSTTotalValue|number_format:2]] ]</td>
	         	<td width="10%" align="center" style="font:normal arial,helvetica,verdana; color:#000;">[[$v.CGST]]%<br/>[ [[$SGSTTotalValue|number_format:2]] ]</td>
	     	[[else]]
	         	[[assign var=IGSTTotalValue value=[[(($v.IGST/100) * $other_total_AMOUNT )]]]]
	         	<td width="10%" align="center" style="font:normal arial,helvetica,verdana; color:#000;">[[$v.IGST]]%<br/>[[$IGSTTotalValue|number_format:2]]</td>
	     	[[/if]]
	     	[[/if]]

	     	[[assign var=totalPriceValue1 value=[[$SGSTTotalValue + $CGSTTotalValue + $other_total_AMOUNT + $IGSTTotalValue]]]]
			[[$GrandTotal1 = $GrandTotal1 + $totalPriceValue1]]

	     	<td width="10%" align="right" style="font:normal arial,helvetica,verdana; color:#000;"><b>[[$totalPriceValue1|number_format:2]]</b></td>
	    </tr>
	    [[/foreach]]
	    [[/if]]
	    [[assign var=ODiscountValue value=0]]
	    [[if $overAllDiscountDetails|@count neq 0]]
	    [[foreach from=$overAllDiscountDetails key=k item=v]]
	    <tr>
			[[if $v.discount_type eq 'AMOUNT']]
	     		[[assign var=ODiscountValue value=[[$v.discount]]]]
	     	[[else]]
	     		[[assign var=ODiscountValue value=(($v.discount/100) * ($GrandTotal + $GrandTotal1))]]
	     	[[/if]]

			<td align="center" style="font:normal arial,helvetica,verdana; color:#000;border-left:1px solid #000;"></td>
			<td align="center" style="font:normal arial,helvetica,verdana; color:#000;" colspan="[[$DcolspanCalc]]">DISCOUNT</td>
			<td align="right" style="font:normal arial,helvetica,verdana; color:#000;">
				<b>[[$ODiscountValue|number_format:2]]</b>
			</td>
	    </tr>
	    [[/foreach]]
	    [[/if]]
	    <!-- <tr>
	    	<td id="result" style="font:normal arial,helvetica,verdana; color:#000;border-left:1px solid #000;"></td>
	    	<td></td>
	    	<td></td>
	    	<td></td>
	    	<td></td>
	    	<td></td>
	    	<td></td>
	    	<td></td>
	    	<td></td>
	    	<td></td>
		</tr> -->
	    <tr>
	     	<td align="center" style="font:normal arial,helvetica,verdana; color:#000;border-left:1px solid #000;"></td>
	     	[[if $TCcolspanCalc > 7]]
		     	[[if $TCcolspanCalc eq 9]]
		     	<td align="center" style="font:normal arial,helvetica,verdana; color:#000;" id="numberToWord" colspan="[[($TCcolspanCalc*0.4)|round:0]]"></td>
		     	[[else]]
		     	<td align="center" style="font:normal arial,helvetica,verdana; color:#000;" id="numberToWord" colspan="[[($TCcolspanCalc*0.5)|round:0]]"></td>
		     	[[/if]]
	     	[[else]]
	     	<td align="center" style="font:normal arial,helvetica,verdana; color:#000;" id="numberToWord" colspan="[[($TCcolspanCalc*0.4)|round:0]]"></td>
	     	[[/if]]
	     	<td align="center" style="font:normal arial,helvetica,verdana; color:#000;" colspan="[[($TCcolspanCalc*0.3)|round:0]]">TOTAL AMOUNT [[$searchPoData[0].currency]]</td> 
	     	<td colspan="1" align="right" style="font:normal arial,helvetica,verdana; color:#000;"><b>[[(($GrandTotal + $GrandTotal1) - $ODiscountValue)|number_format:2]]</b></td>

	     	<td id="GrandTotal" style="display: none;">[[($GrandTotal + $GrandTotal1) - $ODiscountValue]]</td>
	     	<td align="center" style="display: none;" id="currencyCode" >[[$searchPoData[0].currency]]</td>
		</tr>
		<tr>
			<td colspan="[[($TCcolspanCalc*0.5)|round:0]]" style="border-left:1px solid #000;border-top: 1px solid #000">
				<h4><b>Terms & Condition :</b></h4>
				<ul>
				<li style="font:bold arial,helvetica,verdana; color:#000;">Original invoice with 2 duplicate copies should be submitted at the time of delivering the goods.Products HSN code should be mentioned on the invoice.</li>
				<li style="font:bold arial,helvetica,verdana; color:#000;">Please quote our purchase order number on the invoice.</li>
				<li style="font:bold arial,helvetica,verdana; color:#000;">The material will not be allowed inside our premises on non-working hours and holidays.</li>
				<li style="font:bold arial,helvetica,verdana; color:#000;">Replacement for damages and defects required.We reserved the right to cancel the orders which are delayed / defective.Any further claims from our buyer in respect to quality of the materials supplied by you and incidental expenses therefore will be entirely at your cost.</li>
				<li style="font:bold arial,helvetica,verdana; color:#000;">Freight to be paid as agreed between the parties.</li>
				<li style="font:bold arial,helvetica,verdana; color:#000;">Failing to file a tax return on time.We reserved the right to deduct the tax AMOUNT from your payment.</li>
	            <li style="font:bold arial,helvetica,verdana; color:#000;">The product supplied should meet reach (European) Standards.Non-compliance will result in penalties.</li>
				<li style="margin-top: 3px;font-weight: bold;">SUPPLY OF MATERIAL SHOULD PASS ALL TEST AS PER REACH/RCS/RSC/GB PHTHALATES STANDARD.</li>
				</ul>
			</td>
			<td align="center" colspan="[[($TCcolspanCalc*0.5)|round:0]]" style="border-top: 1px solid #000">
				<!--<h5 style="float: left;margin:80px 0px 0px 20px;"><b>Incharge</b></h5>
				<h5 style="float: right;margin:80px 20px 0px 20px;"><b>For T.M.Abdul Rahman & Sons</b></h5>
				</br>
				</br>
				<h5 style="float: left;margin:100px 0px 0px 20px;"><b>Signature</b></h5>
				<h5 style="float: right;margin:100px 20px 0px 20px;"><b>Authorized & Signature</b></h5>-->
				<div style="width:40%;float:left;">
					<p style="font-weight:bold;color:#000;font-size:12px;line-height: 200px;">Incharge</p>
					<p style="font-weight:bold;color:#000;font-size:12px;margin-top: 20px;">Signature</p>
				</div>
				<div style="width:60%;float:left">
					<p style="font-weight:bold;color:#000;font-size:12px;line-height: 200px;">For T.M.Abdul Rahman & Sons</p>
					<p style="font-weight:bold;color:#000;font-size:12px;margin-top: 20px;"> Authorised Signature</p>
				</div>
				<div style="clear: both;"></div>
			</td>
		</tr>
	</tbody>
</table>
<script>
	[[literal]]
	setTimeout(function(){
		window.print();
	},500);
	var number = document.getElementById('GrandTotal').innerHTML;
	var currency = document.getElementById('currencyCode').innerHTML;
	document.getElementById('numberToWord').innerHTML = "<b>Amount in words : </b> "+number2text(number,currency);
    
	function number2text(value) {
	    var currencyCode = {
			"INR"  : "PAISE",
			"EURO" : "CENTS",
			"USD"  : "CENTS"
		};
		
		if(typeof currencyCode[currency] === 'undefined')
			currencyCode[currency] = "";

	    var fraction = Math.round(this.frac(value)*100);
	    var f_text  = "";
	    if(fraction > 0) {
	        f_text = "AND "+this.convert_number(fraction)+" "+currencyCode[currency];
	    }
	    return currency+" "+this.convert_number(value)+" "+f_text+" ONLY";
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
</body>
</html>