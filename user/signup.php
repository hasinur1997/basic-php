<?php 
	require_once('init/connection.php');
	session_start();

	if($_SESSION['user']){
		header('location:index.php');
	}
	$errors = [];
	$alert = [ 
		'status' => false,
		'message' => ''
	];
	if(!empty($_POST)){
		
		if(empty($_POST['first_name'])){
			
			$errors['first_name'] = "Please Enter Your First Name";
		}
		
		if(empty($_POST['last_name'])){
			
			$errors['last_name'] = "Please Ente Your Last Name";
		}
		
		if(empty($_POST['address'])){
			
			$errors['address'] = "Please Enter Your Address";
		}
		
		if(empty($_POST['username'])){
			
			$errors['username'] = 'Please Chose a user name';
		}
		
		if(empty($_POST['password'])){
			
			$errors['password'] = 'Please Enter a password';
		}
		
		
		if(count($errors) === 0){
			$password = md5($_POST['password']);
			$insert = $db->prepare("INSERT INTO users(first_name, last_name, address, username, password) VALUES(?, ?, ?, ?, ?)");
			
			$insert = $insert->execute([$_POST['first_name'], $_POST['last_name'], $_POST['address'], $_POST['username'], $password]);
			
			if($insert){
				$alert = [
					'message' => 'Your data has been sent successfully',
					'status' => true
				];
			}else{
				$alert = [
					'message' => 'Something went wrong',
					'status' => false
				];
			}
		}
	}
	include('include/header.php');
?>


	<div class="container"> 
		<div class="row"> 
			<div class="col-md-6 col-md-offset-3"> 
				<?php if($alert['status']): ?>
						
							<div class="alert alert-info"> 
								<p class="message"><?php echo $alert['message']?></p>
							</div>
						<?php endif?>
						
			
					<div class="panel panel-info">
						<div class="panel-heading"> 
							Sign Up
						</div>
						
						<div class="panel-body"> 
							<form action="" method="POST">
								<!-- First Name Field -->
								<div class="form-group<?php echo array_key_exists('first_name', $errors)? ' has-error' : ''?>"> 
									<label for="first_name" class="control-label">First Name</label>
									<input type="text" id="first_name" name="first_name" class="form-control"/>
									
									<?php if(array_key_exists('first_name', $errors)):?>
										<b class="help-block"><?php echo $errors['first_name'];?></b>
									<?php endif?>
								</div>
								
								<!-- Last Name Field -->
								<div class="form-group<?php echo array_key_exists('last_name', $errors)? ' has-error' : ''?>"> 
									<label for="last_name" class="control-label">Last Name</label>
									<input type="text" id="last_name" name="last_name" class="form-control"/>
									
									<?php if(array_key_exists('last_name', $errors)):?>
										<b class="help-block"><?php echo $errors['last_name'];?></b>
									<?php endif?>
								
								</div>
								
								<!-- Address Field -->
								<div class="form-group<?php echo array_key_exists('address', $errors)? ' has-error' : ''?>"> 
									<label for="address" class="control-label">Address</label>
									<input type="text" id="address" name="address" class="form-control"/>
									
									<?php if(array_key_exists('address', $errors)):?>
										<b class="help-block"><?php echo $errors['address'];?></b>
									<?php endif?>
								</div>
								
								<!-- User Name Field -->
								<div class="form-group<?php echo array_key_exists('username', $errors)? ' has-error' : ''?>"> 
									<label for="username" class="control-label">User Name</label>
									<input type="text" id="username" name="username" class="form-control"/>
									
									<?php if(array_key_exists('username', $errors)):?>
										<b class="help-block"><?php echo $errors['username'];?></b>
									<?php endif?>
								</div>
								
								
								<!-- User Name Field -->
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