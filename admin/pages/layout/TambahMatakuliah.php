<?php 
  session_start();
  if ($_SESSION['login'] == false) {
    header("location:../../../index.php");
  }
  require '../../../koneksi.php';
  require '../../.././cek/cek_MenuTambahMatakuliah.php';
  $_SESSION['posisi'] = 'Kelola Matakuliah';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Tambah Matakuliah</title>
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
                    echo '<li class="'.($value['submenu'] === 'Tambah Matakuliah' ? 'active' : '').'"><a href="../layout/'.$value['link'].'"><i class="'.$value['icon'].'"></i>'.$value['submenu'].'</a></li>';                              
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
        Tambah Matakuliah 
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Kelola Matakuliah</a></li>
        <li class="active">Tambah Matakuliah</li>
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
          <h3 class="box-title">Form Tambah Matakuliah</h3>          
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
            <form class="form-horizontal col-lg-8" method="post">
              <div class="box-body">                
                <div class="form-group">
                  <label class="col-sm-3 control-label">Kode</label>
                  <div class="col-sm-6">
                    <input name="kode" type="text" class="form-control" placeholder="Kode" value="<?php echo $kode;?>">
                  </div>                
                  <label class="control-label"><span class="error">* <?php echo $kodeErr;?></span></label>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Matakuliah</label>
                  <div class="col-sm-6">
                    <input name="matakuliah" type="text" class="form-control" placeholder="Matakuliah" value="<?php echo $matakuliah;?>">
                  </div>                  
                  <label class="control-label"><span class="error">* <?php echo $matakuliahErr;?></span></label>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Nama Dosen</label>
                  <div class="col-sm-6">
                    <input name="dosen" type="text" class="form-control" placeholder="Nama Dosen" value="<?php echo $dosen;?>">
                  </div>
                  <label class="control-label"><span class="error">* <?php echo $dosenErr;?></span></label>
                </div>                
                <div class="form-group">
                  <label class="col-sm-3 control-label">Kelas</label>
                  <div class="col-sm-6">
                    <select name="kelas" class="form-control">
                      <option selected disabled hidden>- Kelas -</option>
                      <?php
                        $kls = array('A','B','C','D','E');
                        foreach ($kls as $value) {
                          $selected = '';
                          if ($value == $kelas) {
                            $selected = 'selected';
                          }
                          echo '<option value="'.$value.'" '.$selected.'>'.$value.'</option>';
                        }
                      ?>                                                          
                    </select>
                  </div>
                  <label class="control-label"><span class="error">* <?php echo $kelasErr;?></span></label>
                </div>                
                <div class="form-group">
                  <label class="col-sm-3 control-label">SKS</label>
                  <div class="col-sm-6">
                    <input name="sks" type="number" class="form-control" placeholder="SKS" min="1" max="8" step="1" value="<?php echo $sks;?>">
                  </div>
                  <label class="control-label"><span class="error">* <?php echo $sksErr;?></span></label>
                </div>                
                <div class="form-group">
                  <label class="col-sm-3 control-label">Prasyarat</label>
                  <div class="col-sm-6">
                    <select name="wp" class="form-control">
                      <option selected disabled hidden>- Wajib atau Prasyarat -</option>
                      <option value="W" <?php if($prasyarat == 'W') echo ' selected';?>>Wajib</option>
                      <option value="P" <?php if($prasyarat == 'P') echo ' selected';?>>Prasyarat</option>
                    </select>
                  </div>
                  <label class="control-label"><span class="error">* <?php echo $prasyaratErr;?></span></label>
                </div>                 
                <div class="form-group">
                  <label class="col-sm-3 control-label">Jurusan</label>
                  <div class="col-sm-6">
                    <select name="jurusan" class="form-control">
                      <option selected disabled hidden>- Jurusan -</option>                      
                      <option value="teknik_informatika" <?php if($jurusan == 'teknik_informatika') echo ' selected';?>>TEKNIK INFORMATIKA</option>
                      <option value="teknik_industri" <?php if($jurusan == 'teknik_industri') echo ' selected';?>>TEKNIK INDUSTRI</option>                      
                      <option value="teknik_mesin" <?php if($jurusan == 'teknik_mesin') echo ' selected';?>>TEKNIK MESIN</option>
                    </select>
                  </div>
                  <label class="control-label"><span class="error">* <?php echo $jurusanErr;?></span></label>
                </div>                                
                <div class="form-group">
                  <label class="col-sm-3 control-label">Semester</label>
                  <div class="col-sm-6">
                    <select name="semester" class="form-control">
                      <option selected disabled hidden>- Semester -</option>                      
                      <?php                      
                        for ($i=1; $i <= 8 ; $i++) { 
                          $selected = '';
                          if (strval($i) == $semester) {
                            $selected = 'selected';
                          }
                          echo '<option value="'.$i.'" '.$selected.'>'.$i.'</option>';
                        }
                      ?>
                    </select>
                  </div>
                  <label class="control-label"><span class="error">* <?php echo $semesterErr;?></span></label>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer col-sm-9 text-center no-border">
                <button name="reset" type="submit" class="btn btn-primary">&nbsp;&nbsp;Reset&nbsp;&nbsp;</button>
                <button name="tambah" type="submit" class="btn btn-primary pull-right">Tambah</button>
                <!--<button type="submit" class="btn btn-info pull-right">Sign in</button>-->
              </div>
              <!-- /.box-footer -->
            </form>            
            <!--<?php              
              /*if(isset($_POST['tambah'])){                         
                $conn = OpenCon("db_".$_POST['jurusan']);
                $result = $conn->query("INSERT INTO tbl_matkul_semester_".$_POST['smstr']." (kode,matakuliah,dosen,kelas,wp,sks) VALUES('".$_POST['kode']."','".$_POST['matakuliah']."','".$_POST['dosen']."','".$_POST['kelas']."','".$_POST['wp']."',".$_POST['sks'].")");
              }*/
            ?>-->
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
