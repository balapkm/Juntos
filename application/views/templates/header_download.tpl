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
    padding : 3px 3px 3px 40px;
    font-size: 10px;
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
    			<td width="15%" style="padding: 20px 15px 28px 40px;border: 0px;">
    				<img src="../../assets/img/TMAR LOGO.jpg" width="100" height="100"/>
    			</td>
	         	<td width="45%" style="border: 0px;">
	         		<h3>T.M.ABDUL RAHMAN & SONS</h3>
					<h5 style="font-weight: normal;">MANUFACTURES & EXPORTERS OF FINISHED LEATHER & SHOES</h5>
	         	</td>
	         	<td width="40%" style="border: 0px;padding-right: 20px;" align="right">
	         		<p style="text-align: justify;margin-left:30px;font-weight: normal;font-size: 10px">45J / 46C Ammoor Road,RANIPET - 632-401</br>
        			Tel : 91-4172-272470,272480</br>
        			Email : purchasedept@tmargroup.in </br>
        			Email : soles@tmargroup.in</p>

        			<p style="text-align: justify;margin-left:30px;font-weight: normal;font-size: 10px">
        			H.O : 48(Old No.49) Wuthucattan Street,</br>
        			Periamet,CHENNAI-600 003.INDIA</br>
        			Tel : 91-44-25612164,25610078</br>
        			Email : headoffice@tmargroup.in</br>
        			<b>GSTIN : 33AABFT2029F1ZO</b>1</p>
	         	</td>
    		</tr>
    	</table>
    </tr>
    <tr>
    	<table class="own-table">
    		<tr>
    			<td align="center" class="own-td-1" width="100%">PURCHASE ORDER</td>
    		</tr>
    	</table>
    </tr>
    <tr>
    	<table class="own-table">
    		<tr>
    			<td class="own-td-1" width="40%">To</td>
	         	<td class="own-td-1" width="30%">LH.Po.No</td>
	         	<td class="own-td-1" width="30%">[[$searchPoData[0].full_po_number]]</td>
    		</tr>
    	</table>
    </tr>
    <tr>
    	<table class="own-table">
    		<tr>
    			<td class="own-td-1" width="40%">M/s.[[$searchPoData[0].supplier_name]]</td>
	         	<td class="own-td-1" width="30%">Date</td>
	         	<td class="own-td-1" width="30%">[[$searchPoData[0].po_date|date_format:"%d-%m-%Y"]]</td>
    		</tr>
    	</table>
    </tr>
    <tr>
    	<table class="own-table">
    		<tr>
    			<td class="own-td-1" width="40%">[[$searchPoData[0].origin]]</td>
	         	<td class="own-td-1" width="30%">Ord Ref</td>
	         	<td class="own-td-1" width="30%">[[$searchPoData[0].order_reference]]</td>
    		</tr>
    	</table>
    </tr>
    <tr>
    	<table class="own-table">
    		<tr>
    			<td class="own-td-1" width="40%">GSTIN : [[$searchPoData[0].gst_no]]</td>
	         	<td class="own-td-1" width="30%">Delivery Date</td>
	         	<td class="own-td-1" width="30%">[[$searchPoData[0].delivery_date|date_format:"%d-%m-%Y"]]</td>
    		</tr>
    	</table>
    </tr>
</table>
</body>
</html>