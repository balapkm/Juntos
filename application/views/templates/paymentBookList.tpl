[[foreach from=$result key=k1 item=v1]]
	<div style="overflow-x:auto;margin-top: 50px;">
		[[if $k1 neq '0000-00-00']]
		<h5>
			<b>Payable Date : [[$k1|date_format:"%d-%m-%Y"]]
			<a style="margin-left: 20px;cursor: pointer;" onClick='editChequeNumberDetails({"payable_month":"[[$k1]]","supplier_id":"[[$supplier_id]]"})'>Edit</a>
			</b>
		</h5>
		[[else]]
		<h5>
			<b>Payable Date : [[$lastDateOfMonth|date_format:"%d-%m-%Y"]]
			<a style="margin-left: 20px;cursor: pointer;" onClick='editChequeNumberDetails({"payable_month":"[[$lastDateOfMonth]]","supplier_id":"[[$supplier_id]]"})'>Edit</a>
			</b>
		</h5>
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
				          <th>QTY</th>
				          <th>UOM</th>
				          <th>MATERIAL NAME</th>
				          <th>RATE</th>
				          <th>PO NUMBER</th>
				          <th>DC Number</th>
				          <th>AVG. COST</th>
				          <th>QUERY</th>
				          <th>BILL NUMBER</th>
				          <th>BILL DATE</th>
				          <th style="background-color: yellow;">PAYABLE MONTH</th>
				          <th>Bill Amount</th>
				          <th>DEDC.</th>
				          <th>CHEQUE NUMBER</th>
				          <th>CHEQUE DATE</th>
				          <th>CHEQUE AMOUNT</th>
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
									</td>
						          	<td rowspan="[[$v3|@count]]">[[$v4.s_no]]</td>
					          	  [[/if]]
						          <td>[[$v4.material_hsn_code]]</td>
						          <td>[[$v4.CGST]]</td>
						          <td>[[$v4.SGST]]</td>
						          <td>[[$v4.qty]]</td>
						          <td>[[$v4.material_name]]</td>
						          <td>[[$v4.material_uom]]</td>
						          <td>[[$v4.price]]</td>
						          <td>[[$v4.po_number]]</td>
						          <td>[[$v4.dc_number]]</td>
						          <td>AVG. COST</td>
						          [[if $k4 eq 0]]
						          	  <td rowspan="[[$v3|@count]]">[[$v4.query]]</td>
							          <td rowspan="[[$v3|@count]]">[[$v4.bill_number]]</td>
							          <td rowspan="[[$v3|@count]]" class="datetd">[[$v4.bill_date|date_format:"%d-%m-%Y"]]</td>
							          [[if $v4.payable_month neq '0000-00-00']]
							          <td rowspan="[[$v3|@count]]" class="datetd" style="background-color: yellow;">[[$v4.payable_month|date_format:"%d-%m-%Y"]]</td>
							          [[else]]
							          <td rowspan="[[$v3|@count]]" class="datetd" style="background-color: yellow;">[[$lastDateOfMonth|date_format:"%d-%m-%Y"]]</td>
							          [[/if]]
							          <td rowspan="[[$v3|@count]]">[[$v4.bill_amount]]</td>
							          <td rowspan="[[$v3|@count]]">[[$v4.deduction]]</td>
							          <td rowspan="[[$v3|@count]]">[[$v4.cheque_no]]</td>
							          <td rowspan="[[$v3|@count]]" class="datetd">[[$v4.cheque_date|date_format:"%d-%m-%Y"]]</td>
							          <td rowspan="[[$v3|@count]]">[[$v4.cheque_amount]]</td>
							          <td rowspan="[[$v3|@count]]"></td>
							      [[/if]]
						        </tr>
					        [[/foreach]]
				        [[/foreach]]
				        <tr>
				        	<td colspan="15"></td>
				        	<td><b>Total</b></td>
				        	<td><b>[[$totalAmount]]</b></td>
				        	<td></td>
				        	<td></td>
				        	<td></td>
				        	<td></td>
				        	<td></td>
				        </tr>
				    </tbody>
				    [[/if]]
				    [[if $k2 eq 'debitNoteList']]
				    <thead>
		                <tr>
		                  <th>Delete</th>
		                  <th>S.No</th>
		                  <th colspan="3" style="text-align: center;">TYPE</th>
		                  <th>DEBIT NOTE NO.</th>
		                  <th>DATE</th>
		                  <th>SUPPLIER CREDIT NOTE</th>
		                  <th>DATE</th>
		                  <th colspan="6" style="text-align: center;">QUERY</th>
		                  <th style="background-color: yellow;">PAYABLE MONTH</th>
		                  <th>AMOUNT</th>
		                  <th></th>
		                  <th></th>
		                  <th></th>
		                  <th></th>
		                  <th></th>
		            </thead>
		            <tbody>
		            	[[foreach from=$v2 key=k3 item=v3]]
		                <tr>
		                      <td style="text-align: center;">
		                      	<a href="#" onclick='deleteDepositDetails([[$v3|@json_encode]])''>
						          <span class="glyphicon glyphicon-trash"></span>
						        </a>
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
		                      <td colspan="6">[[$v3.query]]</td>
		                      <td class="datetd" style="background-color: yellow;">[[$v3.payable_month|date_format:"%d-%m-%Y"]]</td>
		                      <td>[[$v3.amount]]</td>
		                      <td></td>
		                      <td></td>
		                      <td></td>
		                      <td></td>
		                      <td></td>
		                </tr>
		                [[/foreach]]
		            </tbody>
		            [[/if]]
		            [[if $k2 eq 'chequeNumberDetails']]
		            <tbody>
		            	[[foreach from=$v2 key=k3 item=v3]]
		                <tr style="font-weight: bold;">
				        	<td colspan="15"></td>
				        	<td><b>Total</b></td>
				        	<td><b>[[$totalAmount]]</b></td>
				        	<td>[[$v3.deduction]]</td>
				        	<td>[[$v3.cheque_no]]</td>
				        	<td class="datetd">[[$v3.cheque_date|date_format:"%d-%m-%Y"]]</td>
				        	<td>[[$v3.cheque_amount]]</td>
				        	<td>[[$totalAmount - $v3.cheque_amount]]</td>
				        </tr>
				        [[/foreach]]
		            </tbody>
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
    text-align: left;
    padding: 5px 40px 5px 10px;
    border: 1px solid #000;
    font-size: 14px;
}

.paymentBookListTable .datetd{
	padding: 0px;
	padding-left: 5px;
}
</style>