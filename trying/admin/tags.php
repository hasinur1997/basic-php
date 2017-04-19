<?php 
	require 'session.php';
	require 'connect.php';
	
	// Set New Tag
	if(isset($_POST['tags'])){
		
		$tags	=	$_POST['tags'];
		
		if(!empty($tags)){
			
			$statement = $db->prepare("SELECT * FROM tags WHERE tag_name=?");
			$statement->execute(array($tags));
			
			$row = $statement->rowCount();
			
			if($row > 0){
				
				$error_message	=	"Tag is already exist";
				
			}else{
				
				$statement = $db->prepare("INSERT INTO tags(tag_name) VALUES(?)");
				$statement->execute(array($tags));
				
				$success_message = "The tag has been sent";
			}
		}else{
			$error_message = "Tag name can not be empty";
		}
	}
	
	
	// Update Old Tag
	
	if(isset($_POST['update_tag']) && isset($_POST['hdn'])){
		
		$update_tag		=	$_POST['update_tag'];
		$hdn			=	$_POST['hdn'];
		
		if(!empty($update_tag)){
			
			$statement = $db->prepare("UPDATE tags SET tag_name=? WHERE tag_id=?");
			$statement->execute(array($update_tag, $hdn));
			$success_message = "Tag name has been update";
			
		}else{
			
			$error_message = "Tag name can not be empty";
		}
	}
	
	
	// Delete Tag
	
	if(isset($_REQUEST['id'])){
		
		$delete_tag = $_REQUEST['id'];
		
		$statement = $db->prepare("DELETE  FROM tags  WHERE tag_id =?");
		$statement->execute(array($delete_tag));
		
		$success_message = "Your tag has been deleted";
		
	}
?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>

	<meta charset="UTF-8">
	
	<title>Admin Panel</title>
	
	<!-- CS -->
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
				
					<h2>Add Tags</h2>
					
				</div>
				
				<div class="tags"> 
				
					<div class="error">
					
						<?php if(isset($error_message)){echo $error_message. '<span class="cross glyphicon glyphicon-remove"></span>';}?>
						
					</div>
					
					<div class="success"> 
					
						<?php if(isset($success_message)){echo $success_message. '<span class="cross glyphicon glyphicon-remove"></span>';}?>
						
					</div>
					
					<form action="" method="POST">
					
						<div class="form-group"> 
						
							<label for="">Add tags</label>
							
							<input type="text" name="tags" class="form-control"/>
							
						</div>
						
						<div class="form-group"> 
						
							<button type="submit" class="btn btn-success btn-lg">Save</button>
							
						</div>
						
					</form>
					
				</div>
				
				<div class="view-all-tags"> 
				
					<table class="table table-bordered table-striped text-center"> 
					
						<tr>
						
							<th>Serial</th>
							
							<th>Title</th>
							
							<th>Action</th>
							
						</tr>
						
						<?php 
						
							$i = 0;
							
							$statement = $db->prepare("SELECT * FROM tags");
							$statement->execute();
							$result = $statement->fetchAll(PDO::FETCH_ASSOC);
							
							foreach($result as $value){
								
								$i++;
								$tag_name	=	$value['tag_name'];
								$tag_id	=	$value['tag_id'];
								
								?>
									<tr>
									
										<td><?php echo $i;?></td>
										
										<td><?php echo $tag_name;?></td>
										
										<td><a href="" data-toggle="modal" data-target="#edit<?php echo $i;?>" >Edit</a>&nbsp;|&nbsp;<a onclick="return confirm_delete()" href="tags.php?id=<?php echo $value['tag_id'];?>">Delete</a></td>
										
										
										<div id="edit<?php  echo $i;?>" class="modal fade" roll="dialog">
										
											<div class="modal-dialog"> 
											
												<div class="modal-content"> 
												
													<div class="modal-header"> 
													
														<h2>Update tag</h2>
														
													</div>
													
													<div class="modal-body"> 
													
														<div class="error">
					
															<?php if(isset($error_message)){echo $error_message. '<span class="cross glyphicon glyphicon-remove"></span>';}?>
						
														</div>
														
														<form action="" method="POST">
															<input type="hidden" name="hdn" value="<?php $value['tag_id'];?>"/>
															<div class="form-group">
																<label for="">Change Tag</label>
																<input type="text" name="update_tag"class="form-control" value="<?php echo $tag_name;?>"/>
																
															</div>
															
															<div class="form-group">
																
																<input type="submit" value="Update" class="btn btn-success btn lg"/>
																
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
	
	<script type="text/javascript" src="js/script.js"></script>
	
</body>
</html>