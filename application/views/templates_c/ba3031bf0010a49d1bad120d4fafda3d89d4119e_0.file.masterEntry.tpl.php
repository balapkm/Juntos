<?php
/* Smarty version 3.1.30, created on 2017-12-20 10:50:23
  from "/home/Staging/workSpace/testFrame/application/views/templates/masterEntry.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a39f317088ea0_10705532',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ba3031bf0010a49d1bad120d4fafda3d89d4119e' => 
    array (
      0 => '/home/Staging/workSpace/testFrame/application/views/templates/masterEntry.tpl',
      1 => 1513746402,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a39f317088ea0_10705532 (Smarty_Internal_Template $_smarty_tpl) {
?>
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
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['description_data']->value, 'v', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
?>
                        <tr>
                          <td><?php echo $_smarty_tpl->tpl_vars['v']->value['description_id'];?>
</td>
                          <td><?php echo $_smarty_tpl->tpl_vars['v']->value['description_name'];?>
</td>
                          <td><button class="btn btn-primary btn-sm" onclick="editClick('Description','<?php echo $_smarty_tpl->tpl_vars['v']->value['description_name'];?>
',<?php echo $_smarty_tpl->tpl_vars['v']->value['description_id'];?>
)">Edit</button></td>
                          <td><button class="btn btn-danger btn-sm" onclick="deleteClick('Description',<?php echo $_smarty_tpl->tpl_vars['v']->value['description_id'];?>
)">Delete</button></td>
                        </tr>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

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
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['article_data']->value, 'v', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
?>
                        <tr>
                          <td><?php echo $_smarty_tpl->tpl_vars['v']->value['article_id'];?>
</td>
                          <td><?php echo $_smarty_tpl->tpl_vars['v']->value['article_name'];?>
</td>
                          <td><button class="btn btn-primary btn-sm" onclick="editClick('Article','<?php echo $_smarty_tpl->tpl_vars['v']->value['article_name'];?>
',<?php echo $_smarty_tpl->tpl_vars['v']->value['article_id'];?>
)">Edit</button></td>
                          <td><button class="btn btn-danger btn-sm" onclick="deleteClick('Article',<?php echo $_smarty_tpl->tpl_vars['v']->value['article_id'];?>
)">Delete</button></td>
                        </tr>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

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
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['selection_data']->value, 'v', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
?>
                        <tr>
                          <td><?php echo $_smarty_tpl->tpl_vars['v']->value['selection_id'];?>
</td>
                          <td><?php echo $_smarty_tpl->tpl_vars['v']->value['selection_name'];?>
</td>
                          <td><button class="btn btn-primary btn-sm" onclick="editClick('Selection','<?php echo $_smarty_tpl->tpl_vars['v']->value['selection_name'];?>
',<?php echo $_smarty_tpl->tpl_vars['v']->value['selection_id'];?>
)">Edit</button></td>
                          <td><button class="btn btn-danger btn-sm" onclick="deleteClick('Selection',<?php echo $_smarty_tpl->tpl_vars['v']->value['selection_id'];?>
)">Delete</button></td>
                        </tr>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

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
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['color_data']->value, 'v', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
?>
                        <tr>
                          <td><?php echo $_smarty_tpl->tpl_vars['v']->value['color_id'];?>
</td>
                          <td><?php echo $_smarty_tpl->tpl_vars['v']->value['color_name'];?>
</td>
                          <td><button class="btn btn-primary btn-sm" onclick="editClick('Color','<?php echo $_smarty_tpl->tpl_vars['v']->value['color_name'];?>
',<?php echo $_smarty_tpl->tpl_vars['v']->value['color_id'];?>
)">Edit</button></td>
                          <td><button class="btn btn-danger btn-sm" onclick="deleteClick('Color',<?php echo $_smarty_tpl->tpl_vars['v']->value['color_id'];?>
)">Delete</button></td>
                        </tr>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

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
</div><?php }
}
