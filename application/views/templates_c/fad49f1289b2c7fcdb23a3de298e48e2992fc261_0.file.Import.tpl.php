<?php
/* Smarty version 3.1.30, created on 2018-03-25 22:55:18
  from "/home/Staging/workSpace/Juntos/application/views/templates/Import.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ab7db7e7c18b6_29579119',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fad49f1289b2c7fcdb23a3de298e48e2992fc261' => 
    array (
      0 => '/home/Staging/workSpace/Juntos/application/views/templates/Import.tpl',
      1 => 1521998710,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ab7db7e7c18b6_29579119 (Smarty_Internal_Template $_smarty_tpl) {
?>
<hr/>
<div class="col-lg-12" style="margin-top: 50px;">
	<button class="btn btn-primary" style="float: right;margin-bottom: 10px;" onclick="downloadAsPdfPODetails()">Download as PDF</button>
	<button class="btn btn-primary" style="float: right;margin-bottom: 10px;margin-right: 10px;" onclick='addPurchaseOrder(<?php echo json_encode($_smarty_tpl->tpl_vars['searchPoData']->value[0]);?>
)'>Add Purchase Order</button>
	<button class="btn btn-primary" style="float: right;margin-bottom: 10px;margin-right: 10px;" onclick='addAdditionalCharges(<?php echo json_encode($_smarty_tpl->tpl_vars['searchPoData']->value[0]);?>
)'>Add Additional Charges</button>
	<button class="btn btn-primary" style="float: right;margin-bottom: 10px;margin-right: 10px;" onclick='addOverAllDiscount(<?php echo json_encode($_smarty_tpl->tpl_vars['searchPoData']->value[0]);?>
)'>Add Overall Discount</button>
	<table class="own-table">
		<tr>
        	<table class="own-table">
        		<tr>
		         	<td width="15%" style="padding: 20px 0px 28px 40px;border: 0px;">
        				<img src="assets/img/TMAR LOGO.jpg" width="100" height="100"/>
        			</td>
		         	<td width="45%" style="border: 0px;">
		         		<h4><b>T.M.ABDUL RAHMAN & SONS</b></h4>
						<h5 style="font-weight: normal;">MANUFACTURES & EXPORTERS OF FINISHED LEATHER & SHOES</h5>
		         	</td>
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
        		<tr style="font-weight: bold;">
        			<td align="center" width="5%">S.No</td>
		         	<td align="center" width="20%">DESCRIPTION</td>
		         	<td align="center" width="10%">HSN CODE</td>
		         	<td align="center" width="5%">QTY</td>
		         	<td align="center" width="7%">UOM</td>
		         	<td align="center" width="8%">PRICE</td>
		         	<td align="center" width="10%">DISCOUNT</td>
		         	<td align="center" width="10%">TOTAL <br/>AMOUNT</td>
		         	<td align="center" width="10%">Action</td>
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
		         	<td align="center" width="8%" class="own-td-2">
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

		         	<?php ob_start();
echo ($_smarty_tpl->tpl_vars['v']->value['qty']*$_smarty_tpl->tpl_vars['v']->value['price'])+$_smarty_tpl->tpl_vars['IGSTTotalValue']->value+$_smarty_tpl->tpl_vars['SGSTTotalValue']->value+$_smarty_tpl->tpl_vars['CGSTTotalValue']->value-$_smarty_tpl->tpl_vars['DISCOUNTTotalValue']->value;
$_prefixVariable2=ob_get_clean();
$_smarty_tpl->_assignInScope('totalPriceValue', $_prefixVariable2);
?>

		         	<td align="center" width="10%" class="own-td-2"><b><?php echo number_format($_smarty_tpl->tpl_vars['totalPriceValue']->value,2);?>
</b></td>

		         	
		         	<?php $_smarty_tpl->_assignInScope('GrandTotal', $_smarty_tpl->tpl_vars['GrandTotal']->value+$_smarty_tpl->tpl_vars['totalPriceValue']->value);
?>
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
		         	<td align="center" width="10%" class="own-td-3"></td>
		         	<td align="center" width="10%" class="own-td-3"></td>
		         	<td align="center" width="10%" class="own-td-3"></td>
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
		         	<?php if ($_smarty_tpl->tpl_vars['v']->value['AMOUNT_type'] == 'AMOUNT') {?>
		         		<?php ob_start();
echo $_smarty_tpl->tpl_vars['v']->value['amount'];
$_prefixVariable3=ob_get_clean();
$_smarty_tpl->_assignInScope('other_total_AMOUNT', $_prefixVariable3);
?>
		         	<?php } else { ?>
		         		<?php ob_start();
echo (($_smarty_tpl->tpl_vars['v']->value['amount']/100)*$_smarty_tpl->tpl_vars['GrandTotal']->value);
$_prefixVariable4=ob_get_clean();
$_smarty_tpl->_assignInScope('other_total_AMOUNT', $_prefixVariable4);
?>
		         	<?php }?>
		         	<td align="center" width="8%" class="own-td-2">
		         		<?php if ($_smarty_tpl->tpl_vars['v']->value['AMOUNT_type'] != 'AMOUNT') {?> <?php echo $_smarty_tpl->tpl_vars['v']->value['amount'];?>
 % <br/><?php }?>
		         		<?php echo number_format($_smarty_tpl->tpl_vars['other_total_AMOUNT']->value,2);?>

		         	</td>
		         	<td align="center" width="10%"  class="own-td-2"></td>

		         	<?php ob_start();
echo $_smarty_tpl->tpl_vars['SGSTTotalValue']->value+$_smarty_tpl->tpl_vars['CGSTTotalValue']->value+$_smarty_tpl->tpl_vars['other_total_AMOUNT']->value+$_smarty_tpl->tpl_vars['IGSTTotalValue']->value;
$_prefixVariable5=ob_get_clean();
$_smarty_tpl->_assignInScope('totalPriceValue1', $_prefixVariable5);
?>
					<?php $_smarty_tpl->_assignInScope('GrandTotal1', $_smarty_tpl->tpl_vars['GrandTotal1']->value+$_smarty_tpl->tpl_vars['totalPriceValue1']->value);
?>

		         	<td align="center" width="10%" class="own-td-2"><?php echo number_format($_smarty_tpl->tpl_vars['totalPriceValue1']->value,2);?>
</td>
		         	<td align="center" width="10%" class="own-td-2">
				        <a href="#" onclick='deletePoOtherAdditionalCharges(<?php echo json_encode($_smarty_tpl->tpl_vars['v']->value);?>
)' style="margin-left: 10px;">
				          <span class="glyphicon glyphicon-trash"></span>
				        </a>
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
        	<table class="own-table">
        		<tr>
        			<?php if ($_smarty_tpl->tpl_vars['v']->value['discount_type'] == 'AMOUNT') {?>
		         		<?php ob_start();
echo $_smarty_tpl->tpl_vars['v']->value['discount'];
$_prefixVariable6=ob_get_clean();
$_smarty_tpl->_assignInScope('ODiscountValue', $_prefixVariable6);
?>
		         	<?php } else { ?>
		         		<?php $_smarty_tpl->_assignInScope('ODiscountValue', (($_smarty_tpl->tpl_vars['v']->value['discount']/100)*($_smarty_tpl->tpl_vars['GrandTotal']->value+$_smarty_tpl->tpl_vars['GrandTotal1']->value)));
?>
		         	<?php }?>

        			<td align="center" width="65%"  class="own-td-2">DISCOUNT</td>
        			<td align="center" width="10%"  class="own-td-2"><b><?php echo number_format($_smarty_tpl->tpl_vars['ODiscountValue']->value,2);?>
</b></td>
		         	<td align="center" width="10%" class="own-td-2">
				        <a href="#" onclick='deleteOverAllDiscountDetails(<?php echo json_encode($_smarty_tpl->tpl_vars['v']->value);?>
)' style="margin-left: 10px;">
				          <span class="glyphicon glyphicon-trash"></span>
				        </a>
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
        	<table class="own-table">
        		<tr>
        			<!-- <td align="center" width="5%"  class="own-td-2"></td> -->
		         	<td align="center" width="60%" class="own-td-2" id="numberToWord"></td>
		         	<td align="center" width="27%" class="own-td-2"><b>TOTAL AMOUNT INR</b></td>
		         	<td align="center" width="18%" class="own-td-2"><b><?php echo number_format((($_smarty_tpl->tpl_vars['GrandTotal']->value+$_smarty_tpl->tpl_vars['GrandTotal1']->value)-$_smarty_tpl->tpl_vars['ODiscountValue']->value),2);?>
</b></td>
		         	<td id="GrandTotal" style="display: none;"><?php echo ($_smarty_tpl->tpl_vars['GrandTotal']->value+$_smarty_tpl->tpl_vars['GrandTotal1']->value)-$_smarty_tpl->tpl_vars['ODiscountValue']->value;?>
</td>
        		</tr>
        	</table>
        </tr>
        <tr>
        	<table class="own-table">
        		<tr>
        			<td align="center" width="60%"  class="own-td-4">
        				<div style="float: left;text-align: left;margin-left: 10px;font-size:16px;">
        					<h5>
        						<b>Delivery Date        :    
        						<?php echo $_smarty_tpl->tpl_vars['importAdditionalCharges']->value[0]['delivery_date'];?>
</b>
        						<a href="" style="float: right;margin-left:20px;text-decoration: underline;" onclick='editImportOtherDetails(<?php echo json_encode($_smarty_tpl->tpl_vars['importAdditionalCharges']->value);?>
)'> 
        							<span class="glyphicon glyphicon-edit"></span>
        						</a>
        					</h5>
        					<h5><b>Incoterms            :    <?php echo $_smarty_tpl->tpl_vars['importAdditionalCharges']->value[0]['incoterms'];?>
</b></h5>
        					<h5><b>Payment Terms        :    <?php echo $_smarty_tpl->tpl_vars['importAdditionalCharges']->value[0]['payment_terms'];?>
</b></h5>
        					<h5><b>Shipment             :    <?php echo $_smarty_tpl->tpl_vars['importAdditionalCharges']->value[0]['Shipment'];?>
</b></h5>
        				</div>
        			</td>
        			
		         	<td align="center" width="50%"  class="own-td-4">
		         		<h5 style="float: left;margin:80px 0px 0px 20px;"><b>Incharge</b></h5>
		         		<h5 style="float: right;margin:80px 20px 0px 20px;"><b>For T.M.Abdul Rahman & Sons</b></h5>
		         		</br>
		         		</br>
		         		<h5 style="float: left;margin:100px 0px 0px 20px;"><b>Signature</b></h5>
		         		<h5 style="float: right;margin:100px 20px 0px 20px;"><b>Authozised & Signature</b></h5>
		         	</td>
        		</tr>
        	</table>
        </tr>
	</table>
</div>
<?php }
}