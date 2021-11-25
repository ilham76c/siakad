<?php  
      function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
      // define variables and set to empty values
			$passwordLamaErr = $passwordBaruErr = $passwordConfirmBaruErr = "";
			$passwordLama = $passwordBaru = $passwordConfirmBaru = "";
      $validPasswordBaru = $validPasswordLama = false;

			if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST['reset'])){
          $passwordLamaErr = $passwordBaruErr = $passwordConfirmBaruErr = "";
          $passwordLama = $passwordBaru = $passwordConfirmBaru = "";
        }
        if(isset($_POST['submit'])){                                   
            $username = test_input($_POST['username']);
            //CEK PASSWORD LAMA
            if(empty($_POST["passwordLama"])){
              $passwordLamaErr = "Masukkan Password Lama!!";
            }else{
              $conn = mysqli_connect('localhost','root','','db_akun') or die("Koneksi Gagal: %s\n". $conn->error);
              $result = $conn->query("SELECT passwd FROM tbl_akun WHERE username='".$username."'");
              $row = mysqli_fetch_array($result);
              $passwordLama = test_input($_POST['passwordLama']);
              if ($row['passwd'] == md5($passwordLama)) {
                $validPasswordLama = true;
              }else{
                $passwordLamaErr = "Password Salah!!";
              }
            }
            //CEK PASSWORD BARU
            if(empty($_POST["passwordBaru"])){
              $passwordBaruErr = "Masukkan Password Baru!!";
            }
            if(empty($_POST["passwordConfirmBaru"])){
              $passwordConfirmBaruErr = "Masukkan Password Baru!!";
            }
            if(!empty($_POST["passwordBaru"]) && !empty($_POST["passwordConfirmBaru"])){
              $passwordBaru = test_input($_POST['passwordBaru']);
              $passwordConfirmBaru = test_input($_POST['passwordConfirmBaru']);
              if($passwordBaru != $passwordConfirmBaru){                
                $passwordConfirmBaruErr = "Password tidak sesuai";
              }else{
                $validPasswordBaru = true;
              }
            }            
                      
          
            if($validPasswordLama==true && $validPasswordBaru==true){
              $result = $conn->query("UPDATE tbl_akun SET passwd='".md5($passwordBaru)."' WHERE username='".$username."'");
              echo "<script>alert('Password telah diubah!!')</script>";              
                                                           
            }
          
        }          
		  }    
      
?>