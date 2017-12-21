<?php
/* Smarty version 3.1.30, created on 2017-12-21 19:49:01
  from "/home/Staging/workSpace/testFrame/application/views/templates/Report.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a3bc2d56398c9_28431681',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fe9e72347102009a434ebf68faf5bb7a65feaa44' => 
    array (
      0 => '/home/Staging/workSpace/testFrame/application/views/templates/Report.tpl',
      1 => 1513865416,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a3bc2d56398c9_28431681 (Smarty_Internal_Template $_smarty_tpl) {
?>
<section class="content-header">
  <!-- <h1>
    Data Entry
  </h1> -->
</section>
<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-lg-12">
	       	<div class="box box-default">
		        <div class="box-header with-border">
		          <h3 class="box-title">Report</h3>
		        </div>
		        <!-- /.box-header -->
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
			        <div ng-if="searchShow">
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
	    </div>
      <!-- /.box -->
    </div>
</section>

<?php }
}
