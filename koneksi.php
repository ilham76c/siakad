<?php
	function OpenCon() : object
	{    	
		try{
			$conn = new PDO("pgsql:host=127.0.0.1;dbname=siakad;port=5432", 'postgres', 'postgres');
		   
			if(conn){
				return $conn;
			}

			return 'Something went wrong!';
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
    }
    function CloseCon($conn) 
	{
		try {
			$conn->close();
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
    	
    }
?>