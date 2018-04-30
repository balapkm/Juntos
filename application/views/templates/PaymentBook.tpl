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
	              <!-- <li><a href="#tab_2" data-toggle="tab">View</a></li> -->
	            </ul>
	            <div class="tab-content">
	              	<div class="tab-pane active" id="tab_1">
	              		<div class="row">
	              			<div class="col-lg-3"></div>
				            <!-- Supplier Wise -->
				            <div class="col-lg-12" style="margin-top: 10px;">
					            <div class="col-lg-4"></div>
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
					            <div class="col-lg-4"></div>
					        </div>
				            
				            <!-- Supplier Wise -->
				            <div class="col-lg-12 text-center" ng-if="generatePoData.supplier_name">
				            	<button type="submit" class="btn btn-primary" ng-click="searchAction()">Search</button>
				            </div>
				        </div>
			           	<div id="showAddNoteSearch" style="display: none;">
			        		<p align="right">
				        		<button type="button" class="btn btn-primary" ng-click="add_note()">Add Credit Note/Debit Note</button>
				        		<button class="btn btn-primary" type="button" onClick="downloadAsPdfPaymentBookDetails()">Download as PDF</button> 
			        		</p>
			       		</div>
				        <div class="row" id="showPaymentBookSearch">	
				        </div>
				        <div>
				        </div>
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
		        <h4 class="modal-title">Add Credit Note/Debit Note</h4>
		    </div>
		    <div class="modal-body">
		        <div class="row">
		            <div class="col-lg-4">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Type</label>
		                  <input type="hidden" ng-model="addNoteData.supplier_id" id="supplier_id">
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
		                  <label for="exampleInputEmail1">Debit Note No</label>
		                  <input type="text" ng-model="addNoteData.debitnote_no" class="form-control" id="debitnote_no" placeholder="Enter debitnote no" maxlength="8">
		                </div>
		            </div>
		             <div class="col-lg-4">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Debit Note Date</label>
		                  <input type="text" ng-model="addNoteData.debitnote_date" class="form-control" id="debitnote_date" placeholder="Choose Debit note date">
		                </div>
		            </div>
		           
		            <div class="col-lg-4">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Supplier Credit Note</label>
		                  <input type="text" ng-model="addNoteData.supplier_creditnote_no" class="form-control" id="supplier_creditnote_no" placeholder="Enter supplier creditnote no">
		                </div>
		            </div>
		              <div class="col-lg-4">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Credit Note Date</label>
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
        		<button type="button" class="btn btn-primary" ng-click="update_note_details()">Add Note</button>
        		
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
		           <div class="col-lg-4">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Deduction</label>
		                  <input type="text" ng-model="chequeNumberDetails.deduction" class="form-control" id="deduction" placeholder="Enter deduction amount">
		                </div>
		            </div>
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

