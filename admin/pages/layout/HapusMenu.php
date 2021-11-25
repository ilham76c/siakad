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
  <title>Hapus Menu</title>
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
  <?php
    function deleteAkun(){            
      $conn = OpenCon('db_menu');              
      $id = trim($_GET['id']);    
      $menu = trim($_GET['tabel']);
      $result = $conn->query("DELETE FROM tbl_menu_".$menu." WHERE menu='".$id."'");
      CloseCon($conn);      
    }
  ?> 
  <!--<script type="text/javascript">
    $(function(){
      if(localStorage.getItem('submenu')){
        $("#submenu option").eq(localStorage.getItem('submenu').prop('selected',true);
      }
      $("#submenu").on('change',function(){
        localStorage.setItem('submenu',$('option:selected',this).index());
      });
    });
  </script>-->
  <script type="text/javascript">    
    function deleteRow(r){            
      var i = r.parentNode.parentNode.rowIndex;            
      document.getElementById(parent.id).deleteRow(i);                    
      document.write('<?php deleteAkun();?>');
    }
  </script>
  <script type="text/javascript">   
    function men(){     
      var a = document.getElementById('menu').value;               
        if(a == 'user'){          
          $('#tabel_menu_user').collapse('show');
          $('#tabel_menu_admin').collapse('hide');        }                  
        if(a == 'admin'){           
          $('#tabel_menu_admin').collapse('show');
          $('#tabel_menu_user').collapse('hide');
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
        Hapus Menu        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Kelola Akun</a></li>
        <li class="active">Hapus Menu</li>
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
          <h3 class="box-title"></h3>
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
            <form class="form-horizontal col-lg-7" method="get">
              <div class="box-body">                 
                <!-- select -->
                <div class="form-group">
                  <label class="col-sm-3 control-label">Menu di</label>
                  <div class="col-sm-4">
                    <select id="menu" name="menu" class="form-control" onchange="men()">     
                      <option selected disabled hidden>- pilih -</option>                 
                      <option value='user' <?php if(isset($_GET['tabel']) && $_GET['tabel'] == 'user') echo ' selected';?>>User</option>                                              
                      <option value='admin' <?php if(isset($_GET['tabel']) && $_GET['tabel'] == 'admin') echo ' selected';?>>Admin</option>                                                                  
                    </select>
                  </div>
                </div>                
              </div>                               
              <!-- submenu 1 -->
              <div class="form-group collapse" id="tabel_menu_user">                  
                <table class="table table-bordered table-striped">
                  <tr>
                    <td><b>Menu</b></td>
                    <td><b>Class</b></td>
                    <td><b>Link</b></td>                
                    <td><b>Operasi</b></td>
                  </tr>          
                        
                  <?php                                    
                    $conn = OpenCon('db_menu');
                    $result = $conn->query("SELECT menu,icon,link FROM tbl_menu_user");
                    $tbl = 'user';
                    while($value = mysqli_fetch_array($result)) {
                      echo '<tr>
                            <td>'.$value['menu'].'</td>
                            <td>'.$value['icon'].'</td>
                            <td>'.$value['link'].'</td>                        
                            <td><a onclick="deleteRow()" href="?id='.$value['menu'].'&amp;tabel='.$tbl.'">Hapus</a></td>
                            </tr>';
                    }
                    CloseCon($conn);                  
                  ?>         
                </table>                                                  
              </div>        
              <!-- end submenu 1 -->                
              <!-- submenu 2 -->
              <div class="form-group collapse" id="tabel_menu_admin">                  
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <td><b>Menu</b></td>
                      <td><b>Class</b></td>
                      <td><b>Link</b></td>                
                      <td><b>Operasi</b></td>
                    </tr>
                  </thead>
                  <tbody>
                    <?php                                    
                      $conn = OpenCon('db_menu');
                      $result = $conn->query("SELECT menu,icon,link FROM tbl_menu_admin");
                      $tbl = 'admin';
                      while($value = mysqli_fetch_array($result)) {
                        echo '<tr>
                              <td>'.$value['menu'].'</td>
                              <td>'.$value['icon'].'</td>
                              <td>'.$value['link'].'</td>                        
                              <td><a onclick="deleteRow()" href="?id='.$value['menu'].'&amp;tabel='.$tbl.'">Hapus</a></td>
                              </tr>';
                      }
                      CloseCon($conn);
                    ?>
                  </tbody>
                </table>                          
              </div>
              <!-- end submenu 2 -->                                                
              <!-- /.box-footer -->
            </form>          
          </div>
          <!-- /.Table Menu Admin -->
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
    <strong>Copyright &copy; 2018-2019 <a href="#">Moh. Ilham B.</a></strong> All rights
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
