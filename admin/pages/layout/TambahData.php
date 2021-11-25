<?php 
  session_start();
  if ($_SESSION['login'] == false) {
    header("location:../../../index.php");
  }
  include '../../../koneksi.php';
  include '../../.././cek/action_MenuDataMahasiswa.php';
  $_SESSION['posisi'] = 'Data Mahasiswa';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Data Mahasiswa</title>
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
        Tambah Data        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Data Mahasiswa</a></li>
        <li class="active">Tambah Data</li>
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
          <h3 class="box-title">Tambah Data</h3>          
        </div>
        <div class="box-body">
          <!--Start creating your amazing application!-->
          <!-- Horizontal Form -->
          <div class="box box-info">
            <!--<div class="box-header with-border">
              <h2 class="box-title">Tambah Matakuliah</h2>
            </div>-->
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal col-lg-6" method="post" enctype="multipart/form-data">
              <div class="box-body">                
                <div class="form-group">
                  <label class="col-sm-3 control-label">NIM</label>
                  <div class="col-sm-9">
                    <input name="nim" type="text" class="form-control" placeholder="NIM" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Nama</label>
                  <div class="col-sm-9">
                    <input name="nama" type="text" class="form-control" placeholder="Nama" required>
                  </div>
                </div>                
                <div class="form-group">
                  <label class="col-sm-3 control-label">Jurusan</label>
                  <div class="col-sm-9">
                    <select name="jurusan" class="form-control">      
                      <option selected hidden disabled>- Jurusan -</option>
                      <option value="TEKNIK INFORMATIKA">TEKNIK INFORMATIKA</option>
                      <option value="TEKNIK MESIN">TEKNIK MESIN</option>
                      <option value="TEKNIK INDUSTRI">TEKNIK INDUSTRI</option>
                    </select>
                  </div>
                </div>                                
                <div class="form-group">
                  <label class="col-sm-3 control-label">Alamat</label>
                  <div class="col-sm-9">
                    <input name="alamat" type="text" class="form-control" placeholder="Alamat" required>
                  </div>
                </div>                
                <div class="form-group">
                  <label for="DOB" class="col-sm-3 control-label">Tanggal Lahir</label>
                  <div class="col-sm-3">
                    <select name="tgl" class="form-control" required>
                      <option selected disabled hidden>- tgl -</option>
                      <?php for ($i=1; $i <= 30; $i++) {                         
                        echo "<option value=".$i.">".$i."</option>";
                      }?>
                    </select>                                  
                  </div>
                  <div class="col-sm-3">
                    <select name="bln" class="form-control" required>
                      <option selected disabled hidden>- bln -</option>
                      <?php $bulan = array('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
                        foreach ($bulan as &$value) {                          
                          echo "<option value='".$value."'>".$value."</option>";
                        }
                      ?>
                    </select> 
                  </div>
                  <div class="col-sm-3">
                    <select name="thn" class="form-control" required>
                      <option selected disabled hidden>- thn -</option>
                      <?php for ($i=1975; $i <= 2018; $i++) {                         
                        echo "<option value=".$i.">".$i."</option>";
                      }?>
                    </select> 
                  </div>                                                      
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Agama</label>
                  <div class="col-sm-9">
                    <select name="agama" class="form-control" required>
                      <option selected hidden disabled>- Agama -</option>
                      <option value="ISLAM">ISLAM</option>
                      <option value="KRISTEN">KRISTEN</option>
                      <option value="BUDHA">BUDHA</option>
                      <option value="HINDU">HINDU</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Jenis Kelamin</label>
                  <div class="col-sm-9">
                    <input type="radio" name="jenis_kelamin" value="Laki-laki">&nbsp;Laki-laki&emsp;
                    <input type="radio" name="jenis_kelamin" value="Perempuan">&nbsp;Perempuan
                  </div>
                </div>                            
                <div class="form-group">
                  <label class="col-sm-3 control-label">Asal SLTA</label>
                  <div class="col-sm-9">
                    <input name="slta" type="text" class="form-control" placeholder="Asal SLTA" required>
                  </div>
                </div>                                             
                <div class="form-group">
                  <label class="col-sm-3 control-label">Tanggal Terdaftar</label>
                  <div class="col-sm-3">
                    <select name="tgl_dftr" class="form-control" required>
                      <option selected disabled hidden>- tgl -</option>
                      <?php for ($i=1; $i <= 30; $i++) {                         
                        echo "<option value=".$i.">".$i."</option>";
                      }?>
                    </select>                                  
                  </div>
                  <div class="col-sm-3">
                    <select name="bln_dftr" class="form-control" required>
                      <option selected disabled hidden>- bln -</option>
                      <?php $bulan = array('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
                        foreach ($bulan as &$value) {                          
                          echo "<option value='".$value."'>".$value."</option>";
                        }
                      ?>
                    </select> 
                  </div>
                  <div class="col-sm-3">
                    <select name="thn_dftr" class="form-control" required>
                      <option selected disabled hidden>- thn -</option>
                      <?php for ($i=2000; $i <= 2018; $i++) {                         
                        echo "<option value=".$i.">".$i."</option>";
                      }?>
                    </select> 
                  </div>                                                      
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Nama Ayah</label>
                  <div class="col-sm-9">
                    <input name="namaAyah" type="text" class="form-control" placeholder="Nama Ayah" required>
                  </div>
                </div>                                             
                <div class="form-group">
                  <label class="col-sm-3 control-label">Nama Ibu</label>
                  <div class="col-sm-9">
                    <input name="namaIbu" type="text" class="form-control" placeholder="Nama Ibu" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Alamat Ortu</label>
                  <div class="col-sm-9">
                    <input name="alamatOrtu" type="text" class="form-control" placeholder="Alamat Ortu" required>
                  </div>
                </div>                     
                <div class="form-group">
                  <label class="col-sm-3 control-label">Warga Negara</label>
                  <div class="col-sm-9">
                    <input name="wargaNegara" type="text" class="form-control" placeholder="Warga Negara" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Status</label>
                  <div class="col-sm-9">
                    <select name="status" class="form-control" required>
                      <option selected hidden disabled>- Status -</option>
                      <option value="Aktif">Aktif</option>
                      <option value="Tidak Aktif">Tidak Aktif</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Foto</label>
                  <div class="col-sm-9">
                    <input type="file" name="image" accept="image/*"/>
                  </div>
                </div>                                                                     
              </div>              
              <!-- /.box-body -->
              <div class="box-footer col-sm-11 text-center no-border">
                <button name="reset" type="reset" class="btn btn-primary">&nbsp;&nbsp;Reset&nbsp;&nbsp;</button>
                <button name="tambah" type="submit" class="btn btn-primary pull-right">Tambah</button>
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
