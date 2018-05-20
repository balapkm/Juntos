<?php
/* Smarty version 3.1.30, created on 2018-05-20 11:42:40
  from "/home/Staging/workSpace/Juntos/application/views/templates/PaymentStatement.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5b0111d83a3056_93616710',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd70a9e9ba2e763c1079343487b88765018068484' => 
    array (
      0 => '/home/Staging/workSpace/Juntos/application/views/templates/PaymentStatement.tpl',
      1 => 1526796528,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b0111d83a3056_93616710 (Smarty_Internal_Template $_smarty_tpl) {
?>
<section class="content-header">
  <h4>
  	Payment Statement
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
					                  <label for="exampleInputEmail1">Month</label>
					                  <input type="text" ng-model="paymentStatementObject.payment_statement_month" class="form-control" id="payment_statement_month" placeholder="Choose Month">
					                </div>
					            </div>
					            <div class="col-lg-4"></div>
				                <!-- <div class="col-lg-4">
					                <div class="form-group">
					                  <label for="exampleInputEmail1">Supplier Name</label>
					                  <select class="form-control select2" style="width: 100%;" id="payment_statement_supplier_id" ng-model="paymentStatementObject.payment_statement_supplier_id" ng-change="clearRedMark('payment_statement_supplier_id')">
					                  	  <option value="">Choose Supplier Name</option>
					                  	  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['supplier_name_details']->value, 'v', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
?>
					                  		<option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['supplier_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['supplier_name'];?>
</option>
					                  	  <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

					                  </select>
					                </div>
					            </div> -->
					            <!-- <div class="col-lg-4">
					                <div class="form-group">
					                  <label for="exampleInputEmail1">Unit</label>
					                  <select class="form-control" id="payment_statement_unit" ng-model="paymentStatementObject.payment_statement_unit">
					                  	  <option value="">Choose Unit</option>
					                  	  <option value="UPPER">Upper</option>
					                  	  <option value="FULL SHOE">Full Shoe</option>
					                  	  <option value="SOLE">Sole</option>
					                  </select>
					                </div>
					            </div> -->
					        </div>
				            
				            <!-- Supplier Wise -->
				            <div class="col-lg-12 text-center">
				            	<button type="submit" class="btn btn-primary" ng-click="searchAction()">Search</button>
				            </div>
				        </div>

				    </div>
				</div>
			</div>
		</div>
	</div>
	<div class="row" ng-if="showPaymentStatmentSearch">
    	<div class="col-lg-12">
        	<table id="example" class="table table-bordered table-striped" >
                <thead>
                    <tr style="font-weight: bold;">
                      <th>Edit</th>
                      <th>S.NO</th>
                      <th>PAGE NO</th>
                      <th>SUPPLIER</th>
                      <th>ORIGIN</th>
                      <th>PAYMENT MODE</th>
                      <th>AMOUNT</th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="x in paymentStatmentSearchData">
                    	<td style="text-align: center;" ng-if="!$last">
		            		<a href="#" ng-click='editpaymentStatment(x)'>
					          <span class="glyphicon glyphicon-edit"></span>
					        </a>
						</td>
                    	<td ng-if="!$last">{{$index+1}}</td>
                    	<td ng-if="$last"></td>
                    	<td ng-if="$last"></td>
                    	<td>{{x.page_no}}</td>
                    	<td ng-if="x.payment_to === ''">{{x.supplier_name}}</td>
                    	<td ng-if="x.payment_to !== ''">{{x.payment_to}}</td>
                    	<td>{{x.origin}}</td>
                    	<td>{{x.payment_type}}</td>
                    	<td style="font-weight: bold;">{{x.cheque_amount}}</td>
                    </tr>
                </tbody>
            </table>
    	</div>
    </div>
</section>


<div class="modal fade" id="edit_payment_statment">
	<div class="modal-dialog">
	    <div class="modal-content">
		    <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title">Edit Payment Statement Details</h4>
		    </div>
		    <div class="modal-body">
		    	<div class="row">
			    	<div class="col-lg-4">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Page No</label>
		                  <input type="text" class="form-control" id="edit_page_no" ng-model="editPaymentStatement.page_no" placeholder="Enter Page No">
		                </div>
		            </div>
	            </div>
		    </div>
		    <div class="modal-footer">
	        	<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        		<button type="button" class="btn btn-primary" ng-click="updateEditPaymentStatement()">Update</button>
	        </div>
		</div>
	</div>
</div><?php }
}
