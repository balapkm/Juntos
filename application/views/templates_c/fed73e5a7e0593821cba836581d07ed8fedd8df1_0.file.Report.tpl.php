<?php
/* Smarty version 3.1.30, created on 2017-12-28 10:33:51
  from "/home/Staging/workSpace/Juntos/application/views/templates/Report.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a447b374e8563_13924776',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fed73e5a7e0593821cba836581d07ed8fedd8df1' => 
    array (
      0 => '/home/Staging/workSpace/Juntos/application/views/templates/Report.tpl',
      1 => 1514437429,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a447b374e8563_13924776 (Smarty_Internal_Template $_smarty_tpl) {
?>
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
	              <li><a href="#tab_2" data-toggle="tab">Leather Summary</a></li>
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
				                  	    	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['serial_no_unique']->value, 'v', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
?>
					                  		<option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['serial_no'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['serial_no'];?>
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
					                  	<select class="form-control" ng-model="formData.leather">
						                  	<option value="">Choose Leather</option>
						                  	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['leather']->value, 'v', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
?>
						                  	<option value="<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value;?>
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
					                  	<select class="form-control" ng-model="formData.query">
						                  	<option value="">Choose Query</option>
						                  	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['query']->value, 'v', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
?>
						                  	<option value="<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value;?>
</option>
						                  	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

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
					                  	<select class="form-control" ng-model="formData.leather">
						                  	<option value="">Choose Leather</option>
						                  	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['leather']->value, 'v', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
?>
						                  	<option value="<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value;?>
</option>
						                  	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

						                </select>
					                </div>
					            </div>
					            <div class="col-lg-4">
					                <div class="form-group">
					                  	<select class="form-control select2" style="width: 100%;" ng-model="formData.description" id="description" ng-change="clearRedMark('description1')">
					                  		<option value="">Choose Description</option>
					                  	    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['description_data']->value, 'v', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
?>
						                  		<option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['description_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['description_name'];?>
</option>
						                  	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

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
					    </div>
		            </div>
		      	</div>
	      	</div>
	    </div>
      <!-- /.box -->
    </div>
</section>

<?php }
}
