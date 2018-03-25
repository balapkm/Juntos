<?php
/* Smarty version 3.1.30, created on 2018-03-26 00:06:47
  from "/home/Staging/workSpace/Juntos/application/views/templates/Indigenous_download.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ab7ec3f329ce1_32162989',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2583281bc3174b53766a5395caeca88ea43d11f3' => 
    array (
      0 => '/home/Staging/workSpace/Juntos/application/views/templates/Indigenous_download.tpl',
      1 => 1522002335,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ab7ec3f329ce1_32162989 (Smarty_Internal_Template $_smarty_tpl) {
?>
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
		         	<td align="center" width="10%">HSN CODE</td>
		         	<td align="center" width="5%">QTY</td>
		         	<td align="center" width="10%">UOM</td>
		         	<td align="center" width="10%">PRICE</td>
		         	<td align="center" width="10%">DISCOUNT</td>
		         	<?php if ($_smarty_tpl->tpl_vars['searchPoData']->value[0]['state_code'] == 33) {?>
			         	<td align="center" width="10%">CGST</td>
			         	<td align="center" width="10%">SGST</td>
		         	<?php }?>
		         	<?php if ($_smarty_tpl->tpl_vars['searchPoData']->value[0]['state_code'] != 33) {?>
		         		<td align="center" width="10%" >IGST</td>
		         	<?php }?>
		         	<td align="center" width="10%">TOTAL <br/>AMOUNT</td>
        		</tr>
        	</table>
        </tr>
        <?php $_smarty_tpl->_assignInScope('GrandTotal', 0);
?>
        <?php $_smarty_tpl->_assignInScope('CGSTTotalValue', 0);
?>
        <?php $_smarty_tpl->_assignInScope('IGSTTotalValue', 0);
?>
        <?php $_smarty_tpl->_assignInScope('SGSTTotalValue', 0);
?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['searchPoData']->value, 'v', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
?>
        <tr>
        	<table class="own-table" style="font-size: 10px;">
        		<tr>
        			<td align="center" width="5%"  class="own-td-2"><?php echo $_smarty_tpl->tpl_vars['k']->value+1;?>
</td>
		         	<td align="center" width="20%" class="own-td-2" style="text-align:left;word-wrap: break-word;white-space: pre;"><?php echo $_smarty_tpl->tpl_vars['v']->value['material_name'];?>
</td>
		         	<td align="center" width="10%" class="own-td-2"><?php echo $_smarty_tpl->tpl_vars['v']->value['material_hsn_code'];?>
</td>
		         	<td align="center" width="5%"  class="own-td-2"><?php echo $_smarty_tpl->tpl_vars['v']->value['qty'];?>
</td>
		         	<td align="center" width="10%" class="own-td-2"><?php echo $_smarty_tpl->tpl_vars['v']->value['material_uom'];?>
</td>
		         	<td align="center" width="10%" class="own-td-2">
		         			<?php echo number_format($_smarty_tpl->tpl_vars['v']->value['price'],2);?>
<br/>
		         			[ <?php echo $_smarty_tpl->tpl_vars['v']->value['price_status'];?>
 ]
		         	</td>

		         	<?php if ($_smarty_tpl->tpl_vars['v']->value['discount_price_status'] == 'AMOUNT') {?>
		         		<?php ob_start();
echo $_smarty_tpl->tpl_vars['v']->value['discount'];
$_prefixVariable1=ob_get_clean();
$_smarty_tpl->_assignInScope('DISCOUNTTotalValue', $_prefixVariable1);
?>
		         	<?php } else { ?>
		         		<?php $_smarty_tpl->_assignInScope('DISCOUNTTotalValue', (($_smarty_tpl->tpl_vars['v']->value['discount']/100)*$_smarty_tpl->tpl_vars['v']->value['price'])*$_smarty_tpl->tpl_vars['v']->value['qty']);
?>
		         	<?php }?>

		         	<td align="center" width="10%" class="own-td-2">
		         		<?php echo number_format($_smarty_tpl->tpl_vars['v']->value['discount'],2);
if ($_smarty_tpl->tpl_vars['v']->value['discount_price_status'] != 'AMOUNT') {?> % <?php }?>
		         		<?php if ($_smarty_tpl->tpl_vars['v']->value['discount_price_status'] != 'AMOUNT') {?>
		         		</br>
		         		[ <?php echo number_format($_smarty_tpl->tpl_vars['DISCOUNTTotalValue']->value,2);?>
 ]
		         		<?php }?>
		         	</td>

		         	<?php if ($_smarty_tpl->tpl_vars['searchPoData']->value[0]['state_code'] == 33) {?>
			         	<?php $_smarty_tpl->_assignInScope('CGSTTotalValue', (($_smarty_tpl->tpl_vars['v']->value['CGST']/100)*(($_smarty_tpl->tpl_vars['v']->value['price']*$_smarty_tpl->tpl_vars['v']->value['qty'])-$_smarty_tpl->tpl_vars['DISCOUNTTotalValue']->value)));
?>
			         	<td align="center" width="10%" class="own-td-2">
			         		<?php echo $_smarty_tpl->tpl_vars['v']->value['CGST'];?>
% 
			         		</br>[ <?php echo number_format($_smarty_tpl->tpl_vars['CGSTTotalValue']->value,2);?>
 ]
			         	</td>

			         	<?php $_smarty_tpl->_assignInScope('SGSTTotalValue', (($_smarty_tpl->tpl_vars['v']->value['SGST']/100)*(($_smarty_tpl->tpl_vars['v']->value['price']*$_smarty_tpl->tpl_vars['v']->value['qty'])-$_smarty_tpl->tpl_vars['DISCOUNTTotalValue']->value)));
?>
			         	<td align="center" width="10%" class="own-td-2">
			         		<?php echo $_smarty_tpl->tpl_vars['v']->value['SGST'];?>
% 
			         		</br>[ <?php echo number_format($_smarty_tpl->tpl_vars['SGSTTotalValue']->value,2);?>
 ]
			         	</td>
		         	<?php }?>


		         	<?php if ($_smarty_tpl->tpl_vars['searchPoData']->value[0]['state_code'] != 33) {?>
			         	<?php ob_start();
echo (($_smarty_tpl->tpl_vars['v']->value['IGST']/100)*$_smarty_tpl->tpl_vars['v']->value['price'])*$_smarty_tpl->tpl_vars['v']->value['qty'];
$_prefixVariable2=ob_get_clean();
$_smarty_tpl->_assignInScope('IGSTTotalValue', $_prefixVariable2);
?>
			         	<td align="center" width="10%" class="own-td-2">
			         		<?php echo $_smarty_tpl->tpl_vars['v']->value['IGST'];?>
% 
			         		</br>[ <?php echo number_format($_smarty_tpl->tpl_vars['IGSTTotalValue']->value,2);?>
 ]
			         	</td>
		         	<?php }?>
		         	<?php ob_start();
echo ($_smarty_tpl->tpl_vars['v']->value['qty']*$_smarty_tpl->tpl_vars['v']->value['price'])+$_smarty_tpl->tpl_vars['IGSTTotalValue']->value+$_smarty_tpl->tpl_vars['SGSTTotalValue']->value+$_smarty_tpl->tpl_vars['CGSTTotalValue']->value-$_smarty_tpl->tpl_vars['DISCOUNTTotalValue']->value;
$_prefixVariable3=ob_get_clean();
$_smarty_tpl->_assignInScope('totalPriceValue', $_prefixVariable3);
?>

		         	<td align="center" width="10%" class="own-td-2"><b><?php echo number_format($_smarty_tpl->tpl_vars['totalPriceValue']->value,2);?>
</b></td>

		         	
		         	<?php $_smarty_tpl->_assignInScope('GrandTotal', $_smarty_tpl->tpl_vars['GrandTotal']->value+$_smarty_tpl->tpl_vars['totalPriceValue']->value);
?>
        		</tr>
        	</table>
        </tr>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        <!-- <tr>
        	<table class="own-table">
        		<tr>
        			<td align="center" width="5%"  class="own-td-3"></td>
		         	<td align="center" width="20%" class="own-td-3"></td>
		         	<td align="center" width="10%" class="own-td-3"></td>
		         	<td align="center" width="5%"  class="own-td-3"></td>
		         	<td align="center" width="10%" class="own-td-3"></td>
		         	<td align="center" width="10%" class="own-td-3"></td>
		         	<?php if ($_smarty_tpl->tpl_vars['searchPoData']->value[0]['state_code'] == 33) {?>
		         	<td align="center" width="10%" class="own-td-3"></td>
		         	<td align="center" width="10%" class="own-td-3"></td>
		         	<?php }?>
		         	<?php if ($_smarty_tpl->tpl_vars['searchPoData']->value[0]['state_code'] != 33) {?>
		         	<td align="center" width="10%" class="own-td-3"></td>
		         	<?php }?>
		         	<td align="center" width="10%" class="own-td-3"></td>
		         	<td align="center" width="10%" class="own-td-3"></td>
        		</tr>
        	</table>
        </tr> -->
        <?php $_smarty_tpl->_assignInScope('GrandTotal1', 0);
?>
        <?php $_smarty_tpl->_assignInScope('totalPriceValue1', 0);
?>
        <?php $_smarty_tpl->_assignInScope('CGSTTotalValue', 0);
?>
        <?php $_smarty_tpl->_assignInScope('IGSTTotalValue', 0);
?>
        <?php $_smarty_tpl->_assignInScope('SGSTTotalValue', 0);
?>
        <?php if (count($_smarty_tpl->tpl_vars['otherAdditionalCharges']->value) != 0) {?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['otherAdditionalCharges']->value, 'v', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
?>
        <tr>
        	<table class="own-table" style="font-size: 10px;">
        		<tr>
        			<td align="center" width="5%"  class="own-td-2"></td>
		         	<td align="center" width="20%" class="own-td-2"><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</td>
		         	<td align="center" width="10%" class="own-td-2"><?php echo $_smarty_tpl->tpl_vars['v']->value['hsn_code'];?>
</td>
		         	<td align="center" width="5%"  class="own-td-2"></td>
		         	<td align="center" width="10%"  class="own-td-2"></td>
		         	<?php if ($_smarty_tpl->tpl_vars['v']->value['AMOUNT_type'] == 'AMOUNT') {?>
		         		<?php ob_start();
echo $_smarty_tpl->tpl_vars['v']->value['amount'];
$_prefixVariable4=ob_get_clean();
$_smarty_tpl->_assignInScope('other_total_AMOUNT', $_prefixVariable4);
?>
		         	<?php } else { ?>
		         		<?php ob_start();
echo (($_smarty_tpl->tpl_vars['v']->value['amount']/100)*$_smarty_tpl->tpl_vars['GrandTotal']->value);
$_prefixVariable5=ob_get_clean();
$_smarty_tpl->_assignInScope('other_total_AMOUNT', $_prefixVariable5);
?>
		         	<?php }?>
		         	<td align="center" width="10%" class="own-td-2">
		         		<?php if ($_smarty_tpl->tpl_vars['v']->value['AMOUNT_type'] != 'AMOUNT') {?> <?php echo $_smarty_tpl->tpl_vars['v']->value['amount'];?>
 % <br/><?php }?>
		         		<?php echo number_format($_smarty_tpl->tpl_vars['other_total_AMOUNT']->value,2);?>

		         	</td>
		         	<td align="center" width="10%"  class="own-td-2"></td>

	         		<?php if ($_smarty_tpl->tpl_vars['searchPoData']->value[0]['state_code'] == 33) {?>
			         	<?php ob_start();
echo (($_smarty_tpl->tpl_vars['v']->value['CGST']/100)*$_smarty_tpl->tpl_vars['other_total_AMOUNT']->value);
$_prefixVariable6=ob_get_clean();
$_smarty_tpl->_assignInScope('CGSTTotalValue', $_prefixVariable6);
?>
			         	<?php ob_start();
echo (($_smarty_tpl->tpl_vars['v']->value['SGST']/100)*$_smarty_tpl->tpl_vars['other_total_AMOUNT']->value);
$_prefixVariable7=ob_get_clean();
$_smarty_tpl->_assignInScope('SGSTTotalValue', $_prefixVariable7);
?>

			         	<td align="center" width="10%" class="own-td-2"><?php echo $_smarty_tpl->tpl_vars['v']->value['CGST'];?>
%<br/>[ <?php echo number_format($_smarty_tpl->tpl_vars['CGSTTotalValue']->value,2);?>
 ]</td>
			         	<td align="center" width="10%" class="own-td-2"><?php echo $_smarty_tpl->tpl_vars['v']->value['CGST'];?>
%<br/>[ <?php echo number_format($_smarty_tpl->tpl_vars['SGSTTotalValue']->value,2);?>
 ]</td>
		         	<?php } else { ?>
			         	<?php ob_start();
echo (($_smarty_tpl->tpl_vars['v']->value['IGST']/100)*$_smarty_tpl->tpl_vars['other_total_AMOUNT']->value);
$_prefixVariable8=ob_get_clean();
$_smarty_tpl->_assignInScope('IGSTTotalValue', $_prefixVariable8);
?>
			         	<td align="center" width="10%" class="own-td-2"><?php echo $_smarty_tpl->tpl_vars['v']->value['IGST'];?>
%<br/><?php echo number_format($_smarty_tpl->tpl_vars['IGSTTotalValue']->value,2);?>
</td>
		         	<?php }?>

		         	<?php ob_start();
echo $_smarty_tpl->tpl_vars['SGSTTotalValue']->value+$_smarty_tpl->tpl_vars['CGSTTotalValue']->value+$_smarty_tpl->tpl_vars['other_total_AMOUNT']->value+$_smarty_tpl->tpl_vars['IGSTTotalValue']->value;
$_prefixVariable9=ob_get_clean();
$_smarty_tpl->_assignInScope('totalPriceValue1', $_prefixVariable9);
?>
					<?php $_smarty_tpl->_assignInScope('GrandTotal1', $_smarty_tpl->tpl_vars['GrandTotal1']->value+$_smarty_tpl->tpl_vars['totalPriceValue1']->value);
?>

		         	<td align="center" width="10%" class="own-td-2"><?php echo number_format($_smarty_tpl->tpl_vars['totalPriceValue1']->value,2);?>
</td>
		         	
        		</tr>
        	</table>
        </tr>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        <?php }?>

        <?php $_smarty_tpl->_assignInScope('ODiscountValue', 0);
?>
        <?php if (count($_smarty_tpl->tpl_vars['overAllDiscountDetails']->value) != 0) {?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['overAllDiscountDetails']->value, 'v', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
?>
        <tr>
        	<table class="own-table" style="font-size: 10px;">
        		<tr>
        			<?php if ($_smarty_tpl->tpl_vars['v']->value['discount_type'] == 'AMOUNT') {?>
		         		<?php ob_start();
echo $_smarty_tpl->tpl_vars['v']->value['discount'];
$_prefixVariable10=ob_get_clean();
$_smarty_tpl->_assignInScope('ODiscountValue', $_prefixVariable10);
?>
		         	<?php } else { ?>
		         		<?php $_smarty_tpl->_assignInScope('ODiscountValue', (($_smarty_tpl->tpl_vars['v']->value['discount']/100)*($_smarty_tpl->tpl_vars['GrandTotal']->value+$_smarty_tpl->tpl_vars['GrandTotal1']->value)));
?>
		         	<?php }?>

        			<td align="center" width="90%"  class="own-td-2">DISCOUNT</td>
        			<td align="center" width="10%"  class="own-td-2">
        				<b><?php echo number_format($_smarty_tpl->tpl_vars['ODiscountValue']->value,2);?>
</b>
        			</td>
		         	
        		</tr>
        	</table>
        </tr>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        <?php }?>
        <tr>
        	<table class="own-table" >
        		<tr>
		         	<td align="center" width="60%" class="own-td-2" id="numberToWord"></td>
		         	<td align="center" width="30%" class="own-td-2">TOTAL AMOUNT INR</td>
		         	<td align="center" width="10%" class="own-td-2"><b><?php echo number_format((($_smarty_tpl->tpl_vars['GrandTotal']->value+$_smarty_tpl->tpl_vars['GrandTotal1']->value)-$_smarty_tpl->tpl_vars['ODiscountValue']->value),2);?>
</b></td>
		         	<td id="GrandTotal" style="display: none;"><?php echo ($_smarty_tpl->tpl_vars['GrandTotal']->value+$_smarty_tpl->tpl_vars['GrandTotal1']->value)-$_smarty_tpl->tpl_vars['ODiscountValue']->value;?>
</td>
        		</tr>
        	</table>
        </tr>
	</table>
<?php echo '<script'; ?>
>
	
	var number = document.getElementById('GrandTotal').innerHTML;
	document.getElementById('numberToWord').innerHTML = "<b>AMOUNT IN WORDS : </b> "+number2text(number);
    
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
	
<?php echo '</script'; ?>
>
</body>
</html><?php }
}
