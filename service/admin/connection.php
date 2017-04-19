<?php 
	session_start();
	
	try{
		$db = new PDO('mysql:host=localhost;dbname=', 'root', '');
		
	}catch(PDOException $e){
		
		echo $e->getMessage();
	}

?>