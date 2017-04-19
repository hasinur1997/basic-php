<?php 
require('init.php');
if(logged_in()){
	header('location:home.php');
}
$errors = [];

if(!empty($_POST)){

	$username = $_POST['username'];

	$password = $_POST['password'];

	if(empty($username)){

		$errors['username'] = 'Please enter your username';
	}

	if(empty($password)){

		$errors['password'] = 'Please enter your password';
	}	

	if(count($errors) === 0){
		
		if(find($username)){

			$login = login($username, $password);

			if($login != false){

				$_SESSION['user_id'] = $login;

				header('location:home.php');
				
			}else{
				$errors['not_match'] = "Your username and password doesn't match"; 
			}
		}else{
			$errors['error_message'] = "User name not found not found";
		}
		
	}
}

?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title> 
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" media="all" />
	<link rel="stylesheet" type="text/css" href="css/style.css" media="all" />
</head>
<body>
	<div class="container"> 
		<div class="row"> 
			<div class="login"></div>
			<div class="col-md-6 col-md-offset-3"> 
				
				<?php if(isset($errors['not_match'])):?>

					<div class="alert alert-danger"> 

						<p><?php echo $errors['not_match'];?></p>

					</div>

				<?php elseif(isset($errors['error_message'])):?>

					<div class="alert alert-danger"> 

						<p><?php echo $errors['error_message'];?></p>

					</div>

				<?php endif?>

				<div class="panel panel-info">
					<div class="panel-heading"> 
						Admin Login
					</div>
					<div class="panel-body">
						<form action="" method="post" id="login-form"> 
							<!-- User Name Field -->
							<div class="form-group<?php echo array_key_exists('username', $errors) ? ' has-error' : ''?>"> 
								<label for="username" class="control-label">User Name</label>
								<input type="text" name="username" id="username" class="form-control" autocomplete="off" />

								<?php if(array_key_exists('username', $errors)):?>
									<b class="help-block"><?php echo $errors['username'];?></b>
								<?php endif?>
							</div>
							
							<!-- Password Field -->
							<div class="form-group<?php echo array_key_exists('password', $errors) ? ' has-error' : ''?>"> 
								<label for="password" class="control-label">Password</label>
								<input type="password" class="form-control" name="password" id="password" autocomplete="off"/>
								<?php if(array_key_exists('password', $errors)):?>
									<b class="help-block"><?php echo $errors['password'];?></b>
								<?php endif?>
							</div>
							
							<!-- Submit Field -->
							
							<div class="form-group"> 
								<button class="btn btn-info" type="submit">Submit</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>


	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>

</body>
</html>