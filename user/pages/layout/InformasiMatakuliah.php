<?php 
  session_start();
  $_SESSION['posisi'] = 'Informasi Matakuliah';
  if ($_SESSION['login'] == false) {
    header("location:../../index.php");
  }
  require '../../../koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Informasi Matakuliah</title>
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
    <a class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>User</b></span>
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
          <img src="<?php echo  '../../../bower/dist/img/'.$_SESSION['nim'].'.jpg';?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['nama'] ?></p>
          <p><i><?php echo $_SESSION['nim'] ?></i></p>              
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
          $sth = $conn->query("SELECT * FROM tbl_menu_user ORDER BY id");      
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
            echo '<li class="'.$class.'">
                    <a href='.$l.''.$value['link'].'>
                      <i class="'.$value['icon'].'"></i> <span>'.$value['menu'].'</span>
                    </a>
                  </li>';
          }
          // CloseCon($con_menu);                                                  
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
        Informasi Matakuliah        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <!--<li><a href="#">Layout</a></li>-->
        <li class="active">Informasi Matakuliah</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="callout callout-info">
        <h4>Keterangan:</h4>

        <p>Informasi Matakuliah Ditawarkan berisi seluruh matakuliah yang ditawarkan pada semester aktif. Dari seluruh matakuliah yang terdapat pada daftar, setiap matakuliah mempunyai aturan tersendiri bergantung pada program studi, kurikulum, dan aturan akademik lainnya. Untuk lebih jelasnya, anda dapat melihat detil kelas. </p>
      </div>
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Matakuliah</h3>
        </div>
        <div class="box-body">
          <form class="form-horizontal col-lg-7" method="get">
            <div class="box-body">                
              <div class="form-group">
                <label class="col-sm-3 control-label">Program Studi</label>                                       
                <div class="col-sm-5">
                  <select name="prodi" class="select form-control">
                    <option selected disabled hidden>- Prodi -</option>
                      <option value="TIF" <?php if(isset($_GET['prodi']) && $_GET['prodi'] == 'TIF') echo ' selected';?>>TEKNIK INFORMATIKA</option>                                              
                      <option value="TID" <?php if(isset($_GET['prodi']) && $_GET['prodi'] == 'TID') echo ' selected';?>>TEKNIK INDUSTRI</option>
                      <option value="TIM" <?php if(isset($_GET['prodi']) && $_GET['prodi'] == 'TIM') echo ' selected';?>>TEKNIK MESIN</option>
                  </select>                  
                </div>                
                <button name="lihat" class="col-sm-1 btn btn-primary">lihat</button>                
              </div>            
            </div>
          </form>        
       
            <!-- tambahan test sliding untuk per paket semester -->
   <div style="clear:both">
      <a name="smstr_1" class="btn-block" href="#semester_1" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="semester_1" hidden>Paket Semester 1</a><br>
      <div id="semester_1" class="collapse">            
        <table class="table table-bordered table-striped" width="100%">
          <tr>
            <th width="5%">No</th>            
            <th width="15%">Kode</th>
            <th width="30%">MataKuliah</th>
            <th width="20%">Nama Dosen</th>
            <th width="20%">Kelas</th>
            <th width="5%">W/P</th>
            <th width="5%">SKS</th>
          </tr>
          <?php
            if(isset($_GET['lihat'])){
              $sth = $conn->query("SELECT * FROM tbl_matakuliah WHERE semester=1 and prodi='".$_GET['prodi']."'");
              $sth->execute();     
              $data = $sth->fetchAll();

              if ($data){
                $no = 1;
                foreach ($data as $key => $value) {                  
                  echo '<tr>
                        <td>'.$no.'</td>
                        <td>'.$value['kode'].'</td>
                        <td>'.$value['matakuliah'].'</td>
                        <td>'.$value['dosen'].'</td>
                        <td>'.$value['kelas'].'</td>
                        <td>'.$value['wp'].'</td>
                        <td>'.$value['sks'].'</td>
                        </tr>';
                    $no++;
                  }
                }
              }
          ?>            
        </table>
      </div>
      <a class="btn-block" href="#semester_2" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="semester_2">Paket Semester 2</a><br>
      <div id="semester_2" class="collapse">
        <table class="table table-bordered table-striped" width="100%">           
          <tr>
            <th width="5%">No</th>            
            <th width="15%">Kode</th>
            <th width="30%">MataKuliah</th>
            <th width="20%">Nama Dosen</th>
            <th width="20%">Kelas</th>
            <th width="5%">W/P</th>
            <th width="5%">SKS</th>
          </tr>
          <?php
            if(isset($_GET['lihat'])){
              $sth = $conn->query("SELECT * FROM tbl_matakuliah WHERE semester=2 and prodi='".$_GET['prodi']."'");
              $sth->execute();     
              $data = $sth->fetchAll();    

              if ($data) {
                $no = 1;
                foreach ($data as $key => $value) {                  
                  echo '<tr>
                        <td>'.$no.'</td>
                        <td>'.$value['kode'].'</td>
                        <td>'.$value['matakuliah'].'</td>
                        <td>'.$value['dosen'].'</td>
                        <td>'.$value['kelas'].'</td>
                        <td>'.$value['wp'].'</td>
                        <td>'.$value['sks'].'</td>
                        </tr>';
                    $no++;
                  }
                }
              }
          ?>            
        </table>
      </div>

      <a class="btn-block" href="#semester_3" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="semester_3">Paket Semester 3</a><br>
      <div id="semester_3" class="collapse">
        <table class="table table-bordered table-striped" width="100%">           
          <tr>
            <th width="5%">No</th>            
            <th width="15%">Kode</th>
            <th width="30%">MataKuliah</th>
            <th width="20%">Nama Dosen</th>
            <th width="20%">Kelas</th>
            <th width="5%">W/P</th>
            <th width="5%">SKS</th>
          </tr>
          <?php
            if(isset($_GET['lihat'])){                  
              $sth = $conn->query("SELECT * FROM tbl_matakuliah WHERE semester=3 and prodi='".$_GET['prodi']."'");
              $sth->execute();     
              $data = $sth->fetchAll(); 

              if ($data) {
                $no = 1;
                foreach ($data as $key => $value) {                  
                  echo '<tr>
                        <td>'.$no.'</td>
                        <td>'.$value['kode'].'</td>
                        <td>'.$value['matakuliah'].'</td>
                        <td>'.$value['dosen'].'</td>
                        <td>'.$value['kelas'].'</td>
                        <td>'.$value['wp'].'</td>
                        <td>'.$value['sks'].'</td>
                        </tr>';
                    $no++;
                  }
                }
              }
          ?>
        </table>
      </div>

      <a class="btn-block" href="#semester_4" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="semester_4">Paket Semester 4</a><br>
      <div id="semester_4" class="collapse">
        <table class="table table-bordered table-striped" width="100%">          
          <tr>
            <th width="5%">No</th>            
            <th width="15%">Kode</th>
            <th width="30%">MataKuliah</th>
            <th width="20%">Nama Dosen</th>
            <th width="20%">Kelas</th>
            <th width="5%">W/P</th>
            <th width="5%">SKS</th>
          </tr>
          <?php
            if(isset($_GET['lihat'])){                  
              $sth = $conn->query("SELECT * FROM tbl_matakuliah WHERE semester=4 and prodi='".$_GET['prodi']."'");
              $sth->execute();     
              $data = $sth->fetchAll(); 

              if ($data){
                $no = 1;
                foreach ($data as $key => $value) {                  
                  echo '<tr>
                        <td>'.$no.'</td>
                        <td>'.$value['kode'].'</td>
                        <td>'.$value['matakuliah'].'</td>
                        <td>'.$value['dosen'].'</td>
                        <td>'.$value['kelas'].'</td>
                        <td>'.$value['wp'].'</td>
                        <td>'.$value['sks'].'</td>
                        </tr>';
                    $no++;
                  }
                }
              }
          ?>
        </table>
      </div>

      <a class="btn-block" href="#semester_5" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="semester_5">Paket Semester 5</a><br>
      <div id="semester_5" class="collapse">
        <table class="table table-bordered table-striped" width="100%">          
          <tr>
            <th width="5%">No</th>            
            <th width="15%">Kode</th>
            <th width="30%">MataKuliah</th>
            <th width="20%">Nama Dosen</th>
            <th width="20%">Kelas</th>
            <th width="5%">W/P</th>
            <th width="5%">SKS</th>
          </tr>
          <?php
            if(isset($_GET['lihat'])){                  
              $sth = $conn->query("SELECT * FROM tbl_matakuliah WHERE semester=5 and prodi='".$_GET['prodi']."'");
              $sth->execute();     
              $data = $sth->fetchAll();

              if ($data) {
                $no = 1;
                foreach ($data as $key => $value) {                  
                  echo '<tr>
                        <td>'.$no.'</td>
                        <td>'.$value['kode'].'</td>
                        <td>'.$value['matakuliah'].'</td>
                        <td>'.$value['dosen'].'</td>
                        <td>'.$value['kelas'].'</td>
                        <td>'.$value['wp'].'</td>
                        <td>'.$value['sks'].'</td>
                        </tr>';
                    $no++;
                  }
                }
              }
          ?>
        </table>
      </div>

      <a class="btn-block" href="#semester_6" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="semester_6">Paket Semester 6</a><br>
      <div id="semester_6" class="collapse">
        <table class="table table-bordered table-striped" width="100%">
          <tr>
            <th width="5%">No</th>            
            <th width="15%">Kode</th>
            <th width="30%">MataKuliah</th>
            <th width="20%">Nama Dosen</th>
            <th width="20%">Kelas</th>
            <th width="5%">W/P</th>
            <th width="5%">SKS</th>
          </tr>
          <?php
            if(isset($_GET['lihat'])){                  
              $sth = $conn->query("SELECT * FROM tbl_matakuliah WHERE semester=6 and prodi='".$_GET['prodi']."'");
              $sth->execute();     
              $data = $sth->fetchAll();

              if ($data) {
                $no = 1;
                foreach ($data as $key => $value) {                  
                  echo '<tr>
                        <td>'.$no.'</td>
                        <td>'.$value['kode'].'</td>
                        <td>'.$value['matakuliah'].'</td>
                        <td>'.$value['dosen'].'</td>
                        <td>'.$value['kelas'].'</td>
                        <td>'.$value['wp'].'</td>
                        <td>'.$value['sks'].'</td>
                        </tr>';
                    $no++;
                  }
                }
              }
          ?>  
        </table>
      </div>
      <a class="btn-block" href="#semester_7" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="semester_7">Paket Semester 7</a><br>
      <div id="semester_7" class="collapse">
        <table class="table table-bordered table-striped" width="100%">
          <tr>
            <th width="5%">No</th>            
            <th width="15%">Kode</th>
            <th width="30%">MataKuliah</th>
            <th width="20%">Nama Dosen</th>
            <th width="20%">Kelas</th>
            <th width="5%">W/P</th>
            <th width="5%">SKS</th>
          </tr>
          <?php
            if(isset($_GET['lihat'])){                  
              $sth = $conn->query("SELECT * FROM tbl_matakuliah WHERE semester=7 and prodi='".$_GET['prodi']."'");
              $sth->execute();     
              $data = $sth->fetchAll();

              if ($data){
                $no = 1;
                foreach ($data as $key => $value) {                  
                  echo '<tr>
                        <td>'.$no.'</td>
                        <td>'.$value['kode'].'</td>
                        <td>'.$value['matakuliah'].'</td>
                        <td>'.$value['dosen'].'</td>
                        <td>'.$value['kelas'].'</td>
                        <td>'.$value['wp'].'</td>
                        <td>'.$value['sks'].'</td>
                        </tr>';
                    $no++;
                  }
                }
              }
          ?>
        </table>
      </div>
      <a class="btn-block" href="#semester_8" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="semester_8">Paket Semester 8</a><br>
      <div id="semester_8" class="collapse">
        <table class="table-common" width="100%">        
          <tr>
            <th width="5%">No</th>            
            <th width="15%">Kode</th>
            <th width="30%">MataKuliah</th>
            <th width="20%">Nama Dosen</th>
            <th width="20%">Kelas</th>
            <th width="5%">W/P</th>
            <th width="5%">SKS</th>
          </tr>
          <?php
            if(isset($_GET['lihat'])){                  
              $sth = $conn->query("SELECT * FROM tbl_matakuliah WHERE semester=8 and prodi='".$_GET['prodi']."'");
              $sth->execute();     
              $data = $sth->fetchAll();

              if ($data){
                $no = 1;
                foreach ($data as $key => $value) {                  
                  echo '<tr>
                        <td>'.$no.'</td>
                        <td>'.$value['kode'].'</td>
                        <td>'.$value['matakuliah'].'</td>
                        <td>'.$value['dosen'].'</td>
                        <td>'.$value['kelas'].'</td>
                        <td>'.$value['wp'].'</td>
                        <td>'.$value['sks'].'</td>
                        </tr>';
                    $no++;
                  }
                }
              }
          ?>
        </table>
      </div>
   </div>
   
   <!-- akhir tambahan -->
   
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
    <strong>Copyright &copy; 2018-2019 <a href="#">Moh. Ilham B</a>.</strong> All rights
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
