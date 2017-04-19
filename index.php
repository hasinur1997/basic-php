<?php 
	try{
		$db = new PDO("mysql:host=localhost;dbname=programming", "root", "");
	}catch(PDOException $e)
	{
		$e->getMessage();
	}
	
	$errors = [];
	$message = null;
	
	$class = [];
	
	if(!empty($_POST)){
		
		$name = $_POST['name'];
		
		$file = $_FILES['data'];
		
		$file_name = $file['name'];
		
		$basename = basename($file_name);
		
		$file_tmp_name = $file['tmp_name'];
		
		$file_new_name = time().$file['name'];
		
		if(empty($name)){
			
			$errors['name'] = "Plese enter your name";
		}
		
	
		if(empty($file_name)){
			
			$errors['data'] = "Plese upload a file";
		}
		
		
		if(count($errors) == 0){
			
			$data = $db->prepare("INSERT INTO test_file(name, data) VALUES(?, ?)");
			
			$data = $data->execute([$name, $file_new_name]);
			
			$upload = move_uploaded_file($file_tmp_name, 'upload/'.$file_new_name);
			
			if($data == true && $upload == true){
				
				$message = "Your data has been submitted";
				
				$class = "success";
				
			}else{
				$message = "Your data can not be submited please try again !";
				
				$class = "danger";
			}
		}
	}
	
	$data = $db->prepare("SELECT * FROM test_file");
	
	$data->execute();
	
	$data = $data->fetchAll(PDO::FETCH_OBJ);
	
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
	<style type="text/css"> 
		body{
			font-family:calibri;
		}
	</style>
</head>
<body>
	
	<nav class="navbar navbar-default"> 
		<div class="navbar-header"> 
			<a href="#" class="navbar-brand">Site</a>
		</div>
		
		<ul class="nav navbar-nav pull-right">
			<li><a href="">Home</a></li>
			<li><a href="">About</a></li>
			<li><a href="">Service</a></li>
			<li><a href="">Contact</a></li>
			
		</ul>
	</nav>


	<div class="container"> 
	
		<div class="row"> 
		
			<div class="col-md-6 col-md-offset-3"> 
				
				<?php if(isset($message) && isset($class)):?>
				
					<div class="alert alert-<?php echo $class;?>">
						<?php echo $message;?>
					</div>
					
				<?php endif?>
			
				<div class="panel panel-default"> 
				
					<div class="panel-heading"> 
					
						Creating Submit File
						
					</div>
					
					<div class="panel-body"> 
					
						<form action="" method="post" enctype="multipart/form-data"> 
						
							<div class="form-group<?php echo array_key_exists('name', $errors) ? ' has-error' : "";?>"> 
							
								<label for="name" class="control-label">Name</label>
								
								<input type="text" name="name" id="name" class="form-control"/>
								
								<?php if(array_key_exists('name', $errors)):?>
								
									<b class="help-block"><?php echo $errors['name']?></b>
								
								<?php endif?>
								
							</div>
							
							<div class="form-group<?php echo array_key_exists('data', $errors) ? ' has-error' : "";?>"> 
							
								<label for="data" class="control-label">File</label>
								
								<input type="file" name="data" id="data" class="form-control"/>
								
								<?php if(array_key_exists('data', $errors)):?>
								
									<b class="help-block"><?php echo $errors['data']?></b>
								
								<?php endif?>
								
							</div>
							
							<div class="form-group"> 
							
								<input type="submit" class="btn btn-default"/>
								
							</div>
							
						</form>
						
					</div>
					
				</div>
				
			</div>
			
		</div>
		
	</div>
	
	
	<div class="container"> 
	
		<div class="row">
		
			<div class="col-md-6 col-md-offset-3"> 
			
				<div class="panel panel-info"> 
				
					<div class="panel-heading"> 
					
						Work List
						
					</div>
					
					<div class="panel-body"> 
					
						<table class="table table-striped table-condensed">
						
							<thead>
							
								<tr>
								
									<th>Name</th>
									
									<th>File</th>
									
								</tr>
								
							</thead>
							
							<tbody> 
							
								<?php foreach($data as $d):?>
								
								<tr>
								
									<td><?php echo $d->name?></td>
									
									<td><a href="download.php?deta=<?php echo $d->data?>">Download</a></td>
									
								</tr>
								
								<?php endforeach?>
								
							</tbody>
							
						</table>
						
					</div>
					
				</div>
				
			</div>
			
		</div>
		
	</div>
	
</body>
</html>