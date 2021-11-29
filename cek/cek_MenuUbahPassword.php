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
            $conn = OpenCon();
            $sth = $conn->query("SELECT passwd FROM tbl_akun WHERE username='".$username."' LIMIT 1");
            $sth->execute();
		        $data = $sth->fetch(PDO::FETCH_ASSOC);

            $passwordLama = test_input($_POST['passwordLama']);
            if ($data['passwd'] == md5($passwordLama)) {
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
            $conn->query("UPDATE tbl_akun SET passwd='".md5($passwordBaru)."' WHERE username='".$username."'");
            echo "<script>alert('Password telah diubah!!')</script>";              
                                                          
          }
        
      }          
    }    
    
?>