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
					                  	  [[foreach from=$supplier_name_details key=k item=v]]
					                  		<option value="[[$v.supplier_id]]">[[$v.supplier_name]]</option>
					                  	  [[/foreach]]
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
                    	<td ng-if="!$last">{{$index+1}}</td>
                    	<td ng-if="$last"></td>
                    	<td></td>
                    	<td>{{x.supplier_name}}</td>
                    	<td>{{x.origin}}</td>
                    	<td>{{x.payment_type}}</td>
                    	<td style="font-weight: bold;">{{x.cheque_amount}}</td>
                    </tr>
                </tbody>
            </table>
    	</div>
    </div>
</section>
