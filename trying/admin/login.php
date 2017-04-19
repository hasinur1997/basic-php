<?php 
	

	require 'connect.php';
	
	
	
	
	
	
	
	
	
	if(isset($_POST['username']) && isset($_POST['password'])){
		
		$username			=	$_POST['username'];
		
		$password			=	$_POST['password'];
		
		if(!empty($username) && !empty($password)){
			
			$statement = $db->prepare("SELECT * FROM admin WHERE username =? AND password =?");
			
			$statement->execute(array($username, $password));
			$row	=	$statement->rowCount();
			//$query = mysql_query("SELECT *  FROM admin WHERE username = '$username' AND password = '$password'");
			
			if($row > 0){
				
				session_start();
				$_SESSION['hasinur']	=	'hasinur';
				header('location: index.php');
				
			}else {

				 $error = "Invalid username or password";
			}
			
		}else{
			$empty = "Username and password can not be empty";
		}
	}
	
	
?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Admin Login</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" media="all" />
	<link rel="stylesheet" type="text/css" href="css/style.css" media="all" />
	<style type="text/css"> 
		input[type=text], input[type="password"]{
			font-size:18px;
		}
	</style>
</head>
<body style="color:#F1F1F1; background:#F1F1F1" >
	<div class="login"> 
		<div class="container">
			<div class="row">
				<div class="login-form">
					<h2>Admin Login</h2>
					<div class="error" style="color:red"> 
						<?php
						if(isset($error)){
							echo $error;
						}
						if(isset($empty)){
							echo $empty;
						}
						?>
					</div>
					<form action="" method="POST">
						<div class="form-group"> 
							<label for="">User Name</label>
							<input type="text" name="username" class="form-control" />
						</div>
						
						<div class="form-group"> 
							<label for="">Password</label>
							<input type="password" name="password" class="form-control" />
						</div>
						
						<div class="form-group submit-button"> 
							 <input type="submit" class="btn btn-default btn-large" value="Submit">
						</div>
						
						
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>