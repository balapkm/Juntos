<?php
/* Smarty version 3.1.30, created on 2018-06-10 13:04:03
  from "/home/Staging/workSpace/Juntos/application/views/templates/CoveringLetterPrint.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5b1cd46ba470d1_62678732',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '10c8ac8f4ed58953b09ea42ce8de7828e7d907dc' => 
    array (
      0 => '/home/Staging/workSpace/Juntos/application/views/templates/CoveringLetterPrint.tpl',
      1 => 1528616038,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b1cd46ba470d1_62678732 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once '/home/Staging/workSpace/Juntos/application/third_party/smarty/libs/plugins/modifier.date_format.php';
?>
<div>
	<button style="float: right;margin-top: -50px;margin-right: 105px;" class="btn btn-primary" onClick="downloadAsPdfCoverLetter()">Download as PDF</button> 
</div>

<style>
table td
{
	border-bottom:1px solid #000;
	border-right:1px solid #000;
	padding:4px 3px;
	font-size: 12px;
}
</style>

<?php $_smarty_tpl->_assignInScope('totalAmount', 0);
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'v1', false, 'k1');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k1']->value => $_smarty_tpl->tpl_vars['v1']->value) {
?>
	<?php $_smarty_tpl->_assignInScope('totalAmount', $_smarty_tpl->tpl_vars['totalAmount']->value+$_smarty_tpl->tpl_vars['v1']->value['bill_amount']);
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>


<?php $_smarty_tpl->_assignInScope('grandAmount', $_smarty_tpl->tpl_vars['totalAmount']->value);
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['extraData']->value, 'v3', false, 'k3');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k3']->value => $_smarty_tpl->tpl_vars['v3']->value) {
?>
	<?php if ($_smarty_tpl->tpl_vars['v3']->value['type'] === 'D') {?>
	<?php $_smarty_tpl->_assignInScope('grandAmount', $_smarty_tpl->tpl_vars['grandAmount']->value-$_smarty_tpl->tpl_vars['v3']->value['amount']);
?>
	<?php } elseif ($_smarty_tpl->tpl_vars['v3']->value['type'] === 'C') {?> 
	<?php $_smarty_tpl->_assignInScope('grandAmount', $_smarty_tpl->tpl_vars['grandAmount']->value+$_smarty_tpl->tpl_vars['v3']->value['amount']);
?>
	<?php } elseif ($_smarty_tpl->tpl_vars['v3']->value['type'] === 'B') {?>
	<?php $_smarty_tpl->_assignInScope('grandAmount', $_smarty_tpl->tpl_vars['grandAmount']->value+$_smarty_tpl->tpl_vars['v3']->value['amount']);
?>
	<?php } elseif ($_smarty_tpl->tpl_vars['v3']->value['type'] === 'T') {?>
	<?php $_smarty_tpl->_assignInScope('grandAmount', $_smarty_tpl->tpl_vars['grandAmount']->value-$_smarty_tpl->tpl_vars['v3']->value['amount']);
?>
	<?php }
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

<span style="display: none;" id="GrandTotal"><?php echo $_smarty_tpl->tpl_vars['grandAmount']->value;?>
</span>
<span style="display: none;" id="currencyCode"><?php echo $_smarty_tpl->tpl_vars['data']->value[0]['currency'];?>
</span>
<table cellspacing="0" cellpadding="0" border="0" width="80%" style="margin: auto;">
	<tr> 
		<td colspan="11" valign="top" style="padding:0px;border-left:1px solid #000;border-top:1px solid #000;">
			<table cellspacing="0" cellpadding="0" width="100%">
				<tr>
					<td align="center" width="15%" style="border:0px;"><img src="assets/img/TMAR LOGO.jpg" width="100" height="100"/>
					</td>
					<td width="40%" style="border:0px;"><h3>T.M.ABDUL RAHMAN & SONS</h3>
					<h5 style="font-weight: normal;">MANUFACTURES & EXPORTERS OF FINISHED LEATHER & SHOES</h5></td>
					<td width="40%" style="border:0px;"><font style="font:bold arial,helvetica,verdana; color:#000;">45J / 46C Ammoor Road,RANIPET - 632-401</br>
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
<div style="border:1px solid black;width: 80%;margin:auto;">
	<div style="margin-left: 20px;">
		<h5><b>TO</b></h5>
		<h5><b><?php echo $_smarty_tpl->tpl_vars['data']->value[0]['supplier_name'];?>
<b></h5>
		<h5><b><?php echo $_smarty_tpl->tpl_vars['data']->value[0]['origin'];?>
<b></h5>
		<h5 style="text-align: right;margin-top: -45px;margin-right: 20px;"><b>Date : <?php echo smarty_modifier_date_format(time(),"%d-%m-%Y");?>
</b></h5>
	</div>
	<div style="margin-top: 50px;margin-left: 20px;">
		<h5><b>DEAR SIR,</b></h5>
		<?php if ($_smarty_tpl->tpl_vars['chequeData']->value[0]['dd_number'] != '') {?>
		<h5 style="text-indent: 50px;">WE ARE ENCLOSING HEREWITH WALAJAPET / SBI DD FOR <?php echo $_smarty_tpl->tpl_vars['data']->value[0]['currency'];?>
. <?php echo number_format($_smarty_tpl->tpl_vars['grandAmount']->value,2);?>
 (<span id="numberToWord"></span>) TOWARDS YOUR FOLLOWING INVOICES.</h5>
		<?php } else { ?>
		<h5 style="text-indent: 50px;">WE ARE ENCLOSING HEREWITH WALAJAPET / SBI CHEQUE FOR <?php echo $_smarty_tpl->tpl_vars['data']->value[0]['currency'];?>
. <?php echo number_format($_smarty_tpl->tpl_vars['grandAmount']->value,2);?>
 (<span id="numberToWord"></span>) TOWARDS YOUR FOLLOWING INVOICES.</h5>
		<?php }?>
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
		    	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'v1', false, 'k1');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k1']->value => $_smarty_tpl->tpl_vars['v1']->value) {
?>
		    	<tr>
		          <td><?php echo $_smarty_tpl->tpl_vars['v1']->value['bill_number'];?>
</td>	
		          <td><?php echo $_smarty_tpl->tpl_vars['v1']->value['bill_date'];?>
</td>
		          <td><b><?php echo $_smarty_tpl->tpl_vars['v1']->value['bill_amount'];?>
</b></td>
		        </tr>
		        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

		        <tr>
		          <td colspan="2"><b>TOTAL AMOUNT</b></td>	
		          <td><b><?php echo $_smarty_tpl->tpl_vars['totalAmount']->value;?>
</b></td>
		        </tr>
		        <?php if (count($_smarty_tpl->tpl_vars['extraData']->value) != 0) {?>
		        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['extraData']->value, 'v1', false, 'k1');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k1']->value => $_smarty_tpl->tpl_vars['v1']->value) {
?>
		    	<tr>
		          <td>
		          	<?php if ($_smarty_tpl->tpl_vars['v1']->value['type'] === 'D') {?> 
		          		DEBIT NOTE <?php echo $_smarty_tpl->tpl_vars['v1']->value['debit_note_no'];?>
 DT <?php echo $_smarty_tpl->tpl_vars['v1']->value['debit_note_date'];?>
 CREDIT NOTE <?php echo $_smarty_tpl->tpl_vars['v1']->value['supplier_creditnote'];?>
 DT <?php echo $_smarty_tpl->tpl_vars['v1']->value['supplier_creditnote_date'];?>

                    <?php } elseif ($_smarty_tpl->tpl_vars['v1']->value['type'] === 'C') {?> 
                    	CREDIT NOTE
                    <?php } elseif ($_smarty_tpl->tpl_vars['v1']->value['type'] === 'B') {?> 
                    	BALANCE AMOUNT
                    <?php } elseif ($_smarty_tpl->tpl_vars['v1']->value['type'] === 'T') {?> 
                    	TDS
                    <?php }?></td>	
		          <td><?php echo $_smarty_tpl->tpl_vars['v1']->value['debit_note_date'];?>
</td>
		          <td><b><?php echo $_smarty_tpl->tpl_vars['v1']->value['amount'];?>
</b></td>
		        </tr>
		        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

		        <tr>
		          <td colspan="2"><b>TOTAL AMOUNT</b></td>	
		          <td><b><?php echo $_smarty_tpl->tpl_vars['grandAmount']->value;?>
</b></td>
		        </tr>
		        <?php }?>
		        <?php if (count($_smarty_tpl->tpl_vars['advancePaymentData']->value) != 0) {?>
		        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['advancePaymentData']->value, 'v1', false, 'k1');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k1']->value => $_smarty_tpl->tpl_vars['v1']->value) {
?>
		    	<tr>
		    	  <?php $_smarty_tpl->_assignInScope('grandAmount', $_smarty_tpl->tpl_vars['grandAmount']->value-$_smarty_tpl->tpl_vars['v1']->value['amount']);
?>
		          <td>Advance Payment - <?php echo $_smarty_tpl->tpl_vars['v1']->value['full_po_number'];?>
</td>	
		          <td><?php echo $_smarty_tpl->tpl_vars['v1']->value['date'];?>
</td>
		          <td><b><?php echo $_smarty_tpl->tpl_vars['v1']->value['amount'];?>
</b></td>
		        </tr>
		        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

		        <tr>
		          <td colspan="2"><b>TOTAL AMOUNT</b></td>	
		          <td><b><?php echo $_smarty_tpl->tpl_vars['grandAmount']->value;?>
</b></td>
		        </tr>
		        <?php }?>
		    </tbody>
		</table>
	</div>
	<div style="margin-top: 30px;margin-left: 20px;">
		<h5><b>KINDLY ACKNOWLEDGE THE RECEIPT.</b></h5>
		<h5><b>THANKING YOU</b></h5>
		<h5 style="text-align: right;margin-right: 20px;margin-top: -50px"><b>YOURS FAITYFULLY</b></h5>
		<h5 style="text-align: right;margin-right: 20px;"><b>FOR T.M.ABDUL RAHMAN & SONS</b></h5>
		<h5 style="text-align: right;margin-right: 20px;margin-top: 80px;"><b>PARTNER / MANAGER</b></h5>
		<?php if ($_smarty_tpl->tpl_vars['chequeData']->value[0]['dd_number'] != '') {?>
		<h5 style="margin-top: -25px"><b>ENCLOSED DD NO. <?php echo $_smarty_tpl->tpl_vars['chequeData']->value[0]['dd_number'];?>
 DATED <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['chequeData']->value[0]['dd_date'],"%d-%m-%Y");?>
</b></h5>
		<?php } else { ?>
		<h5 style="margin-top: -25px"><b>ENCLOSED CHEQUE NO. <?php echo $_smarty_tpl->tpl_vars['chequeData']->value[0]['cheque_no'];?>
 DATED <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['chequeData']->value[0]['cheque_date'],"%d-%m-%Y");?>
</b></h5>
		<?php }?>
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

<?php echo '<script'; ?>
>
	
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
	
<?php echo '</script'; ?>
><?php }
}
