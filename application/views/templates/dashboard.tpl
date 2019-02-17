
<!DOCTYPE html>
<html ng-app='app'>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>T.M.ABDUL RAHMAN & SONS</title>
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
  <!-- editable select -->
  <link rel="stylesheet" href="assets/plugins/jquery-editable-select-master/dist/jquery-editable-select.min.css">
  <link rel="stylesheet" href="assets/plugins/jquery-ui/jquery-ui.min.css?v=10">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="assets/css/skins/_all-skins.min.css">

  <link rel="stylesheet" href="assets/css/custom-style.css?version=50">


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> -->

</head>
<body class="hold-transition skin-blue sidebar-mini" ng-controller="dashboard">
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
      <span class="logo-mini"><b>T</b>MAR</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>TMAR & Sons</b></span>
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
                  <a href="#" class="btn btn-default btn-flat" ng-click="showChangePasswordModal()">Change Password</a>
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
        [[foreach from=$menu key=k item=v]]
        <li class="treeview">
          <a href="#">
            <i class="fa fa-circle-o"></i> <span>[[$k]]</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            [[foreach from=$v.sub_menu_details key=sk item=sv]]
                <li>
                    <a ui-sref="[[$sv.sub_menu_link]]" ui-sref-opts="{reload:true,inherit:false}">
                        <i class="fa fa-circle-o"></i> 
                        [[$sv.sub_menu_name]]
                    </a>
                </li>
            [[/foreach]]
          </ul>
        </li>
        [[/foreach]]
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

       <div ui-view="div1">
            <section class="content">
                <div class="text-center" style="position: relative;top: 150px;width: 440px;margin: auto;">
                    <img src="assets/img/TMAR LOGO.jpg" width="100" height="100"></img>
                    <h3 style="border-bottom: 4px solid #3c8dbc; ">T.M.ABDUL RAHMAN & SONS</h3>
                    <p>MANUFACTURES & EXPORTERS OF FINISHED LEATHER & SHOES</p>

                </div>
            </section>
       </div>      
       <div ui-view="div2"></div>       
       <div ui-view="div3"></div>  
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; [[$smarty.now|date_format:"%Y"]]  <a href="http://juntossoft.com">Juntos Software Solution.</a>.</strong> All rights
    reserved.
  </footer>

    <div class="modal fade" id="changePassword">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Change Password</h4>
          </div>
          <div class="modal-body">
            <form role="form">
                <div class="form-group">
                  <label for="exampleInputEmail1">Old Password</label>
                  <input type="text" class="form-control" placeholder="Old Password" ng-model="formData['field1']" id="field1">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">New Password</label>
                  <input type="text" class="form-control" placeholder="New Password" ng-model="formData['field2']" id="field2">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Confirm Password</label>
                  <input type="text" class="form-control" placeholder="Confirm Password" ng-model="formData['field3']" id="field3">
                </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" ng-click="changeAction()">Change</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <a href="#" class="scrollToTop">Scroll To Top</a>

  <!-- Control Sidebar -->
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <!-- <div class="control-sidebar-bg"></div> -->
</div>
<!-- ./wrapper -->
<script>if (typeof module === 'object') {window.module = module; module = undefined;}</script>
<!-- jQuery 3 -->
<script src="assets/plugins/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="assets/plugins/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="assets/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="assets/plugins/datatables.net-bs/js/buttons.html5.min.js"></script>
<script src="assets/plugins/datatables.net-bs/js/buttons.print.min.js"></script>
<script src="assets/plugins/datatables.net-bs/js/dataTables.buttons.min.js"></script>
<script src="assets/plugins/datatables.net-bs/js/jszip.min.js"></script>
<script src="assets/plugins/datatables.net-bs/js/pdfmake.min.js"></script>
<script src="assets/plugins/datatables.net-bs/js/vfs_fonts.js"></script>
<!-- Select2 -->
<script src="assets/plugins/select2/dist/js/select2.full.min.js"></script>
<!-- date-range-picker -->
<script src="assets/plugins/moment/min/moment.min.js"></script>
<script src="assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="assets/js/demo.js"></script>
<!-- Sweet alert -->
<script src="assets/plugins/sweet-alert/sweet-alert.min.js"></script>
<!-- Js Storage -->
<script src="assets/plugins/jStorage-master/jstorage.min.js"></script>
<!-- Angular -->
<script src="assets/plugins/angular/angular.min.js"></script>
<script src="assets/plugins/angular/angular-ui-router.min.js"></script>
<!-- jsxcompressor -->
<script src="assets/plugins/jsxcompressor/jsxcompressor.min.js"></script>
<!-- jquery editable select -->
<script src="assets/plugins/jquery-editable-select-master/dist/jquery-editable-select.min.js"></script>
<!-- Auto include -->
[[foreach from=$jsPaths key=k item=v]]
<script src="[[$v]]?version=175"></script>
[[/foreach]]
<script src="assets/plugins/jquery-ui/jquery-ui.min.js?v=10"></script>
<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree();
    $('body').addClass('loaded');
    //Check to see if the window is top if not then display button
    $(window).scroll(function(){
        if ($(this).scrollTop() > 100) {
            $('.scrollToTop').fadeIn();
        } else {
            $('.scrollToTop').fadeOut();
        }
    });

    //Click event to scroll to top
    $('.scrollToTop').click(function(){
        $('html, body').animate({scrollTop : 0},800);
        return false;
    });
  });
  // $( function() {
  //   var availableTags = [
  //     "ActionScript",
  //     "AppleScript",
  //     "Asp",
  //     "BASIC",
  //     "C",
  //     "C++",
  //     "Clojure",
  //     "COBOL",
  //     "ColdFusion",
  //     "Erlang",
  //     "Fortran",
  //     "Groovy",
  //     "Haskell",
  //     "Java",
  //     "JavaScript",
  //     "Lisp",
  //     "Perl",
  //     "PHP",
  //     "Python",
  //     "Ruby",
  //     "Scala",
  //     "Scheme"
  //   ];
  //   $( "#material_name_select2" ).autocomplete({
  //     source: availableTags
  //   });
  // });
</script>
<!-- Insert this line after script imports -->
<script>if (window.module) module = window.module;</script>
</body>
</html>

