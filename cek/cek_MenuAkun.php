<?php            
  function test_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
  }			
  
  // define variables and set to empty values
  $usernameErr = $passwordErr = $confirmpasswordErr = $emailErr = $levelErr = "";
  $username = $password = $confirmpassword = $email = $level = "";
  $validUsername = $validPassword = $validEmail = $validLevel = false;
  //$tgl = $bln = $thn = null;

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['reset'])){
      $usernameErr = $passwordErr = $confirmpasswordErr = $emailErr = $levelErr = "";
      $username = $password = $confirmpassword = $email = $level = "";
    }
    if(isset($_POST['tombol'])){                                   
        // CEK USERNAME
        if (empty($_POST["username"])) {
          $usernameErr = "Username is required";
        } else {   
          $username = test_input($_POST['username']);         
          if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
            $usernameErr = "Format Username Salah";
          }else{
            $validUsername = true;
          }
        }
        //CEK PASSWORD
        if(empty($_POST["passwd"])){
          $passwordErr = "Password is required";          
        }
        if (empty($_POST["confirmpasswd"])) {
          $confirmpasswordErr = "Password is required";          
        }
        if(!empty($_POST["passwd"]) && !empty($_POST["confirmpasswd"])){
          $password = test_input($_POST['passwd']);
          $confirmpassword = test_input($_POST['confirmpasswd']);
          if($password != $confirmpassword){
            $passwordErr = "Password tidak sesuai";
            $confirmpasswordErr = "Password tidak sesuai";
          }else{
            $validPassword = true;
          }
        }
        //CEK EMAIL
        if (empty($_POST["email"])) {
          $emailErr = "Email is required";
        }else{  
          $email = test_input($_POST['email']);  			  
          if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $emailErr = "Invalid email format";
          }else{
            $validEmail = true;
          }
        }	
        //CEK LEVEL
        if (empty($_POST['level'])) {
          $levelErr = "Level is required";
        }else{
          $level = $_POST['level'];
          $validLevel = true;
        }
      
      $conn = OpenCon();
      if ($_POST['tombol'] == 'tambah') {     
        if($validUsername==true && $validPassword==true && $validEmail==true && $validLevel==true){              
          $conn->query("INSERT INTO tbl_akun(username,email,passwd,level_) VALUES('".$_POST['username']."','".$_POST['email']."','".md5($_POST['passwd'])."',".$_POST['level'].")");
          echo "<script>alert('Data Berhasil Ditambah')</script>";
        }
      }
      if ($_POST['tombol'] == 'update') {
        if($validUsername==true && $validPassword==true && $validEmail==true && $validLevel==true){
          $conn->query("UPDATE tbl_akun SET email='".$_POST['email']."',passwd='".md5($_POST['passwd'])."',level_=".$_POST['level']." WHERE username='".$_POST['username']."'");
          echo "<script>alert('Data Berhasil Diperbarui')</script>";
          header("Location:../layout/EditAkun.php");                                                    
        }
      }
    }          
  }
?>