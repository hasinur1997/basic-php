<?php 
	/*try{
	$db = new PDO('mysql:host=localhost; dbname=test', 'root', '');
}catch(PDOException $e){
	$e->getMessage();
};

$result = $db->prepare("SELECT * FROM user");
$result->execute();
$data = $result->fetchAll(PDO::FETCH_OBJ);
$x = 1;


session_start();
$_SESSION['captcha'] =  ['first' => rand(1, 11), 'second' => rand(1, 12)];

if(!empty($_POST)){
	if(($_SESSION['captcha']['first'] + $_SESSION['captcha']['second']) == $_POST['captcha']){

	echo "Ok";

	}
	else{
		echo "false";
	}

}

1*2*4*5*10

*/

$name = "Hasinur Rahman";
$age = 20;
$country  = ['Bangladesh', 'Pakistan', 'India', 'Sri-Lanka'];

$result = compact("country");

var_dump($result);


?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
</head>
<body>
	



	<!--<div class="wrapper"> 
		<div class="container"> 
			<div class="row"> 
				<div class="col-md-2"></div>
				<div class="col-md-8">
					
					<table class="table table-bordered table-condensed table-striped table-hover text-center"> 
						<tr> 
							<th>Serial No</th>
							<th>Name</th>
							<th>Email</th>
							<th>Phone</th>
						</tr>
						<?php foreach($data as $row):?>
							<tr> 
								<td><?php echo $x;?></td>
								<td><a  href="" id="<?php echo $row->id;?>" class="hover"><?php echo $row->name;?></a></td>
								<td><?php echo $row->email;?></td>
								<td><?php echo $row->phone;?></td>
							</tr>
							<?php $x++;?>
						<?php endforeach;?>
					</table>
				</div>
				<div class="col-md-2"></div>
			</div>
		</div>
	</div>

	<div class="container"> 
		<div class="row"> 
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<form action="" method="POST"> 
					<div class="form-group"> 
						<label for="captcha">
						<?php echo $_SESSION['captcha']['first']. " + " .$_SESSION['captcha']['second']?>
					</label>
					<input type="text" name="captcha" class="form-control">
					</div>

					<div class="form-group"> 
						<input type="submit" class="btn btn-default" value="Submit">
					</div>

				</form>
			</div>
			<div class="col-md-4"></div>
		</div>
	</div>



	<script src="bootstrap/js/jquery.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script> 
		$(document).ready(function(){
			$('.hover').tooltip({
				title:fetchData,
				html:true,
				placement: 'bottom'
			});

			function fetchData(){
				var fetchData = '';
				var element = $(this);
				var id = element.attr("id"); 

				$.ajax({
					url:'fetch.php',
					type:'POST',
					async:false,
					data:{id:id},
					success: function(data){
						fetchData = data;
					}
				});

				return fetchData;
			}
		});
	</script>-->
</body>
</html>