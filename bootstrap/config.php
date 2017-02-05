<?php

try{

	$db = new PDO('mysql:host=localhost;dbname=test', 'root', '');
	

}catch(PDOException $e)
{
	$e->getMessage();
}


