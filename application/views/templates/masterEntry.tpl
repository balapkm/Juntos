<section class="content-header">
  <h1>
    Master Entry
  </h1>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">Description</a></li>
              <li><a href="#tab_2" data-toggle="tab">Article</a></li>
              <li><a href="#tab_3" data-toggle="tab">Selection</a></li>
              <li><a href="#tab_4" data-toggle="tab">Color</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                <div class="row">
                    <div class="col-lg-12" style="margin-bottom: 10px">
                        <button class="btn btn-success pull-right" ng-click="addClick('Description')">ADD</button>
                    </div>
                </div>
                <table id="table1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                          <th>S.No</th>
                          <th>Name</th>
                          <th>Edit</th>
                          <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        [[foreach from=$description_data key=k item=v]]
                        <tr>
                          <td>[[$v.description_id]]</td>
                          <td>[[$v.description_name]]</td>
                          <td><button class="btn btn-primary btn-sm" onclick="editClick('Description','[[$v.description_name]]',[[$v.description_id]])">Edit</button></td>
                          <td><button class="btn btn-danger btn-sm" onclick="deleteClick('Description',[[$v.description_id]])">Delete</button></td>
                        </tr>
                        [[/foreach]]
                    </tbody>
                </table>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
                <div class="row">
                    <div class="col-lg-12" style="margin-bottom: 10px">
                        <button class="btn btn-success pull-right" ng-click="addClick('Article')">ADD</button>
                    </div>
                </div>
                <table id="table2" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                          <th>S.No</th>
                          <th>Name</th>
                          <th>Edit</th>
                          <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        [[foreach from=$article_data key=k item=v]]
                        <tr>
                          <td>[[$v.article_id]]</td>
                          <td>[[$v.article_name]]</td>
                          <td><button class="btn btn-primary btn-sm" onclick="editClick('Article','[[$v.article_name]]',[[$v.article_id]])">Edit</button></td>
                          <td><button class="btn btn-danger btn-sm" onclick="deleteClick('Article',[[$v.article_id]])">Delete</button></td>
                        </tr>
                        [[/foreach]]
                    </tbody>
                </table>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3">
                <div class="row">
                    <div class="col-lg-12" style="margin-bottom: 10px">
                        <button class="btn btn-success pull-right" ng-click="addClick('Selection')">ADD</button>
                    </div>
                </div>
                <table id="table3" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                          <th>S.No</th>
                          <th>Name</th>
                          <th>Edit</th>
                          <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        [[foreach from=$selection_data key=k item=v]]
                        <tr>
                          <td>[[$v.selection_id]]</td>
                          <td>[[$v.selection_name]]</td>
                          <td><button class="btn btn-primary btn-sm" onclick="editClick('Selection','[[$v.selection_name]]',[[$v.selection_id]])">Edit</button></td>
                          <td><button class="btn btn-danger btn-sm" onclick="deleteClick('Selection',[[$v.selection_id]])">Delete</button></td>
                        </tr>
                        [[/foreach]]
                    </tbody>
                </table>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_4">
                <div class="row">
                    <div class="col-lg-12" style="margin-bottom: 10px">
                        <button class="btn btn-success pull-right" ng-click="addClick('Color')">ADD</button>
                    </div>
                </div>
                <table id="table3" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                          <th>S.No</th>
                          <th>Name</th>
                          <th>Edit</th>
                          <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        [[foreach from=$color_data key=k item=v]]
                        <tr>
                          <td>[[$v.color_id]]</td>
                          <td>[[$v.color_name]]</td>
                          <td><button class="btn btn-primary btn-sm" onclick="editClick('Color','[[$v.color_name]]',[[$v.color_id]])">Edit</button></td>
                          <td><button class="btn btn-danger btn-sm" onclick="deleteClick('Color',[[$v.color_id]])">Delete</button></td>
                        </tr>
                        [[/foreach]]
                    </tbody>
                </table>
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
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">{{modal.title}}</h4>
      </div>
      <div class="modal-body">
        <form role="form">
          <div class="box-body">
            <div class="form-group">
              <label for="exampleInputEmail1">{{modal.field_name}}</label>
              <input type="text" class="form-control" id="field1" placeholder="{{modal.field_name}}" ng-model="formData['field1']">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <button type="button" ng-if="modal.button === 'Add'" class="btn btn-primary" ng-click="addAction(modal.tab_name)">{{modal.button}}</button>
        <button type="button" ng-if="modal.button === 'Update'" class="btn btn-primary" ng-click="editAction(modal.tab_name)">{{modal.button}}</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>