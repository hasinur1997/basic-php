<?php
require 'config.php';

header('Content-type: application/json');

$response = [];

if(!empty($_POST)){

	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];


	$sql = $db->prepare("INSERT INTO user(name, email, phone) VALUES(:name, :email, :phone)");

	$sql->execute(['name' => $name, 'email' => $email, 'phone' => $phone]);

	if($sql->rowCount() == 1){
		$response['status'] = 'success';
		$response['message'] = '<span class=" glyphicon glyphicon-ok">&nbsp; registered sucessfully, you may login now</span>';
	}else{
		$response['status'] = 'error';
		$response[''] = '<span class="glyphicon glyphicon-info-sign"> &nbsp; could not register, try again later</span>';
	}

	echo json_encode($response);
}


