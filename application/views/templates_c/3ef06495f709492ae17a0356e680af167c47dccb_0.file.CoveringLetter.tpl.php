<?php
/* Smarty version 3.1.30, created on 2018-05-01 23:35:46
  from "/home/Staging/workSpace/Juntos/application/views/templates/CoveringLetter.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ae8ac7a94b9f7_57477328',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3ef06495f709492ae17a0356e680af167c47dccb' => 
    array (
      0 => '/home/Staging/workSpace/Juntos/application/views/templates/CoveringLetter.tpl',
      1 => 1525197936,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ae8ac7a94b9f7_57477328 (Smarty_Internal_Template $_smarty_tpl) {
?>
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
				                  	  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['supplier_name_details']->value, 'v', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
?>
				                  		<option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['supplier_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['supplier_name'];?>
</option>
				                  	  <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

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
<?php }
}
