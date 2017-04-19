
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
	<nav class="navbar navbar-default"> 
		<div class="container">
			<div class="navbar-header">
				<div >
					<a class="navbar-brand" href="index.php">Site</a>
				</div>
				
			</div>
			
			<ul class="nav navbar-nav pull-right"> 
			
				<?php if(!isset($_SESSION['user'])):?>
					<li><a href="signup.php">Sign Up</a></li>
					<li><a href="login.php">Log In</a></li>
				<?php else:?>
					<li><a href="logout.php">Log Out</a></li>
					
				<?php endif?>
			</ul>
		</div>
	</nav>
	