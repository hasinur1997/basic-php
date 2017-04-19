<?php 
	session_start();
	if($_SESSION['hasinur'] != 'hasinur'){
		header('location: login.php');
		
	}

?>