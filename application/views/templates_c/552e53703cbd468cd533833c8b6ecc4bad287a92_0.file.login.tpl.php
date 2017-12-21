<?php
/* Smarty version 3.1.30, created on 2017-12-21 22:14:39
  from "/home/Staging/workSpace/Juntos/application/views/templates/login.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a3be4f78bf3d7_26977827',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '552e53703cbd468cd533833c8b6ecc4bad287a92' => 
    array (
      0 => '/home/Staging/workSpace/Juntos/application/views/templates/login.tpl',
      1 => 1513874676,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a3be4f78bf3d7_26977827 (Smarty_Internal_Template $_smarty_tpl) {
?>

<!DOCTYPE html>
<html ng-app="app">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Juntos | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="assets/plugins/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="assets/plugins/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/css/AdminLTE.min.css">

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
  <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> -->
  <style>
      body{
        overflow : hidden;
      }
  </style>
</head>
<body class="hold-transition login-page" ng-controller="login">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Juntos</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Username" ng-model="formData.username" id="username">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" ng-model="formData.password" id="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-12">
          <button class="btn btn-primary btn-block btn-flat" ng-click="formSubmit()">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
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
<!-- services -->
<?php echo '<script'; ?>
 src="assets/js/angular/services/common-service.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="assets/js/angular/services/validate-service.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="assets/js/angular/services/http-service.js"><?php echo '</script'; ?>
>
<!-- controller -->
<?php echo '<script'; ?>
 src="assets/js/angular/controller/login.js"><?php echo '</script'; ?>
>
<!-- Insert this line after script imports -->
<?php echo '<script'; ?>
>if (window.module) module = window.module;<?php echo '</script'; ?>
>
</body>
</html>
<?php }
}
