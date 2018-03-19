<?php
/* Smarty version 3.1.30, created on 2018-03-19 10:46:03
  from "/home/Staging/workSpace/Juntos/application/views/templates/poViewTemplate.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5aaf47935a9535_77833916',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9650d35c3e7d40742c6fdc64eb5259364fd4c811' => 
    array (
      0 => '/home/Staging/workSpace/Juntos/application/views/templates/poViewTemplate.tpl',
      1 => 1521436555,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5aaf47935a9535_77833916 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['view_status']->value == 'Download') {?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<style>
.own-table{
    width: 100%;
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
<?php }
if ($_smarty_tpl->tpl_vars['view_status']->value != 'Download') {?>
<hr/>
<?php }?>
<div class="col-lg-12" style="margin-top: 50px;">
	<?php if ($_smarty_tpl->tpl_vars['view_status']->value != 'Download') {?>
	<button class="btn btn-primary" style="float: right;margin-bottom: 10px;" onclick="downloadAsPdfPODetails()">Download as PDF</button>
	<button class="btn btn-primary" style="float: right;margin-bottom: 10px;margin-right: 10px;" onclick='addAdditionalCharges(<?php echo json_encode($_smarty_tpl->tpl_vars['searchPoData']->value[0]);?>
)'>Add Additional Charges</button>
	<?php }?>
	<table class="own-table">
		<tr>
        	<table class="own-table">
        		<tr>
        			<?php if ($_smarty_tpl->tpl_vars['view_status']->value == 'Download') {?>
        			<td width="15%" style="padding: 20px 15px 28px 40px;border: 0px;">
        				<?php if ($_smarty_tpl->tpl_vars['view_status']->value != 'Download') {?>
        				<img src="assets/img/TMAR LOGO.jpg" width="100" height="100"/>
        				<?php } else { ?>
        				<img src="../../assets/img/TMAR LOGO.jpg" width="100" height="100"/>
        				<!-- <img src="/home/Staging/workSpace/Juntos/assets/img/TMAR LOGO.jpg" width="100" height="100"/> -->
        				<!-- <img src="http://juntossoft.com/tmar/TMAR%20LOGO.jpg" width="100" height="100"/> -->
        				<?php }?>
        			</td>
		         	<td width="45%" style="border: 0px;">
		         		<h3><b>T.M.ABDUL RAHMAN & SONS</b></h3>
						<h4 style="font-weight: normal;">MANUFACTURES & EXPORTERS OF FINISHED LEATHER & SHOES</h4>
		         	</td>
		         	<?php } else { ?>
		         	<td width="15%" style="padding: 20px 0px 28px 40px;border: 0px;">
        				<?php if ($_smarty_tpl->tpl_vars['view_status']->value != 'Download') {?>
        				<img src="assets/img/TMAR LOGO.jpg" width="100" height="100"/>
        				<?php } else { ?>
        				<img src="http://juntossoft.com/tmar/TMAR%20LOGO.jpg" width="100" height="100"/>
        				<?php }?>
        			</td>
		         	<td width="45%" style="border: 0px;">
		         		<h4><b>T.M.ABDUL RAHMAN & SONS</b></h4>
						<h5 style="font-weight: normal;">MANUFACTURES & EXPORTERS OF FINISHED LEATHER & SHOES</h5>
		         	</td>
		         	<?php }?>
		         	<td width="40%" style="border: 0px;padding-right: 20px;" align="right">
		         		<h5 style="text-align: justify;margin-left:50px;"><b>45J / 46C Ammoor Road,RANIPET - 632-401</br>
	        			Tel : 91-4172-272470,272480</br>
	        			Email : purchasedept@tmargroup.in </br>
	        			Email : soles@tmargroup.in</b></h5>

	        			<h5 style="text-align: justify;margin-left:50px;"><b>
	        			H.O : 48(Old No.49) Wuthucattan Street,</br>
	        			Periamet,CHENNAI-600 003.INDIA</br>
	        			Tel : 91-44-25612164,25610078</br>
	        			Email : headoffice@tmargroup.in</br>
	        			GSTIN : 33AABFT2029F1ZO</b></h5>
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
		         	<td class="own-td-1" width="30%"><?php echo $_smarty_tpl->tpl_vars['searchPoData']->value[0]['full_po_number'];?>
</td>
        		</tr>
        	</table>
        </tr>
        <tr>
        	<table class="own-table">
        		<tr>
        			<td class="own-td-1" width="40%"><?php echo $_smarty_tpl->tpl_vars['searchPoData']->value[0]['supplier_name'];?>
</td>
		         	<td class="own-td-1" width="30%"><b>Date</b></td>
		         	<td class="own-td-1" width="30%"><?php echo $_smarty_tpl->tpl_vars['searchPoData']->value[0]['po_date'];?>
</td>
        		</tr>
        	</table>
        </tr>
        <tr>
        	<table class="own-table">
        		<tr>
        			<td class="own-td-1" width="40%"><?php echo $_smarty_tpl->tpl_vars['searchPoData']->value[0]['origin'];?>
</td>
		         	<td class="own-td-1" width="30%"><b>Ord Ref</b></td>
		         	<td class="own-td-1" width="30%"><?php echo $_smarty_tpl->tpl_vars['searchPoData']->value[0]['order_reference'];?>
</td>
        		</tr>
        	</table>
        </tr>
        <tr>
        	<table class="own-table">
        		<tr>
        			<td class="own-td-1" width="40%"><b>GSTIN : </b><?php echo $_smarty_tpl->tpl_vars['searchPoData']->value[0]['gst_no'];?>
</td>
		         	<td class="own-td-1" width="30%"><b>Delivery Date</b></td>
		         	<td class="own-td-1" width="30%"><?php echo $_smarty_tpl->tpl_vars['searchPoData']->value[0]['delivery_date'];?>
</td>
        		</tr>
        	</table>
        </tr>
        <tr>
        	<table class="own-table">
        		<?php if ($_smarty_tpl->tpl_vars['view_status']->value == 'Download') {?>
        		<tr style="font-weight: bold;font-size: 14px;">
        		<?php } else { ?>
        		<tr style="font-weight: bold;">
        		<?php }?>
        			<td align="center" width="5%">S.No</td>
		         	<td align="center" width="20%">DESCRIPTION</td>
		         	<td align="center" width="10%">HSN Code</td>
		         	<td align="center" width="5%">QTY</td>
		         	<td align="center" width="7%">UOM</td>
		         	<td align="center" width="8%">PRICE</td>
		         	<td align="center" width="10%">DISCOUNT</td>
		         	<?php if ($_smarty_tpl->tpl_vars['searchPoData']->value[0]['type'] != 'Import' && $_smarty_tpl->tpl_vars['searchPoData']->value[0]['type'] != 'Sample_Import') {?>
			         	<?php if ($_smarty_tpl->tpl_vars['searchPoData']->value[0]['state_code'] == 33) {?>
				         	<td align="center" width="10%">CGST</td>
				         	<td align="center" width="10%">SGST</td>
			         	<?php }?>
			         	<?php if ($_smarty_tpl->tpl_vars['searchPoData']->value[0]['state_code'] != 33) {?>
			         		<td align="center" width="10%" >IGST</td>
			         	<?php }?>
			        <?php }?>
		         	<td align="center" width="10%">TOTAL AMOUNT</td>
		         	<?php if ($_smarty_tpl->tpl_vars['view_status']->value != 'Download') {?>
		         	<td align="center" width="10%">Action</td>
		         	<?php }?>
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
        	<table class="own-table">
        		<tr>
        			<td align="center" width="5%"  class="own-td-2"><?php echo $_smarty_tpl->tpl_vars['k']->value+1;?>
</td>
		         	<td align="center" width="20%" class="own-td-2" style="text-align:left;word-wrap: break-word;white-space: pre;"><?php echo $_smarty_tpl->tpl_vars['v']->value['material_name'];?>
</td>
		         	<td align="center" width="10%" class="own-td-2"><?php echo $_smarty_tpl->tpl_vars['v']->value['material_hsn_code'];?>
</td>
		         	<td align="center" width="5%"  class="own-td-2"><?php echo $_smarty_tpl->tpl_vars['v']->value['qty'];?>
</td>
		         	<td align="center" width="7%" class="own-td-2"><?php echo $_smarty_tpl->tpl_vars['v']->value['material_uom'];?>
</td>
		         	<td align="center" width="8%" class="own-td-2"><?php echo number_format($_smarty_tpl->tpl_vars['v']->value['price'],2);?>
</td>

		         	<?php if ($_smarty_tpl->tpl_vars['v']->value['discount_price_status'] == 'Amount') {?>
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
if ($_smarty_tpl->tpl_vars['v']->value['discount_price_status'] != 'Amount') {?> % <?php }?>
		         		<?php if ($_smarty_tpl->tpl_vars['v']->value['discount_price_status'] != 'Amount') {?>
		         		</br>
		         		[ <?php echo number_format($_smarty_tpl->tpl_vars['DISCOUNTTotalValue']->value,2);?>
 ]
		         		<?php }?>
		         	</td>
		         	<?php if ($_smarty_tpl->tpl_vars['searchPoData']->value[0]['type'] != 'Import' && $_smarty_tpl->tpl_vars['searchPoData']->value[0]['type'] != 'Sample_Import') {?>
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
		         	<?php if ($_smarty_tpl->tpl_vars['view_status']->value != 'Download') {?>
		         	<td align="center" width="10%" class="own-td-2">
		         		<a href="#" onclick='editPoDetails(<?php echo json_encode($_smarty_tpl->tpl_vars['v']->value);?>
)'>
				          <span class="glyphicon glyphicon-edit"></span>
				        </a>
				        <br/>
				        <br/>
				        <a href="#" onclick='deletePoDetails(<?php echo json_encode($_smarty_tpl->tpl_vars['v']->value);?>
)'>
				          <span class="glyphicon glyphicon-trash"></span>
				        </a>
		         	</td>
		         	<?php }?>
        		</tr>
        	</table>
        </tr>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        <tr>
        	<table class="own-table">
        		<tr>
        			<td align="center" width="5%"  class="own-td-3"></td>
		         	<td align="center" width="20%" class="own-td-3"></td>
		         	<td align="center" width="10%" class="own-td-3"></td>
		         	<td align="center" width="5%"  class="own-td-3"></td>
		         	<td align="center" width="7%" class="own-td-3"></td>
		         	<td align="center" width="8%" class="own-td-3"></td>
		         	<?php if ($_smarty_tpl->tpl_vars['searchPoData']->value[0]['type'] != 'Import' && $_smarty_tpl->tpl_vars['searchPoData']->value[0]['type'] != 'Sample_Import') {?>
			         	<?php if ($_smarty_tpl->tpl_vars['searchPoData']->value[0]['state_code'] == 33) {?>
			         	<td align="center" width="10%" class="own-td-3"></td>
			         	<td align="center" width="10%" class="own-td-3"></td>
			         	<?php }?>
			         	<?php if ($_smarty_tpl->tpl_vars['searchPoData']->value[0]['state_code'] != 33) {?>
			         	<td align="center" width="10%" class="own-td-3"></td>
			         	<?php }?>
		         	<?php }?>
		         	<td align="center" width="10%" class="own-td-3"></td>
		         	<td align="center" width="10%" class="own-td-3"></td>
		         	<?php if ($_smarty_tpl->tpl_vars['view_status']->value != 'Download') {?>
		         	<td align="center" width="10%" class="own-td-3"></td>
		         	<?php }?>
        		</tr>
        	</table>
        </tr>
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
        <!-- <tr>
        	<table class="own-table">
        		<tr style="font-weight: bold;">
		         	<td align="center" width="40%" class="own-td-2">PARTICULARS</td>
		         	<td align="center" width="10%" class="own-td-2">HSN CODE</td>
		         	<td align="center" width="10%" class="own-td-2">Amount</td>
		         	<?php if ($_smarty_tpl->tpl_vars['searchPoData']->value[0]['type'] != 'Import' && $_smarty_tpl->tpl_vars['searchPoData']->value[0]['type'] != 'Sample_Import') {?>
		         	<?php if ($_smarty_tpl->tpl_vars['searchPoData']->value[0]['state_code'] == 33) {?>
		         	<td align="center" width="10%" class="own-td-2">CGST</td>
		         	<td align="center" width="10%" class="own-td-2">SGST</td>
		         	<?php } else { ?>
		         	<td align="center" width="10%" class="own-td-2">IGST</td>
		         	<?php }?>
		         	<?php }?>
		         	<td align="center" width="10%" class="own-td-2">Total Amount</td>
		         	<?php if ($_smarty_tpl->tpl_vars['view_status']->value != 'Download') {?>
		         	<td align="center" width="10%" class="own-td-2">Action</td>
		         	<?php }?>
        		</tr>
        	</table>
        </tr> -->
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['otherAdditionalCharges']->value, 'v', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
?>
        <tr>
        	<table class="own-table">
        		<tr>
        			<td align="center" width="5%"  class="own-td-2"></td>
		         	<td align="center" width="20%" class="own-td-2"><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</td>
		         	<td align="center" width="10%" class="own-td-2"><?php echo $_smarty_tpl->tpl_vars['v']->value['hsn_code'];?>
</td>
		         	<td align="center" width="5%"  class="own-td-2"></td>
		         	<td align="center" width="7%"  class="own-td-2"></td>
		         	<?php if ($_smarty_tpl->tpl_vars['v']->value['amount_type'] == 'Amount') {?>
		         		<?php ob_start();
echo $_smarty_tpl->tpl_vars['v']->value['amount'];
$_prefixVariable4=ob_get_clean();
$_smarty_tpl->_assignInScope('other_total_amount', $_prefixVariable4);
?>
		         	<?php } else { ?>
		         		<?php ob_start();
echo (($_smarty_tpl->tpl_vars['v']->value['amount']/100)*$_smarty_tpl->tpl_vars['GrandTotal']->value);
$_prefixVariable5=ob_get_clean();
$_smarty_tpl->_assignInScope('other_total_amount', $_prefixVariable5);
?>
		         	<?php }?>
		         	<td align="center" width="8%" class="own-td-2">
		         		<?php if ($_smarty_tpl->tpl_vars['v']->value['amount_type'] != 'Amount') {?> <?php echo $_smarty_tpl->tpl_vars['v']->value['amount'];?>
 % <br/><?php }?>
		         		<?php echo number_format($_smarty_tpl->tpl_vars['other_total_amount']->value,2);?>

		         	</td>
		         	<td align="center" width="10%"  class="own-td-2"></td>
		         	<?php if ($_smarty_tpl->tpl_vars['searchPoData']->value[0]['type'] != 'Import' && $_smarty_tpl->tpl_vars['searchPoData']->value[0]['type'] != 'Sample_Import') {?>
		         		<?php if ($_smarty_tpl->tpl_vars['searchPoData']->value[0]['state_code'] == 33) {?>
			         	<?php ob_start();
echo (($_smarty_tpl->tpl_vars['v']->value['CGST']/100)*$_smarty_tpl->tpl_vars['other_total_amount']->value);
$_prefixVariable6=ob_get_clean();
$_smarty_tpl->_assignInScope('CGSTTotalValue', $_prefixVariable6);
?>
			         	<?php ob_start();
echo (($_smarty_tpl->tpl_vars['v']->value['SGST']/100)*$_smarty_tpl->tpl_vars['other_total_amount']->value);
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
echo (($_smarty_tpl->tpl_vars['v']->value['IGST']/100)*$_smarty_tpl->tpl_vars['other_total_amount']->value);
$_prefixVariable8=ob_get_clean();
$_smarty_tpl->_assignInScope('IGSTTotalValue', $_prefixVariable8);
?>
			         	<td align="center" width="10%" class="own-td-2"><?php echo $_smarty_tpl->tpl_vars['v']->value['IGST'];?>
%<br/><?php echo number_format($_smarty_tpl->tpl_vars['IGSTTotalValue']->value,2);?>
</td>
			         	<?php }?>
			        <?php }?>
			        

		         	<?php ob_start();
echo $_smarty_tpl->tpl_vars['SGSTTotalValue']->value+$_smarty_tpl->tpl_vars['CGSTTotalValue']->value+$_smarty_tpl->tpl_vars['other_total_amount']->value+$_smarty_tpl->tpl_vars['IGSTTotalValue']->value;
$_prefixVariable9=ob_get_clean();
$_smarty_tpl->_assignInScope('totalPriceValue1', $_prefixVariable9);
?>
					<?php $_smarty_tpl->_assignInScope('GrandTotal1', $_smarty_tpl->tpl_vars['GrandTotal1']->value+$_smarty_tpl->tpl_vars['totalPriceValue1']->value);
?>

		         	<td align="center" width="10%" class="own-td-2"><?php echo number_format($_smarty_tpl->tpl_vars['totalPriceValue1']->value,2);?>
</td>
		         	<?php if ($_smarty_tpl->tpl_vars['view_status']->value != 'Download') {?>
		         	<td align="center" width="10%" class="own-td-2">
		         		<!-- <a href="#" onclick='editPoDetails(<?php echo json_encode($_smarty_tpl->tpl_vars['v']->value);?>
)'>
				          <span class="glyphicon glyphicon-edit"></span>
				        </a> -->
				        <a href="#" onclick='deletePoOtherAdditionalCharges(<?php echo json_encode($_smarty_tpl->tpl_vars['v']->value);?>
)' style="margin-left: 10px;">
				          <span class="glyphicon glyphicon-trash"></span>
				        </a>
		         	</td>
		         	<?php }?>
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
        	<table class="own-table">
        		<tr>
        			<!-- <td align="center" width="5%"  class="own-td-2"></td> -->
		         	<td align="center" width="60%" class="own-td-2" id="numberToWord"></td>
		         	<td align="center" width="25%" class="own-td-2"><b>TOTAL AMOUNT INR</b></td>
		         	<td align="center" width="15%" class="own-td-2"><b><?php echo number_format(($_smarty_tpl->tpl_vars['GrandTotal']->value+$_smarty_tpl->tpl_vars['GrandTotal1']->value),2);?>
</b></td>
		         	<td id="GrandTotal" style="display: none;"><?php echo $_smarty_tpl->tpl_vars['GrandTotal']->value+$_smarty_tpl->tpl_vars['GrandTotal1']->value;?>
</td>
        		</tr>
        	</table>
        </tr>
        <tr>
        	<table class="own-table">
        		<tr>
        			<td align="center" width=60%"  class="own-td-4">
        				<div style="float: left;text-align: left;margin-left: 10px;font-size:16px;">
        					<?php if ($_smarty_tpl->tpl_vars['searchPoData']->value[0]['type'] == 'Import' || $_smarty_tpl->tpl_vars['searchPoData']->value[0]['type'] == 'Sample_Import') {?>
        					<h5>
        						<b>Delivery Date        :    
        						<?php echo $_smarty_tpl->tpl_vars['importAdditionalCharges']->value[0]['delivery_date'];?>
</b>
        						<?php if ($_smarty_tpl->tpl_vars['view_status']->value != 'Download') {?>
        						<a href="" style="float: right;margin-left:20px;text-decoration: underline;" onclick='editImportOtherDetails(<?php echo json_encode($_smarty_tpl->tpl_vars['importAdditionalCharges']->value);?>
)'> 
        							<span class="glyphicon glyphicon-edit"></span>
        						</a>
        						<?php }?>
        					</h5>
        					<h5><b>Incoterms            :    <?php echo $_smarty_tpl->tpl_vars['importAdditionalCharges']->value[0]['incoterms'];?>
</b></h5>
        					<h5><b>Payment Terms        :    <?php echo $_smarty_tpl->tpl_vars['importAdditionalCharges']->value[0]['payment_terms'];?>
</b></h5>
        					<h5><b>Shipment             :    <?php echo $_smarty_tpl->tpl_vars['importAdditionalCharges']->value[0]['Shipment'];?>
</b></h5>
        					<?php }?>
        					<?php if ($_smarty_tpl->tpl_vars['searchPoData']->value[0]['type'] != 'Import' && $_smarty_tpl->tpl_vars['searchPoData']->value[0]['type'] != 'Sample_Import') {?>
        					<h5 style="margin-top: 5px;"><b>Terms & Condition :</b></h5>
        					<?php }?>
        				</div>
        				<?php if ($_smarty_tpl->tpl_vars['searchPoData']->value[0]['type'] != 'Import' && $_smarty_tpl->tpl_vars['searchPoData']->value[0]['type'] != 'Sample_Import') {?>
	        				<?php if ($_smarty_tpl->tpl_vars['view_status']->value == 'Download') {?>
	        				<ul style="float: left;margin:2px; text-align: justify;font-size: 12px;">
	        				<?php } else { ?>
	        				<ul style="float: left;margin:2px; text-align: justify;font-size: 14px;">
	        				<?php }?>
	        					<li style="font-weight: bold;">Original invoice with 2 duplicate copies should be submitted at the time of delivering the goods.Products HSN code should be mentioned on the invoice.</li>
	        					<li style="margin-top: 3px;font-weight: bold;">Please quote our purchase order number on the invoice.</li>
	        					<li style="margin-top: 3px;font-weight: bold;">The material will not be allowed inside our premises on non-working hours and holidays.</li>
	        					<li style="margin-top: 3px;font-weight: bold;">Replacement of damages and defects required.We reserve the right to cancel the orders which are delayed / defective.Any further claims from our buyer in respect to quality of the materials supplied by you and incidental expenses therefore will be entirely at your cost.</li>
	        					<li style="margin-top: 3px;font-weight: bold;">Freight to be paid as agreed between the parties.</li>
	        					<li style="margin-top: 3px;font-weight: bold;">Failing to file a tax return on time.We reserved the right to deduct the tax amount from your payment.</li>
	        					<li style="margin-top: 3px;font-weight: bold;">The product supplied should meet reach (European) Standards.Non-compliance will result in penalties.</li>
	        				</ul>
	        			<?php }?>
        			</td>
        			<?php if ($_smarty_tpl->tpl_vars['view_status']->value == 'Download') {?>
		         	<td align="center" width="50%"  class="own-td-4">
		         		<h4 style="float: left;margin:80px 0px 0px 20px;"><b>Incharge</b></h4>
		         		<h4 style="float: right;margin:80px 20px 0px 20px;"><b>For T.M.Abdul Rahman & Sons</b></h4>
		         		</br>
		         		</br>
		         		<h4 style="float: left;margin:100px 0px 0px 20px;"><b>Signature</b></h4>
		         		<h4 style="float: right;margin:100px 20px 0px 20px;"><b>Authozised & Signature</b></h4>
		         	</td>
		         	<?php } else { ?>
		         	<td align="center" width="50%"  class="own-td-4">
		         		<h5 style="float: left;margin:80px 0px 0px 20px;"><b>Incharge</b></h5>
		         		<h5 style="float: right;margin:80px 20px 0px 20px;"><b>For T.M.Abdul Rahman & Sons</b></h5>
		         		</br>
		         		</br>
		         		<h5 style="float: left;margin:100px 0px 0px 20px;"><b>Signature</b></h5>
		         		<h5 style="float: right;margin:100px 20px 0px 20px;"><b>Authozised & Signature</b></h5>
		         	</td>
		         	<?php }?>
        		</tr>
        	</table>
        </tr>
	</table>
</div>
<?php if ($_smarty_tpl->tpl_vars['view_status']->value == 'Download') {
echo '<script'; ?>
>
	
	var number = document.getElementById('GrandTotal').innerHTML;
	document.getElementById('numberToWord').innerHTML = "<b>Amount In Words : </b> "+number2text(number);
    
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
<?php }?>
</body>
</html><?php }
}
