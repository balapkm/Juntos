<?php
/* Smarty version 3.1.30, created on 2018-07-01 11:17:24
  from "/home/Staging/workSpace/Juntos/application/views/templates/header_download.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5b386aec0768d8_77795219',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0cac4af7b50381dde7dce2f4011951eff193008b' => 
    array (
      0 => '/home/Staging/workSpace/Juntos/application/views/templates/header_download.tpl',
      1 => 1530423851,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b386aec0768d8_77795219 (Smarty_Internal_Template $_smarty_tpl) {
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
    font-size: 12px;

}
table tr td, table tr th {
    page-break-inside: avoid;
}
</style>
<body>
<table cellspacing="0" cellpadding="0" border="0" style="height:100%;width:100%;">
    <tr> 
        <td colspan="11" valign="top" style="padding:0px;border-left:1px solid #000;border-top:1px solid #000;">
            <table cellspacing="0" cellpadding="0" width="100%" id="x">
                <tr>
                    <td align="center" width="15%" style="border:0px;"><img src="../../assets/img/TMAR LOGO.jpg" width="100" height="100"/>
                    </td>
                    <td width="40%" style="border:0px;"><h2 style="margin-bottom: 2px">T.M.ABDUL RAHMAN & SONS</h2>
                    <!-- <h6 style="font-weight: normal;margin: 0px;">MANUFACTURES & EXPORTERS OF FINISHED LEATHER & SHOES</h6></td> -->
                    <h6 style="font-weight: normal;margin: 0px;">FINISHED LEATHER & SHOES</h6></td>
                    <td width="40%" style="border:0px;"><font style="font:bold arial,helvetica,verdana; color:#000;">45J / 46C Ammoor Road,Ranipet - 632-401</br>
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
        <td colspan="<?php echo round(($_smarty_tpl->tpl_vars['OTCcolspanCalc']->value*0.3),0);?>
" style="font:normal arial,helvetica,verdana; color:#000;">Po.No</td>
        <td colspan="<?php echo round(($_smarty_tpl->tpl_vars['OTCcolspanCalc']->value*0.3),0);?>
" style="font:normal arial,helvetica,verdana; color:#000;"><?php echo $_smarty_tpl->tpl_vars['searchPoData']->value[0]['full_po_number'];?>
</td>
    </tr>
    <tr>
        <td colspan="<?php echo round(($_smarty_tpl->tpl_vars['OTCcolspanCalc']->value*0.4),0);?>
" style="font:normal arial,helvetica,verdana; color:#000;border-left:1px solid #000;">M/s.<?php echo $_smarty_tpl->tpl_vars['searchPoData']->value[0]['supplier_name'];?>
</td>
        <td colspan="<?php echo round(($_smarty_tpl->tpl_vars['OTCcolspanCalc']->value*0.3),0);?>
" style="font:normal arial,helvetica,verdana; color:#000;">Date</td>
        <td colspan="<?php echo round(($_smarty_tpl->tpl_vars['OTCcolspanCalc']->value*0.3),0);?>
" style="font:normal arial,helvetica,verdana; color:#000;"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['searchPoData']->value[0]['po_date'],"%d-%m-%Y");?>
</td>
    </tr>
    <tr>
        <td colspan="<?php echo round(($_smarty_tpl->tpl_vars['OTCcolspanCalc']->value*0.4),0);?>
" style="font:normal arial,helvetica,verdana; color:#000;border-left:1px solid #000;"><?php echo $_smarty_tpl->tpl_vars['searchPoData']->value[0]['origin'];?>
</td>
        <td colspan="<?php echo round(($_smarty_tpl->tpl_vars['OTCcolspanCalc']->value*0.3),0);?>
" style="font:normal arial,helvetica,verdana; color:#000;">OrderRef</td>
        <td colspan="<?php echo round(($_smarty_tpl->tpl_vars['OTCcolspanCalc']->value*0.3),0);?>
" style="font:normal arial,helvetica,verdana; color:#000;"><?php echo $_smarty_tpl->tpl_vars['searchPoData']->value[0]['order_reference'];?>
</td>
    </tr>
    <tr>
        <td colspan="<?php echo round(($_smarty_tpl->tpl_vars['OTCcolspanCalc']->value*0.4),0);?>
" style="font:normal; arial,helvetica,verdana; color:#000;border-left:1px solid #000;"><b>GSTIN : <?php echo $_smarty_tpl->tpl_vars['searchPoData']->value[0]['gst_no'];?>
</b></td>
        <td colspan="<?php echo round(($_smarty_tpl->tpl_vars['OTCcolspanCalc']->value*0.3),0);?>
" style="font:normal arial,helvetica,verdana; color:#000;">Delivery Date</td>
        <td colspan="<?php echo round(($_smarty_tpl->tpl_vars['OTCcolspanCalc']->value*0.3),0);?>
" style="font:normal arial,helvetica,verdana; color:#000;"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['searchPoData']->value[0]['delivery_date'],"%d-%m-%Y");?>
</td>
    </tr>
</table>
</body>
</html><?php }
}
