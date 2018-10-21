<?php
/* Smarty version 3.1.30, created on 2018-10-21 13:10:33
  from "/home/Staging/workSpace/Juntos/application/views/templates/paymentBookListPrint.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5bcc2d7107c4f9_90401300',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '19cc8d7e864555849ab9e6cba3737edfd871d84a' => 
    array (
      0 => '/home/Staging/workSpace/Juntos/application/views/templates/paymentBookListPrint.tpl',
      1 => 1540107607,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bcc2d7107c4f9_90401300 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once '/home/Staging/workSpace/Juntos/application/third_party/smarty/libs/plugins/modifier.date_format.php';
?>
<h2 class="text-center">Payment Book</h2>
<?php $_smarty_tpl->_assignInScope('serialCount', 0);
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['result']->value, 'v1', false, 'k1');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k1']->value => $_smarty_tpl->tpl_vars['v1']->value) {
?>
	<?php $_smarty_tpl->_assignInScope('serialCount', ($_smarty_tpl->tpl_vars['serialCount']->value+1));
?>
	<div style="margin-top: 50px;">
		<?php if (!empty($_smarty_tpl->tpl_vars['v1']->value['paymentBookList'])) {?>
		<?php if ($_smarty_tpl->tpl_vars['k1']->value != '0000-00-00') {?>
		<h5><?php $_smarty_tpl->_assignInScope('dateValue', explode("_",$_smarty_tpl->tpl_vars['k1']->value));
?>
			<b><span class="badge"><?php echo $_smarty_tpl->tpl_vars['serialCount']->value;?>
</span> | Payable Date : <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['dateValue']->value[0],"%d-%m-%Y");?>
 | Supplier Name : <?php echo $_smarty_tpl->tpl_vars['result']->value[$_smarty_tpl->tpl_vars['k1']->value]["supplier_name"];?>
 | Origin : <?php echo $_smarty_tpl->tpl_vars['result']->value[$_smarty_tpl->tpl_vars['k1']->value]["origin"];?>
</b></h5>
		<?php } else { ?>
		<h5><b><span class="badge"><?php echo $_smarty_tpl->tpl_vars['serialCount']->value;?>
</span> | Payable Date : <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['lastDateOfMonth']->value,"%d-%m-%Y");?>
 | Supplier Name : <?php echo $_smarty_tpl->tpl_vars['result']->value[$_smarty_tpl->tpl_vars['k1']->value]["supplier_name"];?>
 | Origin : <?php echo $_smarty_tpl->tpl_vars['result']->value[$_smarty_tpl->tpl_vars['k1']->value]["origin"];?>
</b></h5>
		<?php }?>
		<?php }?>
		<table style="margin-bottom: 10px;" class="paymentBookListTable">
			<?php $_smarty_tpl->_assignInScope('totalAmount', 0);
?>
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['v1']->value, 'v2', false, 'k2');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k2']->value => $_smarty_tpl->tpl_vars['v2']->value) {
?>
					<?php if ($_smarty_tpl->tpl_vars['k2']->value == 'paymentBookList') {?>
				    <thead>
				        <tr>
				          <th>S.No</th>
				          <th>HSN CODE</th>
				          <th>CGST</th>
				          <th>SGST</th>
				          <th>IGST</th>
				          <th>QTY</th>
				          <th>MATERIAL NAME</th>
				          <th>UOM</th>
				          <th>RATE</th>
				          <th>PO NUMBER</th>
				          <th>DC Number</th>
				          <th>AVG. COST</th>
				          <th>QUERY</th>
				          <th>BILL NUMBER</th>
				          <th>BILL DATE</th>
				          <th style="background-color: yellow;">PAYABLE MONTH</th>
				          <th>Bill Amount</th>
				          <!-- <th>DEDC.</th> -->
				          <th>CHEQUE NUMBER</th>
				          <th>CHEQUE DATE</th>
				          <th>CHEQUE AMOUNT</th>
				         <!--  <th>DD Number</th>
				          <th>DD Date</th>
				          <th>DD Amount</th> -->
				          <th>BALANCE</th>
				        </tr>
				    </thead>
				    <tbody>
				    	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['v2']->value, 'v3', false, 'k3');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k3']->value => $_smarty_tpl->tpl_vars['v3']->value) {
?>
					    	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['v3']->value, 'v4', false, 'k4');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k4']->value => $_smarty_tpl->tpl_vars['v4']->value) {
?>
						    	<tr style="text-align: center;">
					    	  	  <?php if ($_smarty_tpl->tpl_vars['k4']->value == 0) {?>
					    	  	  	<?php $_smarty_tpl->_assignInScope('totalAmount', $_smarty_tpl->tpl_vars['totalAmount']->value+($_smarty_tpl->tpl_vars['v4']->value['bill_amount']));
?>
						          	<td rowspan="<?php echo count($_smarty_tpl->tpl_vars['v3']->value);?>
"><?php echo $_smarty_tpl->tpl_vars['v4']->value['s_no'];?>
</td>
					          	  <?php }?>
						          <td><?php echo $_smarty_tpl->tpl_vars['v4']->value['material_hsn_code'];?>
</td>
						          <td><?php echo $_smarty_tpl->tpl_vars['v4']->value['CGST'];?>
</td>
						          <td><?php echo $_smarty_tpl->tpl_vars['v4']->value['SGST'];?>
</td>
						          <td><?php echo $_smarty_tpl->tpl_vars['v4']->value['IGST'];?>
</td>
						          <td><?php echo $_smarty_tpl->tpl_vars['v4']->value['received'];?>
</td>
						          <td style="text-align: left;"><?php echo $_smarty_tpl->tpl_vars['v4']->value['material_name'];?>
</td>
						          <td><?php echo $_smarty_tpl->tpl_vars['v4']->value['material_uom'];?>
</td>
						          <td><?php echo $_smarty_tpl->tpl_vars['v4']->value['price'];?>
</td>
						          <td><?php echo $_smarty_tpl->tpl_vars['v4']->value['po_number'];?>
</td>
						          <td><?php echo $_smarty_tpl->tpl_vars['v4']->value['dc_number'];?>
</td>
						          <td style="text-align: right;"><?php echo number_format($_smarty_tpl->tpl_vars['v4']->value['avg_cost'],2);?>
</td>
						          <?php if ($_smarty_tpl->tpl_vars['k4']->value == 0) {?>
						          	  <td rowspan="<?php echo count($_smarty_tpl->tpl_vars['v3']->value);?>
"><?php echo $_smarty_tpl->tpl_vars['v4']->value['query'];?>
</td>
							          <td rowspan="<?php echo count($_smarty_tpl->tpl_vars['v3']->value);?>
"><?php echo $_smarty_tpl->tpl_vars['v4']->value['bill_number'];?>
</td>
							          <td rowspan="<?php echo count($_smarty_tpl->tpl_vars['v3']->value);?>
" class="datetd"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v4']->value['bill_date'],"%d-%m-%Y");?>
</td>
							          <?php if ($_smarty_tpl->tpl_vars['v4']->value['payable_month'] != '0000-00-00') {?>
							          <td rowspan="<?php echo count($_smarty_tpl->tpl_vars['v3']->value);?>
" class="datetd" style="background-color: yellow;"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v4']->value['payable_month'],"%d-%m-%Y");?>
</td>
							          <?php } else { ?>
							          <td rowspan="<?php echo count($_smarty_tpl->tpl_vars['v3']->value);?>
" class="datetd" style="background-color: yellow;"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['lastDateOfMonth']->value,"%d-%m-%Y");?>
</td>
							          <?php }?>
							          <td rowspan="<?php echo count($_smarty_tpl->tpl_vars['v3']->value);?>
" style="text-align: right;"><?php echo number_format($_smarty_tpl->tpl_vars['v4']->value['bill_amount'],2);?>
</td>
							          <!-- <td rowspan="<?php echo count($_smarty_tpl->tpl_vars['v3']->value);?>
"><?php echo $_smarty_tpl->tpl_vars['v4']->value['deduction'];?>
</td> -->
							          <td rowspan="<?php echo count($_smarty_tpl->tpl_vars['v3']->value);?>
"><?php echo $_smarty_tpl->tpl_vars['v4']->value['cheque_no'];?>
</td>
							          <td rowspan="<?php echo count($_smarty_tpl->tpl_vars['v3']->value);?>
" class="datetd"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v4']->value['cheque_date'],"%d-%m-%Y");?>
</td>
							          <td rowspan="<?php echo count($_smarty_tpl->tpl_vars['v3']->value);?>
" style="text-align: right;"><?php echo number_format($_smarty_tpl->tpl_vars['v4']->value['cheque_amount'],2);?>
</td>
							          <!-- <td rowspan="<?php echo count($_smarty_tpl->tpl_vars['v3']->value);?>
"></td>
							          <td rowspan="<?php echo count($_smarty_tpl->tpl_vars['v3']->value);?>
"></td>
							          <td rowspan="<?php echo count($_smarty_tpl->tpl_vars['v3']->value);?>
"></td> -->
							          <td rowspan="<?php echo count($_smarty_tpl->tpl_vars['v3']->value);?>
"></td>
							      <?php }?>
						        </tr>
					        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

				        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

				        <tr>
				        	<td colspan="15"></td>
				        	<td><b>Total</b></td>
				        	<td style="text-align: right;"><b><?php echo number_format($_smarty_tpl->tpl_vars['totalAmount']->value,2);?>
</b></td>
				        	<td></td>
				        	<td></td>
				        	<td></td>
				        	<!-- <td></td> -->
				        	<!-- <td></td>
				        	<td></td>
				        	<td></td> -->
				        	<td></td>
				        </tr>
				    </tbody>
				    <?php }?>
				    <?php if ($_smarty_tpl->tpl_vars['k2']->value == 'debitNoteList') {?>
				    <thead>
		                <tr>
		                  <th>S.No</th>
		                  <th colspan="3" style="text-align: center;">TYPE</th>
		                  <th>DEBIT NOTE NO.</th>
		                  <th>DATE</th>
		                  <th>SUPPLIER CREDIT NOTE</th>
		                  <th>DATE</th>
		                  <th colspan="7" style="text-align: center;">QUERY</th>
		                  <th style="background-color: yellow;">PAYABLE MONTH</th>
		                  <th>AMOUNT</th>
		                  <th></th>
		                  <th></th>
		                  <th></th>
		                  <!-- <th></th> -->
		                  <!-- <th></th>
		                  <th></th>
		                  <th></th> -->
		                  <th></th>
		            </thead>
		            <tbody>
		            	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['v2']->value, 'v3', false, 'k3');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k3']->value => $_smarty_tpl->tpl_vars['v3']->value) {
?>
		                <tr>

		                      <?php if ($_smarty_tpl->tpl_vars['v3']->value['type'] === 'D') {?>
		                      <?php $_smarty_tpl->_assignInScope('totalAmount', $_smarty_tpl->tpl_vars['totalAmount']->value-$_smarty_tpl->tpl_vars['v3']->value['amount']);
?>
		                      <?php } elseif ($_smarty_tpl->tpl_vars['v3']->value['type'] === 'C') {?> 
		                      <?php $_smarty_tpl->_assignInScope('totalAmount', $_smarty_tpl->tpl_vars['totalAmount']->value+$_smarty_tpl->tpl_vars['v3']->value['amount']);
?>
                              <?php } elseif ($_smarty_tpl->tpl_vars['v3']->value['type'] === 'B') {?>
                              <?php $_smarty_tpl->_assignInScope('totalAmount', $_smarty_tpl->tpl_vars['totalAmount']->value+$_smarty_tpl->tpl_vars['v3']->value['amount']);
?>
                              <?php } elseif ($_smarty_tpl->tpl_vars['v3']->value['type'] === 'T') {?>
                              <?php $_smarty_tpl->_assignInScope('totalAmount', $_smarty_tpl->tpl_vars['totalAmount']->value-$_smarty_tpl->tpl_vars['v3']->value['amount']);
?>
                              <?php }?>

		                      <td><?php echo $_smarty_tpl->tpl_vars['k3']->value+1;?>
</td>
		                      <td colspan="3" style="text-align: center;">
		                      		<?php if ($_smarty_tpl->tpl_vars['v3']->value['type'] === 'D') {?> DEBIT NOTE 
	                                <?php } elseif ($_smarty_tpl->tpl_vars['v3']->value['type'] === 'C') {?> CREDIT NOTE
	                                <?php } elseif ($_smarty_tpl->tpl_vars['v3']->value['type'] === 'B') {?> BALANCE AMOUNT
	                                <?php } elseif ($_smarty_tpl->tpl_vars['v3']->value['type'] === 'T') {?> TDS
	                                <?php }?></td>
		                      <td><?php echo $_smarty_tpl->tpl_vars['v3']->value['debit_note_no'];?>
</td>
		                      <td class="datetd"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v3']->value['debit_note_date'],"%d-%m-%Y");?>
</td>
		                      <td><?php echo $_smarty_tpl->tpl_vars['v3']->value['supplier_creditnote'];?>
</td>
		                      <td class="datetd"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v3']->value['supplier_creditnote_date'],"%d-%m-%Y");?>
</td>
		                      <td colspan="7"><?php echo $_smarty_tpl->tpl_vars['v3']->value['query'];?>
</td>
		                      <td class="datetd" style="background-color: yellow;"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v3']->value['payable_month'],"%d-%m-%Y");?>
</td>
		                      <td style="text-align: right;"><?php echo number_format($_smarty_tpl->tpl_vars['v3']->value['amount'],2);?>
</td>
		                      <td></td>
		                      <td></td>
		                      <td></td>
		                      <!-- <td></td> -->
		                      <!-- <td></td>
		                      <td></td>
		                      <td></td> -->
		                      <td></td>
		                </tr>
		                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

		            </tbody>
		            <?php }?>
		            <?php if ($_smarty_tpl->tpl_vars['k2']->value == 'advancePaymentDetails' && count($_smarty_tpl->tpl_vars['v2']->value) != 0) {?>
		            <thead >
		            	<tr>
		            	<th colspan="25" style="text-align: center;">ADVANCE PAYMENT</th>
		            	</tr>
		            </thead>
		            <thead>
		            <tr>
		            	<th>S.NO</th>
		            	<th colspan="3" style="text-align: center;">TYPE</th>
		            	<th>PO NUMBER</th>
		            	<th>DATE</th>
		            	<th>SUPPLIER PI NUMBER</th>
		            	<th>DATE</th>
		            	<th colspan="7" style="text-align: center;">QUERY</th>
		            	<th style="background-color: yellow;">PAYABLE MONTH</th>
		            	<th>AMOUNT</th>
		            	<th></th>
		            	<th></th>
		            	<th></th>
		            	<!-- <th></th> -->
		            	<!-- <th></th>
		            	<th></th>
		            	<th></th> -->
		            	<th></th>
		            </tr>
		            </thead>
		            <tbody>
		            	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['v2']->value, 'v3', false, 'k3');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k3']->value => $_smarty_tpl->tpl_vars['v3']->value) {
?>
		            	<tr>

                      	<?php $_smarty_tpl->_assignInScope('totalAmount', $_smarty_tpl->tpl_vars['totalAmount']->value-$_smarty_tpl->tpl_vars['v3']->value['amount']);
?>

		            	<td><?php echo $_smarty_tpl->tpl_vars['k3']->value+1;?>
</td>
		            	<td colspan="3" style="text-align: center;">Advance Payment</td>
		            	<td><?php echo $_smarty_tpl->tpl_vars['v3']->value['full_po_number'];?>
</td>
		            	<td class="datetd"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v3']->value['supplier_date'],"%d-%m-%Y");?>
</td>
		            	<td><?php echo $_smarty_tpl->tpl_vars['v3']->value['supplier_pi_number'];?>
</td>
		            	<td class="datetd"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v3']->value['date'],"%d-%m-%Y");?>
</td>
		            	<td colspan="7" style="text-align: center;"><?php echo $_smarty_tpl->tpl_vars['v3']->value['query'];?>
</td>
		            	<td class="datetd" style="background-color: yellow;"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['k1']->value,"%d-%m-%Y");?>
</td>
		            	<td style="text-align: right;"><?php echo number_format($_smarty_tpl->tpl_vars['v3']->value['amount'],2);?>
</td>
		            	<td></td>
		            	<td></td>
		            	<td></td>
		            	<!-- <td></td> -->
		            	<!-- <td></td>
		            	<td></td>
		            	<td></td> -->
		            	<td></td>
		            	</tr>
		            	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

		            </tbody>
		            <?php }?>
		            <?php if (!empty($_smarty_tpl->tpl_vars['v1']->value['paymentBookList'])) {?>
		            <?php if ($_smarty_tpl->tpl_vars['k2']->value == 'chequeNumberDetails') {?>
		            <tbody>
		            	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['v2']->value, 'v3', false, 'k3');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k3']->value => $_smarty_tpl->tpl_vars['v3']->value) {
?>
		                <tr style="font-weight: bold;">
				        	<td colspan="15"></td>
				        	<td><b>Total</b></td>
				        	<td style="text-align: right;"><b><?php echo number_format($_smarty_tpl->tpl_vars['totalAmount']->value,2);?>
</b></td>
				        	<!-- <td><?php echo $_smarty_tpl->tpl_vars['v3']->value['deduction'];?>
</td> -->
				        	<td><?php echo $_smarty_tpl->tpl_vars['v3']->value['cheque_no'];?>
</td>
				        	<td class="datetd"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v3']->value['cheque_date'],"%d-%m-%Y");?>
</td>
				        	<td style="text-align: right;"><?php echo number_format($_smarty_tpl->tpl_vars['v3']->value['cheque_amount'],2);?>
</td>
				        	<!-- <td><?php echo $_smarty_tpl->tpl_vars['v3']->value['dd_number'];?>
</td>
				        	<td class="datetd"><?php echo $_smarty_tpl->tpl_vars['v3']->value['dd_date'];?>
</td>
				        	<td><?php echo $_smarty_tpl->tpl_vars['v3']->value['dd_amount'];?>
</td> -->
				        	<td style="text-align: right;"><?php echo number_format(($_smarty_tpl->tpl_vars['totalAmount']->value-$_smarty_tpl->tpl_vars['v3']->value['cheque_amount']),2);?>
</td>
				        </tr>
				        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

		            </tbody>
		            <?php }?>
		            <?php }?>
	        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

		</table>
	</div>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>


<style>
.paymentBookListTable {
    border-collapse: collapse;
    border-spacing: 0;
    width: 100%;
    border: 1px solid #000;
}

.paymentBookListTable th,.paymentBookListTable td{
    text-align: center;
    padding: 5px 15px 5px 15px;
    border: 1px solid #000;
    font-size: 9px;
}

.paymentBookListTable .datetd{
	padding: 0px;
	padding-left: 5px;
}
</style><?php }
}
