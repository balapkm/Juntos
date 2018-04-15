 <p style="margin-top: 50px;" align="center"> Payment Book Details</p>
[[if count($result['paymentBookList'])<=1 ]]
 <p style="margin-top: 50px;" align="center">No Data Found for this supplier!</p>
[[else]]
<div style="margin-top: 50px;">
	<table style="margin-bottom: 10px;font-size: 12px;">
	    <thead>
	        <tr>
	          <th>S.No</th>
	          <th>HS CODE</th>
	          <th>CGST</th>
	          <th>SGST</th>
	          <th>QTY</th>
	          <th>UOM</th>
	          <th>MATERAIL</th>
	          <th>RATE</th>
	          <th>AVG. COST</th>
	          <th>QUERY</th>
	          <th>PO NUMBER</th>
	          <th>DC Number</th>
	          <th>Bill Number</th>
	          <th>BILL DATE</th>
	          <th>Payable Month</th>
	          <th>Bill Amount</th>
	          <th>Dedc.</th>
	          <th>Cheque Number</th>
	          <th>Cheque Date</th>
	          <th>Cheque Amount</th>
	        </tr>
	    </thead>
	    <tbody>
	    	[[assign var=lastBillCnt  value=0]]
	    	[[foreach from=$result['paymentBookList'] key=k item=x]]
	        <tr>
	        	[[assign var=billNo  value= $x.bill_number]]
	        	[[if $lastBillCnt==0 ]]
	        	<td rowspan="[[$x.billCnt[$billNo] ]]">[[$x.s_no]]</td>
	        	[[/if]]
	        	<td>
	        		[[$x.material_hsn_code]]
	        	 </td>
	        	 [[if $x.state_code==33 ]]
	        	 <td> 9% </td>
	        	 <td> 9% </td>
	        	 [[else]]
	        	 <td> 18 % </td>
	        	 [[/if]]
	        	<td>[[$x.qty]]</td>
	        	<td>[[$x.material_uom]]</td>
	        	<td>[[$x.material_name]]</td>
	        	<td>[[$x.price]]</td>
	        	<td>[[$x.avg_cost]]</td>
	        	<td>[[$x.query]]</td>
	        	<td>[[$x.po_number]]</td>
	        	<td>[[$x.dc_number]]</td>
	        	[[if $lastBillCnt==0 ]]
	        	[[assign var=lastBillCnt value= $x.billCnt[$billNo] ]]
	        	<td rowspan="[[$x.billCnt[$billNo] ]]">[[$x.bill_number]] </td>
	        	<td rowspan="[[$x.billCnt[$billNo] ]]">[[$x.bill_date|date_format:"%d-%m-%Y"]]</td>
	        	<td rowspan="[[$x.billCnt[$billNo] ]]">[[$x.payable_month|date_format:"%d-%m-%Y"]]</td>
	        	<td rowspan="[[$x.billCnt[$billNo] ]]">[[$x.bill_amount]]</td>
	        	<td rowspan="[[$x.billCnt[$billNo] ]]">[[$x.deduction]]</td>
	        	<td rowspan="[[$x.billCnt[$billNo] ]]">[[$x.cheque_no]]</td>
	        	<td rowspan="[[$x.billCnt[$billNo] ]]">[[if $x.cheque_date!='0000-00-00' ]] [[$x.cheque_date|date_format:"%d-%m-%Y"]] [[/if]] </td>
	        	<td rowspan="[[$x.billCnt[$billNo] ]]">[[if $x.cheque_amount!=0 ]] [[$x.cheque_amount]] [[/if]] </td>
	        	[[/if]]
				[[assign var=lastBillCnt value=$lastBillCnt-1 ]]
	        </tr>
	        [[/foreach]]
	        <tr>
            	<td colspan="15"></td>
            	<td><b>Total :</b></td>	
            	<td><b> [[$result['paymentBookList'][0]['totalAmount'] ]] </b></td>
            	<td colspan="6"></td>
            </tr>
	    </tbody>
	</table>
</div>
[[/if]]

[[if count($result['debitNote'])<=1 ]]
 <p style="margin-top: 50px;" align="center">No Data Found in Debit/Credit Note!</p>
[[else]]
<div style="margin-top: 50px;">
        <table style="margin-bottom: 10px; width: 100%;font-size: 12px;" >
            <thead>
                <tr>
                  <th>S.No</th>
                  <th>TYPE</th>
                  <th>DEBIT NOTE NO.</th>
                  <th>DATE</th>
                  <th>SUPPLIER CREDIT NOTE</th>
                  <th>DATE</th>
                  <th colspan="6">QUERY</th>
                  <th>PAYABLE MONTH</th>
                  <th>AMOUNT</th>
                  <!-- <th>Dedc.</th>
		          <th>Cheque Number</th>
		          <th>Cheque Date</th>
		          <th>Cheque Amount</th> -->
                </tr>
            </thead>
            <tbody>
                [[foreach from=$result['debitNote'] key=k item=x]]
                <tr>
                        <td>[[$x.s_no]]</td>
                        <td>
                                [[if $x.type==='D' ]] Debit Note 
                                [[elseif $x.type==='C']] Credit Note
                                [[elseif $x.type==='B']] Balance Amount
                                [[elseif $x.type==='T']] TDS
                                [[/if]]
                         </td>
                        <td>[[$x.debit_note_no]]</td>
                        <td>[[$x.debit_note_date|date_format:"%d-%m-%Y"]]</td>
                        <td>[[$x.supplier_creditnote]]</td>
                        <td>[[$x.supplier_creditnote_date|date_format:"%d-%m-%Y"]]</td>
                        <td colspan="6">[[$x.query]]</td>
                        <td>[[$x.payable_month]]</td>
                        <td>[[$x.amount]]</td>
                        <!-- <td></td>
                        <td></td>
                        <td></td>
                        <td></td> -->
                </tr>
                [[/foreach]]
                <tr>
                	<td colspan="12"></td>
                	<td><b>Total :</b></td>	
                	<td><b> [[$result['debitNote'][0]['totalAmount'] ]] </b></td>
                	<!-- <td colspan="4"></td> -->
                </tr>                
            </tbody>
        </table>
</div>
[[/if]]
<style>
table {
    border-collapse: collapse;
    border-spacing: 0;
    width: 100%;
    border: 1px solid #000;
}

th, td {
    text-align: left;
    padding: 5px 30px 5px 10px;
    border: 1px solid #000;
}
</style>