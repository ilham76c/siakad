<?php
	$connection = null;

	function OpenCon() : object
	{    	
		try{
			if ($GLOBALS['connection'] === null) {
				$GLOBALS['connection'] = new PDO("pgsql:host=127.0.0.1;dbname=siakad;port=5432", 'postgres', 'postgres');
		   
				if($GLOBALS['connection']){
					return $GLOBALS['connection'];
				}

				return 'Something went wrong!';
			}

			return $GLOBALS['connection'];
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
    }
    function CloseCon() 
	{
		try {
			$GLOBALS['connection'] = null;
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
    	
    }
?>