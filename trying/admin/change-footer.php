<?php 
	require 'session.php';
	require 'connect.php';
	
?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Admin Panel</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" media="all" />
	<link rel="stylesheet" type="text/css" href="css/style.css" media="all" />
</head>
<body>
	<section id="header"> 
		<div class="container">
			<div class="row">
				<div class="header"> 
					<h2>Admin Panel</h2>
				</div>
			</div>
		</div>
	</section>
	<section id="content"> 
		<div class="container">
			
				
			<div class="side-bar"> 
				<nav>

					<ul class="nav">
						<li><p>Page Options </p></li>
						<li><a href="index.php">Home</a></li>
						<li><a href="change-footer.php">Change Footer Text</a></li>
						<li><a href="changepasswod.php">Change Password</a></li>
						<li><a href="logout.php">Log Out</a></li>
						
						<li><p>Blog Options</p></li>
						<li><a href="addpost.php">Add Post</a></li>
						<li><a href="viewpost.php">View Post</a></li>
						<li><a href="category.php">Mange Category</a></li>
						<li><a href="tags.php">Manage Tags</a></li>
						
						<li><p>Comments Options</p></li>
						<li><a href="managecomment.php">Manage Comments</a></li>
						
					</ul>
					  
					
				</nav>
			</div>
				<div class="space"></div>
			<div class="item"> 
				<div class="title"> 
					<h2>Change Footer Content</h2>
				</div>
				
				<div class="footer-text" style="padding: 15px"> 
					<form action="" method="post">
						<div class="form-group"> 
							<label for="">Change content</label>
							<input type="text" name="footer_text" class="form-control"/>
						</div>
						<div class="form-group"> 
							<button type="submit" style="padding:10px 25px" class="btn btn-success btn-lg" >Save</button>
						</div>
					</form>
				</div>
			</div>
				
			
		</div>
	</section>
	<script type="text/javascript"  src="js/main.js"> </script>
	<script type="text/javascript"  src="js/bootstrap.min.js"> </script>
</body>
</html>