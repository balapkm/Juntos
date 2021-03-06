<style>
table td
{
	border-bottom:1px solid #000;
	border-right:4px solid #000;
	padding:4px 2px;
	font-size: 14px;
}
</style>
[[assign var=totalAmount value=0]]
[[foreach from=$data key=k1 item=v1]]
	[[assign var=totalAmount value=$totalAmount + $v1.bill_amount]]
[[/foreach]]

[[assign var=grandAmount value=$totalAmount]]
[[foreach from=$extraData key=k3 item=v3]]
	[[if $v3.type==='D']]
	[[assign var=grandAmount value=$grandAmount - $v3.amount]]
	[[elseif $v3.type==='C']] 
	[[assign var=grandAmount value=$grandAmount + $v3.amount]]
	[[elseif $v3.type==='B']]
	[[assign var=grandAmount value=$grandAmount + $v3.amount]]
	[[elseif $v3.type==='T']]
	[[assign var=grandAmount value=$grandAmount - $v3.amount]]
	[[/if]]
[[/foreach]]



<span style="display: none;" id="GrandTotal">[[$grandAmount]]</span>
<span style="display: none;" id="ChequeTotal">[[$chequeData[0].cheque_amount]]</span>
<span style="display: none;" id="currencyCode">[[$data[0].currency]]</span>
<table cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">
	<tr> 
		<td style="padding:0px;border-left:1px solid #000;border-top:1px solid #000;">
			<table cellspacing="0" cellpadding="0" width="100%">
				<tr>
					<td align="center" width="15%" style="border:0px;"><img src="../../assets/img/TMAR LOGO.jpg" width="100" height="100"/>
                    </td>
                    <td width="40%" style="border:0px;"><h1 style="margin-bottom: 2px">T.M.ABDUL RAHMAN & SONS</h1>
                    <h3 style="font-weight: normal;margin-top:2px">FINISHED LEATHER & SHOES</h3></td>
					<td width="25%" style="border:0px;"><font style="font:bold arial,helvetica,verdana; color:#000;">45J / 46C Ammoor Road,RANIPET - 632-401</br>
        			Tel : 91-4172-272470,272480</br>
        			Email : purchasedept@tmargroup.in </br>
        			Email : soles@tmargroup.in</font><br/><br/>

        			<font style="font:bold arial,helvetica,verdana; color:#000;">
        			H.O : 48(Old No.49) Wuthucattan Street,</br>
        			Periamet,CHENNAI-600 003.INDIA</br>
        			Tel : 91-44-25612164,25610078</br>
        			Email : headoffice@tmargroup.in</br>
        			<b>GSTIN : 33AABFT2029F1ZO1</b></font></td>
				</tr>
			</table>
		</td>
	</tr>
</table>
<div style="border: 1px solid black;width: 100%;margin:auto;font-size: 14px;">
	<div style="margin-left: 15px;">
		<p><b>TO</b></p>
		<p><b>[[$data[0].supplier_name]]<br/>[[$data[0].origin]]<b></p>
		<p style="text-align: right;margin-top: -45px;margin-right: 20px;"><b>Date : [[$smarty.now|date_format:"%d-%m-%Y"]]</b></p>
	</div>
	<div style="margin-top: 50px;margin-left: 15px;">
		<p><b>DEAR SIR,</b></p>
		[[if $chequeData[0].dd_number neq '']]
			<p style="text-indent: 50px;font-weight: normal;font-style: none;word-wrap: break-word;overflow-wrap: break-word;">WE ARE ENCLOSING HEREWITH WALAJAPET / SBI DD FOR [[$data[0].currency]]. [[$chequeData[0].cheque_amount|number_format:2]] ( <span id="numberToWord"></span> ) TOWARDS YOUR FOLLOWING INVOICES.</p>
			[[else]]
			<p style="text-indent: 50px;fon$chequeData[0].dd_numbert-weight: normal;font-style: none;word-wrap: break-word;overflow-wrap: break-word;">WE ARE ENCLOSING HEREWITH WALAJAPET / SBI CHEQUE FOR [[$data[0].currency]]. [[$chequeData[0].cheque_amount|number_format:2]] ( <span id="numberToWord"></span> ) TOWARDS YOUR FOLLOWING INVOICES.</p>
		[[/if]]
	</div>
	<div style="width: 90%;margin:auto;margin-top: 20px;">
		<table class="coveringLetterTable">
			<thead>
		        <tr>
		          <th width="60%"><b>INVOICE.NO</b></th>	
		          <th width="20%"><b>DATE</b></th>
		          <th width="20%" align="right"><b>AMOUNT</b></th>
		        </tr>
		    </thead>
		    <tbody>
		    	[[foreach from=$data key=k1 item=v1]]
		    	<tr>
		          <td>[[$v1.bill_number]]</td>	
		          <td>[[$v1.bill_date|date_format:"%d-%m-%Y"]]</td>
		          <td align="right"><b>[[$v1.bill_amount|number_format:2]]</b></td>
		        </tr>
		        [[/foreach]]
		        [[if $totalAmount neq 0]]
		        <tr>
		          <td colspan="2"><b>TOTAL AMOUNT</b></td>	
		          <td align="right"><b>[[$totalAmount|number_format:2]]</b></td>
		        </tr>
		        [[/if]]
		        [[if $extraData|@count neq 0]]
			        [[foreach from=$extraData key=k1 item=v1]]
			    	<tr>
			          <td>
			          	[[if $v1.type==='D' ]] 
			          		DEBIT NOTE [[$v1.debit_note_no]] DT [[$v1.debit_note_date|date_format:"%d-%m-%Y"]] CREDIT NOTE [[$v1.supplier_creditnote]] DT [[$v1.supplier_creditnote_date|date_format:"%d-%m-%Y"]]
	                    [[elseif $v1.type==='C']] 
	                    	CREDIT NOTE [[$v1.debit_note_no]] DT [[$v1.debit_note_date|date_format:"%d-%m-%Y"]] DEBIT NOTE [[$v1.supplier_creditnote]] DT [[$v1.supplier_creditnote_date|date_format:"%d-%m-%Y"]]
	                    [[elseif $v1.type==='B']] 
	                    	BALANCE AMOUNT <!--[[$v1.debit_note_no]] DT [[$v1.debit_note_date|date_format:"%d-%m-%Y"]] CREDIT NOTE [[$v1.supplier_creditnote]] DT [[$v1.supplier_creditnote_date]]-->
	                    [[elseif $v1.type==='T']] 
	                    	TDS <!--[[$v1.debit_note_no]] DT [[$v1.debit_note_date|date_format:"%d-%m-%Y"]] CREDIT NOTE [[$v1.supplier_creditnote]] DT [[$v1.supplier_creditnote_date|date_format:"%d-%m-%Y"]]-->
	                    [[/if]]</td>	
			          <td>[[$v1.debit_note_date|date_format:"%d-%m-%Y"]]</td>
			          <td align="right"><b>[[$v1.amount|number_format:2]]</b></td>
			        </tr>
			        [[/foreach]]
			        <tr>
			          <td colspan="2"><b>TOTAL AMOUNT</b></td>	
			          <td align="right"><b>[[$grandAmount|number_format:2]]</b></td>
			        </tr>
		        [[/if]]
		        [[if $advancePaymentData|@count neq 0]]
					[[foreach from=$advancePaymentData key=k1 item=v1]]
						[[assign var=grandAmount value=$grandAmount - $v1.pi_amount]]
					[[/foreach]]
				[[/if]]
		        [[if $advancePaymentData|@count neq 0]]
			        [[foreach from=$advancePaymentData key=k1 item=v1]]
			    	<tr>
			          <td>Advance Payment - [[$v1.po_number]]</td>	
			          <td>[[$v1.date|date_format:"%d-%m-%Y"]]</td>
			          <td align="right"><b>[[$v1.pi_amount|number_format:2]]</b></td>
			        </tr>
			        [[/foreach]]
			        <tr>
			          <td colspan="2"><b>TOTAL AMOUNT</b></td>	
			          <td align="right"><b>[[$grandAmount|number_format:2]]</b></td>
			        </tr>
		        [[/if]]
		    </tbody>
		</table>
	</div>
	<div style="margin-top: 30px;margin-left: 20px;">
		<p><b>KINDLY ACKNOWLEDGE THE RECEIPT.</b></p>
		<p><b>THANKING YOU</b></p>
		<p style="text-align: right;margin-right: 20px;margin-top: -60px"><b>YOURS FAITYFULLY</b></p>
		<p style="text-align: right;margin-right: 20px;"><b>FOR T.M.ABDUL RAHMAN & SONS</b></p>
		<p style="text-align: right;margin-right: 20px;margin-top: 80px;"><b>PARTNER / MANAGER</b></p>
		[[if $chequeData[0].dd_number neq '']]
		<p style="margin-top: -30px"><b>ENCLOSED DD NO. [[$chequeData[0].dd_number]] DATED [[$chequeData[0].dd_date|date_format:"%d-%m-%Y"]]</b></p>
		[[else]]
		<p style="margin-top: -30px"><b>ENCLOSED CHEQUE NO. [[$chequeData[0].cheque_no]] DATED [[$chequeData[0].cheque_date|date_format:"%d-%m-%Y"]]</b></p>
		[[/if]]
	</div>
</div>
<style>
.coveringLetterTable {
    border-collapse: collapse;
    border-spacing: 0;
    width: 100%;
    border: 1px solid #000;
}

.coveringLetterTable th,.coveringLetterTable td{
    text-align: center;
    font-weight: normal;
    padding: 5px 40px 5px 10px;
    border: 1px solid #000;
    font-size: 16px;
}
</style>

<script>
	[[literal]]
	var number = document.getElementById('ChequeTotal').innerHTML;
	var currency = document.getElementById('currencyCode').innerHTML;
	document.getElementById('numberToWord').innerHTML = number2text(number,currency);
    
	function number2text(value,currency) {
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