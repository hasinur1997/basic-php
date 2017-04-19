<?php 


 function login()
 {	
	session_start();
	 $_SESSION['user'] = $data->id;
 }
