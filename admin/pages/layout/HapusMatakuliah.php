<?php 
  session_start();
  if ($_SESSION['login'] == false) {
    header("location:../../../index.php");
  }
  require '../../../koneksi.php';
  $_SESSION['posisi'] = 'Kelola Matakuliah';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Hapus Matakuliah</title>
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
    function deleteMatakuliah(){    
      $id = trim($_GET['id']);
      $conn = OpenCon();
      $conn->query("DELETE FROM tbl_matakuliah WHERE id=$id");
    }
  ?> 
  <script type="text/javascript">    
    function deleteRow(){
      document.write('<?php deleteMatakuliah();?>');
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
          $conn = OpenCon();
          $sth = $conn->query("SELECT menu,icon,link,sub FROM tbl_menu_admin ORDER BY id");      
          $sth->execute();     
          $data = $sth->fetchAll();

          foreach ($data as $key => $value) {
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

            echo '
              <li class="'.$class.'">
                <a href='.$l.''.$value['link'].'>
                  <i class="'.$value['icon'].'"></i> <span>'.$value['menu'].'</span>';
                  if ($value['sub'] == 'yes'){
                    echo '
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    ';
                  }
              echo '
                </a>
              ';

              if ($value['sub'] == 'yes'){
                $sth = $conn->query("SELECT submenu,icon,link FROM tbl_submenu_admin WHERE menu='".$value['menu']."'");      
                $sth->execute();     
                $submenu = $sth->fetchAll();
                echo '<ul class="treeview-menu">';
                foreach ($submenu as $key => $value) {
                  echo '<li class="'.($value['submenu'] === 'Hapus Matakuliah' ? 'active' : '').'"><a href="../layout/'.$value['link'].'"><i class="'.$value['icon'].'"></i>'.$value['submenu'].'</a></li>';                              
                }
                echo '</ul>';
              }
            echo '</li>';
          }                                                        
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
        Hapus Matakuliah        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Kelola Matakuliah</a></li>
        <li class="active">Hapus Matakuliah</li>
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
          <h3 class="box-title">Data Matakuliah</h3>
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
            <form class="form-horizontal col-lg-6" method="get">
              <div class="box-body">                 
                <!-- select -->
                <div class="form-group">
                  <label class="col-sm-2 control-label">Prodi</label>
                  <div class="col-sm-6">
                    <select name="prodi" class="form-control">     
                      <option selected disabled hidden>- Prodi -</option>
                      <option value="TIF" <?php if(isset($_GET['prodi']) && $_GET['prodi'] == 'TIF') echo ' selected';?>>TEKNIK INFORMATIKA</option>                                              
                      <option value="TID" <?php if(isset($_GET['prodi']) && $_GET['prodi'] == 'TID') echo ' selected';?>>TEKNIK INDUSTRI</option>
                      <option value="TIM" <?php if(isset($_GET['prodi']) && $_GET['prodi'] == 'TIM') echo ' selected';?>>TEKNIK MESIN</option>
                    </select>                    
                  </div>                                                      
                </div>                    
                <div class="form-group">
                <label class="col-sm-2 control-label">Semester</label>
                  <div class="col-sm-6">                    
                    <input name="semester" type="number" class="form-control" placeholder="Semester" min="1" max="8" step="1" value="<?php echo $_GET['semester'];?>" required>                    
                  </div>
                </div>      
              </div>                                                         
              <!-- /.box-footer -->
              <div class="box-footer col-sm-4 text-center no-border">                
                <button name="lihat" type="submit" class="btn btn-primary pull-right">Lihat</button>                
              </div>
            </form>          
              <!-- submenu 1 -->              
                <table class="table table-bordered table-striped">
                  <tr>
                    <td><b>Kode</b></td>
                    <td><b>Matakuliah</b></td>
                    <td><b>Dosen</b></td>
                    <td><b>Kelas</b></td>
                    <td><b>W/P</b></td>
                    <td><b>SKS</b></td>
                    <td><b>Operasi</b></td>
                  </tr>          
                        
                  <?php                 
                  if(isset($_GET['lihat']) || !empty($_GET['prodi']) && !empty($_GET['semester'])){
                    $prd = $_GET['prodi'];
                    $smstr = $_GET['semester'];
                    $conn = OpenCon();
                    $sth = $conn->query("SELECT * FROM tbl_matakuliah WHERE prodi='$prd' and semester=$smstr");
                    $sth->execute();     
                    $data = $sth->fetchAll();

                    foreach ($data as $key => $value) {   
                      echo '<tr>
                            <td>'.$value['kode'].'</td>
                            <td>'.$value['matakuliah'].'</td>
                            <td>'.$value['dosen'].'</td>
                            <td>'.$value['kelas'].'</td>
                            <td>'.$value['wp'].'</td>
                            <td>'.$value['sks'].'</td>
                            <td><a onclick="deleteRow()" href="?id='.$value['id'].'&amp;smstr='.$smstr.'&amp;prd='.$prd.'">Hapus</a></td>
                            </tr>';
                    }
                  }          
                  ?>         
                </table>                                                                
              <!-- end submenu 1 -->                              
              <!-- /.box-footer -->            
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
