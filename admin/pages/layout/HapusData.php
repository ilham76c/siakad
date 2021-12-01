<?php 
  session_start();
  $_SESSION['posisi'] = 'Data Mahasiswa';
  if ($_SESSION['login'] == false) {
    header("location:../../index.php");
  }
  require '../../.././cek/cek_MenuUbahPassword.php';
  require '../../../koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Hapus Data Mahasiswa</title>
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
  <?php
    function deleteAkun(){            
      $conn = OpenCon('db_judul_ta');
      $id = trim($_GET['id']);
      $result = $conn->query("DELETE FROM tbl_judul_ta WHERE id='".$id."'");
      CloseCon($conn);
      //echo "<script>deleteRow();</script>";                    
    }
  ?>  
  <script type="text/javascript">    
    function deleteRow(r){      
      var i = r.parentNode.parentNode.rowIndex;      
      document.getElementById('table_akun').deleteRow(i);
      //var target = document.getElementById('table_akun').rows[i].cells[0].innerHTML;      
      document.write('<?php deleteAkun();?>');
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
                  echo '<li class="'.($value['submenu'] === 'Hapus Data' ? 'active' : '').'"><a href="../layout/'.$value['link'].'"><i class="'.$value['icon'].'"></i>'.$value['submenu'].'</a></li>';                              
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
        Hapus Data Mahasiswa 
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>        
        <li class="active">Hapus Data Mahasiswa</li>
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
          <h3 class="box-title">Data Judul Tugas Akhir</h3>
        </div>
        <div class="box-body">
          <!--Start creating your amazing application!-->                              
          <form class="form-horizontal col-lg-7" method="get">
            <div class="box-body">                
              <div class="form-group">
                <label class="col-sm-3 control-label">Program Studi</label>                                       
                <div class="col-sm-5">
                  <select name="prodi" class="select form-control">
                    <option selected disabled hidden>- Prodi -</option>          
                    <option value="teknik_informatika" <?php if(isset($_GET['prodi']) && $_GET['prodi'] == 'teknik_informatika') echo ' selected';?>>TEKNIK INFORMATIKA</option>                                              
                      <option value="teknik_industri" <?php if(isset($_GET['prodi']) && $_GET['prodi'] == 'teknik_industri') echo ' selected';?>>TEKNIK INDUSTRI</option>
                      <option value="teknik_mesin" <?php if(isset($_GET['prodi']) && $_GET['prodi'] == 'teknik_mesin') echo ' selected';?>>TEKNIK MESIN</option>
                  </select>                  
                </div>                
                <button name="lihat" class="col-sm-1 btn btn-primary">lihat</button>                
              </div>            
            </div>
          </form>        
          <table class="table table-bordered table-striped" id="table_akun">
            <thead>
              <tr>
                <td><b>NO</b></td>                
                <td><b>NIM</b></td>
                <td><b>NAMA</b></td>
                <td><b>JURUSAN</b></td>                
                <td><b>TANGGAL LAHIR</b></td>
                <td><b>AGAMA</b></td>
                <td><b>JENIS KELAMIN</b></td>                                
                <td><b>NAMA AYAH</b></td>                                              
                <td><b>WARGA NEGARA</b></td>
                <td><b>STATUS</b></td>
                <td><b>Operasi</b></td>
              </tr>
            </thead>
            <tbody>
              <?php
              if (isset($_GET['lihat']) || !empty($_GET['lihat'])) {              
                $conn = OpenCon('db_'.$_GET['prodi']);
                $result = $conn->query("SELECT * FROM tbl_mahasiswa");
                $no = 1;
                foreach ($result as $key => $value) {                
                  echo '<tr>
                          <td>'.$no.'</td>                          
                          <td>'.$value['nim'].'</td>
                          <td>'.$value['nama'].'</td>
                          <td>'.$value['jurusan'].'</td>                                                  
                          <td>'.$value['ttl'].'</td>
                          <td>'.$value['agama'].'</td>
                          <td>'.$value['jenis_kelamin'].'</td>                                                    
                          <td>'.$value['nama_ayah'].'</td>                                                    
                          <td>'.$value['warga_negara'].'</td>
                          <td>'.$value['status_'].'</td>
                          <td><a onclick="deleteRow(this)" href="?id='.$value['id'].'">Hapus</a></td>
                        </tr>';
                  $no++;
                }
                CloseCon($conn);
              }
              ?>
            </tbody>
          </table>                    
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
