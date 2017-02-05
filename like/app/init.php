<?php 
session_start();
$_SESSION['user_id'] = (int)1;
try{

	$db = new PDO('mysql:host=localhost;dbname=test', 'root', '');
	

}catch(PDOException $e)
{
	$e->getMessage();
}

$sql = $db->prepare("SELECT articale.id, articale.title FROM articale");

$sql->execute();

$results = $sql->fetchAll(PDO::FETCH_OBJ);





?>