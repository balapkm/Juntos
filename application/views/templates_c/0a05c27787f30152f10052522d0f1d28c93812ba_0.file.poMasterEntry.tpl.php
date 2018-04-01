<?php
/* Smarty version 3.1.30, created on 2018-04-01 23:01:20
  from "/home/Staging/workSpace/Juntos/application/views/templates/poMasterEntry.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ac11768463329_71022481',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0a05c27787f30152f10052522d0f1d28c93812ba' => 
    array (
      0 => '/home/Staging/workSpace/Juntos/application/views/templates/poMasterEntry.tpl',
      1 => 1522603874,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ac11768463329_71022481 (Smarty_Internal_Template $_smarty_tpl) {
?>
<section class="content-header">
    <h4>
      	Master Entry
    </h4>
</section>
<!-- Main content -->
<section class="content">
	<div class="row">
        <div class="col-md-12">
          <!-- Custom Tabs -->
          	<div class="nav-tabs-custom">
	            <ul class="nav nav-tabs">
	              <li class="active"><a href="#tab_1" data-toggle="tab">Supplier Entry</a></li>
	              <li><a href="#tab_2" data-toggle="tab">Material Entry</a></li>
	              <li><a href="#tab_3" data-toggle="tab">UOF Entry</a></li>
	              <li><a href="#tab_4" data-toggle="tab">Material Master</a></li>
	              <li><a href="#tab_5" data-toggle="tab">Other Master</a></li>
	            </ul>
	            <div class="tab-content">
	              	<div class="tab-pane active" id="tab_1">
				        <div class="row">
				        	<div class="col-lg-12">
				        		<div class="form-group pull-right">
				                  <input type="button" class="btn btn-success" value="ADD" ng-click="add_supplier()">
				                </div>
				        	</div>
				        	<div class="col-lg-12">
				        		<div class="table-responsive">
					                <table style="margin-top: 10px;" class="table table-bordered table-striped" id="supplier_table">
					                    <thead>
					                        <tr>
					                          <th>Supplier Name</th>
					                          <th>Alter.Supplier Name</th>
					                          <th>Supplier Addr</th>
					                          <th>Alter.Supplier Addr</th>
					                          <th>Supplier Code</th>
					                          <th>Origin</th>
					                          <th>Contact No</th>
					                          <th>Email Id</th>
					                          <th>GST No</th>
					                          <th>State Code</th>
					                          <th>Supplier tax</th>
					                          <th>Status</th>
					                          <th>Bank Details</th>
					                          <th>Edit</th>
					                          <!-- <th>Delete</th> -->
					                        </tr>
					                    </thead>
					                    <tbody>
					                    	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['supplier_entry']->value, 'v', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
?>
					                        <tr>
					                          <td><?php echo $_smarty_tpl->tpl_vars['v']->value['supplier_name'];?>
</td>
					                          <td><?php echo $_smarty_tpl->tpl_vars['v']->value['alt_supplier_name'];?>
</td>
					                          <td><?php echo $_smarty_tpl->tpl_vars['v']->value['supplier_address'];?>
</td>
					                          <td><?php echo $_smarty_tpl->tpl_vars['v']->value['alt_supplier_address'];?>
</td>
					                          <td><?php echo $_smarty_tpl->tpl_vars['v']->value['supplier_code'];?>
</td>
					                          <td><?php echo $_smarty_tpl->tpl_vars['v']->value['origin'];?>
</td>
					                          <td><?php echo $_smarty_tpl->tpl_vars['v']->value['contact_no'];?>
</td>
					                          <td><?php echo $_smarty_tpl->tpl_vars['v']->value['email_id'];?>
</td>
					                          <td><?php echo $_smarty_tpl->tpl_vars['v']->value['gst_no'];?>
</td>
					                          <td><?php echo $_smarty_tpl->tpl_vars['v']->value['state_code'];?>
</td>
					                          <td><?php echo $_smarty_tpl->tpl_vars['v']->value['supplier_tax_status'];?>
</td>
					                          <td><?php echo $_smarty_tpl->tpl_vars['v']->value['supplier_status'];?>
</td>
					                          <td><?php echo $_smarty_tpl->tpl_vars['v']->value['bank_details'];?>
</td>
					                          <td><button class="btn btn-primary btn-sm" onclick='supplierEditClick(<?php echo json_encode($_smarty_tpl->tpl_vars['v']->value);?>
)'>Edit</button>
					                          </td>
			                          		  <!-- <td><button class="btn btn-primary btn-sm" onclick='supplierDeleteClick(<?php echo json_encode($_smarty_tpl->tpl_vars['v']->value);?>
)'>Delete</button></td> -->
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
	              	<div class="tab-pane" id="tab_2">
				        <div class="row">
				        	<div class="col-lg-12">
				        		<div class="form-group pull-right">
				                  <input type="button" class="btn btn-success" value="ADD" ng-click="add_material_click()">
				                </div>
				        	</div>
				        	<div class="col-lg-12">
				        		<div class="table-responsive">
					                <table style="margin-top: 10px;" class="table table-bordered table-striped" id="material_table">
					                    <thead>
					                        <tr>
					                          <th>Supplier Name</th>
					                          <th>Material Name</th>
					                          <th>HSN Code</th>
					                          <th>UOF</th>
					                          <th>Group</th>
					                          <th>Currency</th>
					                          <th>Price</th>
					                          <th>Price Status</th>
					                          <th>CGST</th>
					                          <th>SGST</th>
					                          <th>IGST</th>
					                          <th>Discount Price Status</th>
					                          <th>Discount</th>
					                          <th>Edit</th>
					                          <th>Delete</th>
					                        </tr>
					                    </thead>
					                    <tbody>
					                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['material_entry']->value, 'v', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
?>
						                        <tr>
						                          <td><?php echo $_smarty_tpl->tpl_vars['v']->value['supplier_name'];?>
</td>
						                          <td><?php echo $_smarty_tpl->tpl_vars['v']->value['material_master_name'];?>
</td>
						                          <td><?php echo $_smarty_tpl->tpl_vars['v']->value['material_hsn_code'];?>
</td>
						                          <td><?php echo $_smarty_tpl->tpl_vars['v']->value['material_uom'];?>
</td>
						                          <td><?php echo $_smarty_tpl->tpl_vars['v']->value['group'];?>
</td>
						                          <td><?php echo $_smarty_tpl->tpl_vars['v']->value['currency'];?>
</td>
						                          <td><?php echo $_smarty_tpl->tpl_vars['v']->value['price'];?>
</td>
						                          <td><?php echo $_smarty_tpl->tpl_vars['v']->value['price_status'];?>
</td>
						                          <td><?php echo $_smarty_tpl->tpl_vars['v']->value['CGST'];?>
</td>
						                          <td><?php echo $_smarty_tpl->tpl_vars['v']->value['SGST'];?>
</td>
						                          <td><?php echo $_smarty_tpl->tpl_vars['v']->value['IGST'];?>
</td>
						                          <td><?php echo $_smarty_tpl->tpl_vars['v']->value['discount_price_status'];?>
</td>
						                          <td><?php echo $_smarty_tpl->tpl_vars['v']->value['discount'];?>
</td>
						                          <td><button class="btn btn-primary btn-sm" onclick='materialEditClick(<?php echo json_encode($_smarty_tpl->tpl_vars['v']->value);?>
)'>Edit</button>
						                          </td>
				                          		  <td><button class="btn btn-primary btn-sm" onclick='materialDeleteClick(<?php echo json_encode($_smarty_tpl->tpl_vars['v']->value);?>
)'>Delete</button></td>
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
	              	<div class="tab-pane" id="tab_3">
				        <div class="row">
				        	<div class="col-lg-12">
				        		<div class="form-group pull-right">
				                  <input type="button" class="btn btn-success" value="ADD" ng-click="addUof()">
				                </div>
				        	</div>
				        	<div class="col-lg-12">
				        		<div class="table-responsive">
					                <table style="margin-top: 10px;" class="table table-bordered table-striped" id="supplier_table">
					                    <thead>
					                        <tr>
					                          <th>Uof Id</th>
					                          <th>Uof Name</th>
					                          <th>Edit</th>
					                          <th>Delete</th>
					                        </tr>
					                    </thead>
					                    <tbody>
					                    	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['unit_of_measurement']->value, 'v', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
?>
					                        <tr>
					                          <td><?php echo $_smarty_tpl->tpl_vars['k']->value+1;?>
</td>
					                          <td><?php echo $_smarty_tpl->tpl_vars['v']->value['uof_name'];?>
</td>
					                          <td><button class="btn btn-primary btn-sm" onclick='uofEditClick(<?php echo json_encode($_smarty_tpl->tpl_vars['v']->value);?>
)'>Edit</button></td>
			                          		  <td><button class="btn btn-primary btn-sm" onclick='uofDeleteClick(<?php echo json_encode($_smarty_tpl->tpl_vars['v']->value);?>
)'>Delete</button></td>
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
	              	<div class="tab-pane" id="tab_4">
				        <div class="row">
				        	<div class="col-lg-12">
				        		<div class="form-group pull-right">
				                  <input type="button" class="btn btn-success" value="ADD" ng-click="addMaterialMaster()">
				                </div>
				        	</div>
				        	<div class="col-lg-12">
				        		<div class="table-responsive">
					                <table style="margin-top: 10px;" class="table table-bordered table-striped" id="supplier_table">
					                    <thead>
					                        <tr>
					                          <th>Master Id</th>
					                          <th>Master Name</th>
					                          <th>Edit</th>
					                          <th>Delete</th>
					                        </tr>
					                    </thead>
					                    <tbody>
					                    	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['material_master_details']->value, 'v', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
?>
					                        <tr>
					                          <td><?php echo $_smarty_tpl->tpl_vars['k']->value+1;?>
</td>
					                          <td><?php echo $_smarty_tpl->tpl_vars['v']->value['material_name'];?>
</td>
					                          <td><button class="btn btn-primary btn-sm" onclick='materialMasterEditClick(<?php echo json_encode($_smarty_tpl->tpl_vars['v']->value);?>
)'>Edit</button></td>
			                          		  <td><button class="btn btn-primary btn-sm" onclick='materialMasterDeleteClick(<?php echo json_encode($_smarty_tpl->tpl_vars['v']->value);?>
)'>Delete</button></td>
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
	              	<div class="tab-pane" id="tab_5">
				        <div class="row">
				        	<div class="col-lg-4"></div>
				        	<div class="col-lg-4 text-center" >
				        		<select class="form-control" id="other_type" ng-model="otherTypeValue" ng-change="otherTypeValueChange()">
				        			<option value="">Choose Other Type</option>
				        			<option value="GROUP">GROUP</option>
				        		</select>
				        	</div>
				        	<div class="col-lg-12" ng-if="otherTypeValueShow">
				        		<div class="form-group pull-right" style="margin-top: 10px;">
				                  <input type="button" class="btn btn-success" value="ADD" ng-click="addOtherMasterClick()">
				                </div>
				        	</div>
				        	<div class="col-lg-12" ng-if="otherTypeValueShow">
				        		<div class="table-responsive">
					                <table style="margin-top: 10px;" class="table table-bordered table-striped" id="other_master_id">
					                    <thead>
					                        <tr>
					                          <th>S.No</th>
					                          <th>Name</th>
					                          <th>Edit</th>
					                          <th>Delete</th>
					                        </tr>
					                    </thead>
					                    <tbody>
					                        <tr  ng-repeat="x in otherTypeArray">
					                          <td>{{$index+1}}</td>
					                          <td>{{x.name}}</td>
					                          <td><button class="btn btn-primary btn-sm" ng-click="editOtherMasterClick(x)">Edit</button></td>
			                          		  <td><button class="btn btn-primary btn-sm" ng-click="deleteOtherMasterClickAction(x)">Delete</button></td>
					                        </tr>
					                    </tbody>
					                </table>
					            </div>
				            </div>
				        </div>
	              	</div>
	            </div>
        	</div>
   		</div>
   	</div>
</section>

<div class="modal fade" id="supplier_modal">
	<div class="modal-dialog modal-lg">
	    <div class="modal-content">
		    <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title">{{supplier_modal.title}}</h4>
		    </div>
		    <div class="modal-body">
		        <div class="row">
            		<div class="col-lg-3">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Supplier Name</label>
		                  <input type="text" class="form-control" id="supplier_name" placeholder="Enter Supplier Name" ng-model="supplier_form_data.supplier_name">
		                </div>
		            </div>
		            <div class="col-lg-3">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Supplier Code</label>
		                  <input type="text" class="form-control" id="supplier_code" placeholder="Enter Supplier Code" ng-model="supplier_form_data.supplier_code">
		                </div>
		            </div>
		            <div class="col-lg-3">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Alternative Supplier Name</label>
		                  <input type="text" class="form-control" id="alt_supplier_name" placeholder="Enter Alternative Supplier Name" ng-model="supplier_form_data.alt_supplier_name">
		                </div>
		            </div>
		            <div class="col-lg-3">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Origin</label>
		                  <input type="text" class="form-control" id="origin" placeholder="Enter Origin" ng-model="supplier_form_data.origin">
		                </div>
		            </div>
		            <div class="col-lg-3">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Contact No</label>
		                  <input type="text" class="form-control" id="contact_no" placeholder="Enter Contact No" ng-model="supplier_form_data.contact_no">
		                </div>
		            </div>
		            <div class="col-lg-3">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Email Id</label>
		                  <input type="text" class="form-control" id="email_id" placeholder="Enter Mail Id" ng-model="supplier_form_data.email_id">
		                </div>
		            </div>
		            <div class="col-lg-3">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">GST No</label>
		                  <input type="text" class="form-control" id="gst_no" placeholder="Enter GST No" ng-model="supplier_form_data.gst_no">
		                </div>
		            </div>
		            <div class="col-lg-3">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">State Code</label>
		                  <input type="text" class="form-control" id="state_code" placeholder="Enter State Code" ng-model="supplier_form_data.state_code">
		                </div>
		            </div>
		            <div class="col-lg-3">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Supplier tax Status</label>
		                  <select class="form-control" id="supplier_tax_status" ng-model="supplier_form_data.supplier_tax_status">
		                  	  <option value="">Choose Supplier Tax Status</option>
		                  	  <option value="TAX">Tax</option>
		                  	  <option value="NON_TAX">Non Tax</option>
		                  </select>
		                </div>
		            </div>
		            <div class="col-lg-3">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Supplier Status</label>
		                  <select class="form-control" id="supplier_status" ng-model="supplier_form_data.supplier_status">
		                  	  <option value="">Choose Supplier Status</option>
		                  	  <option value="REGISTERED">Registered</option>
		                  	  <option value="UNREGISTERED">Unregistered</option>
		                  	  <option value="IMPORT">Import</option>
		                  </select>
		                </div>
		            </div>
		            <div class="col-lg-3">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Supplier Address</label>
		                  <textarea id="supplier_address" class="form-control" placeholder="Enter Supplier Address" ng-model="supplier_form_data.supplier_address" style="height: 40px;"></textarea>
		                </div>
		            </div>
		            <div class="col-lg-3">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Alternative Supplier Address</label>
		                  <textarea id="alt_supplier_address" class="form-control" placeholder="Enter Alternative Supplier Address" ng-model="supplier_form_data.alt_supplier_address"></textarea>
		                </div>
		            </div>
		            <div class="col-lg-3">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Bank Details</label>
		                  <textarea id="bank_details" class="form-control" placeholder="Enter Bank Details" ng-model="supplier_form_data.bank_details"></textarea>
		                </div>
		            </div>
		        </div>
		    </div>
	        <div class="modal-footer">
	        	<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        		<button type="button" ng-if="supplier_modal.button==='Add'" class="btn btn-primary" ng-click="add_supplier_action()">{{supplier_modal.button}}</button>
        		<button type="button" ng-if="supplier_modal.button==='Update'" class="btn btn-primary" ng-click="update_supplier_action()">{{supplier_modal.button}}</button>
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
		        <h4 class="modal-title">{{material_modal.title}}</h4>
		    </div>
		    <div class="modal-body">
		        <div class="row">
            		<div class="col-lg-3">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Supplier Name</label>
		                  <select id="supplier_name_select2" ng-model="material_form_data.supplier_id" class="form-control select2" style="width: 100%;" ng-change="clearRedMark('supplier_name_select2')">
		                  	   <option value="">Choose Supplier Name</option>
		                  	   <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['supplier_entry']->value, 'v', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
?>
			                  		<option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['supplier_id'];?>
|<?php echo $_smarty_tpl->tpl_vars['v']->value['state_code'];?>
|<?php echo $_smarty_tpl->tpl_vars['v']->value['supplier_status'];?>
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
		            <div class="col-lg-6">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Material Name</label>
		                  <select id="material_name_select2" ng-model="material_form_data.material_name" class="form-control select2" style="width: 100%;" ng-change="changeMaterialNameDetails('material_name_select2')">
		                  	   <option value="">Choose Material Name</option>
		                  	   <option value="ADD_NEW">ADD NEW</option>
		                  	   <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['material_master_details']->value, 'v', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
?>
			                  		<option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['material_name'];?>
|<?php echo $_smarty_tpl->tpl_vars['v']->value['material_id'];?>
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
		            <div class="col-lg-3" ng-if="addNewMaterialNameInput">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">New Material Name</label>
		                  <input type="text" ng-model="material_form_data.add_material_name" class="form-control" id="add_material_name" placeholder="Enter New Material Name">
		                </div>
		            </div>
		            <div class="col-lg-3">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Material HSN Code</label>
		                  <input type="text" class="form-control" id="material_hsn_code" placeholder="Enter Material HSN Code" ng-model="material_form_data.material_hsn_code" >
		                </div>
		            </div>
		            <div class="col-lg-3">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Currency</label>
		                  <input type="text" class="form-control"  ng-model="material_form_data.currency"  id="currency" placeholder="Enter Currency">
		                </div>
		            </div>
		            <div class="col-lg-3">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Group</label>
		                  <select ng-model="material_form_data.group"  id="group" class="form-control select2" style="width: 100%;" ng-change="clearRedMark('group')">
		                  	   <option value="">Choose Group</option>
		                  	   <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['group_master_details']->value, 'v', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
?>
			                  		<option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</option>
			                  	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

		                  </select>
		                </div>
		            </div>
		            <!-- <div class="col-lg-3">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Group</label>
		                  <input type="text" class="form-control"  ng-model="material_form_data.group"  id="group" placeholder="Enter Group">
		                </div>
		            </div> -->
		            <div class="col-lg-3">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Unit Of Measurement</label>
		                  <select id="material_uom" ng-model="material_form_data.material_uom" class="form-control select2" style="width: 100%;" ng-change="clearRedMark('material_uom')">
		                  	   <option value="">Choose UOM</option>
		                  	   <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['unit_of_measurement']->value, 'v', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
?>
			                  		<option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['uof_name'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['uof_name'];?>
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
		                  <label for="exampleInputEmail1">Price Status</label>
		                  <select class="form-control" id="price_status" ng-model="material_form_data.price_status"> 
		                  	 <option value="">Choose Price Status</option>
		                  	 <option value="FINAL">Final</option>
		                  	 <option value="APPROX">Approx</option>
		                  </select>
		                </div>
		            </div>
		            <div class="col-lg-3">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Price</label>
		                  <input type="text" class="form-control" ng-model="material_form_data.price"  id="price" placeholder="Enter Price">
		                </div>
		            </div>
		            <div class="col-lg-3" ng-if="!showGst">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">IGST</label>
		                  <input type="text" ng-model="material_form_data.IGST" class="form-control" id="IGST" placeholder="Enter IGST">
		                </div>
		            </div>
		            <div class="col-lg-3" ng-if="showGst">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">CGST</label>
		                  <input type="text" class="form-control" ng-model="material_form_data.CGST"  id="CGST" placeholder="Enter CGST">
		                </div>
		            </div>
		            <div class="col-lg-3" ng-if="showGst">
		                <div class="form-group">
		                  <label for="exampleInputEmail1" >SGST</label>
		                  <input type="text" class="form-control" ng-model="material_form_data.SGST" id="SGST" placeholder="Enter SGST">
		                </div>
		            </div>
		            <div class="col-lg-3">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Discount Price Status</label>
		                  <select class="form-control" id="discount_price_status" ng-model="material_form_data.discount_price_status">
		                  	 <option value="">Choose Discount Price Status</option>
		                  	 <option value="PERCENTAGE">Percentage</option>
		                  	 <option value="AMOUNT">Amount</option>
		                  </select>
		                </div>
		            </div>
		            <div class="col-lg-3">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Discount</label>
		                  <input type="text" ng-model="material_form_data.discount" class="form-control" id="discount" placeholder="Enter Discount">
		                </div>
		            </div>
		        </div>
		    </div>
	        <div class="modal-footer">
	        	<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        		<button type="button" ng-if="material_modal.button==='Add'" class="btn btn-primary" ng-click="add_material_action()">{{material_modal.button}}</button>
        		<button type="button" ng-if="material_modal.button==='Update'" class="btn btn-primary" ng-click="update_material_action()">{{material_modal.button}}</button>
	        </div>
	    </div>
	    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="add_uof_modal">
	<div class="modal-dialog">
	    <div class="modal-content">
		    <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title">{{uof_modal.title}}</h4>
		    </div>
		    <div class="modal-body">
		    	<div class="row">
			    	<div class="col-lg-12">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">UOF Name</label>
		                  <input type="text" id="uof_name" class="form-control" ng-model="uof_name">
		                </div>
		            </div>
	            </div>
		    </div>
		    <div class="modal-footer">
        		<button type="button" ng-if="uof_modal.button==='Add'" class="btn btn-primary" ng-click="addUofAction()">{{uof_modal.button}}</button>
        		<button type="button" ng-if="uof_modal.button==='Update'" class="btn btn-primary" ng-click="uofEditClickAction()">{{uof_modal.button}}</button>
	        </div>
		</div>
	</div>
</div>

<div class="modal fade" id="add_material_master_modal">
	<div class="modal-dialog">
	    <div class="modal-content">
		    <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title">{{add_material_master_modal.title}}</h4>
		    </div>
		    <div class="modal-body">
		    	<div class="row">
			    	<div class="col-lg-12">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Material Name</label>
		                  <input type="text" id="material_master_name" class="form-control" ng-model="material_master_name">
		                </div>
		            </div>
	            </div>
		    </div>
		    <div class="modal-footer">
        		<button type="button" ng-if="add_material_master_modal.button==='Add'" class="btn btn-primary" ng-click="addMaterialMasterAction()">{{add_material_master_modal.button}}</button>
        		<button type="button" ng-if="add_material_master_modal.button==='Update'" class="btn btn-primary" ng-click="materialMasterEditClickAction()">{{add_material_master_modal.button}}</button>
	        </div>
		</div>
	</div>
</div>

<div class="modal fade" id="other_master_modal">
	<div class="modal-dialog">
	    <div class="modal-content">
		    <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title">{{otherMasterModal.title}}</h4>
		    </div>
		    <div class="modal-body">
		    	<div class="row">
			    	<div class="col-lg-12">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Name</label>
		                  <input type="text" id="other_master_name" class="form-control" ng-model="other_master_name" ng-change="other_master_name = other_master_name.toUpperCase()">
		                </div>
		            </div>
	            </div>
		    </div>
		    <div class="modal-footer">
        		<button type="button" ng-if="otherMasterModal.button==='Add'" class="btn btn-primary" ng-click="addOtherMasterClickAction()">{{otherMasterModal.button}}</button>
        		<button type="button" ng-if="otherMasterModal.button==='Update'" class="btn btn-primary" ng-click="editOtherMasterClickAction()">{{otherMasterModal.button}}</button>
	        </div>
		</div>
	</div>
</div><?php }
}
