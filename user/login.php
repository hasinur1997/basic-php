<?php
require_once('init/connection.php');
session_start();

if(isset($_SESSION['user'])){
	header('location:index.php');
}

$errors = [];
if(!empty($_POST)){
	
	$username = $_POST['username'];
	
	$password = $_POST['password'];
	
	$password = md5($password);
	
	if(empty($username)){
		
		$errors['username'] = 'Please enter username';
	}
	
	if(empty($password)){
		
		$errors['password'] = 'Please enter your password';
	}
	
	if(count($errors) === 0){
		
		$user = $db->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
		
		$user->execute([$username, $password]);
		
		$row = $user->rowCount();
		
		$data = $user->fetch(PDO::FETCH_OBJ);
		
		
		if($row > 0){
			
			
			$_SESSION['user'] = $data->id;
			
			header('location:index.php');
			
		}
	}
}

include('include/header.php');
?>


<div class="container"> 
		<div class="row"> 
			<div class="col-md-6 col-md-offset-3"> 
			
					<div class="panel panel-info">
						<div class="panel-heading"> 
							Sign Up
						</div>
						
						<div class="panel-body"> 
							<form action="" method="POST">
								
								<!-- User Name Field -->
								<div class="form-group<?php echo array_key_exists('username', $errors)? ' has-error' : ''?>"> 
									<label for="username" class="control-label">User Name</label>
									<input type="text" id="username" name="username" class="form-control"/>
									
									<?php if(array_key_exists('username', $errors)):?>
										<b class="help-block"><?php echo $errors['username'];?></b>
									<?php endif?>
								</div>
								
								
								<!-- Password Field -->
								<div class="form-group<?php echo array_key_exists('password', $errors)? ' has-error' : ''?>"> 
									<label for="password" class="control-label">Password</label>
									<input type="password" id="password" name="password" class="form-control"/>
									
									<?php if(array_key_exists('password', $errors)):?>
										<b class="help-block"><?php echo $errors['password'];?></b>
									<?php endif?>
								</div>
								
								<div class="form-group"> 
									<input type="submit" class="btn btn-info"/>
								</div>
							
							</form>
						</div>
					</div>
			</div>
		</div>
	</div>














<?php include('include/footer.php');?>