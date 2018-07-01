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
        <td colspan="[[($OTCcolspanCalc*0.4)|round:0]]" style="font:normal arial,helvetica,verdana; color:#000;border-left:1px solid #000;">To</td>
        <td colspan="[[($OTCcolspanCalc*0.3)|round:0]]" style="font:normal arial,helvetica,verdana; color:#000;">Po.No</td>
        <td colspan="[[($OTCcolspanCalc*0.3)|round:0]]" style="font:normal arial,helvetica,verdana; color:#000;">[[$searchPoData[0].full_po_number]]</td>
    </tr>
    <tr>
        <td colspan="[[($OTCcolspanCalc*0.4)|round:0]]" style="font:normal arial,helvetica,verdana; color:#000;border-left:1px solid #000;">M/s.[[$searchPoData[0].supplier_name]]</td>
        <td colspan="[[($OTCcolspanCalc*0.3)|round:0]]" style="font:normal arial,helvetica,verdana; color:#000;">Date</td>
        <td colspan="[[($OTCcolspanCalc*0.3)|round:0]]" style="font:normal arial,helvetica,verdana; color:#000;">[[$searchPoData[0].po_date|date_format:"%d-%m-%Y"]]</td>
    </tr>
    <tr>
        <td colspan="[[($OTCcolspanCalc*0.4)|round:0]]" style="font:normal arial,helvetica,verdana; color:#000;border-left:1px solid #000;">[[$searchPoData[0].origin]]</td>
        <td colspan="[[($OTCcolspanCalc*0.3)|round:0]]" style="font:normal arial,helvetica,verdana; color:#000;">OrderRef</td>
        <td colspan="[[($OTCcolspanCalc*0.3)|round:0]]" style="font:normal arial,helvetica,verdana; color:#000;">[[$searchPoData[0].order_reference]]</td>
    </tr>
    <tr>
        <td colspan="[[($OTCcolspanCalc*0.4)|round:0]]" style="font:normal; arial,helvetica,verdana; color:#000;border-left:1px solid #000;"><b>GSTIN : [[$searchPoData[0].gst_no]]</b></td>
        <td colspan="[[($OTCcolspanCalc*0.3)|round:0]]" style="font:normal arial,helvetica,verdana; color:#000;">Delivery Date</td>
        <td colspan="[[($OTCcolspanCalc*0.3)|round:0]]" style="font:normal arial,helvetica,verdana; color:#000;">[[$searchPoData[0].delivery_date|date_format:"%d-%m-%Y"]]</td>
    </tr>
</table>
</body>
</html>