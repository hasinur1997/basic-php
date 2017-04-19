<?php 
require_once('init/connection.php');
	session_start();
	if(!$_SESSION['user']){
		header('location:login.php');
	}
	
	$user = $db->prepare("SELECT * FROM users WHERE id = ?");
	$user->execute([$_SESSION['user']]);
	$data = $user->fetch(PDO::FETCH_OBJ);
	
	
include('include/header.php');
?>



<div class="container"> 
	
	<div class="row"> 
		<div class="col-md-4"></div>
		<div class="col-md-6 col-md-offset-3"> 
			<h4>Welcome <?php echo $data->first_name." ". $data->last_name;?></h4>
		</div>
	</div>

</div>













<?php include('include/footer.php')?>