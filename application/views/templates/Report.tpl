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
	              <li class="active"><a href="#tab_1" data-toggle="tab" ng-click="addClick()">Report</a></li>
	              <!-- <li><a href="#tab_2" data-toggle="tab">Leather Summary</a></li> -->
	            </ul>
		        <div class="tab-content">
		        	<div class="tab-pane active" id="tab_1">
		        		<div class="box-body">
				         	<div class="row">
			              		<div class="col-lg-3">
			              			<div class="form-group">
					                  <input type="text" class="form-control" placeholder="Choose Date Range" id="datePicker">
					                </div>
			              		</div>
			            		<div class="col-lg-3">
					                <div class="form-group">
					                  	<select class="form-control select2" style="width: 100%;" ng-model="formData['serial_no']" id="serial_no">
					                  		<option value="">Choose Serial No</option>
				                  	    	[[foreach from=$serial_no_unique key=k item=v]]
					                  		<option value="[[$v.serial_no]]">[[$v.serial_no]]</option>
					                  		[[/foreach]]
					                	</select>
					                </div>
					            </div>
					            <div class="col-lg-3">
					                <div class="form-group">
					                  	<select class="form-control" ng-model="formData.leather">
						                  	<option value="">Choose Leather</option>
						                  	[[foreach from=$leather key=k item=v]]
						                  	<option value="[[$v]]">[[$v]]</option>
						                  	[[/foreach]]
						                </select>
					                </div>
					            </div>
					            <div class="col-lg-3">
					                <div class="form-group">
					                  	<select class="form-control" ng-model="formData.query">
						                  	<option value="">Choose Query</option>
						                  	[[foreach from=$query key=k item=v]]
						                  	<option value="[[$v]]">[[$v]]</option>
						                  	[[/foreach]]
						                </select>
					                </div>
					            </div>
					            <div class="col-lg-12 text-center">
					                <div class="form-group">
					                  <input type="button" ng-click="searchDataAction()" class="btn btn-primary" value="Search">
					                </div>
					            </div>
					            <div class="col-lg-3"></div>
					        </div>
					        <div ng-if="searchShow" class="table-responsive">
				                <table id="example" class="table table-bordered table-striped" style="margin-top: 10px;">
				                    <thead>
				                        <tr>
				                          <th>Serial No</th>
				                          <th>Date</th>
				                          <th>Leather</th>
				                          <th>Query</th>
				                          <th>Description</th>
				                          <th>Article</th>
				                          <th>Color</th>
				                          <th>Selection</th>
				                          <th>Pieces</th>
				                          <th>Sq.ft</th>
				                          <th>Remarks</th>
				                        </tr>
				                    </thead>
				                    <tbody>
				                        <tr ng-repeat="x in searchData">
				                          <td>{{x.serial_no}}</td>
				                          <td>{{x.date}}</td>
				                          <td>{{x.leather}}</td>
				                          <td>{{x.query}}</td>
				                          <td>{{x.description_name}}</td>
				                          <td>{{x.article_name}}</td>
				                          <td>{{x.color_name}}</td>
				                          <td>{{x.selection_name}}</td>
				                          <td>{{x.pieces}}</td>
				                          <td>{{x.sqfeet}}</td>
				                          <td>{{x.remarks}}</td>
				                        </tr>
				                    </tbody>
				                </table>
				            </div>
				        </div>
		            </div>
		            <div class="tab-pane" id="tab_2">
		            	<div class="box-body">
				         	<div class="row">
			              		<div class="col-lg-4">
			              			<div class="form-group">
					                  <input type="text" class="form-control" placeholder="Choose Date Range" id="datePicker1">
					                </div>
			              		</div>
					            <div class="col-lg-4">
					                <div class="form-group">
					                  	<select class="form-control" ng-model="formData.leather" id="leather">
						                  	<option value="">Choose Leather</option>
						                  	[[foreach from=$leather key=k item=v]]
						                  	<option value="[[$v]]">[[$v]]</option>
						                  	[[/foreach]]
						                </select>
					                </div>
					            </div>
					            <div class="col-lg-4">
					                <div class="form-group">
					                  	<select class="form-control select2" style="width: 100%;" ng-model="formData.description" id="description" ng-change="clearRedMark('description1')" multiple="multiple">
					                  		<option value="">Choose Description</option>
					                  	    [[foreach from=$description_data key=k item=v]]
						                  		<option value="[[$v.description_id]]">[[$v.description_name]]</option>
						                  	[[/foreach]]
						                </select>
					                </div>
					            </div>
					            <div class="col-lg-12 text-center">
					                <div class="form-group">
					                  <input type="button" ng-click="leatherSummarySearchDataAction()" class="btn btn-primary" value="Download">
					                </div>
					            </div>
					            <div class="col-lg-3"></div>
					        </div>
					    </div>
		            </div>
		      	</div>
	      	</div>
	    </div>
      <!-- /.box -->
    </div>
</section>

