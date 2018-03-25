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
				                  <input type="text" class="form-control" id="order_reference" placeholder="Enter Order Ref" ng-model="generatePoData.order_reference" ng-change="generatePoData.order_reference = generatePoData.order_reference.toUpperCase()">
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
			    	<div class="col-lg-4">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Material Name</label>
		                  <textarea id="material_name" ng-model="poEditFormData.material_name" placeholder="Enter Material Name" cols="30" rows="5" ng-change="poEditFormData.material_name = poEditFormData.material_name.toUpperCase()"></textarea>
		                </div>
		            </div>
		            <div class="col-lg-4">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Quantity</label>
		                  <input type="text" class="form-control" id="quantity" placeholder="Enter Quantity" ng-model="poEditFormData.qty">
		                </div>
		            </div>
		            <div class="col-lg-4">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Price</label>
		                  <input type="text" class="form-control" id="edit_price" placeholder="Enter Price" ng-model="poEditFormData.price">
		                </div>
		            </div>
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
		                  <select class="form-control select2" style="width: 100%;" id="charge_name" ng-model="poOtherCharge.name" ng-change="changeOtherCharges('charge_name')">
		                  	<option value="">Choose Charge Name</option>
	                  	  	<option value="FREIGHT">FREIGHT</option>
	                  	  	<option value="INSURANCE">INSURANCE</option>
	                  	  	<option value="PACKING CHARGES">PACKING CHARGES</option>
	                  	  	<option value="ERECTION CHARGES">ERECTION CHARGES</option>
	                  	  	<option value="INSTALLATION CHARGES">INSTALLATION CHARGES</option>
	                  	  	<option value="FREIGHT AND FORWORDING">FREIGHT AND FORWORDING</option>
	                  	  	<option value="COURIER CHARGES">COURIER CHARGES</option>
	                  	  	<option value="DELIVERY CHARGES">DELIVERY CHARGES</option>
	                  	  	<option value="TRANSPORT CHARGES">TRANSPORT CHARGES</option>
	                  	  	<option value="SERVICE CHARGES">SERVICE CHARGES</option>
	                  	  	<option value="CLEARING AND DOCUMENTS CHARGES">CLEARING AND DOCUMENTS CHARGES</option>
	                  	  	<option value="OTHER">OTHER</option>
		                  </select>
		                </div>
		            </div>
		            <div class="col-lg-3" ng-if="showOtherChargeName">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Other Charge Name</label>
		                  <input type="text" class="form-control" id="otherChargeName" placeholder="Enter Other Charge Name" ng-model="poOtherCharge.other_charge_name">
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
		            <div ng-if="poOtherCharge.type !== 'Sample_Import' && poOtherCharge.type !== 'Import'">
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
		                  <select class="form-control" id="import_incoterms" ng-model="importOtherCharge.incoterms" ng-change="changeImportDetailsShow('incoterms')">
		                  	 <option value="">Choose Incoterms</option>
		                  	 <option value="EX-WORKS">EX-WORKS</option>
		                  	 <option value="FOB">FOB</option>
		                  	 <option value="C & AF">C & AF</option>
		                  	 <option value="COURIER">COURIER</option>
		                  	 <option value="EX-FACTORY">EX-FACTORY</option>
		                  	 <option value="OTHERS">OTHERS</option>
		                  </select>
		                </div>
		            </div>
		            <div class="col-lg-3" ng-if="importDetailsShow.incoterms">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Other Incoterms</label>
		                  <input type="text" class="form-control" id="import_incoterms_other" placeholder="Enter Other Incoterms" ng-model="importOtherCharge.import_incoterms_other">
		                </div>
		            </div>
		            <div class="col-lg-3">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Payment Terms</label>
		                  <select class="form-control" id="import_payment_status" ng-model="importOtherCharge.payment_status" ng-change="changeImportDetailsShow('payment_status')">
		                  	 <option value="">Choose Payment Status</option>
		                  	 <option value="ADVANCE_IT">ADVANCE_IT</option>
		                  	 <option value="TT">TT</option>
		                  	 <option value="CAD">CAD</option>
		                  	 <option value="LC">LC</option>
		                  	 <option value="DA">DA</option>
		                  	 <option value="30% ADVANCE, 40% AFTER 60 DAYS, 30% AFTER 90 DAYS">30% ADVANCE, 40% AFTER 60 DAYS, 30% AFTER 90 DAYS</option>
		                  	 <option value="OTHERS">OTHERS</option>
		                  </select>
		                </div>
		            </div>
		            <div class="col-lg-3" ng-if="importDetailsShow.payment_status">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Other Payment Terms</label>
		                  <input type="text" class="form-control" id="import_payment_status_other" placeholder="Enter Other Payment Terms" ng-model="importOtherCharge.import_payment_status_other">
		                </div>
		            </div>
		            <div class="col-lg-3">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Shipment</label>
		                  <select class="form-control" id="import_shipment" ng-model="importOtherCharge.Shipment" ng-change="changeImportDetailsShow('Shipment')">
		                  	 <option value="">Choose Shipment</option>
		                  	 <option value="BY TNT COURIER `OUR A/C# 20407`">BY TNT COURIER `OUR A/C# 20407`</option>
		                  	 <option value="DHC">DHC</option>
		                  	 <option value="AIR">AIR</option>
		                  	 <option value="SEA">SEA</option>
		                  	 <option value="OTHERS">OTHERS</option>
		                  </select>
		                </div>
		            </div>
		            <div class="col-lg-3" ng-if="importDetailsShow.Shipment">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Other Shipment</label>
		                  <input type="text" class="form-control" id="import_shipment" placeholder="Enter Other Shipment" ng-model="importOtherCharge.Shipment_other">
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
</div>

<div class="modal fade" id="add_purchase_order">
	<div class="modal-dialog">
	    <div class="modal-content">
		    <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title">Add Purchase Order</h4>
		    </div>
		    <div class="modal-body">
		    	<div class="row">
			    	<div class="col-lg-12">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Material Name</label>
		                  <select class="form-control select2_multiple" style="width: 100%;" id="material_id" ng-model="generatePoData.material_id" ng-change="clearRedMark('material_id')" multiple="multiple">
		                  	<!-- <option value="">Choose Material Name</option> -->
		                  	<option ng-repeat="x in materialNameDetails" value="{{x.material_id}}">{{x.material_name}}</option>
		                  </select>
		                </div>
		            </div>
	            </div>
		    </div>
		    <div class="modal-footer">
	        	<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        		<button type="button" class="btn btn-primary" ng-click="addPurchaseOrderAction()">Add</button>
	        </div>
		</div>
	</div>
</div>

<div class="modal fade" id="overall_discount_modal">
	<div class="modal-dialog">
	    <div class="modal-content">
		    <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title">Overall Discount</h4>
		    </div>
		    <div class="modal-body">
		    	<div class="row">
			    	<div class="col-lg-6">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Discount Type</label>
		                  <select class="form-control" id="discount_type" ng-model="overAllDiscountDetails.discount_type">
		                  	 <option value="">Choose Discount Type</option>
		                  	 <option value="Percentage">Percentage</option>
		                  	 <option value="Amount">Amount</option>
		                  </select>
		                </div>
		            </div>
		            <div class="col-lg-6">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Discount</label>
		                  <input type="text" id="overall_discount" ng-model="overAllDiscountDetails.discount" class="form-control">
		                </div>
		            </div>
	            </div>
		    </div>
		    <div class="modal-footer">
	        	<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        		<button type="button" class="btn btn-primary" ng-click="addOverAllDiscountAction()">Add</button>
	        </div>
		</div>
	</div>
</div>