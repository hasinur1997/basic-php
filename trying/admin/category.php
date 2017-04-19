<?php 
	require 'session.php';
	require 'connect.php';
	
	// Set Category Name
	if(isset($_POST['category'])){
		
		$category = $_POST['category'];
		
		if(!empty($category)){
			
			$statement = $db->prepare("SELECT * FROM category WHERE cat_name =?");
			
			$statement->execute(array($category));
			
			$row = $statement->rowCount();
			
			if($row > 0){
				
				$error_message = "The category ". $category ." is already exist";
				
			}else{
				
				$statement = $db->prepare("INSERT INTO category(cat_name) VALUES(?)");
				
				$statement->execute(array($category));
				
				$success_message = "Your category has been sent";
			}
		}else{
			
			$error_message = "Category can not be empty";
		}
	}
	
	
	// Update Category
	if(isset($_POST['update_category']) && isset($_POST['hdn'])){
		
		$update_category	=	$_POST['update_category'];
		$hdn				=	$_POST['hdn'];
		
		if(!empty($update_category)){
			
			$statement = $db->prepare("UPDATE category SET cat_name =? WHERE cat_id=?");
			$statement->execute(array($update_category, $hdn));
			$success_message = "Category name has been update";
		}
	}
	
	// Delete Category
	if(isset($_REQUEST['id'])){
		
		$delete_id = $_REQUEST['id'];
		
		$statement = $db->prepare("DELETE FROM category WHERE cat_id =?");
		$statement->execute(array($delete_id));
		
		$success_message = "Your category has been deleted";
	}
?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Admin Panel</title>
	
<!-- CSS -->	

	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" media="all" />
	
	<link rel="stylesheet" type="text/css" href="css/style.css" media="all" />
	
</head>

<body>
	<!-- Header Section -->
	<section id="header"> 
	
		<div class="container">
		
			<div class="row">
			
				<div class="header"> 
				
					<h2>Admin Panel</h2>
					
				</div>
				
			</div>
			
		</div>
		
	</section>
	
	<!-- Content Section -->
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
				
					<h2>Add Category</h2>
					
				</div>
				
				<div class="category"> 
				
					<div class="error"> 
					
						<?php if(isset($error_message)){echo $error_message."<span class='cross'>x</span>";}?>
						
					</div>
					
					<div class="success"> 
						
						<?php if(isset($success_message)){echo $success_message."<span class='cross glyphicon glyphicon-remove'></span>";}?>
						
					</div>
					
					<form action="" method="POST">
					
						<div class="form-group"> 
						
							<label for="">add category</label>
							
							<input type="text" name="category" class="form-control"/>
							
						</div>
						
						<div class="form-group"> 
						
							<button type="submit" class="btn btn-success btn-lg">Save</button>
							
						</div>
						
					</form>
					
				</div>
				
				<div class="view-category"> 
				
					<h2>All category</h2>
					
					<table class="table table-bordered table-striped text-center"> 
					
						<tr>
						
							<th>Serial</th>
							
							<th>Title</th>
							
							<th>Action</th>
							
						</tr>
						
						<?php 
						
							$i = 0;
							
							$result = $db->prepare("SELECT * FROM category ORDER BY cat_name ASC");
							$result->execute();
							
							$row = $result->fetchAll(PDO::FETCH_ASSOC);
							
							foreach($row as $value){
								
								$i++;
								$cat_name	=	$value['cat_name'];
								$cat_id	=	$value['cat_id'];
								
								
								?>
								
								<tr>
								
									<td><?php echo $i;?></td>
									
									<td><?php echo $cat_name;?></td>
									
									<td> <a data-toggle="modal" data-target="#edit<?php echo $i;?>" href="">Edit</a>&nbsp;|&nbsp;<a onclick="return confirm_delete()" href="category.php?id=<?php echo $cat_id;?>">Delete</a></td>
									
									
									<div id="edit<?php echo $i;?>" class="modal fade" role="dialog">
						
										<div class="modal-dialog">

											<!-- Modal content-->
											<div class="modal-content">
											
												<div class="modal-header">
												
													<button type="button" class="close" data-dismiss="modal">&times;</button>
													
													<h4 class="modal-title">Update Category</h4>
													
												</div>

												<div class="modal-body">
												
													<form action="" method="POST"> 
													
														<input type="hidden" name="hdn" value="<?php echo $cat_id;?>"/>
														
														<div class="form-group"> 
															<label for="">Change Category</label>
															<input type="text" name="update_category" / class="form-control" value="<?php echo $cat_name;?>">
															
														</div>
														
														<div class="form-group"> 
														
															<input type="submit" class="btn btn-success" value="Update"/>
															
														</div>
														
													</form>
													
												</div>
												
												<div class="modal-footer">
												
													<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
													
												</div>
												
											</div>
											
										</div>
										
									</div>
									
								</tr>

								<?php
							}
						?>
						
					</table>
				</div>
				
			</div>
			
		</div>
		
	</section>
	
<!-- JS -->
	<script type="text/javascript"  src="js/main.js"> </script>
	
	<script type="text/javascript"  src="js/bootstrap.min.js"> </script>
	
	<script type="text/javascript"  src="js/script.js"> </script>
	
	
	
</body>
</html>