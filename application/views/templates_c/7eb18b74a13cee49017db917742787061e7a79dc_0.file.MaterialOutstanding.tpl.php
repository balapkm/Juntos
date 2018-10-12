<?php
/* Smarty version 3.1.30, created on 2018-10-12 22:06:43
  from "/home/Staging/workSpace/Juntos/application/views/templates/MaterialOutstanding.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5bc0cd9b21c992_12225541',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7eb18b74a13cee49017db917742787061e7a79dc' => 
    array (
      0 => '/home/Staging/workSpace/Juntos/application/views/templates/MaterialOutstanding.tpl',
      1 => 1539362194,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bc0cd9b21c992_12225541 (Smarty_Internal_Template $_smarty_tpl) {
?>
<section class="content-header">
  <h4>
    Material And Bill OutStanding
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
	              <li><a href="#tab_2" data-toggle="tab">Trash</a></li>
	            </ul>
	            <div class="tab-content">
	              	<div class="tab-pane active" id="tab_1">
	              		<div class="row">
	              			<div class="col-lg-4">
				                <div class="form-group">
				                  <label for="exampleInputEmail1">Outstanding Type</label>
				                  <select class="form-control" id="outstanding_type" ng-model="generatePoData.outstanding_type">
				                  	  <option value="">Choose Outstanding Type</option>
				                  	  <option value="M">Material</option>
				                  	  <option value="B">Bill</option>
				                  </select>
				                </div>
				            </div>
				            <div class="col-lg-4">
				                <div class="form-group" >
				                  <label for="exampleInputPassword1">Division</label>
				                  <select class="form-control" ng-model="generatePoData.division" id="division">
		              				<option value="">Choose Division</option>
		              				<option value="UPPER">UPPER</option>
		              				<option value="FULL SHOE">FULL SHOE</option>
		              				<option value="SOLE">SOLE</option>
		              			  </select>
				                </div>
				            </div>
		              		<div class="col-lg-4">
				                <div class="form-group">
				                  <label for="exampleInputPassword1">type</label>
				                  <select class="form-control" ng-model="generatePoData.type" id="type">
		              				<option value="">Choose Type</option>
		              				<option value="IMPORT">IMPORT</option>
		              				<option value="INDIGENOUS">INDIGENOUS</option>
		              				<option value="SAMPLE_IMPORT">SAMPLE IMPORT</option>
		              				<option value="SAMPLE_INDIGENOUS">SAMPLE INDIGENOUS</option>
		              			  </select>
				                </div>
				            </div>
				            <div class="col-lg-4">
				                <div class="form-group">
				                  <label for="exampleInputPassword1">Date</label>
				                  <input type="text" class="form-control" placeholder="Choose Date Range" id="datePicker">
				                </div>
				            </div>
				            <div class="col-lg-4">
				                <div class="form-group">
				                	<label for="exampleInputPassword1">Material Name</label>
				                  	<select class="form-control select2" style="width: 100%;" ng-model="generatePoData.material_id" id="material_id">
				                  		<option value="">Choose Material Name</option>
			                  	    	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['material_name_details']->value, 'v', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
?>
				                  		<option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['material_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['material_name'];?>
</option>
				                  	  	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

				                	</select>
				                </div>
				            </div>
				            <div class="col-lg-4">
				                <div class="form-group">
				                  <label for="exampleInputEmail1">Supplier Name</label>
				                  <select class="form-control select2" style="width: 100%;" id="supplier_id" ng-model="generatePoData.supplier_id">
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
				            </div>
				            <div class="col-lg-4">
				                <div class="form-group">
				                  <label for="exampleInputEmail1">Po Number</label>
				                  <select class="form-control select2" style="width: 100%;" id="po_number_search" ng-model="generatePoData.po_number" ng-change="clearRedMark('po_number')">
				                  	<option value="">Choose Po Number</option>
			                  	  	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['po_unique_number']->value, 'v', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
?>
				                  		<option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['unit'];?>
|<?php echo $_smarty_tpl->tpl_vars['v']->value['type'];?>
|<?php echo $_smarty_tpl->tpl_vars['v']->value['po_number'];?>
|<?php echo $_smarty_tpl->tpl_vars['v']->value['full_po_number'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['full_po_number'];?>
</option>
				                  	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

				                  </select>
				                </div>
				            </div>

				            <div class="col-lg-4">
				                <div class="form-group">
				                  <label for="exampleInputEmail1">Po Year</label>
				                  <input type="text" class="form-control" id="search_year_po" ng-model="generatePoData.po_year" placeholder="Choose Po Date">
				                </div>
				            </div>
				            
				            <!-- Supplier Wise -->

				            <div class="col-lg-12 text-center">
				            	<button type="submit" class="btn btn-primary" ng-click="searchAction()">Search</button>
				            </div>
				        </div>
				        <div class="table-responsive" style="margin-top: 50px;" ng-if="showMaterialOutStandingTable">
				        	<button class="btn btn-primary" style="margin-bottom:20px;" ng-if="checkEditBoxBillOutStandingShow" ng-click="editMaterialOutStanding({outstanding_type:'B'})">EDIT</button>
			                <table id="example" class="table table-bordered table-striped" >
			                    <thead>
			                        <tr>
			                          <th>Edit</th>
			                          <th>Unit</th>
			                          <th>Type</th>
			                          <th>Supplier</th>
			                          <th>Order Ref</th>
			                          <th>PO Number</th>
			                          <th style="width: 100px">PO Date</th>
			                          <th>PO Description</th>
			                          <th>Material</th>
			                          <th>Quantity</th>
			                          <th>UMO</th>
			                          <th>Received</th>
			                          <th>Received Date</th>
			                          <th ng-if="materialOutStanding[0].outstanding_type === 'M'">Balance</th>
			                          <th ng-if="materialOutStanding[0].outstanding_type === 'B'">Excess Qty</th>
			                          <th>Delivery Date</th>
			                          <th>Delay Day</th>
			                          <!-- <th ng-if="materialOutStanding[0].outstanding_type === 'B'">Invoice Number</th> -->
			                          <th ng-if="materialOutStanding[0].outstanding_type === 'B'">Bill Number</th>
			                          <th ng-if="materialOutStanding[0].outstanding_type === 'B'">Bill Date</th>
			                          <th ng-if="materialOutStanding[0].outstanding_type === 'B'">Bill Amount</th>
			                          <th ng-if="materialOutStanding[0].outstanding_type === 'B'">DC Number</th>
			                          <th ng-if="materialOutStanding[0].outstanding_type === 'B'">DC Date</th>
			                        </tr>
			                    </thead>
			                    <tbody>
			                        <tr ng-repeat="x in materialOutStanding">
			                        	<td style="text-align: center;">
			                        		<a href="#" ng-click="editMaterialOutStanding(x)" ng-if="x.outstanding_type === 'M'">
									          <span class="glyphicon glyphicon-edit"></span>
									        </a>
									        <!-- <a href="#" ng-click="cancelMaterialOutStanding(x)" ng-if="x.outstanding_type === 'M'">
									          <span class="glyphicon glyphicon-ban-circle"></span>
									        </a> -->
									        <div class="checkbox checkbox-success" ng-if="x.outstanding_type === 'B'">
									        	<input type="checkbox" ng-model="checkEditBoxBillOutStandingModel[x.po_generated_request_id]" ng-click="checkEditBoxBillOutStanding(x)">
									        </div>
									        <a href="#" ng-click="deleteMaterialOutStanding(x)" style="margin-left: 10px;" ng-if="x.outstanding_type === 'B'">
									          <span class="glyphicon glyphicon-trash"></span>
									        </a>
			                        	</td>
			                        	<td>{{x.unit}}</td>
			                        	<td>{{x.type}}</td>
			                        	<td>{{x.supplier_name}}</td>
			                        	<td>{{x.order_reference}}</td>
			                        	<td>{{x.po_number}}</td>
			                        	<td>{{x.po_date|date:'dd-MM-yyyy'}}</td>
			                        	<td>{{x.po_description|date:'dd-MM-yyyy'}}</td>
			                        	<td>{{x.material_master_name}}</td>
			                        	<td>{{x.qty}}</td>
			                        	<td>{{x.material_uom}}</td>
			                        	<td>{{x.received}}</td>
			                        	<td ng-if="x.received_date !== '0000-00-00'">{{x.received_date|date:'dd-MM-yyyy'}}</td>
			                        	<td ng-if="x.received_date === '0000-00-00'"></td>
			                        	<td ng-if="x.outstanding_type === 'M'">{{x.qty - x.received}}</td>
			                        	<td ng-if="x.outstanding_type === 'B'">{{(x.total_received - x.qty)|number:2}}</td>
			                        	<!-- <td ng-if="x.outstanding_type === 'B'">{{x.balance}}</td> -->
			                        	<td>{{x.delivery_date|date:'dd-MM-yyyy'}}</td>
			                        	<td>{{x.delay_day}}</td>
			                        	<!-- <td ng-if="materialOutStanding[0].outstanding_type === 'B'">{{x.invoice_number}}</td> -->
			                        	<td ng-if="materialOutStanding[0].outstanding_type === 'B'">{{x.bill_number}}</td>
			                        	<td ng-if="materialOutStanding[0].outstanding_type === 'B'">{{x.bill_date}}</td>
			                        	<td ng-if="materialOutStanding[0].outstanding_type === 'B'">{{x.bill_amount}}</td>
			                        	<td ng-if="materialOutStanding[0].outstanding_type === 'B'">{{x.dc_number}}</td>
			                        	<td ng-if="materialOutStanding[0].outstanding_type === 'B'">{{x.dc_date}}</td>
			                        </tr>
			                    </tbody>
			                </table>
			            </div>
				    </div>
				    <div class="tab-pane" id="tab_2">
				    	<div class="table-responsive" style="margin-top: 50px;">
			                <table id="trashTable" class="table table-bordered table-striped" >
			                    <thead>
			                        <tr>
			                          <th>Action</th>
			                          <th>Unit</th>
			                          <th>Supplier</th>
			                          <th>Order Ref</th>
			                          <th>PO Number</th>
			                          <th style="width: 100px">PO Date</th>
			                          <th>Material</th>
			                          <th>Quantity</th>
			                          <th>UMO</th>
			                        </tr>
			                    </thead>
			                    <tbody>
			                    	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['trash_details']->value, 'v', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
?>
			                    	<tr>
			                          <td align="center">
			                          	<a href="#" onclick='addBackTrashIntoMaterial(<?php echo json_encode($_smarty_tpl->tpl_vars['v']->value);?>
)'>
									        <span class="glyphicon glyphicon-plus-sign"></span>
									    </a>
			                          </td>
			                          <td><?php echo $_smarty_tpl->tpl_vars['v']->value['unit'];?>
</td>
			                          <td><?php echo $_smarty_tpl->tpl_vars['v']->value['supplier_name'];?>
</td>
			                          <td><?php echo $_smarty_tpl->tpl_vars['v']->value['order_reference'];?>
</td>
			                          <td><?php echo $_smarty_tpl->tpl_vars['v']->value['full_po_number'];?>
</td>
			                          <td style="widtd: 100px"><?php echo $_smarty_tpl->tpl_vars['v']->value['po_date'];?>
</td>
			                          <td><?php echo $_smarty_tpl->tpl_vars['v']->value['material_master_name'];?>
</td>
			                          <td><?php echo $_smarty_tpl->tpl_vars['v']->value['received'];?>
</td>
			                          <td><?php echo $_smarty_tpl->tpl_vars['v']->value['material_uom'];?>
</td>
			                        </tr>
			                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

			                    </tbody>
			                </table>
			            </div>
				    </div>
				</div>
			</div>
		</div>
	</div>
</section>
<input type="hidden" id="totalAmountMOS" value="0">

<div class="modal fade" id="material_modal">
	<div class="modal-dialog modal-lg">
	    <div class="modal-content">
		    <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		      	</button>
		        <h4 class="modal-title">{{title}}<span ng-if="editMaterialPOData.outstanding_type === 'B'" class="pull-right" style="margin-right: 20px;">Total Amount : {{totalAmount|number:2}}</span></h4>
		    </div>
		    <div class="modal-body">
		    	
		        <div class="row">
		        	<div class="col-lg-4" ng-if="editMaterialPOData.outstanding_type === 'M'">
		                <div class="form-group">
		                  	<label for="exampleInputEmail1">Type</label>
		                 	<select class="form-control" id="editType" ng-model="editMaterialPOData.editType" ng-change="typeChangeFunction()">
		                 		<option value="edit">Edit</option>
		                 		<option value="trash">Trash</option>
		                 	</select>
		                </div>
		            </div>
		            <div class="col-lg-4" ng-if="editMaterialPOData.outstanding_type === 'M'">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Received</label>
		                  <input type="text" ng-model="editMaterialPOData.received" class="form-control" id="received" placeholder="Enter Received number" maxlength="10">

		                </div>
		            </div>
		            <div ng-if="editMaterialPOData.editType === 'edit'">
		            <div class="col-lg-4" ng-if="editMaterialPOData.outstanding_type === 'M'">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Received Date</label>
		                  <input type="text" ng-model="editMaterialPOData.received_date" class="form-control" id="received_date" placeholder="Choose Received Date">
		                </div>
		            </div>
		            <div class="col-lg-4" ng-if="editMaterialPOData.outstanding_type === 'M'">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">DC Number</label>
		                  <input type="text" ng-model="editMaterialPOData.dc_number" class="form-control" id="dc_number" placeholder="Enter DC Number" ng-change="editMaterialPOData.dc_number = editMaterialPOData.dc_number.toUpperCase()">
		                </div>
		            </div>
		            <div class="col-lg-4" ng-if="editMaterialPOData.outstanding_type === 'M'">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">DC Date</label>
		                  <input type="text" ng-model="editMaterialPOData.dc_date" class="form-control" id="dc_date" placeholder="Choose DC Date">
		                </div>
		            </div>
		            <div class="col-lg-4" ng-if="editMaterialPOData.outstanding_type === 'B'">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Bill Number</label>
		                  <input type="text" ng-model="editMaterialPOData.bill_number" class="form-control" id="bill_number" placeholder="Enter Bill Number">
		                </div>
		            </div>
		            <div class="col-lg-4" ng-if="editMaterialPOData.outstanding_type === 'B'">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Bill Date</label>
		                  <input type="text" ng-model="editMaterialPOData.bill_date" class="form-control" id="bill_date" placeholder="Enter Bill Date">
		                </div>
		            </div>
		            <div class="col-lg-4" ng-if="editMaterialPOData.outstanding_type === 'B'">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Bill Amount</label>
		                  <input type="text" ng-model="editMaterialPOData.bill_amount" class="form-control" id="bill_amount" placeholder="Enter Bill Amount">
		                </div>
		            </div>
		        	</div>
		        </div>
		    </div>
	        <div class="modal-footer">
	        	<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        		<button type="button" class="btn btn-primary" ng-click="edit_material_action()">Update</button>
	        </div>
	    </div>
	    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="cancel_modal">
	<div class="modal-dialog">
	    <div class="modal-content">
		    <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		      	</button>
		      	<h4 class="modal-title">Cancel Remaining Qty</h4>
		    </div>
		    <div class="modal-body">
		    	<div class="row">
		    		<div class="col-lg-4">
		    			<h6><b>Total Qty : {{editMaterialPOData.qty|number:2}}</b></h6>
		    		</div>
		    		<div class="col-lg-4">
		    			<h6><b>Received : {{editMaterialPOData.received|number:2}}</b></h6>
		    		</div>
		    		<div class="col-lg-4">
		    			<h6><b>Balance : {{(editMaterialPOData.qty - editMaterialPOData.received)|number:2}}</b></h6>
		    		</div>
		    		<div class="col-lg-4"></div>
		            <div class="col-lg-4">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Total Qty</label>
		                  <input type="text" ng-model="editMaterialPOData.new_qty" class="form-control" id="remaining_qty" placeholder="Enter Remaining Qty">
		                </div>
		            </div>
		            <div class="col-lg-4"></div>
		        </div>
		    </div>
	        <div class="modal-footer">
	        	<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        		<button type="button" class="btn btn-primary" ng-click="cancel_material_action()">Cancel</button>
	        </div>
	    </div>
	    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div><?php }
}
