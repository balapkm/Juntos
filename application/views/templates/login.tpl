
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
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
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
<script>if (typeof module === 'object') {window.module = module; module = undefined;}</script>
<!-- jQuery 3 -->
<script src="assets/plugins/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="assets/plugins/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Sweet alert -->
<script src="assets/plugins/sweet-alert/sweet-alert.min.js"></script>
<!-- Js Storage -->
<script src="assets/plugins/jStorage-master/jstorage.min.js"></script>
<!-- Angular -->
<script src="assets/plugins/angular/angular.min.js"></script>
<script src="assets/plugins/angular/angular-ui-router.min.js"></script>

<script src="assets/js/angular/app.js"></script>
<!-- services -->
<script src="assets/js/angular/services/common-service.js"></script>
<script src="assets/js/angular/services/validate-service.js"></script>
<script src="assets/js/angular/services/http-service.js"></script>
<!-- controller -->
<script src="assets/js/angular/controller/login.js"></script>
<!-- Insert this line after script imports -->
<script>if (window.module) module = window.module;</script>
</body>
</html>
