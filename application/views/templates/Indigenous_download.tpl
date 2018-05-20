<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<style>
.own-table{
    width: 100%;
    font-size: 12px;
}
td
{
	word-wrap: break-word;
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
}

.own-td-3{
    padding-bottom: 200px;
}

.own-td-4{
    padding-bottom: 10px;
}

.own-td-5{
    padding-bottom: 100px;
}
</style>
<body>
	<table class="own-table">
        <tr>
        	<table class="own-table">
        		<tr style="font-weight: bold;font-size: 10px;">
        			<td align="center" width="5%">S.No</td>
		         	<td align="center" width="20%">DESCRIPTION</td>
		         	[[if $searchPoData[0]['supplier_status'] neq 'UNREGISTERED']]
		         	<td align="center" width="10%">HSN CODE</td>
		         	[[/if]]
		         	<td align="center" width="5%">QTY</td>
		         	<td align="center" width="10%">UOM</td>
		         	<td align="center" width="10%">PRICE</td>
		         	<td align="center" width="10%">DISCOUNT</td>
		         	[[if $searchPoData[0]['supplier_status'] neq 'UNREGISTERED']]
		         	[[if $searchPoData[0]['state_code'] eq 33]]
			         	<td align="center" width="10%">CGST</td>
			         	<td align="center" width="10%">SGST</td>
		         	[[/if]]
		         	[[if $searchPoData[0]['state_code'] neq 33]]
		         		<td align="center" width="10%" >IGST</td>
		         	[[/if]]
		         	[[/if]]
		         	<td align="center" width="10%">TOTAL <br/>AMOUNT</td>
        		</tr>
        	</table>
        </tr>
        [[assign var=GrandTotal value= 0]]
        [[assign var=OTHERPercGrandTotal value= 0]]
        [[assign var=CGSTTotalValue value=0]]
        [[assign var=IGSTTotalValue value=0]]
        [[assign var=SGSTTotalValue value=0]]
        [[foreach from=$searchPoData key=k item=v]]
        <tr>
        	<table class="own-table" style="font-size: 10px;">
        		<tr>
        			<td align="center" width="5%"  class="own-td-2">[[$k+1]]</td>
		         	<td width="20%" class="own-td-2">
		         		<div class="top_row">
			                [[$v.material_master_name]]
			            </div>
			            <div class="top_row" style="margin-top: 5px;text-align:left;word-wrap: break-word;white-space: pre;">[[$v.po_description]]</div>
		         	</td>
		         	[[if $searchPoData[0]['supplier_status'] neq 'UNREGISTERED']]
		         	<td align="center" width="10%" class="own-td-2">[[$v.material_hsn_code]]</td>
		         	[[/if]]
		         	<td align="center" width="5%"  class="own-td-2">[[$v.qty]]</td>
		         	<td align="center" width="10%" class="own-td-2">[[$v.material_uom]]</td>
		         	<td align="center" width="10%" class="own-td-2">
		         			[[$v.price|number_format:2]]<br/>
		         			[ [[$v.price_status]] ]
		         	</td>

		         	[[if $v.discount_price_status eq 'AMOUNT']]
		         		[[assign var=DISCOUNTTotalValue value=[[$v.discount]]]]
		         	[[else]]
		         		[[assign var=DISCOUNTTotalValue value=(($v.discount/100) * $v.price ) * $v.qty]]
		         	[[/if]]

		         	<td align="center" width="10%" class="own-td-2">
		         		[[$v.discount|number_format:2]][[if $v.discount_price_status neq 'AMOUNT']] % [[/if]]
		         		[[if $v.discount_price_status neq 'AMOUNT']]
		         		</br>
		         		[ [[$DISCOUNTTotalValue|number_format:2]] ]
		         		[[/if]]
		         	</td>

		         	[[assign var=OTHERPercGrandTotal value=($OTHERPercGrandTotal + (($v.price* $v.qty) - $DISCOUNTTotalValue))]]

		         	[[if $searchPoData[0]['supplier_status'] neq 'UNREGISTERED']]
		         	[[if $searchPoData[0]['state_code'] eq 33]]
			         	[[assign var=CGSTTotalValue value=(($v.CGST/100) * (($v.price*$v.qty) - $DISCOUNTTotalValue))]]
			         	<td align="center" width="10%" class="own-td-2">
			         		[[$v.CGST]]% 
			         		</br>[ [[$CGSTTotalValue|number_format:2]] ]
			         	</td>

			         	[[assign var=SGSTTotalValue value=(($v.SGST/100) * (($v.price*$v.qty) - $DISCOUNTTotalValue))]]
			         	<td align="center" width="10%" class="own-td-2">
			         		[[$v.SGST]]% 
			         		</br>[ [[$SGSTTotalValue|number_format:2]] ]
			         	</td>
		         	[[/if]]


		         	[[if $searchPoData[0]['state_code'] neq 33]]
			         	[[assign var=IGSTTotalValue value=[[(($v.IGST/100) * $v.price ) * $v.qty]]]]
			         	<td align="center" width="10%" class="own-td-2">
			         		[[$v.IGST]]% 
			         		</br>[ [[$IGSTTotalValue|number_format:2]] ]
			         	</td>
		         	[[/if]]
		         	[[/if]]
		         	[[assign var=totalPriceValue value=[[($v.qty*$v.price) + $IGSTTotalValue + $SGSTTotalValue + $CGSTTotalValue - $DISCOUNTTotalValue]]]]

		         	<td align="center" width="10%" class="own-td-2"><b>[[$totalPriceValue|number_format:2]]</b></td>

		         	
		         	[[$GrandTotal = $GrandTotal + $totalPriceValue]]
        		</tr>
        	</table>
        </tr>
        [[/foreach]]
        <!-- <tr>
        	<table class="own-table">
        		<tr>
        			<td align="center" width="5%"  class="own-td-3"></td>
		         	<td align="center" width="20%" class="own-td-3"></td>
		         	<td align="center" width="10%" class="own-td-3"></td>
		         	<td align="center" width="5%"  class="own-td-3"></td>
		         	<td align="center" width="10%" class="own-td-3"></td>
		         	<td align="center" width="10%" class="own-td-3"></td>
		         	[[if $searchPoData[0]['state_code'] eq 33]]
		         	<td align="center" width="10%" class="own-td-3"></td>
		         	<td align="center" width="10%" class="own-td-3"></td>
		         	[[/if]]
		         	[[if $searchPoData[0]['state_code'] neq 33]]
		         	<td align="center" width="10%" class="own-td-3"></td>
		         	[[/if]]
		         	<td align="center" width="10%" class="own-td-3"></td>
		         	<td align="center" width="10%" class="own-td-3"></td>
        		</tr>
        	</table>
        </tr> -->
        [[assign var=GrandTotal1 value= 0]]
        [[assign var=totalPriceValue1 value= 0]]
        [[assign var=CGSTTotalValue value=0]]
        [[assign var=IGSTTotalValue value=0]]
        [[assign var=SGSTTotalValue value=0]]
        [[if $otherAdditionalCharges|@count neq 0]]
        [[foreach from=$otherAdditionalCharges key=k item=v]]
        <tr>
        	<table class="own-table" style="font-size: 10px;">
        		<tr>
        			<td align="center" width="5%"  class="own-td-2"></td>
		         	<td align="center" width="20%" class="own-td-2">[[$v.name]]</td>
		         	[[if $searchPoData[0]['supplier_status'] neq 'UNREGISTERED']]
		         	<td align="center" width="10%" class="own-td-2">[[$v.hsn_code]]</td>
		         	[[/if]]
		         	<td align="center" width="5%"  class="own-td-2"></td>
		         	<td align="center" width="10%"  class="own-td-2"></td>
		         	[[if $v.amount_type eq 'AMOUNT']]
		         		[[assign var=other_total_AMOUNT value=[[$v.amount]]]]
		         	[[else]]
		         		[[assign var=other_total_AMOUNT value=[[(($v.amount/100) * $OTHERPercGrandTotal )]]]]
		         	[[/if]]
		         	<td align="center" width="10%" class="own-td-2">
		         		[[if $v.amount_type neq 'AMOUNT']] [[$v.amount]] % <br/>[[/if]]
		         		[[$other_total_AMOUNT|number_format:2]]
		         	</td>
		         	<td align="center" width="10%"  class="own-td-2"></td>
		         	[[if $searchPoData[0]['supplier_status'] neq 'UNREGISTERED']]
	         		[[if $searchPoData[0]['state_code'] eq 33]]
			         	[[assign var=CGSTTotalValue value=[[(($v.CGST/100) * $other_total_AMOUNT )]]]]
			         	[[assign var=SGSTTotalValue value=[[(($v.SGST/100) * $other_total_AMOUNT )]]]]

			         	<td align="center" width="10%" class="own-td-2">[[$v.CGST]]%<br/>[ [[$CGSTTotalValue|number_format:2]] ]</td>
			         	<td align="center" width="10%" class="own-td-2">[[$v.CGST]]%<br/>[ [[$SGSTTotalValue|number_format:2]] ]</td>
		         	[[else]]
			         	[[assign var=IGSTTotalValue value=[[(($v.IGST/100) * $other_total_AMOUNT )]]]]
			         	<td align="center" width="10%" class="own-td-2">[[$v.IGST]]%<br/>[[$IGSTTotalValue|number_format:2]]</td>
		         	[[/if]]
		         	[[/if]]

		         	[[assign var=totalPriceValue1 value=[[$SGSTTotalValue + $CGSTTotalValue + $other_total_AMOUNT + $IGSTTotalValue]]]]
					[[$GrandTotal1 = $GrandTotal1 + $totalPriceValue1]]

		         	<td align="center" width="10%" class="own-td-2">[[$totalPriceValue1|number_format:2]]</td>
		         	
        		</tr>
        	</table>
        </tr>
        [[/foreach]]
        [[/if]]

        [[assign var=ODiscountValue value=0]]
        [[if $overAllDiscountDetails|@count neq 0]]
        [[foreach from=$overAllDiscountDetails key=k item=v]]
        <tr>
        	<table class="own-table" style="font-size: 10px;">
        		<tr>
        			[[if $v.discount_type eq 'AMOUNT']]
		         		[[assign var=ODiscountValue value=[[$v.discount]]]]
		         	[[else]]
		         		[[assign var=ODiscountValue value=(($v.discount/100) * ($GrandTotal + $GrandTotal1))]]
		         	[[/if]]

        			<td align="center" width="90%"  class="own-td-2">DISCOUNT</td>
        			<td align="center" width="10%"  class="own-td-2">
        				<b>[[$ODiscountValue|number_format:2]]</b>
        			</td>
		         	
        		</tr>
        	</table>
        </tr>
        [[/foreach]]
        [[/if]]
        <tr>
        	<table class="own-table" >
        		<tr>
		         	<td align="center" width="60%" class="own-td-2" id="numberToWord"></td>
		         	<td align="center" width="60%" class="own-td-2" style="display: none;" id="currencyCode">[[$searchPoData[0].currency]]</td>
		         	<td align="center" width="30%" class="own-td-2">TOTAL AMOUNT [[$searchPoData[0].currency]]</td>
		         	<td align="center" width="10%" class="own-td-2"><b>[[(($GrandTotal + $GrandTotal1) - $ODiscountValue)|number_format:2]]</b></td>
		         	<td id="GrandTotal" style="display: none;">[[($GrandTotal + $GrandTotal1) - $ODiscountValue]]</td>
        		</tr>
        	</table>
        </tr>
	</table>
<script>
	[[literal]]
	var number = document.getElementById('GrandTotal').innerHTML;
	var currency = document.getElementById('currencyCode').innerHTML;
	document.getElementById('numberToWord').innerHTML = "<b>AMOUNT In Words : </b> "+number2text(number,currency);
    
	function number2text(value) {
	    var currencyCode = {
			"INR"  : "PAISE",
			"EURO" : "CENTS"
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