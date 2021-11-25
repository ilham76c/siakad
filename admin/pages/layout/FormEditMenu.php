<?php 
  session_start();
  if ($_SESSION['login'] == false) {
    header("location:../../../index.php");
  }
  include '../../../koneksi.php';
  $_SESSION['posisi'] = 'Kelola Menu';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Fixed Layout</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <?php             
    $conn = OpenCon('db_menu');              
    $menu = trim($_GET['ed_men']);          
    $tbl = trim($_GET['tbl']);
    $result = $conn->query("SELECT menu,icon,link,sub FROM tbl_menu_".$tbl." WHERE menu='".$menu."'");
    $row = mysqli_fetch_array($result);
    $sum = 0;
    if ($row['sub'] == 'yes') {
      $result = $conn->query("SELECT submenu,icon,link FROM tbl_submenu_".$tbl." WHERE menu='".$menu."'");
      $sum = mysqli_num_rows($result);
    }
    
    CloseCon($conn);        
  ?>   
  <script type="text/javascript">
    function men(a){      
        if(a != 0){
          document.getElementById('link_text').disabled = true;
        }else{
          document.getElementById('link_text').disabled = false;
        }
        if(a == 0){
          $('#sub1').collapse('hide');
          $('#sub2').collapse('hide');
          $('#sub3').collapse('hide');
          for(var i = 0; i <= 2;i++){
            document.getElementById('sub1').getElementsByTagName('input')[i].required = false;
          }
          //document.getElementById('submenu1_text').disabled = false;
          //document.getElementById('submenu2_text').disabled = false;
          //document.getElementById('submenu2_text').disabled = false;
        }
        if(a == 1){
          $('#sub3').collapse('hide');
          $('#sub2').collapse('hide');
          $('#sub1').collapse('show');
          for(var i = 0; i <= 2;i++){
            document.getElementById('sub1').getElementsByTagName('input')[i].required = true;
          }                    
        }                  
        if(a == 2){
          $('#sub3').collapse('hide');
          $('#sub1').collapse('show');
          $('#sub2').collapse('show');
          for(var i = 0; i <= 2;i++){
            document.getElementById('sub1').getElementsByTagName('input')[i].required = true;
            document.getElementById('sub2').getElementsByTagName('input')[i].required = true;
          }
        }  
        if(a == 3){                      
          $('#sub1').collapse('show');
          $('#sub2').collapse('show');
          $('#sub3').collapse('show');
          for(var i = 0; i <= 2;i++){
            document.getElementById('sub1').getElementsByTagName('input')[i].required = true;
            document.getElementById('sub2').getElementsByTagName('input')[i].required = true;
            document.getElementById('sub3').getElementsByTagName('input')[i].required = true;
          }
        }  
      }
  </script>

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
          <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
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
        Fixed Layout
        <small>Blank example to the fixed layout</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Kelola Akun</a></li>
        <li class="active">Tambah Akun</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="callout callout-info">
        <h4>Tip!</h4>

        <p>Add the fixed class to the body tag to get this layout. The fixed layout is your best option if your sidebar
          is bigger than your content because it prevents extra unwanted scrolling.</p>
      </div>
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Tambah Akun</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
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
              <!-- select -->
                <div class="form-group">
                  <label class="col-sm-3 control-label">Tambah Menu di</label>
                  <div class="col-sm-6">
                    <select name="tempat" class="form-control" required>                      
                      <option value='user' <?php if($tbl == 'user') echo ' selected';?>>User</option>
                      <option value='admin' <?php if($tbl == 'admin') echo ' selected';?>>Admin</option>                      
                    </select>
                  </div>
                </div>                            
                <div class="form-group">
                  <label class="col-sm-3 control-label">Nama Menu</label>
                  <div class="col-sm-6">
                    <input name="menu" type="text" class="form-control" placeholder="Nama Menu" value="<?php echo $row['menu'];?>" required>
                  </div>
                </div>                                
                <div class="form-group">
                  <label class="col-sm-3 control-label">Icon</label>
                  <div class="col-sm-6">
                    <select name="icon" class="fa form-control">                      
                      <option value="fa fa-remove">&#xf00d; fa-remove</option>
                      <option value="fa fa-book">&#xf02d; fa-book</option>
                      <option value="fa fa-plus">&#xf067; fa-plus</option>
                      <option value="fa fa-dasboard">&#xf0e4; fa-dashboard</option>
                      <option value="fa fa-database">&#xf1c0; fa-database</option>
                    </select>
                  </div>
                </div>         
                <div class="form-group">
                  <label class="col-sm-3 control-label">Link File</label>
                  <div class="col-sm-6">
                    <input id="link_text" name="link" type="text" class="form-control" placeholder="Link File" value="<?php echo $row['link'];?>" required>
                  </div>
                </div>  
                <!-- select -->
                <div class="form-group">
                  <label class="col-sm-3 control-label">Submenu</label>
                  <div class="col-sm-6">
                    <select id="submenu" name="submenu" class="form-control" disabled>
                      <option value=0 <?php if($sum == 0) echo ' selected';?>>0</option>                                              
                      <option value=1 <?php if($sum == 1) echo ' selected';?>>1</option>                                            
                      <option value=2 <?php if($sum == 2) echo ' selected';?>>2</option>                                            
                      <option value=3 <?php if($sum == 3) echo ' selected';?>>3</option>
                    </select>
                  </div>
                </div>                
              </div>                               
                  <!-- submenu 1 -->
                  <div class="form-group collapse multi-collapse panel" id="sub1">                  
                    <div class="form-group">
                      <label class="col-sm-5 control-label">Submenu 1</label>
                      <div class="col-sm-5">
                        <input id="submenu1_text" name="submenu1" type="text" class="form-control" placeholder="Nama Submenu 1">
                      </div>
                    </div>                
                    <div class="form-group">
                      <label class="col-sm-5 control-label">Class</label>
                      <div class="col-sm-5">
                        <input id="class1_text" name="icon1" type="text" class="form-control" placeholder="Icon">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-5 control-label">Link File</label>
                      <div class="col-sm-5">
                        <input id="link1_text" name="link1" type="text" class="form-control" placeholder="Link File">
                      </div>
                    </div>                                    
                  </div>        
                  <!-- end submenu 1 -->
                
                  <!-- submenu 2 -->
                  <div class="form-group collapse multi-collapse panel" id="sub2">                  
                    <div class="form-group">
                      <label class="col-sm-5 control-label">Submenu 2</label>
                      <div class="col-sm-5">
                        <input id="submenu2_text" name="submenu2" type="text" class="form-control" placeholder="Nama Submenu 2">
                      </div>
                    </div>                
                    <div class="form-group">
                      <label class="col-sm-5 control-label">Class</label>
                      <div class="col-sm-5">
                        <input id="class2_text" name="icon2" type="text" class="form-control" placeholder="Icon">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-5 control-label">Link File</label>
                      <div class="col-sm-5">
                        <input id="link2_text" name="link2" type="text" class="form-control" placeholder="Link File">
                      </div>
                    </div>                                    
                  </div>
                  <!-- end submenu 2 -->
                  <!-- submenu 3 -->
                  <div class="form-group collapse multi-collapse panel" id="sub3">                  
                    <div class="form-group">
                      <label class="col-sm-5 control-label">Submenu 3</label>
                      <div class="col-sm-5">
                        <input id="submenu3_text" name="submenu3" type="text" class="form-control" placeholder="Nama Submenu 3">
                      </div>
                    </div>                
                    <div class="form-group">
                      <label class="col-sm-5 control-label">Class</label>
                      <div class="col-sm-5">
                        <input id="class3_text" name="icon3" type="text" class="form-control" placeholder="Icon">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-5 control-label">Link File</label>
                      <div class="col-sm-5">
                        <input id="link3_text" name="link3" type="text" class="form-control" placeholder="Link File">
                      </div>
                    </div>                                    
                  </div>
                  <!-- end submenu 3 -->
                
              <div class="box-footer col-sm-9 text-center no-border">
                <button type="submit" class="btn btn-primary">&nbsp;&nbsp;Reset&nbsp;&nbsp;</button>
                <button name="tambah" type="submit" class="btn btn-primary pull-right">Tambah</button>
                <!--<button type="submit" class="btn btn-info pull-right">Sign in</button>-->
              </div>
              <!-- /.box-footer -->
            </form>
            <?php
              $conn = OpenCon('db_menu');
              if (isset($_POST['tambah'])) {
                if($_POST['submenu'] == 0){
                  $result = $conn->query("INSERT INTO tbl_menu_".$_POST['tempat']." (menu,icon,link,sub) VALUES('".$_POST['menu']."','".$_POST['icon']."','".$_POST['link']."','no')");
                }
                else{
                  $result = $conn->query("INSERT INTO tbl_menu_".$_POST['tempat']." (menu,icon,link,sub) VALUES('".$_POST['menu']."','".$_POST['icon']."','#','yes')");
                  for($i = 1; $i < $_POST['submenu'];$i++){
                      $subresult = $conn->query("INSERT INTO tbl_submenu_".$_POST['tempat']." (menu,submenu,icon,link) VALUES('".$_POST['menu']."','".$_POST['submenu'.$i]."','".$_POST['icon'.$i]."','".$_POST['link'.$i]."')");
                  }
                }      
              }
              CloseCon($conn);
            ?>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Footer
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
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
</body>
</html>
