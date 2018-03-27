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
        						[[$importAdditionalCharges[0].delivery_date]]</b>
        					</h5>
        					<h5><b>Incoterms            :    [[$importAdditionalCharges[0].incoterms]]</b></h5>
        					<h5><b>Payment Terms        :    [[$importAdditionalCharges[0].payment_terms]]</b></h5>
        					<h5><b>Shipment             :    [[$importAdditionalCharges[0].Shipment]]</b></h5>
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
</html>