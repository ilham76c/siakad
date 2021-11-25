<?php 
  session_start();
  $_SESSION['posisi'] = 'Kartu Rencana Studi';
  if ($_SESSION['login'] == false) {
    header("location:../../index.php");
  }
  include '../../../koneksi.php';
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
  <?php
    function deleteKRS(){            
      $conn = OpenCon($_SESSION['db_name']);              
      $id = trim($_GET['id']);
      $result = $conn->query("DELETE FROM tbl_krs WHERE id='".$id."'");
      CloseCon($conn);
      //echo "<script>deleteRow();</script>";                    
    }
  ?>  
  <script type="text/javascript">    
    function deleteRow(r){      
      var i = r.parentNode.parentNode.rowIndex;      
      document.getElementById('table_krs').deleteRow(i);
      //var target = document.getElementById('table_akun').rows[i].cells[0].innerHTML;  
      document.write('<?php deleteKRS();?>');          
    }
  </script>
  <script type="text/javascript">
    function printDiv(divName){
      var printContents = document.getElementById(divName).innerHTML;
      var originalContents = document.body.innerHTML;
      document.body.innerHTML = printContents;
      window.print();
      document.body.innerHTML = originalContents;
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
        Kartu Rencana Studi        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>        
        <li class="active">Kartu Rencana Studi</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="callout callout-info">
        <h4>Keterangan :</h4>

        <p>Kartu Rencana Studi merupakan fasilitas pengisian KRS secara online. Fasilitas KRS Online ini hanya dapat digunakan pada saat masa KRS atau masa revisi KRS. Mahasiswa dapat memilih matakuliah yang ingin diambil bersesuaian dengan jatah sks yang dimiliki dan matakuliah yang ditawarkan. Setelah melakukan pengisian KRS mahasiswa dapat mencetak KRS tersebut agar dapat ditandatangani oleh dosen pembimbingnya masing-masing.</p>
      </div>
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"></h3>        
        </div>
        <div class="box-body">
          <div id="TableArea">
          <div>
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

            <table class="table table-bordered table-striped" id="table_krs">
              <thead>
                <tr>
                  <th>NO</th>
                  <th>KODE</th>
                  <th>MATA KULIAH</th>
                  <th>SKS</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $conn = OpenCon($_SESSION['db_name']);
                  $result = $conn->query("SELECT id,kode,matakuliah,sks FROM tbl_krs WHERE nim='".$_SESSION['nim']."'");
                  $no = 1;
                  while ($value = mysqli_fetch_array($result)) {
                    echo '<tr>
                            <td>'.$no.'</td>
                            <td>'.$value['kode'].'</td>
                            <td>'.$value['matakuliah'].'</td>
                            <td>'.$value['sks'].'</td>
                            <td><a onclick="deleteRow(this)" href="?id='.$value['id'].'">Hapus</a></td>
                          </tr>';
                    $no++;
                  }
                  CloseCon($conn);
                ?>
              </tbody>
            </table>
          </div>                    
        </div>
        <!-- /.box-body -->
        <div class="box-footer">          
          <div class="box-footer col-sm-2 text-center no-border">              
            <!--<button name="tambah" type="submit" class="btn btn-primary">Tambah</button> -->
            <a href="../layout/TambahKRS.php" class="btn btn-primary pull-left">Tambah</a>
            <a href="#" onclick="printDiv('TableArea')" class="btn btn-primary pull-right">Print</a>
          </div>
                       
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
