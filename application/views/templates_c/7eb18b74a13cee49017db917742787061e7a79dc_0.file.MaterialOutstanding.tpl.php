<?php
/* Smarty version 3.1.30, created on 2018-03-07 23:04:04
  from "/home/Staging/workSpace/Juntos/application/views/templates/MaterialOutstanding.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5aa0228c8b22d3_97153830',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7eb18b74a13cee49017db917742787061e7a79dc' => 
    array (
      0 => '/home/Staging/workSpace/Juntos/application/views/templates/MaterialOutstanding.tpl',
      1 => 1520444034,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5aa0228c8b22d3_97153830 (Smarty_Internal_Template $_smarty_tpl) {
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
	              <!-- <li><a href="#tab_2" data-toggle="tab">View</a></li> -->
	            </ul>
	            <div class="tab-content">
	              	<div class="tab-pane active" id="tab_1">
	              		<div class="row">
	              			<div class="col-lg-4">
				                <div class="form-group">
				                  <label for="exampleInputEmail1">Unit</label>
				                  <select class="form-control" id="unit" ng-model="generatePoData.unit">
				                  	  <option value="">Choose Unit</option>
				                  	  <option value="Upper">Upper</option>
				                  	  <option value="Full Shoe">Full Shoe</option>
				                  	  <option value="Sole">Sole</option>
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
				            <div class="col-lg-4">
				                <div class="form-group">
				                  <label for="exampleInputEmail1">Outstanding Type</label>
				                  <select class="form-control" id="outstanding_type" ng-model="generatePoData.outstanding_type">
				                  	  <option value="">Choose Outstanding Type</option>
				                  	  <option value="Material">Material</option>
				                  	  <option value="Bill">Bill</option>
				                  </select>
				                </div>
				            </div>
				            <div class="col-lg-4">
				                <div class="form-group">
				                  <label for="exampleInputEmail1">Supplier Name</label>
				                  <select class="form-control select2" style="width: 100%;" id="supplier_name" ng-model="generatePoData.supplier_name" ng-change="clearRedMark('supplier_name')">
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
				                  <label for="exampleInputEmail1">Material Name</label>
				                  <select class="form-control select2" style="width: 100%;" id="material_name" ng-model="generatePoData.material_name" ng-change="clearRedMark('material_name')">
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

				            <div class="col-lg-12 text-center">
				            	<button type="submit" class="btn btn-primary" ng-click="searchAction()">Search</button>
				            </div>
				        </div>
				        <div class="table-responsive" style="margin-top: 50px;" ng-if="showMaterialOutStandingTable">
			                <table id="example" class="table table-bordered table-striped" >
			                    <thead>
			                        <tr>
			                          <th>Edit</th>
			                          <th>Unit</th>
			                          <th>Supplier</th>
			                          <th>PO Number</th>
			                          <th style="width: 100px">PO Date</th>
			                          <th>Material</th>
			                          <th>Quantity</th>
			                          <th>UMO</th>
			                          <th>Received</th>
			                          <th>Received Date</th>
			                          <th>Balance</th>
			                          <th>Delivery Date</th>
			                          <th>Delay Day</th>
			                          <th>Invoice Number</th>
			                          <th>Bill Amount</th>
			                          <th>DC Amount</th>
			                        </tr>
			                    </thead>
			                    <tbody>
			                        <tr ng-repeat="x in materialOutStanding" ng-if="((x.qty - x.received) !== 0) && (generatePoData.outstanding_type === 'Material')">
			                        	<td style="text-align: center;">
			                        		<a href="#" ng-click="editMaterialOutStanding(x)">
									          <span class="glyphicon glyphicon-edit"></span>
									        </a>
			                        	</td>
			                        	<td>{{x.unit}}</td>
			                        	<td>{{x.supplier_name}}</td>
			                        	<td>{{x.po_number}}</td>
			                        	<td>{{x.po_date}}</td>
			                        	<td>{{x.material_name}}</td>
			                        	<td>{{x.qty}}</td>
			                        	<td>{{x.material_uom}}</td>
			                        	<td>{{x.received}}</td>
			                        	<td>{{x.received_date}}</td>
			                        	<td>{{x.qty - x.received}}</td>
			                        	<td>{{x.delivery_date}}</td>
			                        	<td>0</td>
			                        	<td>{{x.invoice_number}}</td>
			                        	<td>{{x.bill_amount}}</td>
			                        	<td>{{x.dc_number}}</td>
			                        </tr>
			                        <tr ng-repeat="x in materialOutStanding" ng-if="((x.qty - x.received) === 0) && (generatePoData.outstanding_type === 'Bill')">
			                        	<td style="text-align: center;">
			                        		<a href="#" ng-click="editMaterialOutStanding(x)">
									          <span class="glyphicon glyphicon-edit"></span>
									        </a>
			                        	</td>
			                        	<td>{{x.unit}}</td>
			                        	<td>{{x.supplier_name}}</td>
			                        	<td>{{x.po_number}}</td>
			                        	<td>{{x.po_date}}</td>
			                        	<td>{{x.material_name}}</td>
			                        	<td>{{x.qty}}</td>
			                        	<td>{{x.material_uom}}</td>
			                        	<td>{{x.received}}</td>
			                        	<td>{{x.received_date}}</td>
			                        	<td>{{x.qty - x.received}}</td>
			                        	<td>{{x.delivery_date}}</td>
			                        	<td>0</td>
			                        	<td>{{x.invoice_number}}</td>
			                        	<td>{{x.bill_amount}}</td>
			                        	<td>{{x.dc_number}}</td>
			                        </tr>
			                    </tbody>
			                </table>
			            </div>
				    </div>
				</div>
			</div>
		</div>
	</div>
</section>

<div class="modal fade" id="material_modal">
	<div class="modal-dialog modal-lg">
	    <div class="modal-content">
		    <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title">Edit Material Out Standing</h4>
		    </div>
		    <div class="modal-body">
		        <div class="row">
		            <div class="col-lg-4">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Received</label>
		                  <input type="text" ng-model="editMaterialPOData.received" class="form-control" id="received" placeholder="Enter Received number">
		                </div>
		            </div>
		            <div class="col-lg-4">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Received Date</label>
		                  <input type="text" ng-model="editMaterialPOData.received_date" class="form-control" id="received_date" placeholder="Choose Received Date">
		                </div>
		            </div>
		            <div class="col-lg-4">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Invoice Number</label>
		                  <input type="text" ng-model="editMaterialPOData.invoice_number" class="form-control" id="invoice_number" placeholder="Enter Invoice number">
		                </div>
		            </div>
		            <div class="col-lg-4">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Bill Amount</label>
		                  <input type="text" ng-model="editMaterialPOData.bill_amount" class="form-control" id="bill_amount" placeholder="Enter Bill Amount">
		                </div>
		            </div>
		            <div class="col-lg-4">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">DC Number</label>
		                  <input type="text" ng-model="editMaterialPOData.dc_number" class="form-control" id="dc_number" placeholder="Enter DC Number">
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
</div><?php }
}
