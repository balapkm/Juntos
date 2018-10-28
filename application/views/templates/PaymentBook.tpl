<section class="content-header">
  <h4>
  	Payment Book
   </h4>
</section>
<!-- Main content -->
<section class="content">
	<div class="row">
        <div class="col-md-12">
          <!-- Custom Tabs -->
          	<div class="nav-tabs-custom">
	            <ul class="nav nav-tabs">
	              <li class="active"><a href="#tab_1" data-toggle="tab">Report</a></li>
	              <li><a href="#tab_2" data-toggle="tab">Advance payment</a></li>
	              <li><a href="#tab_3" data-toggle="tab">Credit Note / Debit Note</a></li>
	            </ul>
	            <div class="tab-content">
	              	<div class="tab-pane active" id="tab_1">
	              		<div class="row">
	              			<div class="col-lg-12" style="margin-top: 10px;">
				                <div class="col-lg-4" ng-init="generatePoData.division = 'UPPER'">
				                	<div class="form-group">
					                  <label for="exampleInputEmail1">Division</label>
					                  <select class="form-control" id="division" ng-model="generatePoData.division">
					                  	  <option value="">Choose Division</option>
					                  	  <option value="UPPER">UPPER</option>
					                  	  <option value="FULL SHOE">FULL SHOE</option>
					                  	  <option value="SOLE">SOLE</option>
					                  </select>
					                </div>
				                </div>
				                <div class="col-lg-4">
					                <div class="form-group">
					                  <label for="exampleInputEmail1">Supplier Name</label>
					                  <select class="form-control select2" style="width: 100%;" id="supplier_name" ng-model="generatePoData.supplier_name" ng-change="clearRedMark('supplier_name')">
					                  	  <option value="">Choose Supplier Name</option>
					                  	  [[foreach from=$supplier_name_details key=k item=v]]
					                  		<option value="[[$v.supplier_id]]">[[$v.supplier_name]]</option>
					                  	  [[/foreach]]
					                  </select>
					                </div>
					            </div>
					            <div class="col-lg-4">
					                <div class="form-group">
					                  <label for="exampleInputEmail1">Date Range</label>
					                  <input type="text" id="dateRangePicker" class="form-control">
					                </div>
					            </div>
				            </div>
				            
				            <!-- Supplier Wise -->
				            <div class="col-lg-12 text-center">
				            	<button type="submit" class="btn btn-primary" ng-click="searchAction()">Search</button>
				            </div>
				        </div>
			           	<div id="showAddNoteSearch" style="display: none;margin-top:20px;">
			        		<p align="right">
				        		<button class="btn btn-primary" type="button" onClick="downloadAsPdfPaymentBookDetails()">Download as PDF</button> 
			        		</p>
			       		</div>
				        <div class="row" id="showPaymentBookSearch">	
				        </div>
				        <div>
				        </div>
				    </div>
				    <div class="tab-pane" id="tab_2">
				    	<p align="right">
			        		<button type="button" class="btn btn-primary" ng-click="add_advance_payment()">Add Advanced Payment</button>
		        		</p>
	              		<table id="paymentBookExample" class="table table-bordered table-striped" style="margin-top: 10px;">
		                    <thead>
		                        <tr>
		                          <th>Supplier Name</th>
		                          <th>PO Number</th>
		                          <th>Supplier Date</th>
		                          <th>Supplier PI Number</th>
		                          <th>Date</th>
		                          <th>Query</th>
		                          <th>Payable Month</th>
		                          <th>Amount</th>
		                        </tr>
		                    </thead>
		                    <tbody>
		                    	[[foreach from=$advancePaymentDetails key=k item=v]]
		                        <tr>
		                          <td>[[$v.supplier_name]]</td>
		                          <td>[[$v.full_po_number]]</td>
		                          <td>[[$v.supplier_date]]</td>
		                          <td>[[$v.supplier_pi_number]]</td>
		                          <td>[[$v.date]]</td>
		                          <td>[[$v.query]]</td>
		                          <td>[[$v.payable_month]]</td>
		                          <td>[[$v.amount]]</td>
		                        </tr>
		                        [[/foreach]]
		                    </tbody>
		                </table>
				    </div>
				    <div class="tab-pane" id="tab_3">
				    	<p align="right">
			        		<button type="button" class="btn btn-primary" ng-click="add_note()">Add Credit Note/Debit Note</button>
		        		</p>
	              		<table id="paymentBookExample1" class="table table-bordered table-striped" style="margin-top: 10px;">
		                    <thead>
		                        <tr>
		                          <th>Action</th>
		                          <th>Supplier Name</th>
		                          <th>Type</th>
		                          <th>Division</th>
		                          <th>Debit Note No</th>
		                          <th>Debit Note Date</th>
		                          <th>Supplier Credit Note</th>
		                          <th>Supplier Credit Note Date</th>
		                          <th>Query</th>
		                          <th>Payable Month</th>
		                          <th>Amount</th>
		                        </tr>
		                    </thead>
		                    <tbody>
		                    	[[foreach from=$creditDebitNoteDetails key=k item=v]]
		                        <tr>
		                          <td style="text-align: center;">
		                          	<a href="#" onclick='editDepositDetails([[$v|@json_encode]])'>
							          <span class="glyphicon glyphicon-edit"></span>
							        </a>
			                      	<a href="#" onclick='deleteDepositDetails([[$v|@json_encode]])'>
							          <span class="glyphicon glyphicon-trash"></span>
							        </a>
			                      </td>
		                          <td>[[$v.supplier_name]]</td>
		                          <td>[[$v.type]]</td>
		                          <td>[[$v.division]]</td>
		                          <td>[[$v.debit_note_no]]</td>
		                          <td>[[$v.debit_note_date]]</td>
		                          <td>[[$v.supplier_creditnote]]</td>
		                          <td>[[$v.supplier_creditnote_date]]</td>
		                          <td>[[$v.query]]</td>
		                          <td>[[$v.payable_month]]</td>
		                          <td>[[$v.amount]]</td>
		                        </tr>
		                        [[/foreach]]
		                    </tbody>
		                </table>
				    </div>
				</div>
			</div>
		</div>
	</div>
</section>

<div class="modal fade" id="debit_credit_note_modal">
	<div class="modal-dialog modal-lg">
	    <div class="modal-content">
		    <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title">{{depositDetailsModal.title}}</h4>
		    </div>
		    <div class="modal-body">
		        <div class="row">
		            <div class="col-lg-4">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Type</label>
		                  <select class="form-control select2" style="width: 100%;" id="type" ng-model="addNoteData.type">
		                  	  <option value="">Choose Type</option>
		                  		<option value="D">DEBIT NOTE</option>
		                  		<option value="C">CREDIT NOTE</option>
		                  		<option value="T">LESS TED</option>
		                  		<option value="B">BALANCE AMOUNT</option>
			                  </select>
			                </div>
		            </div>
		            <div class="col-lg-4">
		                <div class="form-group">
		                    <label for="exampleInputEmail1">Supplier Name</label>
		                    <select class="form-control select2" style="width: 100%;" id="addNoteData_supplier_name" ng-model="addNoteData.supplier_id">
		                  	  	<option value="">Choose Supplier Name</option>
		                  	    [[foreach from=$supplier_name_details key=k item=v]]
		                  			<option value="[[$v.supplier_id]]">[[$v.supplier_name]]</option>
		                  	    [[/foreach]]
			                </select>
			            </div>
		            </div>
		            <div class="col-lg-4" ng-init="addNoteData.division = 'UPPER'">
	                	<div class="form-group">
		                  <label for="exampleInputEmail1">Division</label>
		                  <select class="form-control" id="division" ng-model="addNoteData.division">
		                  	  <option value="">Choose Division</option>
		                  	  <option value="UPPER">UPPER</option>
		                  	  <option value="FULL SHOE">FULL SHOE</option>
		                  	  <option value="SOLE">SOLE</option>
		                  </select>
		                </div>
	                </div>
		            <div class="col-lg-4">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Debit/Credit Note No</label>
		                  <input type="text" ng-model="addNoteData.debitnote_no" class="form-control" id="debitnote_no" placeholder="Enter debitnote no" maxlength="8">
		                </div>
		            </div>
		             <div class="col-lg-4">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Debit/Credit Note Date</label>
		                  <input type="text" ng-model="addNoteData.debitnote_date" class="form-control" id="debitnote_date" placeholder="Choose Debit note date">
		                </div>
		            </div>
		            <div class="col-lg-4">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Supplier Debit/Credit Note</label>
		                  <input type="text" ng-model="addNoteData.supplier_creditnote_no" class="form-control" id="supplier_creditnote_no" placeholder="Enter supplier creditnote no">
		                </div>
		            </div>
		              <div class="col-lg-4">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Supplier Debit/Credit Note Date</label>
		                  <input type="text" ng-model="addNoteData.creditnote_date" class="form-control" id="creditnote_date" placeholder="Choose Debit Note Date">
		                </div>
		            </div>
		             <div class="col-lg-4">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Query</label>
		                  <input type="text" ng-model="addNoteData.query" class="form-control" id="query" placeholder="Enter query" ng-change="addNoteData.query = addNoteData.query.toUpperCase()">
		                </div>
		            </div>
		             <div class="col-lg-4">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Payable Month</label>
		                  <input type="text" ng-model="addNoteData.payable_month" class="form-control" id="payable_month" placeholder="Enter amount">
		                </div>
		            </div>
		            <div class="col-lg-4">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Amount</label>
		                  <input type="text" ng-model="addNoteData.amount" class="form-control" id="amount" placeholder="Enter amount">
		                </div>
		            </div>
		        </div>
		    </div>
	        <div class="modal-footer">
	        	<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        		<button type="button" class="btn btn-primary" ng-click="update_note_details()" ng-if="depositDetailsModal.button === 'Add'">Add Note</button>

        		<button type="button" class="btn btn-primary" ng-click="edit_update_note_details()" ng-if="depositDetailsModal.button === 'Edit'">Update</button>
        		
	        </div>
	    </div>
	    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="advance_payment_modal">
	<div class="modal-dialog modal-lg">
	    <div class="modal-content">
		    <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title">{{advancePaymentModal.title}}</h4>
		    </div>
		    <div class="modal-body">
		        <div class="row">
		            <!-- <div class="col-lg-4">
		                <div class="form-group">
		                    <label for="exampleInputEmail1">Supplier Name</label>
		                    <select class="form-control select2" style="width: 100%;" id="ap_supplier_name" ng-model="advancePaymentData.supplier_id">
		                  	  	<option value="">Choose Supplier Name</option>
		                  	    [[foreach from=$supplier_name_details key=k item=v]]
		                  			<option value="[[$v.supplier_id]]">[[$v.supplier_name]]</option>
		                  	    [[/foreach]]
			                </select>
			            </div>
		            </div> -->
		            <div class="col-lg-4">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Po Year</label>
		                  <input type="text" class="form-control" id="search_year_po" ng-model="advancePaymentData.po_year" placeholder="Choose Po Date" ng-change="searchPoBasedOnYear()">
		                </div>
		            </div>
		            <div class="col-lg-4">
		                <div class="form-group">
		                    <label for="exampleInputEmail1">PO Number</label>
		                    <select class="form-control select2" style="width: 100%;" id="ap_full_po_number" ng-model="advancePaymentData.full_po_number">
		                  	  	<option value="">Choose PO Number</option>
		                  		<option ng-repeat="x in searchPoBasedOnYearData" value="{{x.full_po_number+'|'+x.po_date+'|'+x.unit+'|'+x.type
		                  		+'|'+x.po_number}}">{{x.full_po_number}}</option>
			                </select>
			            </div>
		            </div>
		            <div class="col-lg-4">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Date</label>
		                  <input type="text" ng-model="advancePaymentData.supplier_date" class="form-control" id="ap_supplier_date" placeholder="Choose Date">
		                </div>
		            </div>

		         	<div class="col-lg-4">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Supplier Pi Number</label>
		                  <input type="text" ng-model="advancePaymentData.supplier_pi_number" class="form-control" id="ap_supplier_pi_number" placeholder="Enter Supplier Pi Number" ng-change="advancePaymentData.supplier_pi_number = advancePaymentData.supplier_pi_number.toUpperCase()">
		                </div>
		            </div>
		            <div class="col-lg-4">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Date</label>
		                  <input type="text" ng-model="advancePaymentData.date" class="form-control" id="ap_date" placeholder="Choose Date">
		                </div>
		            </div>
		            <div class="col-lg-4">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Query</label>
		                  <input type="text" ng-model="advancePaymentData.query" class="form-control" id="ap_query" placeholder="Enter Query" ng-change="advancePaymentData.query = advancePaymentData.query.toUpperCase()">
		                </div>
		            </div>
		            <!-- <div class="col-lg-4">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Payable Month</label>
		                  <input type="text" ng-model="advancePaymentData.payable_month" class="form-control" id="ap_payable_month" placeholder="Choose Payable Month">
		                </div>
		            </div> -->
		            <div class="col-lg-4">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Amount</label>
		                  <input type="text" ng-model="advancePaymentData.amount" class="form-control" id="ap_amount" placeholder="Enter Amount">
		                </div>
		            </div>
		        </div>
		    </div>
	        <div class="modal-footer">
	        	<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        		<button type="button" class="btn btn-primary" ng-click="add_advance_payment_action()" ng-if="advancePaymentModal.button === 'Add'">Add</button>
        		<button type="button" class="btn btn-primary" ng-click="edit_advance_payment_action()" ng-if="advancePaymentModal.button === 'Edit'">Edit</button>
	        </div>
	    </div>
	    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="material_modal">
	<div class="modal-dialog modal-lg">
	    <div class="modal-content">
		    <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title">Edit Payment Book</h4>
		    </div>
		    <div class="modal-body">
		        <div class="row">
		            <div class="col-lg-4">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">S.No</label>
		                  <input type="text" ng-model="editPaymentList.s_no" class="form-control" id="s_no" placeholder="Enter Serial number" maxlength="10">
		                </div>
		            </div>
		            <div class="col-lg-4">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Query</label>
		                  <input type="text" ng-model="editPaymentList.query" class="form-control" id="query" placeholder="Enter query" ng-change="editPaymentList.query = editPaymentList.query.toUpperCase()">
		                </div>
		            </div>
		            <div class="col-lg-4">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Payable Month</label>
		                  <input type="text" class="form-control" id="list_payable_month" ng-model="editPaymentList.payable_month" placeholder="Choose payable month">
		                </div>
		            </div>
		           <!--<div class="col-lg-4">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Deduction</label>
		                  <input type="text" ng-model="editPaymentList.deduction" class="form-control" id="deduction" placeholder="Enter deduction amount">
		                </div>
		            </div>
		            <div class="col-lg-4">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Cheque Number</label>
		                  <input type="text" ng-model="editPaymentList.cheque_no" class="form-control" id="cheque_no" placeholder="Enter cheque Number" ng-change="editPaymentList.cheque_no = editPaymentList.cheque_no.toUpperCase()">
		                </div>
		            </div>
		            <div class="col-lg-4">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Cheque Date</label>
		                  <input type="text" class="form-control" id="cheque_date" ng-model="editPaymentList.cheque_date" placeholder="Choose cheque Date" >
		                </div>
		            </div>
		            <div class="col-lg-4">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Cheque Amount</label>
		                  <input type="text" ng-model="editPaymentList.cheque_amount" class="form-control" id="cheque_amount" placeholder="Enter amount">
		                </div>
		            </div> -->
		        </div>
		    </div>
	        <div class="modal-footer">
	        	<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        		<button type="button" class="btn btn-primary" ng-click="editPaymentBook()">Update</button>
	        </div>
	    </div>
	    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="cheque_number_modal">
	<div class="modal-dialog modal-lg">
	    <div class="modal-content">
		    <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title">Edit Cheque Number Details</h4>
		    </div>
		    <div class="modal-body">
		        <div class="row">
		           <!-- <div class="col-lg-4">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Deduction</label>
		                  <input type="text" ng-model="chequeNumberDetails.deduction" class="form-control" id="deduction" placeholder="Enter deduction amount">
		                </div>
		            </div> -->
		            <div class="col-lg-4">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Cheque Number</label>
		                  <input type="text" ng-model="chequeNumberDetails.cheque_no" class="form-control" id="cheque_no" placeholder="Enter cheque Number" ng-change="editPaymentList.cheque_no = editPaymentList.cheque_no.toUpperCase()">
		                </div>
		            </div>
		            <div class="col-lg-4">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Cheque Date</label>
		                  <input type="text" class="form-control" id="cheque_date" ng-model="chequeNumberDetails.cheque_date" placeholder="Choose cheque Date" >
		                </div>
		            </div>
		            <div class="col-lg-4">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Cheque Amount</label>
		                  <input type="text" ng-model="chequeNumberDetails.cheque_amount" class="form-control" id="cheque_amount" placeholder="Enter amount">
		                </div>
		            </div>
		            <div class="col-lg-4">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">DD Number</label>
		                  <input type="text" ng-model="chequeNumberDetails.dd_number" class="form-control" id="dd_numer" placeholder="Enter DD Number">
		                </div>
		            </div>
		            <div class="col-lg-4">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">DD Date</label>
		                  <input type="text" ng-model="chequeNumberDetails.dd_date" class="form-control" id="dd_date" placeholder="Enter DD Date">
		                </div>
		            </div>
		            <div class="col-lg-4">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">DD Amount</label>
		                  <input type="text" ng-model="chequeNumberDetails.dd_amount" class="form-control" id="dd_amount" placeholder="Enter DD Amount">
		                </div>
		            </div> 
		        </div>
		    </div>
	        <div class="modal-footer">
	        	<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        		<button type="button" class="btn btn-primary" ng-click="editChequeNumberDetailsAction()">Update</button>
	        </div>
	    </div>
	    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

