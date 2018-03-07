<section class="content-header">
    <h4>
      	Generate Po
    </h4>
</section>

<!-- Main content -->
<input type="hidden" id="po_number_details" value='[[$po_number_details|@json_encode]]'>
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
				                  	  <option value="Sample">Sample</option>
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
			                  	  	[[foreach from=$supplier_entry key=k item=v]]
				                  		<option value="[[$v.supplier_id]]">[[$v.supplier_name]]</option>
				                  	[[/foreach]]
				                  </select>
				                </div>
				            </div>
				            <div class="col-lg-3">
				                <div class="form-group">
				                  <label for="exampleInputEmail1">Material Name</label>
				                  <select class="form-control select2" style="width: 100%;" id="material_id" ng-model="generatePoData.material_id" ng-change="clearRedMark('material_id')" multiple="multiple">
				                  	<option value="">Choose Material Name</option>
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
			                  	  	[[foreach from=$po_unique_number key=k item=v]]
				                  		<option value="[[$v.unit]]|[[$v.type]]|[[$v.po_number]]|[[$v.full_po_number]]">[[$v.full_po_number]]</option>
				                  	[[/foreach]]
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