<?php
/* Smarty version 3.1.30, created on 2018-04-01 19:32:33
  from "/home/Staging/workSpace/Juntos/application/views/templates/Import_download_footer.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ac0e67928e316_74102257',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '01b1c97205d387069d2d340fa80a2a4d775a52a9' => 
    array (
      0 => '/home/Staging/workSpace/Juntos/application/views/templates/Import_download_footer.tpl',
      1 => 1522082204,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ac0e67928e316_74102257 (Smarty_Internal_Template $_smarty_tpl) {
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
        		<tr>
        			<td align="center" width="60%"  class="own-td-4">
        				<div style="float: left;text-align: left;margin-left: 10px;font-size: 14px;">
        					<h5>
        						<b>Delivery Date        :    
        						<?php echo $_smarty_tpl->tpl_vars['importAdditionalCharges']->value[0]['delivery_date'];?>
</b>
        					</h5>
        					<h5><b>Incoterms            :    <?php echo $_smarty_tpl->tpl_vars['importAdditionalCharges']->value[0]['incoterms'];?>
</b></h5>
        					<h5><b>Payment Terms        :    <?php echo $_smarty_tpl->tpl_vars['importAdditionalCharges']->value[0]['payment_terms'];?>
</b></h5>
        					<h5><b>Shipment             :    <?php echo $_smarty_tpl->tpl_vars['importAdditionalCharges']->value[0]['Shipment'];?>
</b></h5>
        				</div>
        			</td>
		         	<td align="center" width="50%"  class="own-td-4" style="font-size: 13px;">
		         		<h5 style="float: left;margin:60px 0px 0px 20px;"><b>Incharge</b></h5>
		         		<h5 style="float: right;margin:60px 20px 0px 20px;"><b>For T.M.Abdul Rahman & Sons</b></h5>
		         		</br>
		         		</br>
		         		<h5 style="float: left;margin:80px 0px 0px 20px;"><b>Signature</b></h5>
		         		<h5 style="float: right;margin:80px 20px 0px 20px;"><b>Authorized & Signature</b></h5>
		         	</td>
        		</tr>
        	</table>
        </tr>
	</table>
</body>
</html><?php }
}
