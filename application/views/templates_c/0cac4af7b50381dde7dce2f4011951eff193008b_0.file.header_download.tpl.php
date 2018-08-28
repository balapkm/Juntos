<?php
/* Smarty version 3.1.30, created on 2018-08-28 22:45:02
  from "/home/Staging/workSpace/Juntos/application/views/templates/header_download.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5b8583167ee855_30807441',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0cac4af7b50381dde7dce2f4011951eff193008b' => 
    array (
      0 => '/home/Staging/workSpace/Juntos/application/views/templates/header_download.tpl',
      1 => 1535476500,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b8583167ee855_30807441 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once '/home/Staging/workSpace/Juntos/application/third_party/smarty/libs/plugins/modifier.date_format.php';
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
    font-size: 14px;

}
table tr td, table tr th {
    page-break-inside: avoid;
}
</style>
<body>
<?php if ($_smarty_tpl->tpl_vars['type']->value != 'Indigenous') {
$_smarty_tpl->_assignInScope('OTCcolspanCalc', 7);
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
}
} else {
$_smarty_tpl->_assignInScope('OTCcolspanCalc', 7);
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
}
}?>
<table cellspacing="0" cellpadding="0" border="0" style="height:100%;width:100%;">
    <tr> 
        <td colspan="11" valign="top" style="padding:0px;border-left:1px solid #000;border-top:1px solid #000;">
            <table cellspacing="0" cellpadding="0" width="100%" id="x">
                <tr>
                    <td align="center" width="15%" style="border:0px;"><img src="../../assets/img/TMAR LOGO.jpg" width="100" height="100"/>
                    </td>
                    <td width="40%" style="border:0px;"><h1 style="margin-bottom: 2px">T.M.ABDUL RAHMAN & SONS</h1>
                    <!-- <h6 style="font-weight: normal;margin: 0px;">MANUFACTURES & EXPORTERS OF FINISHED LEATHER & SHOES</h6></td> -->
                    <h3 style="font-weight: normal;margin: 0px;">FINISHED LEATHER & SHOES</h3></td>
                    <td width="25%" style="border:0px;"><font style="font:bold arial,helvetica,verdana; color:#000;">45J / 46C Ammoor Road,RANIPET - 632-401</br>
                    Tel : 91-4172-272470,271835</br>
                    Email : purchasedept@tmargroup.in </br>
                    Email : soles@tmargroup.in</font><br/><br/>

                    <font style="font:bold arial,helvetica,verdana; color:#000;">
                    H.O : 48(Old No.49) Wuthucattan Street,</br>
                    Periamet,CHENNAI-600 003.INDIA</br>
                    Tel : 91-44-25612164,25610078</br>
                    Email : headoffice@tmargroup.in</br>
                    <b>GSTIN : 33AABFT2029F1ZO</b></font></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td align="center" colspan="10" style="font:bold arial,helvetica,verdana; color:#000;border-left:1px solid #000;">PURCHASE ORDER</td>
    </tr>
    <tr>
        <td colspan="<?php echo round(($_smarty_tpl->tpl_vars['OTCcolspanCalc']->value*0.4),0);?>
" style="font:normal arial,helvetica,verdana; color:#000;border-left:1px solid #000;">To</td>
        <td colspan="<?php echo round(($_smarty_tpl->tpl_vars['OTCcolspanCalc']->value*0.2),0);?>
" style="font:normal arial,helvetica,verdana; color:#000;">Po.No</td>
        <td colspan="<?php echo round(($_smarty_tpl->tpl_vars['OTCcolspanCalc']->value*0.3),0);?>
" style="font:normal arial,helvetica,verdana; color:#000;"><?php echo $_smarty_tpl->tpl_vars['searchPoData']->value[0]['full_po_number'];?>
</td>
    </tr>
    <tr>
        <td colspan="<?php echo round(($_smarty_tpl->tpl_vars['OTCcolspanCalc']->value*0.4),0);?>
" style="font:normal arial,helvetica,verdana; color:#000;border-left:1px solid #000;">M/s.<?php echo $_smarty_tpl->tpl_vars['searchPoData']->value[0]['supplier_name'];?>
</td>
        <td colspan="<?php echo round(($_smarty_tpl->tpl_vars['OTCcolspanCalc']->value*0.2),0);?>
" style="font:normal arial,helvetica,verdana; color:#000;">Date</td>
        <td colspan="<?php echo round(($_smarty_tpl->tpl_vars['OTCcolspanCalc']->value*0.3),0);?>
" style="font:normal arial,helvetica,verdana; color:#000;"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['searchPoData']->value[0]['po_date'],"%d-%m-%Y");?>
</td>
    </tr>
    <tr>
        <td colspan="<?php echo round(($_smarty_tpl->tpl_vars['OTCcolspanCalc']->value*0.4),0);?>
" style="font:normal arial,helvetica,verdana; color:#000;border-left:1px solid #000;"><?php echo $_smarty_tpl->tpl_vars['searchPoData']->value[0]['origin'];?>
</td>
        <td colspan="<?php echo round(($_smarty_tpl->tpl_vars['OTCcolspanCalc']->value*0.2),0);?>
" style="font:normal arial,helvetica,verdana; color:#000;">OrderRef</td>
        <td colspan="<?php echo round(($_smarty_tpl->tpl_vars['OTCcolspanCalc']->value*0.3),0);?>
" style="font:normal arial,helvetica,verdana; color:#000;"><?php echo $_smarty_tpl->tpl_vars['searchPoData']->value[0]['order_reference'];?>
</td>
    </tr>
    <tr>
        <td colspan="<?php echo round(($_smarty_tpl->tpl_vars['OTCcolspanCalc']->value*0.4),0);?>
" style="font:normal; arial,helvetica,verdana; color:#000;border-left:1px solid #000;"><b>GSTIN : <?php echo $_smarty_tpl->tpl_vars['searchPoData']->value[0]['gst_no'];?>
</b></td>
        <td colspan="<?php echo round(($_smarty_tpl->tpl_vars['OTCcolspanCalc']->value*0.2),0);?>
" style="font:normal arial,helvetica,verdana; color:#000;">Delivery Date</td>
        <td colspan="<?php echo round(($_smarty_tpl->tpl_vars['OTCcolspanCalc']->value*0.3),0);?>
" style="font:normal arial,helvetica,verdana; color:#000;"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['searchPoData']->value[0]['delivery_date'],"%d-%m-%Y");?>
</td>
    </tr>
    <?php if ($_smarty_tpl->tpl_vars['type']->value != 'Indigenous') {?>
    <tr>
        <td align="center" width="5%" style="font:bold arial,helvetica,verdana; color:#000;border-left:1px solid #000;font-weight: bold;">S.NO</td>
        <td align="center" width="20%" style="font:bold arial,helvetica,verdana; color:#000;font-weight: bold;">DESCRIPTION</td>
        <?php if ($_smarty_tpl->tpl_vars['searchPoData']->value[0]['supplier_status'] != 'UNREGISTERED') {?>
        <td align="center" width="10%" style="font:bold arial,helvetica,verdana; color:#000;font-weight: bold;">HSN/SAC CODE</td>
        <?php }?>
        <td align="center" width="5%" style="font:bold arial,helvetica,verdana; color:#000;font-weight: bold;">QTY</td>
        <td align="center" width="10%" style="font:bold arial,helvetica,verdana; color:#000;font-weight: bold;">UOM</td>
        <td align="center" width="10%" style="font:bold arial,helvetica,verdana; color:#000;font-weight: bold;">PRICE</td>
        <td align="center" width="10%" style="font:bold arial,helvetica,verdana; color:#000;font-weight: bold;">DISCOUNT</td>
        <td align="center" width="20%" style="font:bold arial,helvetica,verdana; color:#000;font-weight: bold;">TOTAL <br/>AMOUNT</td>
    </tr>
    <?php } else { ?>
    <tr>
        <td align="center" width="5%" style="font:bold arial,helvetica,verdana; color:#000;border-left:1px solid #000;font-weight: bold;">S.NO</td>

        <?php if ($_smarty_tpl->tpl_vars['searchPoData']->value[0]['supplier_status'] != 'UNREGISTERED') {?>
        <?php if ($_smarty_tpl->tpl_vars['searchPoData']->value[0]['state_code'] == 33) {?>
        <td align="center" width="20%" style="font:bold arial,helvetica,verdana; color:#000;font-weight: bold;">DESCRIPTION</td>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['searchPoData']->value[0]['state_code'] != 33) {?>
        <td align="center" width="30%" style="font:bold arial,helvetica,verdana; color:#000;font-weight: bold;">DESCRIPTION</td>
        <?php }?>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['searchPoData']->value[0]['supplier_status'] != 'UNREGISTERED') {?>
        <td align="center" width="10%" style="font:bold arial,helvetica,verdana; color:#000;font-weight: bold;">HSN/SAC CODE</td>
        <?php }?>
        <td align="center" width="5%" style="font:bold arial,helvetica,verdana; color:#000;font-weight: bold;">QTY</td>
        <td align="center" width="7%" style="font:bold arial,helvetica,verdana; color:#000;font-weight: bold;">UOM</td>
        <td align="center" width="8%" style="font:bold arial,helvetica,verdana; color:#000;font-weight: bold;">PRICE</td>
        <td align="center" width="10%" style="font:bold arial,helvetica,verdana; color:#000;font-weight: bold;">DISCOUNT</td>
        <?php if ($_smarty_tpl->tpl_vars['searchPoData']->value[0]['supplier_status'] != 'UNREGISTERED') {?>
        <?php if ($_smarty_tpl->tpl_vars['searchPoData']->value[0]['state_code'] == 33) {?>
            <td align="center" width="10%" style="font:bold arial,helvetica,verdana; color:#000;font-weight: bold;">CGST</td>
            <td align="center" width="10%" style="font:bold arial,helvetica,verdana; color:#000;font-weight: bold;">SGST</td>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['searchPoData']->value[0]['state_code'] != 33) {?>
            <td align="center" width="10%" style="font:bold arial,helvetica,verdana; color:#000;font-weight: bold;">IGST</td>
        <?php }?>
        <?php }?>
        <td align="center" width="10%" style="font:bold arial,helvetica,verdana; color:#000;font-weight: bold;">TOTAL <br/>AMOUNT</td>
    </tr>
    <?php }?>
</table>
</body>
</html><?php }
}
