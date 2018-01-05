<section class="content-header">
  <h1>
    Data Entry
  </h1>
</section>
<!-- Main content -->
<section class="content">
	<div class="row">
        <div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab" ng-click="addClick()">Add New</a></li>
              <li><a href="#tab_2" data-toggle="tab">Update Existing</a></li>
              <!-- <li><a href="#tab_3" data-toggle="tab">View</a></li> -->
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                <form role="form">
		            <div class="box-body">
		            	<div class="row">
		            		<div class="col-lg-3">
				                <div class="form-group">
				                  <label for="exampleInputEmail1">Serial No</label>
				                  <input type="text" class="form-control" id="serial_no" placeholder="Enter Serial No" disabled="disabled" value="[[$highest_serial_no]]">
				                </div>
				            </div>
				            <div class="col-lg-3">
				                <div class="form-group">
				                  <label for="exampleInputPassword1">Date</label>
				                  <input type="text" class="form-control" id="datePicker" placeholder="Choose Date" tabindex="1">
				                </div>
				            </div>
				            <div class="col-lg-3">
				                <div class="form-group">
				                  <label for="exampleInputEmail1">Leather</label>
				                  <select class="form-control" ng-model="formData.leather" id="leather" tabindex="2">
				                  	<option value="">Choose Leather</option>
				                  	[[foreach from=$leather key=k item=v]]
				                  	<option value="[[$v]]">[[$v]]</option>
				                  	[[/foreach]]
				                  </select>
				                </div>
				            </div>
				            <div class="col-lg-3">
				                <div class="form-group">
				                  <label for="exampleInputPassword1">Query</label>
				                  <select class="form-control" ng-model="formData.query" id="query" tabindex="3">
				                  	<option value="">Choose Query</option>
				                  	[[foreach from=$query key=k item=v]]
				                  	<option value="[[$v]]">[[$v]]</option>
				                  	[[/foreach]]
				                  </select>
				                </div>
				            </div>
				            <div class="col-lg-3">
				                <div class="form-group">
				                  	<label for="exampleInputPassword1">Description</label>
				                  	<select class="form-control select2" style="width: 100%;" ng-model="formData.description" id="description" ng-change="clearRedMark('description')" tabindex="4">
				                  		<option value="">Choose Description</option>
				                  	    [[foreach from=$description_data key=k item=v]]
					                  		<option value="[[$v.description_id]]">[[$v.description_name]]</option>
					                  	[[/foreach]]
					                </select>
				                </div>
				            </div>
				            <div class="col-lg-3">
				                <div class="form-group">
				                  <label for="exampleInputPassword1">Article</label>
				                  	<select class="form-control select2" style="width: 100%;" ng-model="formData.article" id="article" ng-change="clearRedMark('article')" tabindex="5">
					                  	<option value="">Choose Article</option>
				                  	    [[foreach from=$article_data key=k item=v]]
					                  		<option value="[[$v.article_id]]">[[$v.article_name]]</option>
					                  	[[/foreach]]
					                </select>
				                </div>
				            </div>
				            <div class="col-lg-3">
				                <div class="form-group">
				                  <label for="exampleInputPassword1">Color</label>
				                  	<select class="form-control select2" style="width: 100%;" ng-model="formData.color" id="color" ng-change="clearRedMark('color')" tabindex="6">
					                  	<option value="">Choose Color</option>
				                  	    [[foreach from=$color_data key=k item=v]]
					                  		<option value="[[$v.color_id]]">[[$v.color_name]]</option>
					                  	[[/foreach]]
					                </select>
				                </div>
				            </div>
				            <div class="col-lg-3">
				                <div class="form-group">
				                  <label for="exampleInputPassword1">Selection</label>
				                  	<select class="form-control select2" style="width: 100%;" ng-model="formData.selection" id="selection" ng-change="clearRedMark('selection')" tabindex="7">
					                  	<option value="">Choose Selection</option>
				                  	    [[foreach from=$selection_data key=k item=v]]
					                  		<option value="[[$v.selection_id]]">[[$v.selection_name]]</option>
					                  	[[/foreach]]
					                </select>
				                </div>
				            </div>
				            <div class="col-lg-3">
				                <div class="form-group">
				                  <label for="exampleInputPassword1">Pieces</label>
				                  <input type="text" class="form-control" id="pieces" placeholder="Enter Pieces" ng-model="formData.pieces" tabindex="8">
				                </div>
				            </div>
				            <div class="col-lg-3">
				                <div class="form-group">
				                  <label for="exampleInputPassword1">Sq.ft</label>
				                  <input type="text" class="form-control" id="sqfeet" placeholder="Enter Sq.ft" ng-model="formData.sqfeet" tabindex="9">
				                </div>
				            </div>
				            <div class="col-lg-3">
				                <div class="form-group">
				                  <label for="exampleInputPassword1">Remark</label>
				                  <textarea class="form-control" id="remarks" ng-model="formData.remarks" tabindex="10"></textarea>
				                </div>
				            </div>
				            <div class="col-lg-12 text-center">
				            	<button type="submit" class="btn btn-primary" ng-click="addAction()" tabindex="11">Add</button>
				            </div>
			            </div>
			            <hr/>
			            <div class="row">
				        	<div class="col-lg-12" id="addTableData">
				                
				            </div>
			        	</div>
		            </div>
	              	<!-- /.box-body -->
	              	<!-- <div class="box-footer text-center">
	                	<button type="submit" class="btn btn-primary" ng-click="addAction()">Add</button>
	              	</div> -->
	            </form>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
              	<div class="row" style="margin-top: 10px;">
              		<div class="col-lg-2"></div>
              		<div class="col-lg-3">
              			<div class="form-group">
		                  	<input type="text" id="datePicker3" placeholder="Choose Year" class="form-control" value="">
		                </div>
              		</div>
            		<div class="col-lg-3">
		                <div class="form-group">
		                  	<select class="form-control select2" style="width: 100%;" ng-model="formData['serial_no_1']" id="serial_no_1">
			                  	<option value="">Choose Serial No</option>
		                  	    [[foreach from=$serial_no_unique key=k item=v]]
			                  		<option value="[[$v.serial_no]]">[[$v.serial_no]]</option>
			                  	[[/foreach]]
			                </select>
		                </div>
		            </div>
		            <div class="col-lg-3">
		                <div class="form-group">
		                  <input type="button" class="btn btn-primary" value="Search" ng-click="searchAction()">
		                </div>
		            </div>
		            <div class="col-lg-1"></div>
		        </div>
		        <hr/>
		        <div class="row" ng-if="showTable">
		        	<div class="col-lg-12">
		        		<div class="form-group pull-right">
		                  <input type="button" class="btn btn-success" value="ADD" ng-click="updateAddClick()">
		                </div>
		        	</div>
		        	<div class="col-lg-12">
		                <table style="margin-top: 10px;" id="example2" class="table table-bordered table-striped">
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
		                          <th>Edit</th>
		                          <th>Delete</th>
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
		                          <td><a href="#" ng-click="editClick(x)"><i class="fa fa-edit"></i></a></td>
		                          <td><a href="#" ng-click="deleteClick(x)"><i class="fa fa-trash"></i></a></td>
		                        </tr>
		                    </tbody>
		                </table>
		            </div>
		        </div>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>
        <!-- /.col -->
    </div>
</section>

<div class="modal fade" id="modal-default">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">{{modal.title}}</h4>
      </div>
      <div class="modal-body">
        <form role="form">
	        <div class="box-body">
	        	<div class="row">
	        		<div class="col-lg-3">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Serial No</label>
		                  <input type="text" class="form-control" id="serial_no_modal" placeholder="Enter Serial No" disabled="disabled" ng-model="formData['serial_no_modal']">
		                </div>
		            </div>
		            <div class="col-lg-3">
		                <div class="form-group">
		                  <label for="exampleInputPassword1">Date</label>
		                  <input type="text" class="form-control" id="datePicker1" placeholder="Choose Date">
		                </div>
		            </div>
		            <div class="col-lg-3">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Leather</label>
		                  <select class="form-control" ng-model="formData.leather" id="leather1">
		                  	<option value="">Choose Leather</option>
		                  	[[foreach from=$leather key=k item=v]]
		                  	<option value="[[$v]]">[[$v]]</option>
		                  	[[/foreach]]
		                  </select>
		                </div>
		            </div>
		            <div class="col-lg-3">
		                <div class="form-group">
		                  <label for="exampleInputPassword1">Query</label>
		                  <select class="form-control" ng-model="formData.query" id="query1">
		                  	<option value="">Choose Query</option>
		                  	[[foreach from=$query key=k item=v]]
		                  	<option value="[[$v]]">[[$v]]</option>
		                  	[[/foreach]]
		                  </select>
		                </div>
		            </div>
		            <div class="col-lg-3">
		                <div class="form-group">
		                  	<label for="exampleInputPassword1">Description</label>
		                  	<select class="form-control select2" style="width: 100%;" ng-model="formData.description" id="description1" ng-change="clearRedMark('description1')">
		                  		<option value="">Choose Description</option>
		                  	    [[foreach from=$description_data key=k item=v]]
			                  		<option value="[[$v.description_id]]">[[$v.description_name]]</option>
			                  	[[/foreach]]
			                </select>
		                </div>
		            </div>
		            <div class="col-lg-3">
		                <div class="form-group">
		                  <label for="exampleInputPassword1">Article</label>
		                  	<select class="form-control select2" style="width: 100%;" ng-model="formData.article" id="article1" ng-change="clearRedMark('article1')">
			                  	<option value="">Choose Article</option>
		                  	    [[foreach from=$article_data key=k item=v]]
			                  		<option value="[[$v.article_id]]">[[$v.article_name]]</option>
			                  	[[/foreach]]
			                </select>
		                </div>
		            </div>
		            <div class="col-lg-3">
		                <div class="form-group">
		                  <label for="exampleInputPassword1">Color</label>
		                  	<select class="form-control select2" style="width: 100%;" ng-model="formData.color" id="color1" ng-change="clearRedMark('color1')">
			                  	<option value="">Choose Color</option>
		                  	    [[foreach from=$color_data key=k item=v]]
			                  		<option value="[[$v.color_id]]">[[$v.color_name]]</option>
			                  	[[/foreach]]
			                </select>
		                </div>
		            </div>
		            <div class="col-lg-3">
		                <div class="form-group">
		                  <label for="exampleInputPassword1">Selection</label>
		                  	<select class="form-control select2" style="width: 100%;" ng-model="formData.selection" id="selection1" ng-change="clearRedMark('selection1')">
			                  	<option value="">Choose Selection</option>
		                  	    [[foreach from=$selection_data key=k item=v]]
			                  		<option value="[[$v.selection_id]]">[[$v.selection_name]]</option>
			                  	[[/foreach]]
			                </select>
		                </div>
		            </div>
		            <div class="col-lg-3">
		                <div class="form-group">
		                  <label for="exampleInputPassword1">Pieces</label>
		                  <input type="text" class="form-control" id="pieces1" placeholder="Enter Pieces" ng-model="formData.pieces">
		                </div>
		            </div>
		            <div class="col-lg-3">
		                <div class="form-group">
		                  <label for="exampleInputPassword1">Sq.ft</label>
		                  <input type="text" class="form-control" id="sqfeet1" placeholder="Enter Sq.ft" ng-model="formData.sqfeet">
		                </div>
		            </div>
		            <div class="col-lg-3">
		                <div class="form-group">
		                  <label for="exampleInputPassword1">Remark</label>
		                  <textarea class="form-control" id="remarks1" ng-model="formData.remarks"></textarea>
		                </div>
		            </div>
	            </div>
	        </div>
	    </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <button type="button" ng-if="modal.button === 'Add'" class="btn btn-primary" ng-click="addUpdateAction()">{{modal.button}}</button>
        <button type="button" ng-if="modal.button === 'Update'" class="btn btn-primary" ng-click="editUpdateAction()">{{modal.button}}</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>