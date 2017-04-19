<?php 
$errors = [];
if(!empty($_POST)){
	
	if(empty($_POST['name'])){
		$errors['name'] = 'Enter your first name';
	}
	
	if(empty($_POST['phone'])){
		$errors['phone'] = 'Enter your phone';
	}
	
	if(count($errors) === 0){
		echo "Ok";
	}else{
		echo json_encode([
			'error' => $errors
		]);
	}
}