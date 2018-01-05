<?php
/* Smarty version 3.1.30, created on 2018-01-05 13:57:12
  from "/home/Staging/workSpace/Juntos/application/views/templates/addTableData.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a4f36e02a0382_64915033',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9833b4dcb957ccd296a511c95e0d3bdae1f91a68' => 
    array (
      0 => '/home/Staging/workSpace/Juntos/application/views/templates/addTableData.tpl',
      1 => 1515140822,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a4f36e02a0382_64915033 (Smarty_Internal_Template $_smarty_tpl) {
?>
<table style="margin-top: 10px;" id="example3" class="table table-bordered table-striped">
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
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['add_table_data']->value, 'v', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
?>
        <tr>
        	<td><?php echo $_smarty_tpl->tpl_vars['v']->value['serial_no'];?>
</td>
        	<td><?php echo $_smarty_tpl->tpl_vars['v']->value['date'];?>
</td>
        	<td><?php echo $_smarty_tpl->tpl_vars['v']->value['leather'];?>
</td>
        	<td><?php echo $_smarty_tpl->tpl_vars['v']->value['query'];?>
</td>
        	<td><?php echo $_smarty_tpl->tpl_vars['v']->value['description_name'];?>
</td>
        	<td><?php echo $_smarty_tpl->tpl_vars['v']->value['article_name'];?>
</td>
        	<td><?php echo $_smarty_tpl->tpl_vars['v']->value['color_name'];?>
</td>
        	<td><?php echo $_smarty_tpl->tpl_vars['v']->value['selection_name'];?>
</td>
        	<td><?php echo $_smarty_tpl->tpl_vars['v']->value['pieces'];?>
</td>
        	<td><?php echo $_smarty_tpl->tpl_vars['v']->value['sqfeet'];?>
</td>
        	<td><?php echo $_smarty_tpl->tpl_vars['v']->value['remarks'];?>
</td>
        </tr>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    </tbody>
</table><?php }
}
