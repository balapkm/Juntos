[[assign var=serialCount value= 0]]
[[foreach from=$result key=k1 item=v1]]
	[[assign var=serialCount value=($serialCount + 1)]]
	<div style="overflow-x:auto;margin-top: 50px;">
		[[if !empty($v1['paymentBookList']) || !empty($v1['debitNoteList'])]]
		[[if $k1 neq '0000-00-00']]
		<h5>
			[[assign var="dateValue" value="_"|explode:$k1]]
			[[assign var="PMDate" value=$dateValue[0] ]]
			<b><span class="badge">[[$serialCount]]</span> Payable Date : [[$dateValue[0]|date_format:"%d-%m-%Y"]] | Supplier Name : [[$result[$k1]["supplier_name"] ]] | Origin : [[$result[$k1]["origin"] ]]
			<a style="right: 25px;cursor: pointer;position: absolute;" onClick='editChequeNumberDetails({"payable_month":"[[$PMDate]]","supplier_id":"[[$result[$k1]["supplier_id"] ]]","totalAmount":"[[$result[$k1]["totalAmount"] ]]" })'>Edit</a>
			<a style="right: 60px;cursor: pointer;position: absolute;" onClick='downloadAsPdfCoverLetter({"payable_month":"[[$PMDate]]","supplier_id":"[[$result[$k1]["supplier_id"] ]]"})'>Covering Letter</a>
			</b>
		</h5>
		[[else]]
		<h5>
			<b><span class="badge">[[$serialCount]]</span> Payable Date : [[$lastDateOfMonth|date_format:"%d-%m-%Y"]] | Supplier Name : [[$result[$k1]["supplier_name"] ]] | Origin : [[$result[$k1]["origin"] ]]
			<a style="right: 25px;cursor: pointer;position: absolute;" onClick='editChequeNumberDetails({"payable_month":"[[$lastDateOfMonth]]","supplier_id":"[[$result[$k1]["supplier_id"] ]]","totalAmount":"[[$result[$k1]["totalAmount"] ]]"})'>Edit</a>
			</b>
			<a style="right: 60px;cursor: pointer;position: absolute;" onClick='downloadAsPdfCoverLetter({"payable_month":"[[$k1]]","supplier_id":"[[$result[$k1]["supplier_id"] ]]"})'>Covering Letter</a>
		</h5>
		[[/if]]
		[[/if]]
		<table style="margin-bottom: 10px;" class="paymentBookListTable">
			[[assign var=totalAmount value= 0]]
			[[foreach from=$v1 key=k2 item=v2]]
					[[if $k2 eq 'paymentBookList']]
				    <thead>
				        <tr>
				          <th>Edit</th>	
				          <th>S.No</th>
				          <th>HSN CODE</th>
				          <th>CGST</th>
				          <th>SGST</th>
				          <th>IGST</th>
				          <th>Received QTY</th>
				          <th>UOM</th>
				          <th style="padding-right: 150px;width: 20%">MATERIAL NAME</th>
				          <th>RATE</th>
				          <th>PO NUMBER</th>
				          <th>DC Number</th>
				          <th>AVG. COST</th>
				          <th>QUERY</th>
				          <th>BILL NUMBER</th>
				          <th>BILL DATE</th>
				          <th style="background-color: yellow;">PAYABLE MONTH</th>
				          <th>Bill Amount</th>
				          <!-- <th>DEDC.</th> -->
				          <th>CHEQUE NUMBER</th>
				          <th>CHEQUE DATE</th>
				          <th>CHEQUE AMOUNT</th>
				          <!-- th>DD Number</th>
				          <th>DD Date</th>
				          <th>DD Amount</th> -->
				          <th>BALANCE</th>
				        </tr>
				    </thead>
				    <tbody>
				    	[[foreach from=$v2 key=k3 item=v3]]
					    	[[foreach from=$v3 key=k4 item=v4]]
						    	<tr>
					    	  	  [[if $k4 eq 0]]
					    	  	  	[[assign var=totalAmount value=$totalAmount + $v4.bill_amount]]
						            <td rowspan="[[$v3|@count]]" style="text-align: center;">
					            		<a href="#" onclick='editPaymentList([[$v4|@json_encode]])'>
								          <span class="glyphicon glyphicon-edit"></span>
								        </a>
								        <a href="#" onclick='deletePaymentList([[$v4|@json_encode]])'>
								          <span class="glyphicon glyphicon-trash"></span>
								        </a>
									</td>
						          	<td rowspan="[[$v3|@count]]">[[$v4.s_no]]</td>
					          	  [[/if]]
						          <td style="text-align: center;">[[$v4.material_hsn_code]]</td>
						          <td style="text-align: center;">[[$v4.CGST|number_format:2]]</td>
						          <td style="text-align: center;">[[$v4.SGST|number_format:2]]</td>
						          <td style="text-align: center;">[[$v4.IGST|number_format:2]]</td>
						          <td style="text-align: center;">[[$v4.received|number_format:2]]</td>
						          <td style="text-align: center;">[[$v4.material_uom]]</td>
						          <td width="20%" style="text-align: left;">[[$v4.material_name]]</td>
						          <td style="text-align: right;">[[$v4.price|number_format:2]]</td>
						          <td style="text-align: center;">[[$v4.po_number]]</td>
						          <td style="text-align: center;">[[$v4.dc_number]]</td>
						          <td style="text-align: right;">[[$v4.avg_cost|number_format:2]]</td>
						          [[if $k4 eq 0]]
						          	  <td rowspan="[[$v3|@count]]" style="text-align: center;">[[$v4.query]]</td>
							          <td rowspan="[[$v3|@count]]" style="text-align: center;">[[$v4.bill_number]]</td>
							          <td rowspan="[[$v3|@count]]" class="datetd" style="text-align: center;">[[$v4.bill_date|date_format:"%d-%m-%Y"]]</td>
							          [[if $v4.payable_month neq '0000-00-00']]
							          <td rowspan="[[$v3|@count]]" class="datetd" style="background-color: yellow;text-align: center;">[[$v4.payable_month|date_format:"%d-%m-%Y"]]</td>
							          [[else]]
							          <td rowspan="[[$v3|@count]]" class="datetd" style="background-color: yellow;text-align: center;">[[$lastDateOfMonth|date_format:"%d-%m-%Y"]]</td>
							          [[/if]]
							          <td rowspan="[[$v3|@count]]" style="text-align: right;">[[$v4.bill_amount|number_format:2]]</td>
							          <!-- <td rowspan="[[$v3|@count]]" >[[$v4.deduction]]</td> -->
							          <td rowspan="[[$v3|@count]]" style="text-align: center;">[[$v4.cheque_no]]</td>
							          <td rowspan="[[$v3|@count]]" class="datetd" style="text-align: center;">[[$v4.cheque_date|date_format:"%d-%m-%Y"]]</td>
							          <td rowspan="[[$v3|@count]]" style="text-align: right;"></td>
							          <!-- <td rowspan="[[$v3|@count]]"></td>
							          <td rowspan="[[$v3|@count]]"></td>
							          <td rowspan="[[$v3|@count]]"></td> -->
							          <td rowspan="[[$v3|@count]]"></td>
							      [[/if]]
						        </tr>
					        [[/foreach]]
				        [[/foreach]]
				        <tr>
				        	<td colspan="16"></td>
				        	<td style="text-align: center;"><b>Total</b></td>
				        	<td style="text-align: right;"><b>[[$totalAmount|number_format:2]]</b></td>
				        	<td></td>
				        	<td></td>
				        	<td></td>
				        	<!-- <td></td> -->
				        	<!-- <td></td>
				        	<td></td>
				        	<td></td> -->
				        	<td></td>
				        </tr>
				    </tbody>
				    [[/if]]
				    [[if $k2 eq 'debitNoteList']]
				    <thead>
		                <tr>
		                  <th></th>
		                  <th>S.No</th>
		                  <th colspan="3" style="text-align: center;">TYPE</th>
		                  <th>DEBIT NOTE NO.</th>
		                  <th>DATE</th>
		                  <th>SUPPLIER CREDIT NOTE</th>
		                  <th>DATE</th>
		                  <th colspan="7" style="text-align: center;">QUERY</th>
		                  <th style="background-color: yellow;">PAYABLE MONTH</th>
		                  <th>AMOUNT</th>
		                  [[if !empty($v1['paymentBookList'])]]
		                  <th></th>
		                  <th></th>
		                  <th></th>
		                  <!-- <th></th> -->
		                  <!-- <th></th>
		                  <th></th>
		                  <th></th> -->
		                  <th></th>
		                  [[/if]]
		                  [[if empty($v1['paymentBookList'])]]
			            	<th>CHEQUE NUMBER</th>
				          	<th>CHEQUE DATE</th>
				          	<th>CHEQUE AMOUNT</th>
					        <th>BALANCE</th>
			              [[/if]]
		            </thead>
		            <tbody>
		            	[[foreach from=$v2 key=k3 item=v3]]
		                <tr>
		                      <td style="text-align: center;">
		                      	<!-- <a href="#" onclick='deleteDepositDetails([[$v3|@json_encode]])''>
						          <span class="glyphicon glyphicon-trash"></span>
						        </a> -->
		                      </td>

		                      [[if $v3.type==='D']]
		                      [[assign var=totalAmount value=$totalAmount - $v3.amount]]
		                      [[elseif $v3.type==='C']] 
		                      [[assign var=totalAmount value=$totalAmount + $v3.amount]]
                              [[elseif $v3.type==='B']]
                              [[assign var=totalAmount value=$totalAmount + $v3.amount]]
                              [[elseif $v3.type==='T']]
                              [[assign var=totalAmount value=$totalAmount - $v3.amount]]
                              [[/if]]

		                      <td>[[$k3+1]]</td>
		                      <td colspan="3" style="text-align: center;">
		                      		[[if $v3.type==='D' ]] DEBIT NOTE 
	                                [[elseif $v3.type==='C']] CREDIT NOTE
	                                [[elseif $v3.type==='B']] BALANCE AMOUNT
	                                [[elseif $v3.type==='T']] TDS
	                                [[/if]]</td>
		                      <td>[[$v3.debit_note_no]]</td>
		                      <td class="datetd">[[$v3.debit_note_date|date_format:"%d-%m-%Y"]]</td>
		                      <td>[[$v3.supplier_creditnote]]</td>
		                      <td class="datetd">[[$v3.supplier_creditnote_date|date_format:"%d-%m-%Y"]]</td>
		                      <td colspan="7">[[$v3.query]]</td>
		                      <td class="datetd" style="background-color: yellow;">[[$v3.payable_month|date_format:"%d-%m-%Y"]]</td>
		                      <td>[[$v3.amount|number_format:2]]</td>
		                      <td></td>
		                      <td></td>
		                      <td></td>
		                      <!-- <td></td> -->
		                      <!-- <td></td>
		                      <td></td>
		                      <td></td> -->
		                      <td></td>
		                </tr>
		                [[/foreach]]
		            </tbody>
		            [[/if]]


		            [[if $k2 eq 'advancePaymentDetails' AND $v2|@count neq 0]]
		            <thead >
		            	<tr>
		            	<th colspan="25" style="text-align: center;">ADVANCE PAYMENT</th>
		            	</tr>
		            </thead>
		            <thead>
		            <tr>
		            	<th>Action</th>
		            	<th>S.NO</th>
		            	<th colspan="3" style="text-align: center;">TYPE</th>
		            	<th>PO NUMBER</th>
		            	<th>DATE</th>
		            	<th>SUPPLIER PI NUMBER</th>
		            	<th>DATE</th>
		            	<th colspan="6" style="text-align: center;">QUERY</th>
		            	<th style="background-color: yellow;">PAYABLE MONTH</th>
		            	<th>AMOUNT</th>
		            	<th></th>
		            	<th></th>
		            	<th></th>
		            	<th></th>
		            	<!-- <th></th>
		            	<th></th>
		            	<th></th> -->
		            	<th></th>
		            </tr>
		            </thead>
		            <tbody>
		            	[[foreach from=$v2 key=k3 item=v3]]
		            	<tr>
		            	<td style="text-align: center;">
		            		<a href="#" onclick='editAdvancePaymentDetails([[$v3|@json_encode]])''>
					          <span class="glyphicon glyphicon-edit"></span>
					        </a>
	                      	<a href="#" onclick='deleteAdvancePaymentDetails([[$v3|@json_encode]])''>
					          <span class="glyphicon glyphicon-trash"></span>
					        </a>
                      	</td>

                      	[[assign var=totalAmount value=$totalAmount - $v3.amount]]

		            	<td>[[$k3+1]]</td>
		            	<td colspan="3" style="text-align: center;">Advance Payment</td>
		            	<td>[[$v3.full_po_number]]</td>
		            	<td class="datetd">[[$v3.supplier_date|date_format:"%d-%m-%Y"]]</td>
		            	<td>[[$v3.supplier_pi_number]]</td>
		            	<td class="datetd">[[$v3.date|date_format:"%d-%m-%Y"]]</td>
		            	<td colspan="6" style="text-align: center;">[[$v3.query]]</td>
		            	<td class="datetd" style="background-color: yellow;">[[$k1|date_format:"%d-%m-%Y"]]</td>
		            	<td>[[$v3.amount|number_format:2]]</td>
		            	<td></td>
		            	<td></td>
		            	<td></td>
		            	<!-- <td></td> -->
		            	<!-- <td></td>
		            	<td></td>
		            	<td></td> -->
		            	<td></td>
		            	
		            	</tr>
		            	[[/foreach]]
		            </tbody>
		            [[/if]]

		            [[if !empty($v1['balanceAmount'])]]
		            [[if $k2 eq 'balanceAmount']]
		            [[assign var=totalAmount value=($totalAmount + $v1['balanceAmount']) ]]
		    		<tbody>
		                <tr style="font-weight: bold;">
				        	<td colspan="16"><b>Balance Amount</b></td>
				        	<td style="text-align: center;"><b>Total</b></td>
				        	<td style="text-align: right;"><b>[[$v1['balanceAmount']|number_format:2]]</b></td>
				        	<!-- <td>[[$v2[0].deduction]]</td> -->
				        	<td style="text-align: center;"></td>
				        	<td class="datetd" style="text-align: center;"></td>
				        	<td style="text-align: right;"></td>
				        	<!-- <td>[[$v2[0].dd_number]]</td>
				        	<td class="datetd">[[$v2[0].dd_date]]</td>
				        	<td>[[$v2[0].dd_amount|number_format:2]]</td> -->
				        	<td style="text-align: right;"></td>
				        </tr>
		            </tbody>
		            [[/if]]
		            [[/if]]

		            [[if !empty($v1['paymentBookList']) || !empty($v1['debitNoteList'])]]
	        		[[if $k2 eq 'chequeNumberDetails']]
		    		<tbody>
		                <tr style="font-weight: bold;">
				        	<td colspan="16"></td>
				        	<td style="text-align: center;"><b>Total</b></td>
				        	<td style="text-align: right;"><b>[[$totalAmount|number_format:2]]</b></td>
				        	<!-- <td>[[$v2[0].deduction]]</td> -->
				        	<td style="text-align: center;">[[$v2[0].cheque_no]]</td>
				        	<td class="datetd" style="text-align: center;">[[$v2[0].cheque_date|date_format:"%d-%m-%Y"]]</td>
				        	<td style="text-align: right;">[[$v2[0].cheque_amount|number_format:2]]</td>
				        	<!-- <td>[[$v2[0].dd_number]]</td>
				        	<td class="datetd">[[$v2[0].dd_date]]</td>
				        	<td>[[$v2[0].dd_amount|number_format:2]]</td> -->
				        	<td style="text-align: right;">[[($totalAmount - $v2[0].cheque_amount)|number_format:2]]</td>
				        </tr>
		            </tbody>
		            [[/if]]
		            [[/if]]

            [[/foreach]]
		</table>
	</div>
[[/foreach]]

<style>
.paymentBookListTable {
    border-collapse: collapse;
    border-spacing: 0;
    width: 100%;
    border: 1px solid #000;
}

.paymentBookListTable th,.paymentBookListTable td{
    text-align: center;
    padding: 5px 15px 5px 15px;
    border: 1px solid #000;
    font-size: 14px;
}

.paymentBookListTable .datetd{
	padding: 0px;
	padding-left: 5px;
}
</style>