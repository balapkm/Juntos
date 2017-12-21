<?php
/* Smarty version 3.1.30, created on 2017-12-21 20:03:15
  from "/home/Staging/workSpace/testFrame/application/views/templates/dashboard.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a3bc62b5dbd22_14634000',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '78b28848b07471c02080760ef014066cc4a22317' => 
    array (
      0 => '/home/Staging/workSpace/testFrame/application/views/templates/dashboard.tpl',
      1 => 1513866762,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a3bc62b5dbd22_14634000 (Smarty_Internal_Template $_smarty_tpl) {
?>

<!DOCTYPE html>
<html ng-app='app'>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Blank Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="assets/plugins/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="assets/plugins/Ionicons/css/ionicons.min.css">
  <!-- dataTables -->
  <link rel="stylesheet" href="assets/plugins/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="assets/plugins/datatables.net-bs/css/buttons.bootstrap.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="assets/plugins/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Select2 -->
  <link rel="stylesheet" href="assets/plugins/select2/dist/css/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="assets/css/skins/_all-skins.min.css">

  <link rel="stylesheet" href="assets/css/custom-style.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"><?php echo '</script'; ?>
>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini loaded" ng-controller="dashboard">
  <div id="loader-wrapper">
    <div id="loader"></div>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
  </div>
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="assets/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">{{loginDetails['user_login_name']}}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="assets/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                <p>
                  {{loginDetails['user_login_name']}}
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="" class="btn btn-default btn-flat" ng-click="logOut()">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <!-- <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li> -->
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="assets/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{loginDetails['user_login_name']}}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['menu']->value, 'v', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-circle-o"></i> <span><?php echo $_smarty_tpl->tpl_vars['k']->value;?>
</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['v']->value['sub_menu_details'], 'sv', false, 'sk');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['sk']->value => $_smarty_tpl->tpl_vars['sv']->value) {
?>
                <li>
                    <a ui-sref="<?php echo $_smarty_tpl->tpl_vars['sv']->value['sub_menu_link'];?>
" ui-sref-opts="{reload:true,inherit:false}">
                        <i class="fa fa-circle-o"></i> 
                        <?php echo $_smarty_tpl->tpl_vars['sv']->value['sub_menu_name'];?>

                    </a>
                </li>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

          </ul>
        </li>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <div ui-view="div1"></div>      
      <div ui-view="div2"></div>       
      <div ui-view="div3"></div>   
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <!-- <div class="control-sidebar-bg"></div> -->
</div>
<!-- ./wrapper -->
<?php echo '<script'; ?>
>if (typeof module === 'object') {window.module = module; module = undefined;}<?php echo '</script'; ?>
>
<!-- jQuery 3 -->
<?php echo '<script'; ?>
 src="assets/plugins/jquery/dist/jquery.min.js"><?php echo '</script'; ?>
>
<!-- Bootstrap 3.3.7 -->
<?php echo '<script'; ?>
 src="assets/plugins/bootstrap/dist/js/bootstrap.min.js"><?php echo '</script'; ?>
>
<!-- DataTables -->
<?php echo '<script'; ?>
 src="assets/plugins/datatables.net/js/jquery.dataTables.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="assets/plugins/datatables.net-bs/js/dataTables.bootstrap.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="assets/plugins/datatables.net-bs/js/buttons.html5.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="assets/plugins/datatables.net-bs/js/buttons.print.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="assets/plugins/datatables.net-bs/js/dataTables.buttons.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="assets/plugins/datatables.net-bs/js/jszip.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="assets/plugins/datatables.net-bs/js/pdfmake.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="assets/plugins/datatables.net-bs/js/vfs_fonts.js"><?php echo '</script'; ?>
>
<!-- SlimScroll -->
<?php echo '<script'; ?>
 src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"><?php echo '</script'; ?>
>
<!-- NiceScroll -->
<?php echo '<script'; ?>
 src="assets/plugins/jquery.nicescroll-master/jquery.nicescroll.min.js"><?php echo '</script'; ?>
>
<!-- FastClick -->
<?php echo '<script'; ?>
 src="assets/plugins/fastclick/lib/fastclick.js"><?php echo '</script'; ?>
>
<!-- Select2 -->
<?php echo '<script'; ?>
 src="assets/plugins/select2/dist/js/select2.full.min.js"><?php echo '</script'; ?>
>
<!-- date-range-picker -->
<?php echo '<script'; ?>
 src="assets/plugins/moment/min/moment.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="assets/plugins/bootstrap-daterangepicker/daterangepicker.js"><?php echo '</script'; ?>
>
<!-- bootstrap datepicker -->
<?php echo '<script'; ?>
 src="assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"><?php echo '</script'; ?>
>
<!-- AdminLTE App -->
<?php echo '<script'; ?>
 src="assets/js/adminlte.min.js"><?php echo '</script'; ?>
>
<!-- AdminLTE for demo purposes -->
<?php echo '<script'; ?>
 src="assets/js/demo.js"><?php echo '</script'; ?>
>
<!-- Sweet alert -->
<?php echo '<script'; ?>
 src="assets/plugins/sweet-alert/sweet-alert.min.js"><?php echo '</script'; ?>
>
<!-- Js Storage -->
<?php echo '<script'; ?>
 src="assets/plugins/jStorage-master/jstorage.min.js"><?php echo '</script'; ?>
>
<!-- Angular -->
<?php echo '<script'; ?>
 src="assets/plugins/angular/angular.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="assets/plugins/angular/angular-ui-router.min.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 src="assets/js/angular/app.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="assets/js/angular/config.js"><?php echo '</script'; ?>
>
<!-- services -->
<?php echo '<script'; ?>
 src="assets/js/angular/services/http-service.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="assets/js/angular/services/common-service.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="assets/js/angular/services/validate-service.js"><?php echo '</script'; ?>
>
<!-- controller -->
<?php echo '<script'; ?>
 src="assets/js/angular/controller/MasterEntry.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="assets/js/angular/controller/dashboard.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="assets/js/angular/controller/DataEntry.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="assets/js/angular/controller/Report.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
  $(document).ready(function () {
    $('.sidebar-menu').tree();
  })
<?php echo '</script'; ?>
>
<!-- Insert this line after script imports -->
<?php echo '<script'; ?>
>if (window.module) module = window.module;<?php echo '</script'; ?>
>
</body>
</html>
<?php }
}
