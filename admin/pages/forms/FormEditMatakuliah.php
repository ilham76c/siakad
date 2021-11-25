<?php 
  session_start();
  if ($_SESSION['login'] == false) {
    header("location:../../../index.php");
  }
  include '../../../koneksi.php';
  include '../../.././cek/cek_MenuEditMatakuliah.php';
  $_SESSION['posisi'] = 'Kelola Matakuliah';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Form Edit Matakuliah</title>
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
    $prd = trim($_GET['prd']);
    $conn = OpenCon($prd);              
    $id = trim($_GET['id']);
    $smstr = trim($_GET['smstr']);
    $result = $conn->query("SELECT * FROM tbl_matkul_semester_".$smstr." WHERE id='".$id."'");
    $row = $result->fetch_assoc();
    CloseCon($conn);        
  ?> 
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
          <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
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
        Edit Matakuliah        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Kelola Matakuliah</a></li>
        <li><a href="#">Edit Matakuliah</a></li>
        <li class="active">Form Edit Matakuliah</li>
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
          <h3 class="box-title">Form Edit Matakuliah</h3>          
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
            <form class="form-horizontal col-lg-7" method="post">
              <div class="box-body">                
                <div class="form-group">
                  <label class="col-sm-3 control-label">Kode</label>
                  <div class="col-sm-7">
                    <input name="kode" type="text" class="form-control" placeholder="Kode" value="<?php echo $row['kode'];?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Matakuliah</label>
                  <div class="col-sm-7">
                    <input name="matakuliah" type="text" class="form-control" placeholder="Matakuliah" value="<?php echo $row['matakuliah'];?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Nama Dosen</label>
                  <div class="col-sm-7">
                    <input name="dosen" type="text" class="form-control" placeholder="Nama Dosen" value="<?php echo $row['dosen'];?>" required>
                  </div>
                </div>
                <!-- select -->
                <div class="form-group">
                  <label class="col-sm-3 control-label">Kelas</label>
                  <div class="col-sm-7">
                    <select name="kelas" class="form-control" required>
                      <?php
                        $kelas = array('A','B','C','D','E');
                        foreach ($kelas as &$value) {
                          $selected = "";
                          if ($value == $row['kelas']) {
                            $selected = "selected";
                          }
                          echo "<option value='".$value."' ".$selected.">".$value."</option>";
                        }
                      ?>                                          
                    </select>
                  </div>
                </div>                
                <div class="form-group">
                  <label class="col-sm-3 control-label">SKS</label>
                  <div class="col-sm-7">
                    <input name="sks" type="number" value="<?php echo $row['sks']; ?>" class="form-control" placeholder="SKS" min="1" max="8" step="1" required>
                  </div>
                </div>
                <!-- select -->
                <div class="form-group">
                  <label class="col-sm-3 control-label">Prasyarat</label>
                  <div class="col-sm-7">
                    <select name="wp" class="form-control" required>
                      <option selected disabled hidden>- Wajib atau Prasyarat -</option>
                      <option value="W" <?php if($row['wp']=='W') echo ' selected';?>>Wajib</option>
                      <option value="P" <?php if($row['wp']=='P') echo ' selected';?>>Prasyarat</option>
                    </select>
                  </div>
                </div>
                 <!-- select -->
                <div class="form-group">
                  <label class="col-sm-3 control-label">Jurusan</label>
                  <div class="col-sm-7">
                    <select name="jurusan" class="form-control" required>
                      <option selected disabled hidden>- Jurusan -</option>
                      <?php
                        $pr = array('TEKNIK INFORMATIKA','TEKNIK INDUSTRI','TEKNIK MESIN');
                        $pr_val = array('teknik_informatika','teknik_industri','teknik_mesin');
                        $prodi = substr($prd, 3);
                        for ($i=0; $i <= 2; $i++) {
                          $selected = '';
                          if ($pr_val[$i] == $prodi) {
                             $selected = 'selected';
                           } 
                          echo '<option value="'.$pr_val[$i].'" '.$selected.'>'.$pr[$i].'</option>';
                        }
                      ?>                                            
                    </select>
                  </div>
                </div>                
                <!-- select -->
                <div class="form-group">
                  <label class="col-sm-3 control-label">Semester</label>
                  <div class="col-sm-7">
                    <select name="smstr" class="form-control" required>
                      <option selected disabled hidden>- Semester -</option>
                      <?php                        
                        for ($i=1; $i <= 8 ; $i++) { 
                          $selected = '';
                          if ($i == $smstr) {
                            $selected = 'selected';
                          }
                          echo '<option value="'.$i.'" '.$selected.'>'.$i.'</option>';
                        }
                      ?>                      
                    </select>
                  </div>
                </div>
              </div>

              <!-- /.box-body -->
              <div class="box-footer col-sm-10 text-center no-border">
                <button name="reset" type="submit" class="btn btn-primary">&nbsp;&nbsp;Reset&nbsp;&nbsp;</button>
                <button name="update" type="submit" class="btn btn-primary pull-right">Update</button>                
              </div>
              <!-- /.box-footer -->
            </form>            
            <?php              
              if(isset($_POST['update'])){
                //$conn = new PDO('mysql:host=localhost;dbname=db_teknik_informatika','root','');                
                $conn = OpenCon("db_".$_POST['jurusan']);
                $result = $conn->query("UPDATE tbl_matkul_semester_".$_POST['smstr']." SET kode='".$_POST['kode']."',matakuliah='".$_POST['matakuliah']."',dosen='".$_POST['dosen']."',kelas='".$_POST['kelas']."',wp='".$_POST['wp']."',sks=".$_POST['sks']." WHERE id=".$id."");

              }
            ?>
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
