<?php
/* Smarty version 3.1.30, created on 2018-04-30 09:29:37
  from "/home/Staging/workSpace/Juntos/application/views/templates/paymentBookList.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ae694a9a269b2_40629028',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1804c99cda406ac546f557214a9de1f27e05c4dc' => 
    array (
      0 => '/home/Staging/workSpace/Juntos/application/views/templates/paymentBookList.tpl',
      1 => 1525060775,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ae694a9a269b2_40629028 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once '/home/Staging/workSpace/Juntos/application/third_party/smarty/libs/plugins/modifier.date_format.php';
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['result']->value, 'v1', false, 'k1');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k1']->value => $_smarty_tpl->tpl_vars['v1']->value) {
?>
	<div style="overflow-x:auto;margin-top: 50px;">
		<h5><b>Payable Date : <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['k1']->value,"%d-%m-%Y");?>
</b></h5>
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
				          <th>Edit</th>	
				          <th>S.No</th>
				          <th>HSN CODE</th>
				          <th>CGST</th>
				          <th>SGST</th>
				          <th>QTY</th>
				          <th>UOM</th>
				          <th>MATERIAL NAME</th>
				          <th>RATE</th>
				          <th>PO NUMBER</th>
				          <th>DC Number</th>
				          <th>AVG. COST</th>
				          <th>QUERY</th>
				          <th>BILL NUMBER</th>
				          <th>BILL DATE</th>
				          <th style="background-color: yellow;">PAYABLE MONTH</th>
				          <th>Bill Amount</th>
				          <th>DEDC.</th>
				          <th>CHEQUE NUMBER</th>
				          <th>CHEQUE DATE</th>
				          <th>CHEQUE AMOUNT</th>
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

					    		<?php $_smarty_tpl->_assignInScope('totalAmount', $_smarty_tpl->tpl_vars['totalAmount']->value+$_smarty_tpl->tpl_vars['v4']->value['bill_amount']);
?>

						    	<tr>
					    	  	  <?php if ($_smarty_tpl->tpl_vars['k4']->value == 0) {?>
						            <td rowspan="<?php echo count($_smarty_tpl->tpl_vars['v3']->value);?>
" style="text-align: center;">
					            		<a href="#" onclick='editPaymentList(<?php echo json_encode($_smarty_tpl->tpl_vars['v4']->value);?>
)'>
								          <span class="glyphicon glyphicon-edit"></span>
								        </a>
									</td>
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
						          <td><?php echo $_smarty_tpl->tpl_vars['v4']->value['qty'];?>
</td>
						          <td><?php echo $_smarty_tpl->tpl_vars['v4']->value['material_name'];?>
</td>
						          <td><?php echo $_smarty_tpl->tpl_vars['v4']->value['material_uom'];?>
</td>
						          <td><?php echo $_smarty_tpl->tpl_vars['v4']->value['price'];?>
</td>
						          <td><?php echo $_smarty_tpl->tpl_vars['v4']->value['po_number'];?>
</td>
						          <td><?php echo $_smarty_tpl->tpl_vars['v4']->value['dc_number'];?>
</td>
						          <td>AVG. COST</td>
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
"><?php echo $_smarty_tpl->tpl_vars['v4']->value['bill_amount'];?>
</td>
							          <td rowspan="<?php echo count($_smarty_tpl->tpl_vars['v3']->value);?>
"><?php echo $_smarty_tpl->tpl_vars['v4']->value['deduction'];?>
</td>
							          <td rowspan="<?php echo count($_smarty_tpl->tpl_vars['v3']->value);?>
"><?php echo $_smarty_tpl->tpl_vars['v4']->value['cheque_no'];?>
</td>
							          <td rowspan="<?php echo count($_smarty_tpl->tpl_vars['v3']->value);?>
" class="datetd"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v4']->value['cheque_date'],"%d-%m-%Y");?>
</td>
							          <td rowspan="<?php echo count($_smarty_tpl->tpl_vars['v3']->value);?>
"><?php echo $_smarty_tpl->tpl_vars['v4']->value['cheque_amount'];?>
</td>
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
				        	<td><b><?php echo $_smarty_tpl->tpl_vars['totalAmount']->value;?>
</b></td>
				        	<td></td>
				        	<td></td>
				        	<td></td>
				        	<td></td>
				        	<td></td>
				        </tr>
				    </tbody>
				    <?php }?>
				    <?php if ($_smarty_tpl->tpl_vars['k2']->value == 'debitNoteList') {?>
				    <thead>
		                <tr>
		                  <th>Delete</th>
		                  <th>S.No</th>
		                  <th colspan="3" style="text-align: center;">TYPE</th>
		                  <th>DEBIT NOTE NO.</th>
		                  <th>DATE</th>
		                  <th>SUPPLIER CREDIT NOTE</th>
		                  <th>DATE</th>
		                  <th colspan="6" style="text-align: center;">QUERY</th>
		                  <th style="background-color: yellow;">PAYABLE MONTH</th>
		                  <th>AMOUNT</th>
		                  <th></th>
		                  <th></th>
		                  <th></th>
		                  <th></th>
		                  <th></th>
		            </thead>
		            <tbody>
		            	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['v2']->value, 'v3', false, 'k3');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k3']->value => $_smarty_tpl->tpl_vars['v3']->value) {
?>
		                <tr>
		                      <td style="text-align: center;">
		                      	<a href="#" onclick='deleteDepositDetails(<?php echo json_encode($_smarty_tpl->tpl_vars['v3']->value);?>
)''>
						          <span class="glyphicon glyphicon-trash"></span>
						        </a>
		                      </td>

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
		                      <td colspan="6"><?php echo $_smarty_tpl->tpl_vars['v3']->value['query'];?>
</td>
		                      <td class="datetd" style="background-color: yellow;"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v3']->value['payable_month'],"%d-%m-%Y");?>
</td>
		                      <td><?php echo $_smarty_tpl->tpl_vars['v3']->value['amount'];?>
</td>
		                      <td></td>
		                      <td></td>
		                      <td></td>
		                      <td></td>
		                      <td></td>
		                </tr>
		                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

		                <tr>
				        	<td colspan="15"></td>
				        	<td><b>Total</b></td>
				        	<td><b><?php echo $_smarty_tpl->tpl_vars['totalAmount']->value;?>
</b></td>
				        	<td></td>
				        	<td></td>
				        	<td></td>
				        	<td></td>
				        	<td></td>
				        </tr>
		            </tbody>
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
    text-align: left;
    padding: 5px 40px 5px 10px;
    border: 1px solid #000;
    font-size: 14px;
}

.paymentBookListTable .datetd{
	padding: 0px;
	padding-left: 5px;
}
</style><?php }
}
