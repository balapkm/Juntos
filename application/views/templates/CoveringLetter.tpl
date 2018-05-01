<section class="content-header">
  <h4>
  	Covering Letter
   </h4>
</section>
<!-- Main content -->
<section class="content">
	<div class="row">
        <div class="col-md-12">
          <!-- Custom Tabs -->
          	<div class="nav-tabs-custom">
	            <ul class="nav nav-tabs">
	              <li class="active"><a href="#tab_1" data-toggle="tab">Letter</a></li>
	            </ul>
	            <div class="tab-content">
	              	<div class="tab-pane active" id="tab_1">
	              		<div class="row">
				            <!-- Supplier Wise -->
			            	<div class="col-lg-3"></div>
				            <div class="col-lg-3">
				                <div class="form-group">
				                  <label for="exampleInputEmail1">Payable Date</label>
				                  <input type="text" ng-model="coveringLetterObject.payment_statement_date" class="form-control" id="payment_statement_date" placeholder="Choose Payable Date">
				                </div>
				            </div>
			                <div class="col-lg-3">
				                <div class="form-group">
				                  <label for="exampleInputEmail1">Supplier Name</label>
				                  <select class="form-control select2" style="width: 100%;" id="payment_statement_supplier_id" ng-model="coveringLetterObject.payment_statement_supplier_id" ng-change="clearRedMark('payment_statement_supplier_id')">
				                  	  <option value="">Choose Supplier Name</option>
				                  	  [[foreach from=$supplier_name_details key=k item=v]]
				                  		<option value="[[$v.supplier_id]]">[[$v.supplier_name]]</option>
				                  	  [[/foreach]]
				                  </select>
				                </div>
				            </div>
				            <div class="col-lg-3"></div>
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
	<div class="row" id="showCoveringLetterSearch" style="margin-top: 50px;">
    	
    </div>
</section>
