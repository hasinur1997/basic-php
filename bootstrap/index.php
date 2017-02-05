<?php 
	require 'config.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Page title</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="form-wrapper"> 
		<div id="error"></div>
		<form action="" id="register-form" method="POST"> 
			<h2>Register Form</h2>
			<hr>
			<div class="form-group">

				<label for="name" class="control-label">Name</label> 
				<input type="text" name="name" id="name" class="form-control">

			</div>


			<div class="form-group">

				<label for="email" class="control-label">Email</label> 
				<input type="text" name="email" id="email" class="form-control">

			</div>

			<div class="form-group">

				<label for="phone" class="control-label">phone</label> 
				<input type="text" name="phone" id="phone" class="form-control">

			</div>

			<div class="form-group">
				<a href="login.php" class="btn btn-default">Back</a>
				<input type="submit" id="submit" class="btn btn-default pull-right">

			</div>

		</form>

	</div>

	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script> 
		function submitForm()
		{
			$.ajax({

				type:'POST',
				async:false,
				dataType:'json',
				data:$('#register-form').serialize(),
				url:'signup.php',
				success: function(data){
					console.log(data);
					$('#submit').html('<img src="images/loader.gif" &nbsp signing up alt="" />').attr('disabled', 'disabled');
					setTimeOut(function(){
						if(data.status == 'success'){
							$('#error').slideDown(200, function(){
								$('#error').html('<div class="alert alert-info">'+data.message+'</div>');
							});
						}
					});
				}
			});
		}
	</script>
</body>
</html>
