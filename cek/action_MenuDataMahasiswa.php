 <?php              
    if(isset($_POST['tambah'])){
      $uploadOk = false;
    $valid_ext = array('jpg','jpeg','png','gif','bmp');
        $target_dir  = '../../../bower/dist/img/';
    $temp = explode('.', $_FILES['image']['name']);
    $nama_baru = $_POST['nim'].'.'.end($temp);

    $target_path = $target_dir.$nama_baru;    

    $imageFileType = pathinfo($target_path, PATHINFO_EXTENSION);
    
    if(in_array($imageFileType, $valid_ext)){
      if (move_uploaded_file($_FILES['image']['tmp_name'], $target_path))
      { 
        $uploadOk = true; 
      }
      else{
        die("<p>Upload gagal!!</p>");
      }
    }else{
      echo "<p>Upload gagal!</p>";
    }

    if($uploadOk){
          if ($_POST['jurusan'] == 'TEKNIK INFORMATIKA') {
              $db = 'db_teknik_informatika';
          }
          elseif ($_POST['jurusan'] == 'TEKNIK MESIN') {
              $db = 'db_teknik_mesin';
          }
          else{
              $db = 'db_teknik_industri';
          }
          //$conn = new PDO('mysql:host=localhost;dbname=db_teknik_informatika','root','');   
          $conn = OpenCon($db);
          $result = $conn->query("INSERT INTO tbl_mahasiswa (nim,nama,jurusan,alamat,ttl,agama,jenis_kelamin,slta,tgl_daftar,nama_ayah,nama_ibu,alamat_ortu,warga_negara,status_) VALUES('".$_POST['nim']."','".$_POST['nama']."','".$_POST['jurusan']."','".$_POST['alamat']."','".$_POST['tgl']." ".$_POST['bln']." ".$_POST['thn']."','".$_POST['agama']."','".$_POST['jenis_kelamin']."','".$_POST['slta']."','".$_POST['tgl_dftr']." ".$_POST['bln_dftr']." ".$_POST['thn_dftr']."','".$_POST['namaAyah']."','".$_POST['namaIbu']."','".$_POST['alamatOrtu']."','".$_POST['wargaNegara']."','".$_POST['status']."')");

          echo "<script>alert('Data Berhasil Ditambah');</script>";
        }
    }
?>         