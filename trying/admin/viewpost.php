<?php 
	require 'session.php';
	require 'connect.php';
	
	// Delete Post
	if(isset($_REQUEST['id'])){
		$delet_post = $_REQUEST['id'];
		$statement = $db->prepare("DELETE FROM description WHERE post_id=?");
		$statement->execute(array($delet_post));
		
		$success_message = "You have deleted your post";
	}
	
	
	
?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	
	<title>Admin Panel</title>
	
	<!-- JS -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" media="all" />
	
	<link rel="stylesheet" type="text/css" href="css/style.css" media="all" />
	
	<style type="text/css"> 
		table th{
			text-align:center;
		}
		table tr {
			overflow:hidden !important;
		}
	</style>
	
	<!-- Script -->
	<script type="text/javascript"> 
		function confirm_delete(){
			
			return confirm('Are you sure want to delete this?');
		}
	</script>
	
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
				<?php if(isset($success_message)){echo $success_message;}?>
				<table class="table table-bordered table-striped text-center" > 
				
					<tr>
						<th>Serial</th>
						
						<th>Title</th>
						
						<th>Action</th>
						
					</tr>
					
					<?php 
					
						$i = 0;
						$statement = $db->prepare("SELECT * FROM description");
						$statement->execute();
						$row = $statement->fetchAll(PDO::FETCH_ASSOC);
						
						foreach($row as  $value){
							$title 				= $value['post_title'];
							$description 		= $value['post_description'];
							$post_image 		= $value['post_image'];
							$cat_id		 		= $value['cat_id'];
							$tag_id		 		= $value['tag_id'];
							$post_date		 	= $value['post_date'];
							$post_time		 	= $value['post_time'];
							$i++;
							?>
							
					<tr>
						<td><?php echo $i;?></td>
						
						<td><?php echo $title;?></td>
						
						<td>
						
							<a href="" data-toggle="modal" data-target="#myModal<?php echo $i;?>" >View</a>
							
						</td>
						
						<!-- Modal -->
						<div id="myModal<?php echo $i;?>" class="modal fade" role="dialog">
						
							<div class="modal-dialog">

								<!-- Modal content-->
								<div class="modal-content">
								
									<div class="modal-header">
									
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										
										<h4 class="modal-title"><?php echo $title;?></h4>
										
										<p style="font-size:10px">Posted on <?php echo $post_date." at ". $post_time;?></p>
										
									</div>

									<div class="modal-body">
									
										<p><?php echo $description;?></p>
										<div class="date_andtime"> 
											
										</div>
										<img class="img-responsive" src="uploads/<?php echo $post_image;?>" alt="image" />
										<div class="category"> 
											<h2>Category</h2>
											<?php 
												$statement = $db->prepare("SELECT * FROM category WHERE cat_id=?");
												$statement->execute(array($cat_id));
												$result =$statement->fetchAll(PDO::FETCH_ASSOC);
												foreach($result as $key){
													echo$key['cat_name'];
												}
											?>
										</div>
										<div class="tag"> 
											<h2>Tags</h2>
											<?php 
												$statement = $db->prepare("SELECT * FROM tags WHERE tag_id=?");
												$statement->execute(array($tag_id));
												$result =$statement->fetchAll(PDO::FETCH_ASSOC);
												foreach($result as $key){
													echo$key['tag_name'];
												}
											?>
										</div>
										<a class="btn btn-primary" onclick="return confirm_delete()" href="viewpost.php?id=<?php echo $value['post_id']?>">Delete</a><a href="edit.php?id=<?php echo $value['post_id'];?>" class="btn btn-default" style="margin-left:5px">Eadit</a> 
										
									</div>
									
									<div class="modal-footer">
									
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										
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
		
	</section>
	
	<!-- JS -->
	<script type="text/javascript"  src="js/main.js"> </script>
	
	<script type="text/javascript"  src="js/bootstrap.min.js"> </script>
	
</body>
</html>