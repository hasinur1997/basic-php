<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
	<div class="container"> 
		<div class="row"> 
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<div class="login"> 
					<form action="" method="POST" >
						
						<div class="form-group">
							<label for="name">Name:</label> 
							<input type="text" name="name" id="name" class="form-control">
						</div>
						<div class="form-group"> 
							<label for="password">Password:</label>
							<input type="password" name="password" id="password" class="form-control"><button class="btn  btn-primary" id="sh">Show</button>
						</div>
						<div class="form-group"> 
							<input type="submit" class="btn btn-default">
						</div>
					</form>
				</div>

			</div>
			<div class="col-md-3"></div>
		</div>
	</div>

	<div class="container"> 
		<div class="row"> 
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<div class="accrodion"> 
					
				</div>
			</div>
			<div class="col-md-3"></div>
		</div>	
	</div>

	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	 <script>  
 		$(document).ready(function(){

 			$('#sh').on("click", function(e){
 				e.preventDefault();
 				var password = $('#password');
 				var passwordType = password.attr('type');

 				if(passwordType == 'password'){
 					password.attr('type', 'text');
 					$(this).text('Hide');
 				}else{

 					password.attr('type', 'password');
 					$(this).text('Show');
 				}
 			});
 		}); 
 </script> 
</body>
</html>