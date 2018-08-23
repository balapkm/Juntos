<?php
/* Smarty version 3.1.30, created on 2018-08-23 23:34:01
  from "/home/Staging/workSpace/Juntos/application/views/templates/Indigenous_download.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5b7ef7117b2c73_85751172',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2583281bc3174b53766a5395caeca88ea43d11f3' => 
    array (
      0 => '/home/Staging/workSpace/Juntos/application/views/templates/Indigenous_download.tpl',
      1 => 1535047438,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b7ef7117b2c73_85751172 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
	<title>Juntos Download</title>
</head>
<style>
table td
{
	border-bottom:1px solid #000;
	border-right:1px solid #000;
	padding:4px 3px;
	font-size: 12px;

}
table tr td, table tr th {
    page-break-inside: avoid;
}
</style>
<body>
<?php $_smarty_tpl->_assignInScope('OTCcolspanCalc', 7);
if ($_smarty_tpl->tpl_vars['searchPoData']->value[0]['supplier_status'] != 'UNREGISTERED') {
$_smarty_tpl->_assignInScope('OTCcolspanCalc', $_smarty_tpl->tpl_vars['OTCcolspanCalc']->value+1);
}?>

<?php if ($_smarty_tpl->tpl_vars['searchPoData']->value[0]['supplier_status'] != 'UNREGISTERED') {?>
	<?php if ($_smarty_tpl->tpl_vars['searchPoData']->value[0]['state_code'] == 33) {?>
		<?php $_smarty_tpl->_assignInScope('OTCcolspanCalc', $_smarty_tpl->tpl_vars['OTCcolspanCalc']->value+2);
?>
	<?php } else { ?>
		<?php $_smarty_tpl->_assignInScope('OTCcolspanCalc', $_smarty_tpl->tpl_vars['OTCcolspanCalc']->value+1);
?>
	<?php }
}?>
<table cellspacing="0" cellpadding="0" border="0" style="height:100%;width:100%;">
    <?php $_smarty_tpl->_assignInScope('GrandTotal', 0);
?>
    <?php $_smarty_tpl->_assignInScope('TcolspanCalc', 3);
?>
    <?php $_smarty_tpl->_assignInScope('DcolspanCalc', 5);
?>
    <?php $_smarty_tpl->_assignInScope('TCcolspanCalc', 7);
?>
    <?php $_smarty_tpl->_assignInScope('OTHERPercGrandTotal', 0);
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

    <tr >
		<td width="5%" align="center" style="font:normal arial,helvetica,verdana; color:#000;border-left:1px solid #000;"><?php echo $_smarty_tpl->tpl_vars['k']->value+1;?>
</td>
     	<td width="20%" align="center" style="font:normal arial,helvetica,verdana; color:#000;">
     		<div style="text-align: left;">
                <?php echo $_smarty_tpl->tpl_vars['v']->value['material_master_name'];?>

            </div>
            <div style="margin-top: 5px;text-align:left;word-wrap: break-word;white-space: pre;"><?php echo $_smarty_tpl->tpl_vars['v']->value['po_description'];?>
</div>
     	</td>
     	<?php if ($_smarty_tpl->tpl_vars['searchPoData']->value[0]['supplier_status'] != 'UNREGISTERED') {?>
         	<?php if ($_smarty_tpl->tpl_vars['k']->value == 0) {?>
         	<?php $_smarty_tpl->_assignInScope('TcolspanCalc', $_smarty_tpl->tpl_vars['TcolspanCalc']->value+1);
?>
         	<?php $_smarty_tpl->_assignInScope('DcolspanCalc', $_smarty_tpl->tpl_vars['DcolspanCalc']->value+1);
?>
         	<?php $_smarty_tpl->_assignInScope('TCcolspanCalc', $_smarty_tpl->tpl_vars['TCcolspanCalc']->value+1);
?>
         	<?php }?>
     	<td width="10%" align="center" style="font:normal arial,helvetica,verdana; color:#000;"><?php echo $_smarty_tpl->tpl_vars['v']->value['material_hsn_code'];?>
</td>
     	<?php }?>
     	<td width="5%" align="center" style="font:normal arial,helvetica,verdana; color:#000;"><?php echo $_smarty_tpl->tpl_vars['v']->value['qty'];?>
</td>
     	<td width="7%" align="center" style="font:normal arial,helvetica,verdana; color:#000;"><?php echo $_smarty_tpl->tpl_vars['v']->value['material_uom'];?>
</td>
     	<td width="8%" align="right" style="font:normal arial,helvetica,verdana; color:#000;font-weight: bold;">
     			<?php echo number_format($_smarty_tpl->tpl_vars['v']->value['price'],2);?>
<br/>
     			<?php if ($_smarty_tpl->tpl_vars['v']->value['price_status'] != 'FINAL') {?>
     			[ <?php echo $_smarty_tpl->tpl_vars['v']->value['price_status'];?>
 ]
                <?php }?>
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

     	<td width="10%" align="center" style="font:normal arial,helvetica,verdana; color:#000;">
     		<?php echo number_format($_smarty_tpl->tpl_vars['v']->value['discount'],2);
if ($_smarty_tpl->tpl_vars['v']->value['discount_price_status'] != 'AMOUNT') {?> % <?php }?>
     		<?php if ($_smarty_tpl->tpl_vars['v']->value['discount_price_status'] != 'AMOUNT') {?>
     		</br>
     		[ <?php echo number_format($_smarty_tpl->tpl_vars['DISCOUNTTotalValue']->value,2);?>
 ]
     		<?php }?>
     	</td>

     	<?php $_smarty_tpl->_assignInScope('OTHERPercGrandTotal', ($_smarty_tpl->tpl_vars['OTHERPercGrandTotal']->value+(($_smarty_tpl->tpl_vars['v']->value['price']*$_smarty_tpl->tpl_vars['v']->value['qty'])-$_smarty_tpl->tpl_vars['DISCOUNTTotalValue']->value)));
?>

     	<?php if ($_smarty_tpl->tpl_vars['searchPoData']->value[0]['supplier_status'] != 'UNREGISTERED') {?>
     	<?php if ($_smarty_tpl->tpl_vars['searchPoData']->value[0]['state_code'] == 33) {?>
         	<?php $_smarty_tpl->_assignInScope('CGSTTotalValue', (($_smarty_tpl->tpl_vars['v']->value['CGST']/100)*(($_smarty_tpl->tpl_vars['v']->value['price']*$_smarty_tpl->tpl_vars['v']->value['qty'])-$_smarty_tpl->tpl_vars['DISCOUNTTotalValue']->value)));
?>
         	<td width="10%" align="center" style="font:normal arial,helvetica,verdana; color:#000;">
         		<?php echo $_smarty_tpl->tpl_vars['v']->value['CGST'];?>
% 
         		</br>[ <?php echo number_format($_smarty_tpl->tpl_vars['CGSTTotalValue']->value,2);?>
 ]
         	</td>
         	<?php if ($_smarty_tpl->tpl_vars['k']->value == 0) {?>
         	<?php $_smarty_tpl->_assignInScope('TcolspanCalc', $_smarty_tpl->tpl_vars['TcolspanCalc']->value+2);
?>
         	<?php $_smarty_tpl->_assignInScope('DcolspanCalc', $_smarty_tpl->tpl_vars['DcolspanCalc']->value+2);
?>
         	<?php $_smarty_tpl->_assignInScope('TCcolspanCalc', $_smarty_tpl->tpl_vars['TCcolspanCalc']->value+2);
?>
         	<?php }?>
         	<?php $_smarty_tpl->_assignInScope('SGSTTotalValue', (($_smarty_tpl->tpl_vars['v']->value['SGST']/100)*(($_smarty_tpl->tpl_vars['v']->value['price']*$_smarty_tpl->tpl_vars['v']->value['qty'])-$_smarty_tpl->tpl_vars['DISCOUNTTotalValue']->value)));
?>
         	<td width="10%" align="center" style="font:normal arial,helvetica,verdana; color:#000;">
         		<?php echo $_smarty_tpl->tpl_vars['v']->value['SGST'];?>
% 
         		</br>[ <?php echo number_format($_smarty_tpl->tpl_vars['SGSTTotalValue']->value,2);?>
 ]
         	</td>
     	<?php }?>


     	<?php if ($_smarty_tpl->tpl_vars['searchPoData']->value[0]['state_code'] != 33) {?>
     		<?php if ($_smarty_tpl->tpl_vars['k']->value == 0) {?>
     		<?php $_smarty_tpl->_assignInScope('TcolspanCalc', $_smarty_tpl->tpl_vars['TcolspanCalc']->value+1);
?>
     		<?php $_smarty_tpl->_assignInScope('DcolspanCalc', $_smarty_tpl->tpl_vars['DcolspanCalc']->value+1);
?>
     		<?php $_smarty_tpl->_assignInScope('TCcolspanCalc', $_smarty_tpl->tpl_vars['TCcolspanCalc']->value+1);
?>
     		<?php }?>
         	<?php ob_start();
echo (($_smarty_tpl->tpl_vars['v']->value['IGST']/100)*$_smarty_tpl->tpl_vars['v']->value['price'])*$_smarty_tpl->tpl_vars['v']->value['qty'];
$_prefixVariable2=ob_get_clean();
$_smarty_tpl->_assignInScope('IGSTTotalValue', $_prefixVariable2);
?>
         	<td width="10%" align="center" style="font:normal arial,helvetica,verdana; color:#000;">
         		<?php echo $_smarty_tpl->tpl_vars['v']->value['IGST'];?>
% 
         		</br>[ <?php echo number_format($_smarty_tpl->tpl_vars['IGSTTotalValue']->value,2);?>
 ]
         	</td>
     	<?php }?>
     	<?php }?>
     	<?php ob_start();
echo ($_smarty_tpl->tpl_vars['v']->value['qty']*$_smarty_tpl->tpl_vars['v']->value['price'])+$_smarty_tpl->tpl_vars['IGSTTotalValue']->value+$_smarty_tpl->tpl_vars['SGSTTotalValue']->value+$_smarty_tpl->tpl_vars['CGSTTotalValue']->value-$_smarty_tpl->tpl_vars['DISCOUNTTotalValue']->value;
$_prefixVariable3=ob_get_clean();
$_smarty_tpl->_assignInScope('totalPriceValue', $_prefixVariable3);
?>

     	<td width="10%" align="right" style="font:bold arial,helvetica,verdana; color:#000;"><b><?php echo number_format($_smarty_tpl->tpl_vars['totalPriceValue']->value,2);?>
</b></td>

     	
     	<?php $_smarty_tpl->_assignInScope('GrandTotal', $_smarty_tpl->tpl_vars['GrandTotal']->value+$_smarty_tpl->tpl_vars['totalPriceValue']->value);
?>
	</tr>
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>


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
		<td width="5%" style="font:normal arial,helvetica,verdana; color:#000;border-left:1px solid #000;"></td>
     	<td width="20%" align="center" style="font:normal arial,helvetica,verdana; color:#000;"><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</td>
     	<?php if ($_smarty_tpl->tpl_vars['searchPoData']->value[0]['supplier_status'] != 'UNREGISTERED') {?>
     	<td width="10%" align="center" style="font:normal arial,helvetica,verdana; color:#000;"><?php echo $_smarty_tpl->tpl_vars['v']->value['hsn_code'];?>
</td>
     	<?php }?>
     	<td width="5%" align="center" style="font:normal arial,helvetica,verdana; color:#000;"></td>
     	<td width="10%" align="center" style="font:normal arial,helvetica,verdana; color:#000;"></td>
     	<?php if ($_smarty_tpl->tpl_vars['v']->value['amount_type'] == 'AMOUNT') {?>
     		<?php ob_start();
echo $_smarty_tpl->tpl_vars['v']->value['amount'];
$_prefixVariable4=ob_get_clean();
$_smarty_tpl->_assignInScope('other_total_AMOUNT', $_prefixVariable4);
?>
     	<?php } else { ?>
     		<?php ob_start();
echo (($_smarty_tpl->tpl_vars['v']->value['amount']/100)*$_smarty_tpl->tpl_vars['OTHERPercGrandTotal']->value);
$_prefixVariable5=ob_get_clean();
$_smarty_tpl->_assignInScope('other_total_AMOUNT', $_prefixVariable5);
?>
     	<?php }?>
     	<td width="10%" align="right" style="font:normal arial,helvetica,verdana; color:#000;font-weight: bold;">
     		<?php if ($_smarty_tpl->tpl_vars['v']->value['amount_type'] != 'AMOUNT') {?> <?php echo $_smarty_tpl->tpl_vars['v']->value['amount'];?>
 % <br/><?php }?>
     		<?php echo number_format($_smarty_tpl->tpl_vars['other_total_AMOUNT']->value,2);?>

     	</td>
     	<td width="10%" align="center" style="font:normal arial,helvetica,verdana; color:#000;"></td>
     	<?php if ($_smarty_tpl->tpl_vars['searchPoData']->value[0]['supplier_status'] != 'UNREGISTERED') {?>
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

         	<td width="10%" align="center" style="font:normal arial,helvetica,verdana; color:#000;"><?php echo $_smarty_tpl->tpl_vars['v']->value['CGST'];?>
%<br/>[ <?php echo number_format($_smarty_tpl->tpl_vars['CGSTTotalValue']->value,2);?>
 ]</td>
         	<td width="10%" align="center" style="font:normal arial,helvetica,verdana; color:#000;"><?php echo $_smarty_tpl->tpl_vars['v']->value['CGST'];?>
%<br/>[ <?php echo number_format($_smarty_tpl->tpl_vars['SGSTTotalValue']->value,2);?>
 ]</td>
     	<?php } else { ?>
         	<?php ob_start();
echo (($_smarty_tpl->tpl_vars['v']->value['IGST']/100)*$_smarty_tpl->tpl_vars['other_total_AMOUNT']->value);
$_prefixVariable8=ob_get_clean();
$_smarty_tpl->_assignInScope('IGSTTotalValue', $_prefixVariable8);
?>
         	<td width="10%" align="center" style="font:normal arial,helvetica,verdana; color:#000;"><?php echo $_smarty_tpl->tpl_vars['v']->value['IGST'];?>
%<br/><?php echo number_format($_smarty_tpl->tpl_vars['IGSTTotalValue']->value,2);?>
</td>
     	<?php }?>
     	<?php }?>

     	<?php ob_start();
echo $_smarty_tpl->tpl_vars['SGSTTotalValue']->value+$_smarty_tpl->tpl_vars['CGSTTotalValue']->value+$_smarty_tpl->tpl_vars['other_total_AMOUNT']->value+$_smarty_tpl->tpl_vars['IGSTTotalValue']->value;
$_prefixVariable9=ob_get_clean();
$_smarty_tpl->_assignInScope('totalPriceValue1', $_prefixVariable9);
?>
		<?php $_smarty_tpl->_assignInScope('GrandTotal1', $_smarty_tpl->tpl_vars['GrandTotal1']->value+$_smarty_tpl->tpl_vars['totalPriceValue1']->value);
?>

     	<td width="10%" align="right" style="font:normal arial,helvetica,verdana; color:#000;"><b><?php echo number_format($_smarty_tpl->tpl_vars['totalPriceValue1']->value,2);?>
</b></td>
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

		<td align="center" style="font:normal arial,helvetica,verdana; color:#000;border-left:1px solid #000;"></td>
		<td align="center" style="font:normal arial,helvetica,verdana; color:#000;" colspan="<?php echo $_smarty_tpl->tpl_vars['DcolspanCalc']->value;?>
">DISCOUNT</td>
		<td align="right" style="font:normal arial,helvetica,verdana; color:#000;">
			<b><?php echo number_format($_smarty_tpl->tpl_vars['ODiscountValue']->value,2);?>
</b>
		</td>
    </tr>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    <?php }?>
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
     	<td align="center" style="font:normal arial,helvetica,verdana; color:#000;border-left:1px solid #000;"><?php echo $_smarty_tpl->tpl_vars['TCcolspanCalc']->value;?>
</td>
     	<?php if ($_smarty_tpl->tpl_vars['TCcolspanCalc']->value > 7) {?>
	     	<?php if ($_smarty_tpl->tpl_vars['TCcolspanCalc']->value == 9) {?>
	     	<td align="center" style="font:normal arial,helvetica,verdana; color:#000;" id="numberToWord" colspan="<?php echo round(($_smarty_tpl->tpl_vars['TCcolspanCalc']->value*0.4),0);?>
"></td>
	     	<?php } else { ?>
	     	<td align="center" style="font:normal arial,helvetica,verdana; color:#000;" id="numberToWord" colspan="<?php echo round(($_smarty_tpl->tpl_vars['TCcolspanCalc']->value*0.5),0);?>
"></td>
	     	<?php }?>
     	<?php } else { ?>
     	<td align="center" style="font:normal arial,helvetica,verdana; color:#000;" id="numberToWord" colspan="<?php echo round(($_smarty_tpl->tpl_vars['TCcolspanCalc']->value*0.4),0);?>
"></td>
     	<?php }?>
     	<td align="center" style="font:normal arial,helvetica,verdana; color:#000;" colspan="<?php echo round(($_smarty_tpl->tpl_vars['TCcolspanCalc']->value*0.3),0);?>
">TOTAL AMOUNT <?php echo $_smarty_tpl->tpl_vars['searchPoData']->value[0]['currency'];?>
</td> 
     	<td colspan="1" align="right" style="font:normal arial,helvetica,verdana; color:#000;"><b><?php echo number_format((($_smarty_tpl->tpl_vars['GrandTotal']->value+$_smarty_tpl->tpl_vars['GrandTotal1']->value)-$_smarty_tpl->tpl_vars['ODiscountValue']->value),2);?>
</b></td>

     	<td id="GrandTotal" style="display: none;"><?php echo ($_smarty_tpl->tpl_vars['GrandTotal']->value+$_smarty_tpl->tpl_vars['GrandTotal1']->value)-$_smarty_tpl->tpl_vars['ODiscountValue']->value;?>
</td>
     	<td align="center" style="display: none;" id="currencyCode" ><?php echo $_smarty_tpl->tpl_vars['searchPoData']->value[0]['currency'];?>
</td>
	</tr>
	<tr>
		<td colspan="<?php echo round(($_smarty_tpl->tpl_vars['TCcolspanCalc']->value*0.6),0);?>
" style="border-left:1px solid #000;border-top: 1px solid #000">
			<h4><b>Terms & Condition :</b></h4>
			<ul>
			<li style="font:bold arial,helvetica,verdana; color:#000;">Original invoice with 2 duplicate copies should be submitted at the time of delivering the goods.Products HSN code should be mentioned on the invoice.</li>
			<li style="font:bold arial,helvetica,verdana; color:#000;">Please quote our purchase order number on the invoice.</li>
			<li style="font:bold arial,helvetica,verdana; color:#000;">The material will not be allowed inside our premises on non-working hours and holidays.</li>
			<li style="font:bold arial,helvetica,verdana; color:#000;">Replacement of damages and defects required.We reserve the right to cancel the orders which are delayed / defective.Any further claims from our buyer in respect to quality of the materials supplied by you and incidental expenses therefore will be entirely at your cost.</li>
			<li style="font:bold arial,helvetica,verdana; color:#000;">Freight to be paid as agreed between the parties.</li>
			<li style="font:bold arial,helvetica,verdana; color:#000;">Failing to file a tax return on time.We reserved the right to deduct the tax AMOUNT from your payment.</li>
            <li style="font:bold arial,helvetica,verdana; color:#000;">The product supplied should meet reach (European) Standards.Non-compliance will result in penalties.</li>
			<li style="font:bold arial,helvetica,verdana; color:#000;">SUPPLY OF MATERIAL SHOULD PASS ALL TEST AS PER REACH/RCS/RSC/GB PHTHALATES STANDARD</li>
			</ul>
		</td>
		<td  colspan="<?php echo round(($_smarty_tpl->tpl_vars['TCcolspanCalc']->value*0.4),0);?>
" style="border-top: 1px solid #000">
			<!--<h5 style="float: left;margin:80px 0px 0px 20px;"><b>Incharge</b></h5>
			<h5 style="float: right;margin:80px 20px 0px 20px;"><b>For T.M.Abdul Rahman & Sons</b></h5>
			</br>
			</br>
			<h5 style="float: left;margin:100px 0px 0px 20px;"><b>Signature</b></h5>
			<h5 style="float: right;margin:100px 20px 0px 20px;"><b>Authorized & Signature</b></h5>-->
			<div style="width:40%;float:left;">
				<p style="font-weight:bold;color:#000;font-size:10px;line-height: 200px;">Incharge</p>
				<p style="font-weight:bold;color:#000;font-size:10px;margin-top: 20px;">Signature</p>
			</div>
			<div style="width:60%;float:left">
				<p style="font-weight:bold;color:#000;font-size:10px;line-height: 200px;">For T.M.Abdul Rahman & Sons</p>
				<p style="font-weight:bold;color:#000;font-size:10px;margin-top: 20px;"> Authorized & Signature</p>
			</div>
			<div style="clear: both;"></div>
		</td>
	</tr>
</table>
<?php echo '<script'; ?>
>
	
	// (function () {

	//     var getPositionAtCenter = function (element) {
	//         var data = element.getBoundingClientRect();
	//         return {
	//             x: data.left + data.width / 2,
	//             y: data.top + data.height / 2
	//         };
	//     };

	//     var getDistanceBetweenElements = function (a, b) {
	//         var aPosition = getPositionAtCenter(a);
	//         var bPosition = getPositionAtCenter(b);
	//         return Math.sqrt(
	//         Math.pow(aPosition.x - bPosition.x, 2) + Math.pow(aPosition.y - bPosition.y, 2));
	//     };

	//     document.getElementById("result").style.height = (842 - getDistanceBetweenElements(document.getElementById("x"),
	//     document.getElementById("y")))+"px";

	//    //   document.getElementById("result").textContent = getDistanceBetweenElements(document.getElementById("x"),
 //    // document.getElementById("y"));
	    
	//     // document.getElementById("result").innerHTML = ;

	// })();

	var number = document.getElementById('GrandTotal').innerHTML;
	var currency = document.getElementById('currencyCode').innerHTML;
	document.getElementById('numberToWord').innerHTML = "<b>Amount in words : </b> "+number2text(number,currency);
    
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
	
<?php echo '</script'; ?>
>
</body>
</html><?php }
}
