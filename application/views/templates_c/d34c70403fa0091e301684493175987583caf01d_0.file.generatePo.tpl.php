<?php
/* Smarty version 3.1.30, created on 2018-03-17 00:00:25
  from "/home/Staging/workSpace/Juntos/application/views/templates/generatePo.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5aac0d41ddb406_23269947',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd34c70403fa0091e301684493175987583caf01d' => 
    array (
      0 => '/home/Staging/workSpace/Juntos/application/views/templates/generatePo.tpl',
      1 => 1521224812,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5aac0d41ddb406_23269947 (Smarty_Internal_Template $_smarty_tpl) {
?>
<section class="content-header">
    <h4>
      	Generate Po
    </h4>
</section>

<!-- Main content -->
<input type="hidden" id="po_number_details" value='<?php echo json_encode($_smarty_tpl->tpl_vars['po_number_details']->value);?>
'>
<section class="content">
	<div class="row">
        <div class="col-md-12">
          <!-- Custom Tabs -->
          	<div class="nav-tabs-custom">
	            <ul class="nav nav-tabs">
	              <li class="active"><a href="#tab_1" data-toggle="tab">Generate</a></li>
	              <li><a href="#tab_2" data-toggle="tab">View</a></li>
	            </ul>
	            <div class="tab-content">
	              	<div class="tab-pane active" id="tab_1">
	              		<div class="row">
	              			<div class="col-lg-3">
				                <div class="form-group">
				                  <label for="exampleInputEmail1">Unit</label>
				                  <select class="form-control" id="unit" ng-model="generatePoData.unit" ng-change="getPoNumber()">
				                  	  <option value="">Choose Unit</option>
				                  	  <option value="Upper">Upper</option>
				                  	  <option value="Full Shoe">Full Shoe</option>
				                  	  <option value="Sole">Sole</option>
				                  </select>
				                </div>
				            </div>
				            <div class="col-lg-3">
				                <div class="form-group">
				                  <label for="exampleInputEmail1">Type</label>
				                  <select class="form-control" id="type" ng-model="generatePoData.type" ng-change="getPoNumber()">
				                  	  <option value="">Choose Type</option>
				                  	  <option value="Import">Import</option>
				                  	  <option value="Indigenous">Indigenous</option>
				                  	  <option value="Sample_Import">Sample - Import</option>
				                  	  <option value="Sample_Indigenous">Sample - Indigenous</option>
				                  </select>
				                </div>
				            </div>
				            <div class="col-lg-3">
				                <div class="form-group">
				                  <label for="exampleInputEmail1">Po Date</label>
				                  <input type="text" class="form-control" id="po_date" ng-model="generatePoData.po_date" placeholder="Choose Po Date">
				                </div>
				            </div>
				            <div class="col-lg-3">
				                <div class="form-group">
				                  <label for="exampleInputEmail1">Delivery Date</label>
				                  <input type="text" class="form-control" id="delivery_date" placeholder="Choose Delivery Date" ng-model="generatePoData.delivery_date">
				                </div>
				            </div>
		            		<div class="col-lg-3">
				                <div class="form-group">
				                  <label for="exampleInputEmail1">Order Reference</label>
				                  <input type="text" class="form-control" id="order_reference" placeholder="Enter Order Ref" ng-model="generatePoData.order_reference">
				                </div>
				            </div>
				            <div class="col-lg-3">
				                <div class="form-group">
				                  <label for="exampleInputEmail1">Po Number</label>
				                  <input type="text" class="form-control" id="po_number" placeholder="Enter Po Number" ng-model="generatePoData.po_number" disabled="disabled">
				                </div>
				            </div>
				            <div class="col-lg-3">
				                <div class="form-group">
				                  <label for="exampleInputEmail1">Supplier Name</label>
				                  <select class="form-control select2" style="width: 100%;" id="supplier_id" ng-model="generatePoData.supplier_id" ng-change="getMaterialDetailsAsPerSupplier('supplier_name_select2')">
				                  	<option value="">Choose Supplier Name</option>
			                  	  	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['supplier_entry']->value, 'v', false, 'k');
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
				            <div class="col-lg-3">
				                <div class="form-group">
				                  <label for="exampleInputEmail1">Material Name</label>
				                  <select class="form-control select2_multiple" style="width: 100%;" id="material_id" ng-model="generatePoData.material_id" ng-change="clearRedMark('material_id')" multiple="multiple">
				                  	<!-- <option value="">Choose Material Name</option> -->
				                  	<option ng-repeat="x in materialNameDetails" value="{{x.material_id}}">{{x.material_name}}</option>
				                  </select>
				                </div>
				            </div>
				            <div class="col-lg-12 text-center">
				            	<button type="submit" class="btn btn-primary" ng-click="generatePo()">Generate</button>
				            </div>
				        </div>
				        
	              	</div>
	              	<div class="tab-pane" id="tab_2">
	              		<div class="row">
	              			<div class="col-lg-3"></div>
				            <div class="col-lg-3">
				                <div class="form-group">
				                  <label for="exampleInputEmail1">PO Number</label>
				                  <select class="form-control select2" style="width: 100%;" id="po_number_search" ng-model="searchPoData.po_number" ng-change="clearRedMark('po_number_search')">
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
				            <div class="col-lg-3">
				                <div class="form-group">
				                  <label for="exampleInputEmail1">Po Year</label>
				                  <input type="text" class="form-control" id="search_year_po" ng-model="searchPoData.po_year" placeholder="Choose Po Date">
				                </div>
				            </div>
				            <div class="col-lg-3"></div>
				            <div class="col-lg-12 text-center">
				            	<button type="submit" class="btn btn-primary" ng-click="searchPo()">Search</button>
				            </div>
				        </div>
				        <div class="row" id="showPoSearch">	
							   	
				        </div>
	              	</div>
	            </div>
        	</div>
   		</div>
   	</div>
</section>

<div class="modal fade" id="po_modal">
	<div class="modal-dialog modal-lg">
	    <div class="modal-content">
		    <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title">Edit Po</h4>
		    </div>
		    <div class="modal-body">
		    	<div class="row">
		    		<div class="col-lg-3"></div>
			    	<div class="col-lg-3">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Material Name</label>
		                  <textarea id="material_name" ng-model="poEditFormData.material_name" placeholder="Enter Material Name"></textarea>
		                </div>
		            </div>
		            <div class="col-lg-3">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Quantity</label>
		                  <input type="text" class="form-control" id="quantity" placeholder="Enter Quantity" ng-model="poEditFormData.qty">
		                </div>
		            </div>
		            <div class="col-lg-3"></div>
	            </div>
		    </div>
		    <div class="modal-footer">
	        	<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        		<button type="button" class="btn btn-primary" ng-click="edit_po_action()">Update</button>
	        </div>
		</div>
	</div>
</div>

<div class="modal fade" id="additional_charge_modal">
	<div class="modal-dialog modal-lg">
	    <div class="modal-content">
		    <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title">Additional Charge Modal</h4>
		    </div>
		    <div class="modal-body">
		    	<div class="row">
			    	<div class="col-lg-3">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Charge Name</label>
		                  <input type="text" class="form-control" id="charge_name" placeholder="Enter Charge Name" ng-model="poOtherCharge.name">
		                </div>
		            </div>
		            <div class="col-lg-3">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">HSN Code</label>
		                  <input type="text" class="form-control" id="chargeHSNCode" placeholder="Enter HSN Code" ng-model="poOtherCharge.hsn_code">
		                </div>
		            </div>
		            <div class="col-lg-3">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Amount Type</label>
		                  <select class="form-control" id="chargeAmountType" ng-model="poOtherCharge.amount_type">
		                  	<option value="">Choose Amount Type</option>
		                  	<option value="Percentage">Percentage</option>
		                  	<option value="Amount">Amount</option>
		                  </select>
		                </div>
		            </div>
		            <div class="col-lg-3">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Amount</label>
		                  <input type="text" class="form-control" id="chargeAmount" placeholder="Enter Charge Amount" ng-model="poOtherCharge.amount">
		                </div>
		            </div>
		            <div class="col-lg-3" ng-if="poOtherCharge.state_code === '33'">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">CGST</label>
		                  <input type="text" class="form-control" id="chargeCGST" placeholder="Enter CGST" ng-model="poOtherCharge.CGST">
		                </div>
		            </div>
		            <div class="col-lg-3">
		                <div class="form-group" ng-if="poOtherCharge.state_code === '33'">
		                  <label for="exampleInputEmail1">SGST</label>
		                  <input type="text" class="form-control" id="chargeSGST" placeholder="Enter SGST" ng-model="poOtherCharge.SGST">
		                </div>
		            </div>
		            <div class="col-lg-3">
		                <div class="form-group" ng-if="poOtherCharge.state_code !== '33'">
		                  <label for="exampleInputEmail1">IGST</label>
		                  <input type="text" class="form-control" id="chargeIGST" placeholder="Enter IGST" ng-model="poOtherCharge.IGST">
		                </div>
		            </div>
	            </div>
		    </div>
		    <div class="modal-footer">
	        	<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        		<button type="button" class="btn btn-primary" ng-click="addAdditionalChargesAction()">Add</button>
	        </div>
		</div>
	</div>
</div>

<div class="modal fade" id="import_other_details_modal">
	<div class="modal-dialog modal-lg">
	    <div class="modal-content">
		    <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title">Edit Import Other Details</h4>
		    </div>
		    <div class="modal-body">
		    	<div class="row">
			    	<div class="col-lg-3">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Delivery Date</label>
		                  <input type="text" class="form-control" id="import_delivery_date" placeholder="Choose Delivery Date" ng-model="importOtherCharge.delivery_date">
		                </div>
		            </div>
		            <div class="col-lg-3">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Incoterms</label>
		                  <select class="form-control" id="import_incoterms" ng-model="importOtherCharge.incoterms">
		                  	 <option value="">Choose Incoterms</option>
		                  	 <option value="EX-WORKS">EX-WORKS</option>
		                  	 <option value="FOB">FOB</option>
		                  	 <option value="CEAF">CEAF</option>
		                  	 <option value="COURIER">COURIER</option>
		                  	 <option value="EX-FACTORY">EX-FACTORY</option>
		                  </select>
		                </div>
		            </div>
		            <div class="col-lg-3">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Payment Status</label>
		                  <select class="form-control" id="import_payment_status" ng-model="importOtherCharge.payment_status">
		                  	 <option value="">Choose Payment Status</option>
		                  	 <option value="ADVANCE_IT">ADVANCE_IT</option>
		                  	 <option value="TT">TT</option>
		                  	 <option value="CAD">CAD</option>
		                  	 <option value="LC">LC</option>
		                  </select>
		                </div>
		            </div>
		            <div class="col-lg-3">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Shipment</label>
		                  <select class="form-control" id="import_shipment" ng-model="importOtherCharge.Shipment">
		                  	 <option value="">Choose Shipment</option>
		                  	 <option value="BY TNT COURIER `OUR A/C# 20407`">BY TNT COURIER `OUR A/C# 20407`</option>
		                  	 <option value="DHC">DHC</option>
		                  	 <option value="AIR">AIR</option>
		                  	 <option value="SEA">SEA</option>
		                  </select>
		                </div>
		            </div>
	            </div>
		    </div>
		    <div class="modal-footer">
	        	<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        		<button type="button" class="btn btn-primary" ng-click="editImportOtherDetailsAction()">Update</button>
	        </div>
		</div>
	</div>
</div><?php }
}
