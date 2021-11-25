<?php 
  session_start();  
  if ($_SESSION['login'] == false) {
    header("location:../../../index.php");
  }
  include '../../../koneksi.php';
  include '../../.././cek/cek_MenuAkun.php';
  $_SESSION['posisi'] = 'Kelola Akun';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Tambah Akun</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../../bower/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../../bower/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../../bower/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../../bower/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../../bower/dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style type="text/css">
      .error {color: #FF0000;}
  </style>
</head>
<!-- ADD THE CLASS fixed TO GET A FIXED HEADER AND SIDEBAR LAYOUT -->
<!-- the fixed layout is not compatible with sidebar-mini -->
<body class="hold-transition skin-blue fixed sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="../../index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b></span>
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
          <img src="../../../bower/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['nama'];?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- logout form -->
      <form method="post" action="../../.././cek/action_out.php">
        <div class="input-group">
          <!--<input type="text" name="q" class="form-control" placeholder="Search...">-->          
          <button name="logout" class="btn btn-link"><i class="fa fa-power-off">&nbsp;</i>Log out</button>                       
        </div>
      </form>         
      <!-- /.logout form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <?php      
          $con_menu = OpenCon('db_menu');
          $result_menu = $con_menu->query("SELECT menu,icon,link,sub FROM tbl_menu_admin ORDER BY id");      
          foreach ($result_menu as $key => $value) {
            $class = '';
            $l = '../layout/';
            if ($value['menu'] == 'Dashboard'){
              $l = '../../';
            }
            if ($value['menu'] == $_SESSION['posisi']){
              $class = 'active';
            }
            if ($value['sub'] == 'yes'){
              $class = 'treeview '.$class;
            }
            echo '<li class="'.$class.'">
                    <a href='.$l.''.$value['link'].'>
                      <i class="'.$value['icon'].'"></i> <span>'.$value['menu'].'</span>';
                      if ($value['sub'] == 'yes'){
                        echo '<span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                              </span>';
                      }
                    echo '</a>';

                    if ($value['sub'] == 'yes'){
                      $result_submenu = $con_menu->query("SELECT submenu,icon,link FROM tbl_submenu_admin WHERE menu='".$value['menu']."'");      
                      echo '<ul class="treeview-menu">';
                      foreach ($result_submenu as $key => $value) {
                        echo '<li><a href="../layout/'.$value['link'].'"><i class="'.$value['icon'].'"></i>'.$value['submenu'].'</a></li>';                              
                      }
                      echo '</ul>';
                    }
            echo '</li>';
          }
          CloseCon($con_menu);                                                  
        ?>        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tambah Akun        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Kelola Akun</a></li>
        <li class="active">Tambah Akun</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!--<div class="callout callout-info">
        <h4>Tip!</h4>

        <p>Add the fixed class to the body tag to get this layout. The fixed layout is your best option if your sidebar
          is bigger than your content because it prevents extra unwanted scrolling.</p>
      </div>-->
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Form Tambah Akun</h3>
        </div>
        <div class="box-body">
          <!--Start creating your amazing application!-->
          <!-- Horizontal Form -->
          <div class="box box-info">
            <!--<div class="box-header with-border">
              <h2 class="box-title">Tambah Akun</h2>
            </div>-->
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal col-lg-8" method="post">
              <div class="box-body">                
                <div class="form-group">
                  <label class="col-sm-3 control-label">Username</label>
                  <div class="col-sm-6">
                    <input name="username" type="text" class="form-control" placeholder="Username" value="<?php echo $username;?>">
                  </div>
                  <label class="control-label"><span class="error">* <?php echo $usernameErr;?></span></label>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-3 control-label">Password</label>
                  <div class="col-sm-6">
                    <input name="passwd" type="password" class="form-control" id="inputPassword3" placeholder="Password" value="<?php echo $password;?>">
                  </div>
                  <label class="control-label"><span class="error">* <?php echo $passwordErr;?></span></label>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-3 control-label">Confirm Password</label>
                  <div class="col-sm-6">
                    <input name="confirmpasswd" type="password" class="form-control" id="inputPassword3" placeholder="Confirm Password" value="<?php echo $confirmpassword;?>">
                  </div>
                  <label class="control-label"><span class="error">* <?php echo $confirmpasswordErr;?></span></label>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Email</label>
                  <div class="col-sm-6">
                    <input name="email" type="email" class="form-control" placeholder="Username" value="<?php echo $email;?>">
                  </div>
                  <label class="control-label"><span class="error">* <?php echo $emailErr;?></span></label>
                </div>
                <!-- select -->
                <div class="form-group">
                  <label class="col-sm-3 control-label">Level</label>
                  <div class="col-sm-6">
                    <select name="level" class="form-control">
                      <option selected disabled hidden>- Level -</option>
                      <option value=2 <?php if($level==2) echo ' selected';?>>User</option>
                      <option value=1 <?php if($level==1) echo ' selected';?>>Admin</option>                      
                    </select>
                  </div>
                  <label class="control-label"><span class="error">* <?php echo $levelErr;?></span></label>
                </div>                                
              </div>
              <!-- /.box-body -->
              <div class="box-footer col-sm-9 text-center no-border">
                <button name="reset" type="submit" class="btn btn-primary">&nbsp;&nbsp;Reset&nbsp;&nbsp;</button>
                <button name="tombol" value="tambah" type="submit" class="btn btn-primary pull-right">Tambah</button>
                <!--<button type="submit" class="btn btn-info pull-right">Sign in</button>-->
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <!--Footer-->
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="#">Moh. Ilham B.</a></strong> All rights
    reserved.
  </footer>
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../../../bower/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../../bower/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../../../bower/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../../bower/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../../bower/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../../bower/dist/js/demo.js"></script>
</body>
</html>
