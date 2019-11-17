<hr/>
<div class="col-lg-12" style="margin-top: 50px;">
	<button class="btn btn-primary" style="float: right;margin-bottom: 10px;" onclick="downloadAsPdfPODetails()">Download as PDF</button>
	<button class="btn btn-primary" style="float: right;margin-bottom: 10px;margin-right: 10px;" onclick="downloadAsHtmlPdfPODetailsAction()">Download as HTML PDF</button>
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
		         		<h3><b>T.M.ABDUL RAHMAN & SONS</b></h3>
						<h5 style="font-weight: normal;">FINISHED LEATHER & SHOES</h5>
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
        			<td align="center" class="own-td-1" width="100%">PURCHASE ORDER
        				<a href="" onclick='editOtherDetails([[$searchPoData|@json_encode]])'>Edit</a>
        			</td>
        		</tr>
        	</table>
        </tr>
        <tr>
        	<table class="own-table">
        		<tr>
        			<td class="own-td-1" width="40%">TO</td>
		         	<td class="own-td-1" width="30%">PO.NO</td>
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
        <tr>
        	<table class="own-table">
        		<tr style="font-weight: bold;">
        			<td align="center" width="5%">S.NO</td>
		         	<td align="center" width="20%">DESCRIPTION</td>
		         	[[if $searchPoData[0]['supplier_status'] neq 'UNREGISTERED']]
		         	<td align="center" width="10%">HSN/SAC CODE</td>
		         	[[/if]]
		         	<td align="center" width="5%">QTY</td>
		         	<td align="center" width="7%">UOM</td>
		         	<td align="center" width="8%">PRICE</td>
		         	<td align="center" width="10%">DISCOUNT</td>
		         	[[if $searchPoData[0]['supplier_status'] neq 'UNREGISTERED']]
			         	[[if $searchPoData[0]['state_code'] eq 33]]
				         	<td align="center" width="10%">CGST</td>
				         	<td align="center" width="10%">SGST</td>
			         	[[/if]]
			         	[[if $searchPoData[0]['state_code'] neq 33]]
			         		<td align="center" width="10%" >IGST</td>
			         	[[/if]]
		         	[[/if]]
		         	<td align="center" width="10%">TOTAL <br/>AMOUNT</td>
		         	<td align="center" width="10%">Action</td>
        		</tr>
        	</table>
        </tr>
        [[assign var=GrandTotal value= 0]]
        [[assign var=OTHERPercGrandTotal value= 0]]
        [[assign var=CGSTTotalValue value=0]]
        [[assign var=IGSTTotalValue value=0]]
        [[assign var=SGSTTotalValue value=0]]
        [[foreach from=$searchPoData key=k item=v]]
        <tr>
        	<table class="own-table">
        		<tr>
        			<td align="center" width="5%"  class="own-td-2">[[$k+1]]</td>
		         	<td width="20%" class="own-td-2">
		         		<div class="top_row">
			                [[$v.material_master_name]]
			            </div>
			            <div class="top_row" style="margin-top: 5px;text-align:left;word-wrap: break-word;white-space: pre;">[[$v.po_description]]</div>
		         	</td>
		         	<!-- <td align="center" width="20%" class="own-td-2" style="text-align:left;word-wrap: break-word;white-space: pre;">[[$v.material_name]]</td> -->
		         	[[if $searchPoData[0]['supplier_status'] neq 'UNREGISTERED']]
		         	<td align="center" width="10%" class="own-td-2">[[$v.material_hsn_code]]</td>
		         	[[/if]]
		         	<td align="center" width="5%"  class="own-td-2">[[$v.qty]]</td>
		         	<td align="center" width="7%" class="own-td-2">[[$v.material_uom]]</td>
		         	<td align="center" width="8%" class="own-td-2">
		         			[[$v.price|number_format:2]]<br/>
		         			[[if $v.price_status neq 'FINAL']]
		         			<span style="font-size: 10px">[ [[$v.price_status]] ]</span>
                            [[/if]]
		         	</td>


		         	[[if $v.discount_price_status eq 'AMOUNT']]
		         		[[assign var=DISCOUNTTotalValue value=[[$v.discount]]]]
		         	[[else]]
		         		[[assign var=DISCOUNTTotalValue value=(($v.discount/100) * $v.price ) * $v.qty]]
		         	[[/if]]

		         	[[assign var=OTHERPercGrandTotal value=($OTHERPercGrandTotal + (($v.price* $v.qty) - $DISCOUNTTotalValue))]]

		         	<td align="center" width="10%" class="own-td-2">
		         		[[$v.discount|number_format:2]][[if $v.discount_price_status neq 'AMOUNT']] % [[/if]]
		         		[[if $v.discount_price_status neq 'AMOUNT']]
		         		</br>
		         		[ [[$DISCOUNTTotalValue|number_format:2]] ]
		         		[[/if]]
		         	</td>
		         	[[if $searchPoData[0]['supplier_status'] neq 'UNREGISTERED']]
			         	[[if $searchPoData[0]['state_code'] eq 33]]
				         	[[assign var=CGSTTotalValue value=(($v.CGST/100) * ($v.price*$v.qty))]]
				         	<td align="center" width="10%" class="own-td-2">
				         		[[$v.CGST]]%
				         		</br>[ [[$CGSTTotalValue|number_format:2]] ]
				         	</td>

				         	[[assign var=SGSTTotalValue value=(($v.SGST/100) * ($v.price*$v.qty))]]
				         	<td align="center" width="10%" class="own-td-2">
				         		[[$v.SGST]]% 
				         		</br>[ [[$SGSTTotalValue|number_format:2]] ]
				         	</td>
			         	[[/if]]


			         	[[if $searchPoData[0]['state_code'] neq 33]]
				         	[[assign var=IGSTTotalValue value=[[(($v.IGST/100) * $v.price ) * $v.qty]]]]
				         	<td align="center" width="10%" class="own-td-2">
				         		[[$v.IGST]]% 
				         		</br>[ [[$IGSTTotalValue|number_format:2]] ]
				         	</td>
			         	[[/if]]

		         	[[/if]]

		         	[[assign var=totalPriceValue value=[[($v.qty*$v.price) + $IGSTTotalValue + $SGSTTotalValue + $CGSTTotalValue - $DISCOUNTTotalValue]]]]

		         	<td align="center" width="10%" class="own-td-2"><b>[[$totalPriceValue|number_format:2]]</b></td>

		         	
		         	[[$GrandTotal = $GrandTotal + $totalPriceValue]]
		         	<td align="center" width="10%" class="own-td-2">
		         		<a href="#" onclick='editPoDetails([[$v|@json_encode]])'>
				          <span class="glyphicon glyphicon-edit"></span>
				        </a>
				        [[if $searchPoData|@count neq 1]]
				        <br/>
				        <br/>
				        <a href="#" onclick='deletePoDetails([[$v|@json_encode]])'>
				          <span class="glyphicon glyphicon-trash"></span>
				        </a>
				        [[/if]]
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
		         	[[if $searchPoData[0]['supplier_status'] neq 'UNREGISTERED']]
		         	<td align="center" width="10%" class="own-td-3"></td>
		         	[[/if]]
		         	<td align="center" width="5%"  class="own-td-3"></td>
		         	<td align="center" width="7%" class="own-td-3"></td>
		         	<td align="center" width="8%" class="own-td-3"></td>
		         	[[if $searchPoData[0]['supplier_status'] neq 'UNREGISTERED']]
		         	[[if $searchPoData[0]['state_code'] eq 33]]
		         	<td align="center" width="10%" class="own-td-3"></td>
		         	<td align="center" width="10%" class="own-td-3"></td>
		         	[[/if]]
		         	[[if $searchPoData[0]['state_code'] neq 33]]
		         	<td align="center" width="10%" class="own-td-3"></td>
		         	[[/if]]
		         	[[/if]]
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
		         	[[if $searchPoData[0]['supplier_status'] neq 'UNREGISTERED']]
		         	<td align="center" width="10%" class="own-td-2">[[$v.hsn_code]]</td>
		         	[[/if]]
		         	<td align="center" width="5%"  class="own-td-2"></td>
		         	<td align="center" width="7%"  class="own-td-2"></td>
		         	[[if $v.amount_type eq 'AMOUNT']]
		         		[[assign var=other_total_AMOUNT value=[[$v.amount]]]]
		         	[[else]]
		         		[[assign var=other_total_AMOUNT value=[[(($v.amount/100) * $OTHERPercGrandTotal )]]]]
		         	[[/if]]
		         	<td align="center" width="8%" class="own-td-2">
		         		[[if $v.amount_type neq 'AMOUNT']] [[$v.amount]] % <br/>[[/if]]
		         		[[$other_total_AMOUNT|number_format:2]]
		         	</td>
		         	<td align="center" width="10%"  class="own-td-2"></td>

		         	[[if $searchPoData[0]['supplier_status'] neq 'UNREGISTERED']]
		         		[[if $searchPoData[0]['state_code'] eq 33]]
				         	[[assign var=CGSTTotalValue value=[[(($v.CGST/100) * $other_total_AMOUNT )]]]]
				         	[[assign var=SGSTTotalValue value=[[(($v.SGST/100) * $other_total_AMOUNT )]]]]

				         	<td align="center" width="10%" class="own-td-2">[[$v.CGST]]%<br/>[ [[$CGSTTotalValue|number_format:2]] ]</td>
				         	<td align="center" width="10%" class="own-td-2">[[$v.CGST]]%<br/>[ [[$SGSTTotalValue|number_format:2]] ]</td>
			         	[[else]]
				         	[[assign var=IGSTTotalValue value=[[(($v.IGST/100) * $other_total_AMOUNT )]]]]
				         	<td align="center" width="10%" class="own-td-2">[[$v.IGST]]%<br/>[[$IGSTTotalValue|number_format:2]]</td>
			         	[[/if]]
			        [[/if]]

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

        			<td align="center" width="85%"  class="own-td-2">DISCOUNT</td>
        			<td align="center" width="10%"  class="own-td-2">
        				<b>[[$ODiscountValue|number_format:2]]</b>
        			</td>
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
		         	<td align="center" width="60%" class="own-td-2" style="display: none;" id="currencyCode">[[$searchPoData[0].currency]]</td>
		         	<td align="center" width="27%" class="own-td-2"><b>TOTAL AMOUNT [[$searchPoData[0].currency]]</b></td>
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
        					<h5 style="margin-top: 5px;"><b>Terms & Condition :</b></h5>
        				</div>
	        				<ul style="float: left;margin:2px; text-align: justify;font-size: 14px;">
	        					<li style="font-weight: bold;">Original invoice with 2 duplicate copies should be submitted at the time of delivering the goods.Products HSN code should be mentioned on the invoice.</li>
	        					<li style="margin-top: 3px;font-weight: bold;">Please quote our purchase order number on the invoice.</li>
	        					<li style="margin-top: 3px;font-weight: bold;">The material will not be allowed inside our premises on non-working hours and holidays.</li>
	        					<li style="margin-top: 3px;font-weight: bold;">Replacement for damages and defects required.We reserved the right to cancel the orders which are delayed / defective.Any further claims from our buyer in respect to quality of the materials supplied by you and incidental expenses therefore will be entirely at your cost.</li>
	        					<li style="margin-top: 3px;font-weight: bold;">Freight to be paid as agreed between the parties.</li>
	        					<li style="margin-top: 3px;font-weight: bold;">Failing to file a tax return on time.We reserved the right to deduct the tax AMOUNT from your payment.</li>
	        					<li style="margin-top: 3px;font-weight: bold;">The product supplied should meet reach (European) Standards.Non-compliance will result in penalties.</li>
	        					<li style="margin-top: 3px;font-weight: bold;">SUPPLY OF MATERIAL SHOULD PASS ALL TEST AS PER REACH/RCS/RSC/GB PHTHALATES STANDARD.</li>
	        				</ul>
        			</td>
        			
		         	<td align="center" width="50%"  class="own-td-4">
		         		<h5 style="float: left;margin:80px 0px 0px 20px;"><b>Incharge</b></h5>
		         		<h5 style="float: right;margin:80px 20px 0px 20px;"><b>For T.M.Abdul Rahman & Sons</b></h5>
		         		</br>
		         		</br>
		         		<h5 style="float: left;margin:100px 0px 0px 20px;"><b>Signature</b></h5>
		         		<h5 style="float: right;margin:100px 20px 0px 20px;"><b>Authorised Signature</b></h5>
		         	</td>
        		</tr>
        	</table>
        </tr>
	</table>
</div>
