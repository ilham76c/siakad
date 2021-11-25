<?php
	require 'koneksi.php';

	if($_POST){	
		$username = $_POST["username"];
		$password = $_POST["password"];
		
		if(empty($username) && empty($password)){
			header("location:login.php?error=3");
			exit();
		}elseif (empty($username)) {
			header("location:login.php?error=1");
			exit();
		}elseif (empty($password)) {
			header("location:login.php?error=2");
			exit();
		}
		$conn = OpenCon('db_akun');
		$result = $conn->query("SELECT * FROM tbl_akun WHERE username='".$username."'");
		$data = $result->fetch_assoc();
		CloseCon($conn);
		if($result->num_rows == 1){						
			if($data['passwd'] == md5($password)){
				// menulis session baru		
				session_start();
				$_SESSION['login'] = true;
				$_SESSION['nim'] = $data['username'];				

				if($data['level_'] == 1){
					$_SESSION['nama'] = $username;
					$_SESSION['default_select'] = 'admin';
					header("location:admin/pages/layout/TambahAkun.php");					
					exit();	
				}
				
				if($data['level_'] == 2){					
					$d = false;
					if (substr($username, 2,2) == '04'){
						$_SESSION['db_name'] = 'db_teknik_informatika';
						$con = OpenCon($_SESSION['db_name']);
						$res = $con->query("SELECT nama,jurusan FROM tbl_mahasiswa WHERE nim='".$_SESSION['nim']."'");
						$dat = $res->fetch_assoc();
						$_SESSION['nama'] = $dat['nama'];
						$_SESSION['jurusan'] = $dat['jurusan'];
						$d = true;
					}
					if (substr($username, 2,2) == '03'){
						$_SESSION['db_name'] = 'db_teknik_industri';
						$con = OpenCon($_SESSION['db_name']);
						$res = $con->query("SELECT nama,jurusan FROM tbl_mahasiswa WHERE nim='".$_SESSION['nim']."'");
						$dat = $res->fetch_assoc();
						$_SESSION['nama'] = $dat['nama'];
						$_SESSION['jurusan'] = $dat['jurusan'];
						$d = true;
					}
					if (substr($username, 2,2) == '02'){
						$_SESSION['db_name'] = 'db_teknik_mesin';
						$con = OpenCon($_SESSION['db_name']);
						$res = $con->query("SELECT nama,jurusan FROM tbl_mahasiswa WHERE nim='".$_SESSION['nim']."'");
						$dat = $res->fetch_assoc();
						$_SESSION['nama'] = $dat['nama'];
						$_SESSION['jurusan'] = $dat['jurusan'];
						$d = true;
					}

					if($d){
						header("location:user/index.php");
						exit();
					}else{
						header("location:index.php?error=5");
						exit();		
					}
				}				
			}else{
				header("location:index.php?error=4");
				exit();
			}
		}else{
			header("location:index.php?error=4");
			exit();
		}
	}
	// check parameter error pada url dari auth
	$error = "";
	if(isset($_GET['error']) && !empty($_GET['error'])){
		switch ($_GET['error']) {
			case 1:
				$error = "Username Tidak Boleh Kosong!";
				break;
			case 2:
				$error = "Password Tidak Boleh Kosong!";
				break;
			case 3:
				$error = "Username dan Password Tidak Boleh Kosong!";
				break;
			case 4:
				$error = "Username atau Password Salah!!";
				break;			
			case 5:
				$error = "Username Salah!!";
				break;			
			default:
				$error = "Kesalahan Tak Terduga!";
				break;
		}
	}
		//$query = "INSERT into uspas (user_,pass) values('".$user."','".$pass."')";
		//$query = "SELECT * FROM tbl_akun WHERE username='".$username."'";
		/*$success = $conn->query($query);
		$result=mysqli_query($conn,$query);
		$data = mysqli_fetch_array($result);
		$count=mysqli_num_rows($result);
		if($count==1){		
			if($password == $data['passwd']){		
				$_SESSION['username'] = $username;
				if($data['level_'] == 1){				
					header("location:./admin/index.html");
				}
				if($data['level_'] == 2){
					header("locarion:./user/index.html");
				}
			}else{
				header("location:login.php");
			}
		}else{
			//echo "gagal";
			//$message = "wrong answer";
			//echo "<script type='text/javascript'>alert('$message');</script>";
		}
		if(!$success){
			die("Sql query error: ".$conn->error);
		}	
		//$conn->close();
		CloseCon($conn);
		//ob_end_flush();*/
?>