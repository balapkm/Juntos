<hr/>
<div class="col-lg-12" style="margin-top: 50px;">
	<button class="btn btn-primary" style="float: right;margin-bottom: 10px;" onclick="downloadAsPdfPODetails()">Download as PDF</button>
	<button class="btn btn-primary" style="float: right;margin-bottom: 10px;margin-right: 10px;" onclick='addPurchaseOrder([[$searchPoData[0]|@json_encode]])'>Add Purchase Order</button>
	<button class="btn btn-primary" style="float: right;margin-bottom: 10px;margin-right: 10px;" onclick='addAdditionalCharges([[$searchPoData[0]|@json_encode]])'>Add Additional Charges</button>
	<button class="btn btn-primary" style="float: right;margin-bottom: 10px;margin-right: 10px;" onclick='addOverAllDiscount([[$searchPoData[0]|@json_encode]])'>Add Overall Discount</button>
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
		         	<td class="own-td-1" width="30%">[[$searchPoData[0].full_po_number]]</td>
        		</tr>
        	</table>
        </tr>
        <tr>
        	<table class="own-table">
        		<tr>
        			<td class="own-td-1" width="40%">[[$searchPoData[0].supplier_name]]</td>
		         	<td class="own-td-1" width="30%"><b>Date</b></td>
		         	<td class="own-td-1" width="30%">[[$searchPoData[0].po_date]]</td>
        		</tr>
        	</table>
        </tr>
        <tr>
        	<table class="own-table">
        		<tr>
        			<td class="own-td-1" width="40%">[[$searchPoData[0].origin]]</td>
		         	<td class="own-td-1" width="30%"><b>Ord Ref</b></td>
		         	<td class="own-td-1" width="30%">[[$searchPoData[0].order_reference]]</td>
        		</tr>
        	</table>
        </tr>
        <tr>
        	<table class="own-table">
        		<tr>
        			<td class="own-td-1" width="40%"><b>GSTIN : </b>[[$searchPoData[0].gst_no]]</td>
		         	<td class="own-td-1" width="30%"><b>Delivery Date</b></td>
		         	<td class="own-td-1" width="30%">[[$searchPoData[0].delivery_date]]</td>
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
        [[assign var=GrandTotal value= 0]]
        [[assign var=CGSTTotalValue value=0]]
        [[assign var=IGSTTotalValue value=0]]
        [[assign var=SGSTTotalValue value=0]]
        [[foreach from=$searchPoData key=k item=v]]
        <tr>
        	<table class="own-table">
        		<tr>
        			<td align="center" width="5%"  class="own-td-2">[[$k+1]]</td>
		         	<td align="center" width="20%" class="own-td-2" style="text-align:left;word-wrap: break-word;white-space: pre;">[[$v.material_name]]</td>
		         	<td align="center" width="10%" class="own-td-2">[[$v.material_hsn_code]]</td>
		         	<td align="center" width="5%"  class="own-td-2">[[$v.qty]]</td>
		         	<td align="center" width="7%" class="own-td-2">[[$v.material_uom]]</td>
		         	<td align="center" width="8%" class="own-td-2">
		         			[[$v.price|number_format:2]]<br/>
		         			[ [[$v.price_status]] ]
		         	</td>

		         	[[if $v.discount_price_status eq 'AMOUNT']]
		         		[[assign var=DISCOUNTTotalValue value=[[$v.discount]]]]
		         	[[else]]
		         		[[assign var=DISCOUNTTotalValue value=(($v.discount/100) * $v.price ) * $v.qty]]
		         	[[/if]]

		         	<td align="center" width="10%" class="own-td-2">
		         		[[$v.discount|number_format:2]][[if $v.discount_price_status neq 'AMOUNT']] % [[/if]]
		         		[[if $v.discount_price_status neq 'AMOUNT']]
		         		</br>
		         		[ [[$DISCOUNTTotalValue|number_format:2]] ]
		         		[[/if]]
		         	</td>

		         	[[assign var=totalPriceValue value=[[($v.qty*$v.price) + $IGSTTotalValue + $SGSTTotalValue + $CGSTTotalValue - $DISCOUNTTotalValue]]]]

		         	<td align="center" width="10%" class="own-td-2"><b>[[$totalPriceValue|number_format:2]]</b></td>

		         	
		         	[[$GrandTotal = $GrandTotal + $totalPriceValue]]
		         	<td align="center" width="10%" class="own-td-2">
		         		<a href="#" onclick='editPoDetails([[$v|@json_encode]])'>
				          <span class="glyphicon glyphicon-edit"></span>
				        </a>
				        <br/>
				        <br/>
				        <a href="#" onclick='deletePoDetails([[$v|@json_encode]])'>
				          <span class="glyphicon glyphicon-trash"></span>
				        </a>
		         	</td>
        		</tr>
        	</table>
        </tr>
        [[/foreach]]
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
        [[assign var=GrandTotal1 value= 0]]
        [[assign var=totalPriceValue1 value= 0]]
        [[assign var=CGSTTotalValue value=0]]
        [[assign var=IGSTTotalValue value=0]]
        [[assign var=SGSTTotalValue value=0]]
        [[if $otherAdditionalCharges|@count neq 0]]
        
        [[foreach from=$otherAdditionalCharges key=k item=v]]
        <tr>
        	<table class="own-table">
        		<tr>
        			<td align="center" width="5%"  class="own-td-2"></td>
		         	<td align="center" width="20%" class="own-td-2">[[$v.name]]</td>
		         	<td align="center" width="10%" class="own-td-2">[[$v.hsn_code]]</td>
		         	<td align="center" width="5%"  class="own-td-2"></td>
		         	<td align="center" width="7%"  class="own-td-2"></td>
		         	[[if $v.AMOUNT_type eq 'AMOUNT']]
		         		[[assign var=other_total_AMOUNT value=[[$v.amount]]]]
		         	[[else]]
		         		[[assign var=other_total_AMOUNT value=[[(($v.amount/100) * $GrandTotal )]]]]
		         	[[/if]]
		         	<td align="center" width="8%" class="own-td-2">
		         		[[if $v.AMOUNT_type neq 'AMOUNT']] [[$v.amount]] % <br/>[[/if]]
		         		[[$other_total_AMOUNT|number_format:2]]
		         	</td>
		         	<td align="center" width="10%"  class="own-td-2"></td>

		         	[[assign var=totalPriceValue1 value=[[$SGSTTotalValue + $CGSTTotalValue + $other_total_AMOUNT + $IGSTTotalValue]]]]
					[[$GrandTotal1 = $GrandTotal1 + $totalPriceValue1]]

		         	<td align="center" width="10%" class="own-td-2">[[$totalPriceValue1|number_format:2]]</td>
		         	<td align="center" width="10%" class="own-td-2">
				        <a href="#" onclick='deletePoOtherAdditionalCharges([[$v|@json_encode]])' style="margin-left: 10px;">
				          <span class="glyphicon glyphicon-trash"></span>
				        </a>
		         	</td>
        		</tr>
        	</table>
        </tr>
        [[/foreach]]
        [[/if]]

        [[assign var=ODiscountValue value=0]]
        [[if $overAllDiscountDetails|@count neq 0]]
        [[foreach from=$overAllDiscountDetails key=k item=v]]
        <tr>
        	<table class="own-table">
        		<tr>
        			[[if $v.discount_type eq 'AMOUNT']]
		         		[[assign var=ODiscountValue value=[[$v.discount]]]]
		         	[[else]]
		         		[[assign var=ODiscountValue value=(($v.discount/100) * ($GrandTotal + $GrandTotal1))]]
		         	[[/if]]

        			<td align="center" width="65%"  class="own-td-2">DISCOUNT</td>
        			<td align="center" width="10%"  class="own-td-2"><b>[[$ODiscountValue|number_format:2]]</b></td>
		         	<td align="center" width="10%" class="own-td-2">
				        <a href="#" onclick='deleteOverAllDiscountDetails([[$v|@json_encode]])' style="margin-left: 10px;">
				          <span class="glyphicon glyphicon-trash"></span>
				        </a>
		         	</td>
        		</tr>
        	</table>
        </tr>
        [[/foreach]]
        [[/if]]
        <tr>
        	<table class="own-table">
        		<tr>
        			<!-- <td align="center" width="5%"  class="own-td-2"></td> -->
		         	<td align="center" width="60%" class="own-td-2" id="numberToWord"></td>
		         	<td align="center" width="27%" class="own-td-2"><b>TOTAL AMOUNT INR</b></td>
		         	<td align="center" width="18%" class="own-td-2"><b>[[(($GrandTotal + $GrandTotal1) - $ODiscountValue)|number_format:2]]</b></td>
		         	<td id="GrandTotal" style="display: none;">[[($GrandTotal + $GrandTotal1) - $ODiscountValue]]</td>
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
        						[[$importAdditionalCharges[0].delivery_date]]</b>
        						<a href="" style="float: right;margin-left:20px;text-decoration: underline;" onclick='editImportOtherDetails([[$importAdditionalCharges|@json_encode]])'> 
        							<span class="glyphicon glyphicon-edit"></span>
        						</a>
        					</h5>
        					<h5><b>Incoterms            :    [[$importAdditionalCharges[0].incoterms]]</b></h5>
        					<h5><b>Payment Terms        :    [[$importAdditionalCharges[0].payment_terms]]</b></h5>
        					<h5><b>Shipment             :    [[$importAdditionalCharges[0].Shipment]]</b></h5>
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
