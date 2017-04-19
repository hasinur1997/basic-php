<?php 
	require 'session.php';
	require 'connect.php';
	
	if(!isset($_REQUEST['id'])){
		header('location: viewpost.php');
	}else{
		$id = $_REQUEST['id'];
		
		$statement = $db->prepare("SELECT * FROM description WHERE post_id=?");
		$statement->execute(array($id));
		$row = $statement->fetch(PDO::FETCH_ASSOC);
		
		
			$title				= $row['post_title'];
			$description		= $row['post_description'];
			$image				= $row['post_image'];
			$cat_id				= $row['cat_id'];
			$tag_id				= $row['tag_id'];
		
	}
	
	
	
	if(isset($_POST['post_title']) && isset($_POST['post_description']) && isset($_POST['category']) && isset($_POST['tag'])){
		
		$post_title					=	$_POST['title'];
		$post_description			=	$_POST['description'];
		$post_category				=	$_POST['category'];
		$post_tag					=	$_POST['tag'];
		
		
		if(!empty($post_title) && !empty($post_description) && !empty($post_category) && !empty($post_tag)){
			
			if(empty($_FILES['feature_image']['name'])){
				$statement = $db->prepare('UPDATE description SET post_title=?, post_description=?, cat_id=?, tag_id=? WHERE post_id=?');
				$statement->execute(array($post_title, $post_description, $post_category, $post_tag, $id));
			}else{
				
				$up_filename=$_FILES["feature_image"]["name"];
				$file_basename = strtolower(substr($up_filename, 0, strripos($up_filename, '.'))); 
				$file_ext = substr($up_filename, strripos($up_filename, '.'));
				$f1 = $id . $file_ext;
				
				if(($file_ext!='.png')&&($file_ext!='.jpg')&&($file_ext!='.jpeg')&&($file_ext!='.gif')){
					$error_message = "You selected a invalid image";
				}else{
					$statement = $db->prepare('SELECT * FROM description WHERE post_id=?');
					$statement->execute(array($id));
					
					$row = $statement->fetchAll(PDO::FETCH_ASSOC);
					foreach($row as $value){
						$real_path = 'uploads/'. $value['post_image'];
						unlink($real_path);
					}
					move_uploaded_file($_FILES["feature_image"]["tmp_name"],'uploads/'.$f1);
					
					
					
					$statement = $db->prepare('UPDATE description SET post_title=?, post_description=?, post_image=?, cat_id=?, tag_id=? WHERE post_id=?');
					$statement->execute(array($post_title, $post_description, $f1, $cat_id, $tag_id, $id));
					
				}
			
			
				$success_message =  "You have successfully updated your post";
			}
		}
	}

	
?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Admin Panel</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" media="all" />
	<link rel="stylesheet" type="text/css" href="css/style.css" media="all" />
	
	<script type="text/javascript"  src="js/main.js"> </script>
	<script type="text/javascript"  src="ckeditor/ckeditor.js"> </script>
	<script type="text/javascript"  src="js/bootstrap.min.js"> </script>
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
				<div class="success"> 
					<?php if(isset($success_message)){echo $success_message;}?>
				</div>
			
				<div class="title"> 
				
					<h2>Add new post</h2>
					
				</div>
				
				<div class="post">
				
					<form action="" method="POST" enctype="multipart/form-data">
						<input type="hidden" name="hdn" value="<?php echo $id;?>"/>
						<div class="form-group"> 
						
							<label for="">Title</label>
							
							<input type="text" value="<?php echo $title;?>" name="title" class="form-control"/>
							
						</div>
						
						<div class="form-group"> 
							
							<label for="">Description</label>
							
							<textarea value="" name="description" class="form-control" id="" cols="30" rows=" "><?php  echo $description;?></textarea>
							<script type="text/javascript">
								if ( typeof CKEDITOR == 'undefined' )
								{
									document.write(
										'<strong><span style="color: #ff0000">Error</span>: CKEditor not found</strong>.' +
										'This sample assumes that CKEditor (not included with CKFinder) is installed in' +
										'the "/ckeditor/" path. If you have it installed in a different place, just edit' +
										'this file, changing the wrong paths in the &lt;head&gt; (line 5) and the "BasePath"' +
										'value (line 32).' ) ;
								}
								else
								{
									var editor = CKEDITOR.replace( 'description' );
									//editor.setData( '<p>Just click the <b>Image</b> or <b>Link</b> button, and then <b>&quot;Browse Server&quot;</b>.</p>' );
								}

							</script>
						</div>
						<div class="previous_image"> 
							<img src="uploads/<?php echo $image;?>" alt="image" />
						</div>
						<div class="form-group"> 
							<label for="">Features Image</label>
							<input type="file" name="feature_image" />
							
						</div>
						
						<div class="form-group">
						
							<select name="category" id="category" class="form-control">
								<?php 
									$statement = $db->prepare('SELECT * FROM category');
									$statement->execute();
									$result = $statement->fetchAll(PDO::FETCH_ASSOC);
									
									foreach($result as $key){
										
										?>
											<option value="<?php echo $key['cat_id'];?>" <?php if($key['cat_id'] == $cat_id){echo 'selected';}?>><?php echo $key['cat_name'];?></option>
										<?php
									}
									
								?>
								
							</select>
							
						</div>
						
						<div class="form-group"> 
							<h2>Tags</h2>
							
							<?php 
								$tag = $db->query("SELECT * FROM tags");
								$result = $tag->fetchAll(PDO::FETCH_ASSOC);
								foreach($result as $row){
									 $row['tag_id'];
									$row['tag_name'];
									
									if($row['tag_id'] == $tag_id){
										?>
										
											<input type="checkbox" checked name="tag" /> <?php echo $row['tag_name'];;?> <br />
										
										<?php
									}else{
										?>
										
											<input type="checkbox" name="tag" /> <?php echo $row['tag_name'];?> <br />
										
										<?php
									}
								}
							?>
							
							
							
							
						</div>
						
						<div class="form-group"> 
						 
						 <button class="btn btn-success btn-lg" type="submit">Publish</button>
						
						</div>
						
					</form>
					
				</div>
				
			</div>

			
		</div>
		
	</section>
	

	
	
</body>
</html>