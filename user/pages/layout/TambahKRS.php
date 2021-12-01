<?php 
  session_start();
  $_SESSION['posisi'] = 'Kartu Rencana Studi';
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
  <title>Kartu Rencana Studi</title>
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
          $con_menu = OpenCon('db_menu');
          $result_menu = $con_menu->query("SELECT * FROM tbl_menu_user ORDER BY id");      
          foreach ($result_menu as $key => $value) {
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
        Matakuliah Ditawarkan        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Kartu Rencana Studi</a></li>
        <li class="active">Tambah KRS</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="callout callout-info">
        <h4>Keterangan:</h4>

        <p>Kartu Rencana Studi merupakan fasilitas pengisian KRS secara online. Fasilitas KRS Online ini hanya dapat digunakan pada saat masa KRS atau masa revisi KRS. Mahasiswa dapat memilih matakuliah yang ingin diambil bersesuaian dengan jatah sks yang dimiliki dan matakuliah yang ditawarkan. Setelah melakukan pengisian KRS mahasiswa dapat mencetak KRS tersebut agar dapat ditandatangani oleh dosen pembimbingnya masing-masing.</p>
      </div>
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"><!--Informasi Matakuliah--></h3>

          <!--<div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>-->
        </div>
      <div class="box-body">          
          <?php
            $conn = OpenCon($_SESSION['db_name']);
          ?>
        <form method="post">
            <!-- tambahan test sliding untuk per paket semester -->
          <div style="clear:both">        
            <a name="smstr_1" class="btn-block" href="#semester_1" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="semester_1" hidden>Paket Semester 1</a><br>
            <div id="semester_1" class="collapse">            
              <table class="table table-bordered table-striped" width="100%">
                <tr>
                  <th width="5%">No</th>            
                  <th width="15%">Kode</th>
                  <th width="25%">MataKuliah</th>
                  <th width="20%">Nama Dosen</th>
                  <th width="20%">Kelas</th>
                  <th width="5%">W/P</th>
                  <th width="5%">SKS</th>
                  <th>+</th>
                </tr>
                <?php                  
                  $result = $conn->query("SELECT * FROM tbl_matkul_semester_1");      
                  if ($result != null){
                    $no = 1;
                    foreach ($result as $key => $value) {                  
                      echo '<tr>
                              <td>'.$no.'</td>
                              <td>'.$value['kode'].'</td>
                              <td>'.$value['matakuliah'].'</td>
                              <td>'.$value['dosen'].'</td>
                              <td>'.$value['kelas'].'</td>
                              <td>'.$value['wp'].'</td>
                              <td>'.$value['sks'].'</td>
                              <td><input type="checkbox" name="pilih[]" value="1-'.$value['id'].'"></td>
                            </tr>';
                      $no++;                      
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
                  <th width="25%">MataKuliah</th>
                  <th width="20%">Nama Dosen</th>
                  <th width="20%">Kelas</th>
                  <th width="5%">W/P</th>
                  <th width="5%">SKS</th>
                  <th>+</th>
                </tr>
                <?php                  
                  $result = $conn->query("SELECT * FROM tbl_matkul_semester_2");      
                  if ($result != null){
                    $no = 1;
                    foreach ($result as $key => $value) {                  
                      echo '<tr>
                              <td>'.$no.'</td>
                              <td>'.$value['kode'].'</td>
                              <td>'.$value['matakuliah'].'</td>
                              <td>'.$value['dosen'].'</td>
                              <td>'.$value['kelas'].'</td>
                              <td>'.$value['wp'].'</td>
                              <td>'.$value['sks'].'</td>
                              <td><input type="checkbox" name="pilih[]" value="2-'.$value['id'].'"></td>
                            </tr>';
                      $no++;                        
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
                  <th width="25%">MataKuliah</th>
                  <th width="20%">Nama Dosen</th>
                  <th width="20%">Kelas</th>
                  <th width="5%">W/P</th>
                  <th width="5%">SKS</th>
                  <th>+</th>
                </tr>
                <?php                    
                  $result = $conn->query("SELECT * FROM tbl_matkul_semester_3");      
                  if ($result != null){
                    $no = 1;
                    foreach ($result as $key => $value) {                  
                      echo '<tr>
                              <td>'.$no.'</td>
                              <td>'.$value['kode'].'</td>
                              <td>'.$value['matakuliah'].'</td>
                              <td>'.$value['dosen'].'</td>
                              <td>'.$value['kelas'].'</td>
                              <td>'.$value['wp'].'</td>
                              <td>'.$value['sks'].'</td>
                              <td><input type="checkbox" name="pilih[]" value="3-'.$value['id'].'"></td>
                            </tr>';
                      $no++;                          
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
                  <th>+</th>
                </tr>
                <?php                    
                  $result = $conn->query("SELECT * FROM tbl_matkul_semester_4");      
                  if ($result != null){
                    $no = 1;
                    foreach ($result as $key => $value) {                  
                      echo '<tr>
                              <td>'.$no.'</td>
                              <td>'.$value['kode'].'</td>
                              <td>'.$value['matakuliah'].'</td>
                              <td>'.$value['dosen'].'</td>
                              <td>'.$value['kelas'].'</td>
                              <td>'.$value['wp'].'</td>
                              <td>'.$value['sks'].'</td>
                              <td><input type="checkbox" name="pilih[]" value="4-'.$value['id'].'"></td>
                            </tr>';
                      $no++;                          
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
                  <th width="25%">MataKuliah</th>
                  <th width="20%">Nama Dosen</th>
                  <th width="20%">Kelas</th>
                  <th width="5%">W/P</th>
                  <th width="5%">SKS</th>
                  <th>+</th>
                </tr>
                <?php                    
                  $result = $conn->query("SELECT * FROM tbl_matkul_semester_5");      
                  if ($result != null){
                    $no = 1;
                    foreach ($result as $key => $value) {                  
                      echo '<tr>
                              <td>'.$no.'</td>
                              <td>'.$value['kode'].'</td>
                              <td>'.$value['matakuliah'].'</td>
                              <td>'.$value['dosen'].'</td>
                              <td>'.$value['kelas'].'</td>
                              <td>'.$value['wp'].'</td>
                              <td>'.$value['sks'].'</td>
                              <td><input type="checkbox" name="pilih[]" value="5-'.$value['id'].'"></td>
                            </tr>';
                      $no++;                          
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
                  <th width="25%">MataKuliah</th>
                  <th width="20%">Nama Dosen</th>
                  <th width="20%">Kelas</th>
                  <th width="5%">W/P</th>
                  <th width="5%">SKS</th>
                </tr>
                <?php
                  $result = $conn->query("SELECT * FROM tbl_matkul_semester_6");      
                  if ($result != null){
                    $no = 1;
                    foreach ($result as $key => $value) {                  
                      echo '<tr>
                              <td>'.$no.'</td>
                              <td>'.$value['kode'].'</td>
                              <td>'.$value['matakuliah'].'</td>
                              <td>'.$value['dosen'].'</td>
                              <td>'.$value['kelas'].'</td>
                              <td>'.$value['wp'].'</td>
                              <td>'.$value['sks'].'</td>
                              <td><input type="checkbox" name="pilih[]" value="6-'.$value['id'].'"></td>
                            </tr>';
                      $no++;
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
                  <th width="25%">MataKuliah</th>
                  <th width="20%">Nama Dosen</th>
                  <th width="20%">Kelas</th>
                  <th width="5%">W/P</th>
                  <th width="5%">SKS</th>
                  <th>+</th>
                </tr>
                <?php                    
                  $result = $conn->query("SELECT * FROM tbl_matkul_semester_7");      
                  if ($result != null){
                    $no = 1;
                    foreach ($result as $key => $value) {                  
                      echo '<tr>
                              <td>'.$no.'</td>
                              <td>'.$value['kode'].'</td>
                              <td>'.$value['matakuliah'].'</td>
                              <td>'.$value['dosen'].'</td>
                              <td>'.$value['kelas'].'</td>
                              <td>'.$value['wp'].'</td>
                              <td>'.$value['sks'].'</td>
                              <td><input type="checkbox" name="pilih[]" value="7-'.$value['id'].'"></td>
                            </tr>';
                      $no++;
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
                  <th width="25%">MataKuliah</th>
                  <th width="20%">Nama Dosen</th>
                  <th width="20%">Kelas</th>
                  <th width="5%">W/P</th>
                  <th width="5%">SKS</th>
                  <th>+</th>
                </tr>
                <?php        
                  $result = $conn->query("SELECT * FROM tbl_matkul_semester_8");      
                  if ($result != null){
                    $no = 1;
                    foreach ($result as $key => $value) {                  
                      echo '<tr>
                              <td>'.$no.'</td>
                              <td>'.$value['kode'].'</td>
                              <td>'.$value['matakuliah'].'</td>
                              <td>'.$value['dosen'].'</td>
                              <td>'.$value['kelas'].'</td>
                              <td>'.$value['wp'].'</td>
                              <td>'.$value['sks'].'</td>
                              <td><input type="checkbox" name="pilih[]" value="8-'.$value['id'].'"></td>
                            </tr>';
                      $no++;                          
                    }
                  }
                ?>
              </table>
            </div>
            <div class="box-footer col-sm-3 no-border">              
              <button name="tambah" type="submit" class="btn btn-primary pull-left">Tambah</button>                            
            </div>
          </form>
          <?php            
            if (isset($_POST['tambah'])) {
              $pilih = $_POST['pilih'];
              foreach ($pilih as $key => $value) {
                list($smstr,$id) = explode('-', $value);               
                $result = $conn->query("SELECT * FROM tbl_matkul_semester_".$smstr." WHERE id='".$id."'");
                $row = mysqli_fetch_array($result);
                $conn->query("INSERT INTO tbl_krs (nim,kode,matakuliah,dosen,kelas,wp,sks) VALUES('".$_SESSION['nim']."','".$row['kode']."','".$row['matakuliah']."','".$row['dosen']."','".$row['kelas']."','".$row['wp']."','".$row['sks']."')");
              }              
            }
          ?>        
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
