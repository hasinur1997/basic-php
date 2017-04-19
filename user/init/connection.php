<?php 
 try{
	 $db = new PDO('mysql:host=localhost;dbname=programming', 'root', '');
 }catch(PDOException $e){
	 $e->getMessage();
 }