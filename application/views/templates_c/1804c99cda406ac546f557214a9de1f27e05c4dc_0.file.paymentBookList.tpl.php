<?php
/* Smarty version 3.1.30, created on 2018-04-15 18:16:31
  from "/home/Staging/workSpace/Juntos/application/views/templates/paymentBookList.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ad349a7991d55_13679017',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1804c99cda406ac546f557214a9de1f27e05c4dc' => 
    array (
      0 => '/home/Staging/workSpace/Juntos/application/views/templates/paymentBookList.tpl',
      1 => 1523777426,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ad349a7991d55_13679017 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once '/home/Staging/workSpace/Juntos/application/third_party/smarty/libs/plugins/modifier.date_format.php';
if (count($_smarty_tpl->tpl_vars['result']->value['paymentBookList']) <= 1) {?>
 <p style="margin-top: 50px;" align="center">No Data Found for this supplier!</p>
<?php } else { ?>
<div style="overflow-x:auto;margin-top: 50px;">
	<table style="margin-bottom: 10px;">
	    <thead>
	        <tr>
	          <th>Edit</th>	
	          <th>S.No</th>
	          <th>HS CODE</th>
	          <th>CGST</th>
	          <th>SGST</th>
	          <th>QTY</th>
	          <th>UOM</th>
	          <th>MATERAIL</th>
	          <th>RATE</th>
	          <th>AVG. COST</th>
	          <th>QUERY</th>
	          <th>PO NUMBER</th>
	          <th>DC Number</th>
	          <th>Bill Number</th>
	          <th>BILL DATE</th>
	          <th>Payable Month</th>
	          <th>Bill Amount</th>
	          <th>Dedc.</th>
	          <th>Cheque Number</th>
	          <th>Cheque Date</th>
	          <th>Cheque Amount</th>
	        </tr>
	    </thead>
	    <tbody>
	    	<?php $_smarty_tpl->_assignInScope('lastBillCnt', 0);
?>
	    	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['result']->value['paymentBookList'], 'x', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['x']->value) {
?>
	        <tr>
	        	<?php $_smarty_tpl->_assignInScope('billNo', $_smarty_tpl->tpl_vars['x']->value['bill_number']);
?>
	        	<?php if ($_smarty_tpl->tpl_vars['lastBillCnt']->value == 0) {?>
    	        <td rowspan="<?php echo $_smarty_tpl->tpl_vars['x']->value['billCnt'][$_smarty_tpl->tpl_vars['billNo']->value];?>
" style="text-align: center;">
            		<a href="#" onclick='editPaymentList(<?php echo json_encode($_smarty_tpl->tpl_vars['x']->value);?>
)'>
			          <span class="glyphicon glyphicon-edit"></span>
			        </a>
				</td>
	        	<td rowspan="<?php echo $_smarty_tpl->tpl_vars['x']->value['billCnt'][$_smarty_tpl->tpl_vars['billNo']->value];?>
"><?php echo $_smarty_tpl->tpl_vars['x']->value['s_no'];?>
</td>
	        	<?php }?>
	        	<td>
	        		<?php echo $_smarty_tpl->tpl_vars['x']->value['material_hsn_code'];?>

	        	 </td>
	        	 <?php if ($_smarty_tpl->tpl_vars['x']->value['state_code'] == 33) {?>
	        	 <td> 9% </td>
	        	 <td> 9% </td>
	        	 <?php } else { ?>
	        	 <td> 18 % </td>
	        	 <?php }?>
	        	<td><?php echo $_smarty_tpl->tpl_vars['x']->value['qty'];?>
</td>
	        	<td><?php echo $_smarty_tpl->tpl_vars['x']->value['material_uom'];?>
</td>
	        	<td><?php echo $_smarty_tpl->tpl_vars['x']->value['material_name'];?>
</td>
	        	<td><?php echo $_smarty_tpl->tpl_vars['x']->value['price'];?>
</td>
	        	<td><?php echo $_smarty_tpl->tpl_vars['x']->value['avg_cost'];?>
</td>
	        	<td><?php echo $_smarty_tpl->tpl_vars['x']->value['query'];?>
</td>
	        	<td><?php echo $_smarty_tpl->tpl_vars['x']->value['po_number'];?>
</td>
	        	<td><?php echo $_smarty_tpl->tpl_vars['x']->value['dc_number'];?>
</td>
	        	<?php if ($_smarty_tpl->tpl_vars['lastBillCnt']->value == 0) {?>
	        	<?php $_smarty_tpl->_assignInScope('lastBillCnt', $_smarty_tpl->tpl_vars['x']->value['billCnt'][$_smarty_tpl->tpl_vars['billNo']->value]);
?>
	        	<td rowspan="<?php echo $_smarty_tpl->tpl_vars['x']->value['billCnt'][$_smarty_tpl->tpl_vars['billNo']->value];?>
"><?php echo $_smarty_tpl->tpl_vars['x']->value['bill_number'];?>
 </td>
	        	<td rowspan="<?php echo $_smarty_tpl->tpl_vars['x']->value['billCnt'][$_smarty_tpl->tpl_vars['billNo']->value];?>
"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['x']->value['bill_date'],"%d-%m-%Y");?>
</td>
	        	<td rowspan="<?php echo $_smarty_tpl->tpl_vars['x']->value['billCnt'][$_smarty_tpl->tpl_vars['billNo']->value];?>
"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['x']->value['payable_month'],"%d-%m-%Y");?>
</td>
	        	<td rowspan="<?php echo $_smarty_tpl->tpl_vars['x']->value['billCnt'][$_smarty_tpl->tpl_vars['billNo']->value];?>
"><?php echo $_smarty_tpl->tpl_vars['x']->value['bill_amount'];?>
</td>
	        	<td rowspan="<?php echo $_smarty_tpl->tpl_vars['x']->value['billCnt'][$_smarty_tpl->tpl_vars['billNo']->value];?>
"><?php echo $_smarty_tpl->tpl_vars['x']->value['deduction'];?>
</td>
	        	<td rowspan="<?php echo $_smarty_tpl->tpl_vars['x']->value['billCnt'][$_smarty_tpl->tpl_vars['billNo']->value];?>
"><?php echo $_smarty_tpl->tpl_vars['x']->value['cheque_no'];?>
</td>
	        	<td rowspan="<?php echo $_smarty_tpl->tpl_vars['x']->value['billCnt'][$_smarty_tpl->tpl_vars['billNo']->value];?>
"><?php if ($_smarty_tpl->tpl_vars['x']->value['cheque_date'] != '0000-00-00') {?> <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['x']->value['cheque_date'],"%d-%m-%Y");?>
 <?php }?> </td>
	        	<td rowspan="<?php echo $_smarty_tpl->tpl_vars['x']->value['billCnt'][$_smarty_tpl->tpl_vars['billNo']->value];?>
"><?php if ($_smarty_tpl->tpl_vars['x']->value['cheque_amount'] != 0) {?> <?php echo $_smarty_tpl->tpl_vars['x']->value['cheque_amount'];?>
 <?php }?> </td>
	        	<?php }?>
				<?php $_smarty_tpl->_assignInScope('lastBillCnt', $_smarty_tpl->tpl_vars['lastBillCnt']->value-1);
?>
	        </tr>
	        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

	        <tr>
            	<td colspan="15"></td>
            	<td><b>Total :</b></td>	
            	<td><b> <?php echo $_smarty_tpl->tpl_vars['result']->value['paymentBookList'][0]['totalAmount'];?>
 </b></td>
            	<td colspan="6"></td>
            </tr>
	    </tbody>
	</table>
</div>
<?php }?>

<?php if (count($_smarty_tpl->tpl_vars['result']->value['debitNote']) <= 1) {?>
 <p style="margin-top: 50px;" align="center">No Data Found in Debit/Credit Note!</p>
<?php } else { ?>
<div style="overflow-x:auto;margin-top: 50px;">
        <table style="margin-bottom: 10px; width: 100%" >
            <thead>
                <tr>
                  <th>Delete</th>
                  <th>S.No</th>
                  <th>TYPE</th>
                  <th>DEBIT NOTE NO.</th>
                  <th>DATE</th>
                  <th>SUPPLIER CREDIT NOTE</th>
                  <th>DATE</th>
                  <th colspan="6">QUERY</th>
                  <th>PAYABLE MONTH</th>
                  <th>AMOUNT</th>
                  <!-- <th>Dedc.</th>
		          <th>Cheque Number</th>
		          <th>Cheque Date</th>
		          <th>Cheque Amount</th> -->
                </tr>
            </thead>
            <tbody>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['result']->value['debitNote'], 'x', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['x']->value) {
?>
                <tr>
                		<td style="text-align: center;">
                    		<a href="#" onclick='deleteDepositDetails(<?php echo json_encode($_smarty_tpl->tpl_vars['x']->value);?>
)''>
					          <span class="glyphicon glyphicon-trash"></span>
					        </a>
						</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['x']->value['s_no'];?>
</td>
                        <td>
                                <?php if ($_smarty_tpl->tpl_vars['x']->value['type'] === 'D') {?> Debit Note 
                                <?php } elseif ($_smarty_tpl->tpl_vars['x']->value['type'] === 'C') {?> Credit Note
                                <?php } elseif ($_smarty_tpl->tpl_vars['x']->value['type'] === 'B') {?> Balance Amount
                                <?php } elseif ($_smarty_tpl->tpl_vars['x']->value['type'] === 'T') {?> TDS
                                <?php }?>
                         </td>
                        <td><?php echo $_smarty_tpl->tpl_vars['x']->value['debit_note_no'];?>
</td>
                        <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['x']->value['debit_note_date'],"%d-%m-%Y");?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['x']->value['supplier_creditnote'];?>
</td>
                        <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['x']->value['supplier_creditnote_date'],"%d-%m-%Y");?>
</td>
                        <td colspan="6"><?php echo $_smarty_tpl->tpl_vars['x']->value['query'];?>
</td>
                        <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['x']->value['payable_month'],"%d-%m-%Y");?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['x']->value['amount'];?>
</td>
                        <!-- <td></td>
                        <td></td>
                        <td></td>
                        <td></td> -->
                </tr>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                <tr>
                	<td colspan="13"></td>
                	<td><b>Total :</b></td>	
                	<td><b> <?php echo $_smarty_tpl->tpl_vars['result']->value['debitNote'][0]['totalAmount'];?>
 </b></td>
                	<!-- <td colspan="4"></td> -->
                </tr>                
            </tbody>
        </table>
</div>
<?php }?>
<style>
table {
    border-collapse: collapse;
    border-spacing: 0;
    width: 100%;
    border: 1px solid #000;
}

th, td {
    text-align: left;
    padding: 5px 30px 5px 10px;
    border: 1px solid #000;
}
</style><?php }
}
