<?php
	function OpenCon($db){
    	$conn = mysqli_connect('localhost','root','',$db) or die("Koneksi Gagal: %s\n". $conn->error);
    	return $conn;
    }
    function CloseCon($conn){
    	$conn -> close();
    }
?>