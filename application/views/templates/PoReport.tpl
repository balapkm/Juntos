<section class="content-header">
  <h1>
    Reports
  </h1>
</section>
<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="nav-tabs-custom">
	            <ul class="nav nav-tabs">
	              <li class="active"><a href="#tab_1" data-toggle="tab">Purchase Order</a></li>
	            </ul>
		        <div class="tab-content">
		        	<div class="tab-pane active" id="tab_1">
		        		<div class="box-body">
				         	<div class="row">
			              		<div class="col-lg-4">
					                <div class="form-group">
					                  <label for="exampleInputPassword1">Report type</label>
					                  <select class="form-control" ng-change="chageReportType()" ng-model="po_report.report_type">
			              				<option value="report_1">Po Wise</option>
			              				<option value="report_2">Material Wise</option>
			              				<option value="report_3">Supplier Wise</option>
			              				<option value="report_4">Order Ref Wise</option>
			              				<option value="report_5">Tax Wise</option>
			              			  </select>
					                </div>
					            </div>
			              		<div class="col-lg-4" ng-if="po_report_show.division">
					                <div class="form-group" >
					                  <label for="exampleInputPassword1">Division</label>
					                  <select class="form-control" ng-model="po_report.division" id="division">
			              				<option value="">Choose Division</option>
			              				<option value="UPPER">UPPER</option>
			              				<option value="FULL SHOE">FULL SHOE</option>
			              				<option value="SOLE">SOLE</option>
			              			  </select>
					                </div>
					            </div>
			              		<div class="col-lg-4" ng-if="po_report_show.type">
					                <div class="form-group">
					                  <label for="exampleInputPassword1">type</label>
					                  <select class="form-control" ng-model="po_report.type" id="type">
			              				<option value="">Choose Type</option>
			              				<option value="IMPORT">IMPORT</option>
			              				<option value="INDIGENOUS">INDIGENOUS</option>
			              				<option value="SAMPLE IMPORT">SAMPLE IMPORT</option>
			              				<option value="SAMPLE INDIGENOUS">SAMPLE INDIGENOUS</option>
			              			  </select>
					                </div>
					            </div>
					            <div class="col-lg-4" ng-if="po_report_show.date_range">
					                <div class="form-group">
					                  <label for="exampleInputPassword1">Date</label>
					                  <input type="text" class="form-control" placeholder="Choose Date Range" id="datePicker">
					                </div>
					            </div>
					            <div class="col-lg-4" ng-if="po_report_show.material_id">
					                <div class="form-group">
					                	<label for="exampleInputPassword1">Material Name</label>
					                  	<select class="form-control select2" style="width: 100%;" ng-model="po_report.material_id" id="material_id">
					                  		<option value="">Choose Material Name</option>
				                  	    	[[foreach from=$material_name_details key=k item=v]]
					                  		<option value="[[$v.material_id]]">[[$v.material_name]]</option>
					                  	  	[[/foreach]]
					                	</select>
					                </div>
					            </div>
					            <div class="col-lg-4"  ng-if="po_report_show.supplier_id">
					                <div class="form-group">
					                  <label for="exampleInputEmail1">Supplier Name</label>
					                  <select class="form-control select2" style="width: 100%;" id="supplier_id" ng-model="po_report.supplier_id">
					                  	  <option value="">Choose Supplier Name</option>
					                  	  [[foreach from=$supplier_name_details key=k item=v]]
					                  		<option value="[[$v.supplier_id]]">[[$v.supplier_name]]</option>
					                  	  [[/foreach]]
					                  </select>
					                </div>
					            </div>
					            <div class="col-lg-4" ng-if="po_report_show.order_ref">
					                <div class="form-group">
					                  <label for="exampleInputPassword1">Order Reference</label>
					                  <input type="text" class="form-control" placeholder="Enter Order Reference" id="order_ref" ng-model="po_report.order_ref">
					                </div>
					            </div>
					            <div class="col-lg-4"  ng-if="po_report_show.tax_type">
					                <div class="form-group">
					                  <label for="exampleInputEmail1">Tax Type</label>
					                  <select class="form-control select2" style="width: 100%;" id="tax_type" ng-model="po_report.tax_type">
					                  	  <option value="">Choose Tax Type</option>
					                  	  <option value="CGST">CGST</option>
					                  	  <option value="SGST">SGST</option>
					                  	  <option value="IGST">IGST</option>
					                  </select>
					                </div>
					            </div>
					            <div class="col-lg-4" ng-if="po_report_show.tax_type">
					                <div class="form-group">
					                  <label for="exampleInputPassword1">Tax Percentage</label>
					                  <input type="text" class="form-control" placeholder="Enter Tax Percentage" id="tax_perc" ng-model="po_report.tax_perc">
					                </div>
					            </div>
					        </div>
					        <div class="row">
					        	<div class="col-lg-12 text-center">
					                <div class="form-group">
					                  <input type="button" ng-click="poDownloadAction()" class="btn btn-primary" value="Download">
					                </div>
					            </div>
					        </div>
				        </div>
		            </div>
		      	</div>
	      	</div>
	    </div>
      <!-- /.box -->
    </div>
</section>

