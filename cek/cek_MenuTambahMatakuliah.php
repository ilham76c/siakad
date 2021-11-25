<?php            
      function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }			// define variables and set to empty values
			$kodeErr = $matakuliahErr = $dosenErr = $kelasErr = $sksErr = $prasyaratErr = $jurusanErr = $semesterErr = "";
			$kode = $matakuliah = $dosen = $kelas = $sks = $prasyarat = $jurusan = $semester = "";
      $validKode = $validMatakuliah = $validDosen = $validKelas = $validSks = $validPrasyarat = $validJurusan = $validSemester = false;      

			if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST['reset'])){
          $kodeErr = $matakuliahErr = $dosenErr = $kelasErr = $sksErr = $prasyaratErr = $jurusanErr = $semesterErr = "";
          $kode = $matakuliah = $dosen = $kelas = $sks = $prasyarat = $jurusan = $semester = "";
          $validKode = $validMatakuliah = $validDosen = $validKelas = $validSks = $validPrasyarat = $validJurusan = $validSemester = false;      
        }
        if(isset($_POST['tambah'])){                                   
            // CEK KODE
            if (empty($_POST["kode"])) {
              $kodeErr = "kode is required";
            } else {   
              $kode = test_input($_POST['kode']);         
              if(!preg_match("/^[a-zA-Z0-9]*$/", $kode)){
                $kodeErr = "Format kode Salah";
              }else{
                $validKode = true;
              }
            }
            // CEK MATAKULIAH
            if (empty($_POST["matakuliah"])) {
              $matakuliahErr = "Matakuliah is required";
            } else {   
              $matakuliah = test_input($_POST['matakuliah']);
              if(!preg_match("/^[a-zA-Z ]*$/", $matakuliah)){
                $matakuliahErr = "Only text and white space";
              }else{
                $validMatakuliah = true;
              }
            }
            // CEK NAMA DOSEN
            if (empty($_POST["dosen"])) {
              $dosenErr = "Nama dosen is required";
            } else {   
              $dosen = test_input($_POST['dosen']);         
              if(!preg_match("/^[a-zA-Z,. ]*$/", $dosen)){
                $dosenErr = "Format Nama Dosen Salah";
              }else{
                $validDosen = true;
              }
            }
            //CEK KELAS
            if (empty($_POST['kelas'])) {
              $kelasErr = "Kelas is required";
            }else{
              $kelas = $_POST['kelas'];
              $validKelas = true;
            }             
            // CEK SKS
            if (empty($_POST["sks"])) {
              $sksErr = "SKS is required";
            } else {   
              $sks = test_input($_POST['sks']);     
              if(!preg_match("/^[0-8]*$/", $sks)){
                $sksErr = "Only number and max 8";
              }else{
                $validSks = true;
              }
            }

            //CEK PRASYARAT
            if (empty($_POST['wp'])) {
              $prasyaratErr = "Prasyarat is required";
            }else{
              $prasyarat = test_input($_POST['wp']);
              $validPrasyarat = true;
            }         
            //CEK JURUSAN
            if (empty($_POST['jurusan'])) {
              $jurusanErr = "Jurusan is required";
            }else{
              $jurusan = $_POST['jurusan'];
              $validJurusan = true;
            }
            //CEK KELAS
            if (empty($_POST['kelas'])) {
              $kelasErr = "Kelas is required";
            }else{
              $kelas = $_POST['kelas'];
              $validKelas = true;
            }
            //CEK SEMESTER
            if (empty($_POST['semester'])) {
              $semesterErr = "Semester is required";
            }else{
              $semester = test_input($_POST['semester']);
              $validSemester = true;
            }


            if($validKode == true && $validMatakuliah == true && $validDosen == true && $validKelas == true && $validSks == true && $validPrasyarat == true && $validJurusan == true && $validSemester = true){
                $db = "db_".$_POST['jurusan'];
                $conn = mysqli_connect('localhost','root','',$db) or die("Koneksi Gagal: %s\n". $conn->error);                
                $result = $conn->query("INSERT INTO tbl_matkul_semester_".$semester." (kode,matakuliah,dosen,kelas,wp,sks) VALUES('".$kode."','".$matakuliah."','".$dosen."','".$kelas."','".$prasyarat."',".$sks.")");
                echo "<script>alert('Matakuliah Berhasil Ditambah!!');</script>";
            }
        }          
		  }    
      
?>