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
		
		$conn = OpenCon();
		$sth = $conn->query("SELECT * FROM public.tbl_akun WHERE username='".$username."' LIMIT 1");
		$sth->execute();
		$data = $sth->fetch(PDO::FETCH_ASSOC);

		if($data){						
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
						$res = $conn->query("SELECT nama,jurusan FROM tbl_mahasiswa WHERE nim='".$_SESSION['nim']."'");
						$res->execute();
						$dat = $res->fetch(PDO::FETCH_ASSOC);
						$_SESSION['nama'] = $dat['nama'];
						$_SESSION['jurusan'] = $dat['jurusan'];
						$d = true;
					}
					if (substr($username, 2,2) == '03'){
						$res = $con->query("SELECT nama,jurusan FROM tbl_mahasiswa WHERE nim='".$_SESSION['nim']."'");
						$res->execute();
						$dat = $res->fetch(PDO::FETCH_ASSOC);
						$_SESSION['nama'] = $dat['nama'];
						$_SESSION['jurusan'] = $dat['jurusan'];
						$d = true;
					}
					if (substr($username, 2,2) == '02'){
						$res = $con->query("SELECT nama,jurusan FROM tbl_mahasiswa WHERE nim='".$_SESSION['nim']."'");
						$res->execute();
						$dat = $res->fetch(PDO::FETCH_ASSOC);
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
		CloseCon($conn);
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
?>