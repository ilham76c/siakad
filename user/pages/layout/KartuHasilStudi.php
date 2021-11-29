<?php 
  session_start();
  $_SESSION['posisi'] = 'Kartu Hasil Studi';
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
  <title>Kartu Hasil Studi</title>
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

            echo '
              <li class="'.$class.'">
                <a href='.$l.''.$value['link'].'>
                  <i class="'.$value['icon'].'"></i> <span>'.$value['menu'].'</span>
                </a>
              </li>
            ';
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
        Kartu Hasil Studi       
        <small><!--Informasi Matakuliah Ditawarkan--></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <!--<li><a href="#">Layout</a></li>-->
        <li class="active">Kartu Hasil Studi</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="callout callout-info">
        <h4>Keterangan :</h4>
        
        <p>Kartu Hasil Studi merupakan fasilitas yang dapat digunakan untuk melihat hasil studi mahasiswa persemester. Selain dapat dilihat secara online, hasil studi ini juga dapat dicetak. </p>
      </div>
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"></h3>

          <!--<div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>-->
        </div>
        <div class="box-body">
          <form class="form-horizontal col-lg-7" method="GET">
            <div class="box-body">                
              <div class="form-group">
                <label class="col-sm-3 control-label">Semester</label>
                <div class="col-sm-5">
                  <select name="semester" class="select form-control">
                    <option selected disabled hidden>- Semester -</option>
                    <?php
                      $sth = $conn->query("SELECT semester FROM tbl_transkrip_nilai WHERE nim='".$_SESSION['nim']."' GROUP BY semester");
                      $sth->execute();     
                      $data = $sth->fetchAll();

                      $var_semester = [];
                      foreach ($data as $key => $value) {
                        $selected = '';
                        if($_GET["semester"] == $value['semester']){
                          $selected = 'selected';
                        }
                        echo '<option value="'.$value['semester'].'" '.$selected.'>'.$value['semester'].'</option>';
                        array_push($var_semester, $value['semester']);
                      }
                    ?>                    
                  </select>                  
                </div>                
                <button name="lihat" class="col-sm-1 btn btn-primary">lihat</button>
              </div>            
            </div>
          </form> 
          <table class="table table-bordered table-condensed">  
            <tr>
              <td style="color:blue;">Nama</td><td><?php echo $_SESSION['nama'];?></td>
            </tr>
            <tr>
              <td style="color:blue;">NIM</td><td><?php echo $_SESSION['nim'];?></td>
            </tr>
            <tr>
              <td style="color:blue;">Program Studi</td><td><?php echo $_SESSION['jurusan'];?></td>
            </tr>
          </table>
          
        </div>
        <!-- /.box-body -->
        <div class="box-footer">                    
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>SEMESTER</th>
                <th>KODE</th>
                <th>MATAKULIAH</th>
                <th>SKS</th>
                <th>NILAI</th>
              </tr>
            </thead>
            <tbody>
            <?php
              // nilai ip dan ipk sementara agar tidak error
              $ip = '';
              $ipk = '';
              if (isset($_GET['lihat'])) {
                $sth = $conn->query("SELECT semester,kode,matakuliah,sks,nilai FROM tbl_transkrip_nilai WHERE semester='".$_GET['semester']."' AND nim='".$_SESSION['nim']."'");
                $sth->execute();     
                $data = $sth->fetchAll();

                foreach ($data as $key => $value) {
                  echo '<tr>
                          <td>'.$value['semester'].'</td>
                          <td>'.$value['kode'].'</td>
                          <td>'.$value['matakuliah'].'</td>
                          <td>'.$value['sks'].'</td>
                          <td>'.$value['nilai'].'</td>
                        </tr>';
                }
                // MENGHITUNG IP
                $jumlah = 0;
                $sks = 0;
                $nilai = array('A' => 4.0, 'B+' => 3.5, 'B' => 3.0, 'C+' => 2.5, 'C' => 2.0, 'D+' => 1.5, 'D' => 1.0);
                foreach ($data as $key => $value) {
                    $hasmen = $nilai[$value['nilai']] * $value['sks'];
                    $sks = $sks + $value['sks'];
                    $jumlah = $jumlah + $hasmen;
                }
                $ip = $jumlah / $sks;

                // MENGHITUNG IPK
                $sks_ipk = 0;
                $jumlah_ipk = 0;
                foreach ($var_semester as $key) {
                  $sth = $conn->query("SELECT sks,nilai FROM tbl_transkrip_nilai WHERE semester='".$key."' AND nim='".$_SESSION['nim']."'");
                  $sth->execute();     
                  $data = $sth->fetchAll();

                  foreach ($data as $key => $value) {
                    $hasmen = $nilai[$value['nilai']] * $value['sks'];
                    $sks_ipk = $sks_ipk + $value['sks'];
                    $jumlah_ipk = $jumlah_ipk + $hasmen;
                  }
                }
                $ipk = $jumlah_ipk / $sks_ipk;
              }
            ?>
            </tbody>
          </table>  
          <!-- TABLE IP DAN IPK -->                  
          <table>
            <tr>
              <td><label class="control-label">IP&nbsp;</label></td>
              <td><label class="control-label">:&nbsp;</label></td>
              <td><label class="control-label"><?php echo substr($ip,0,4);?></label></td>
            </tr>
            <tr>
              <td><label class="control-label">IPK&nbsp;</label></td>              
              <td><label class="control-label">:&nbsp;</label></td>
              <td><label class="control-label"><?php echo substr($ipk,0,4);?></label></td>
            </tr>
          </table>
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
