
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
<span style="display: none;" id="currencyCode">[[$data[0].currency]]</span>
<div style="border: 2px solid black;width: 100%;margin:auto;font-size: 11px;">
	<div style="margin-left: 20px;">
		<p><b>TO</b></p>
		<p><b>[[$data[0].supplier_name]]<br/>[[$data[0].origin]]<b></p>
		<p style="text-align: right;margin-top: -45px;margin-right: 20px;"><b>Date : [[$smarty.now|date_format:"%d-%m-%Y"]]</b></p>
	</div>
	<div style="margin-top: 50px;margin-left: 20px;">
		<p><b>DEAR SIR,</b></p>
		[[if $chequeData[0].dd_number neq '']]
		<p style="text-indent: 50px;font-weight: normal;font-style: none">WE ARE ENCLOSING HEREWITH WALAJAPET / SBI DD FOR [[$data[0].currency]]. [[$grandAmount|number_format:2]] ( <span id="numberToWord"></span> ) TOWARDS YOUR FOLLOWING INVOICES.</p>
		[[else]]
		<p style="text-indent: 50px;font-weight: normal;font-style: none">WE ARE ENCLOSING HEREWITH WALAJAPET / SBI CHEQUE FOR [[$data[0].currency]]. [[$grandAmount|number_format:2]] ( <span id="numberToWord"></span> ) TOWARDS YOUR FOLLOWING INVOICES.</p>
		[[/if]]
	</div>
	<div style="width: 80%;margin:auto;margin-top: 20px;">
		<table class="coveringLetterTable">
			<thead>
		        <tr>
		          <th><b>INVOICE.NO</b></th>	
		          <th><b>DATE</b></th>
		          <th><b>AMOUNT</b></th>
		        </tr>
		    </thead>
		    <tbody>
		    	[[foreach from=$data key=k1 item=v1]]
		    	<tr>
		          <td>[[$v1.bill_number]]</td>	
		          <td>[[$v1.bill_date]]</td>
		          <td><b>[[$v1.bill_amount]]</b></td>
		        </tr>
		        [[/foreach]]
		        <tr>
		          <td colspan="2"><b>TOTAL AMOUNT</b></td>	
		          <td><b>[[$totalAmount]]</b></td>
		        </tr>
		        [[if $extraData|@count neq 0]]
		        [[foreach from=$extraData key=k1 item=v1]]
		    	<tr>
		          <td>
		          	[[if $v1.type==='D' ]] DEBIT NOTE 
                    [[elseif $v1.type==='C']] CREDIT NOTE
                    [[elseif $v1.type==='B']] BALANCE AMOUNT
                    [[elseif $v1.type==='T']] TDS
                    [[/if]]</td>	
		          <td>[[$v1.debit_note_date]]</td>
		          <td><b>[[$v1.amount]]</b></td>
		        </tr>
		        [[/foreach]]
		        <tr>
		          <td colspan="2"><b>TOTAL AMOUNT</b></td>	
		          <td><b>[[$grandAmount]]</b></td>
		        </tr>
		        [[/if]]
		        [[if $advancePaymentData|@count neq 0]]
		        [[foreach from=$advancePaymentData key=k1 item=v1]]
		    	<tr>
		    	  [[assign var=grandAmount value=$grandAmount - $v1.amount]]
		          <td>Advance Payment - [[$v1.full_po_number]]</td>	
		          <td>[[$v1.date]]</td>
		          <td><b>[[$v1.amount]]</b></td>
		        </tr>
		        [[/foreach]]
		        <tr>
		          <td colspan="2"><b>TOTAL AMOUNT</b></td>	
		          <td><b>[[$grandAmount]]</b></td>
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
    font-size: 14px;
}
</style>

<script>
	[[literal]]
	var number = document.getElementById('GrandTotal').innerHTML;
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