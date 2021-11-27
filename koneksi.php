<?php
	$connection = null;

	function OpenCon() : object
	{    	
		try{
			if ($connection === null) {
				$conn = new PDO("pgsql:host=127.0.0.1;dbname=siakad;port=5432", 'postgres', 'postgres');
		   
				if(conn){
					return $conn;
				}

				return 'Something went wrong!';
			}

			return $connection;
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
    }
    function CloseCon() 
	{
		try {
			$connection = null;
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
    	
    }
?>