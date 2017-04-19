<?php 
	require 'session.php';
	require 'connect.php';
	
	
	if(isset($_POST['post_title']) && isset($_POST['post_description']) && isset($_POST['category']) && isset($_POST['tag_item']) && isset($_FILES['feature_image']['name'])){
		
		$post_title					=	$_POST['post_title'];
		$post_description			=	$_POST['post_description'];
		$post_category				=	$_POST['category'];
		$post_tag					=	$_POST['tag_item'];
		
		
		
		
		
		if(!empty($post_title) && !empty($post_description) && !empty($post_category) && !empty($post_tag)){
			
			$statement = $db->prepare("SHOW TABLE STATUS LIKE 'tbl_post'");
			$statement->execute();
			$result = $statement->fetchAll();
			foreach($result as $row)
				$new_id = $row[10];
				
			
			$up_filename=$_FILES["feature_image"]["name"];
			$file_basename = substr($up_filename, 0, strripos($up_filename, '.')); // strip extention
			$file_ext = strtolower(substr($up_filename, strripos($up_filename, '.'))); // strip name
			$new_file = $new_id . $file_ext;
			
			if(($file_ext!='.png')&&($file_ext!='.jpg')&&($file_ext!='.jpeg')&&($file_ext!='.gif')){
				$error_message = "You did not upload a valid image";
			}else{
				move_uploaded_file($_FILES["feature_image"]["tmp_name"],"uploads/" . $new_file);
			}
			
			
			$i = 0;
			if(is_array($post_tag)){
				foreach($post_tag as $key => $value){
					$arr[$i] = $value;
					//echo $arr[$i]. "<br />";
					$i++;
				}
			}
			$post_tag_id = implode(",",$arr);
			
			date_default_timezone_set("Asia/Dhaka"); 
			
			$post_date = date("Y-M-D");
			
			$post_time = date('h:ia');
			
			
			
			$statement = $db->prepare("INSERT INTO description(post_title, post_description, post_image, cat_id,tag_id, post_date, post_time) VALUES(?, ?, ?, ?, ?, ?, ?)");
			$statement->execute(array($post_title,$post_description,$new_file,$post_category, $post_tag_id,$post_date, $post_time));
			
			$success_message = "Post has been published";
			
		}else{
			$error_message = "You must fill all field";
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
			
				<div class="title"> 
				
					<h2>Add new post</h2>
					
				</div>
				
				<div class="success">
				
					<?php if(isset($success_message)){echo $success_message;}?>
					
				</div>
				
				<div class="error"> 
				
					<?php if(isset($error_message)){echo $error_message;}?>
					
				</div>
				
				<div class="post">
				
					<form action="" method="POST" enctype="multipart/form-data">
					
						<div class="form-group"> 
						
							<label for="">Title</label>
							
							<input type="text" name="post_title" class="form-control"/>
							
						</div>
						
						<div class="form-group"> 
							
							<label for="">Description</label>
							
							<textarea name="post_description" class="form-control" id="" cols="30" rows=" "></textarea>
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
									var editor = CKEDITOR.replace( 'post_description' );
									//editor.setData( '<p>Just click the <b>Image</b> or <b>Link</b> button, and then <b>&quot;Browse Server&quot;</b>.</p>' );
								}

							</script>
						</div>
						<?php if(isset($error_message)){echo $error_message;}?>
						<div class="form-group"> 
							<label for="">Features Image</label>
							<input type="file" name="feature_image" />
							
						</div>
						
						<div class="form-group">
						
							<select name="category" id="category" class="form-control">
								<option value="">Select One</option>
								<?php 
								
									$statement	=	$db->prepare("SELECT * FROM category ORDER BY cat_name ASC");
									$statement->execute();
									$row = $statement->fetchAll(PDO::FETCH_ASSOC);
									
									foreach($row as $value){
										$cat_name	=	$value['cat_name'];
										$cat_id		=	$value['cat_id'];
										
										?> 
										 
										 <option value="<?php echo $cat_id;?>"><?php echo $cat_name;?></option>
										 
										<?php
									}
									
									
								
								?>
								
							</select>
							
						</div>
						
						<div class="form-group"> 
						
							
							<h2>Tags</h2>
							<?php 
							
								$statement = $db->prepare("SELECT * FROM tags ORDER BY tag_name ASC");
								$statement->execute();
								$results = $statement->fetchAll(PDO::FETCH_ASSOC);
								
								foreach($results as $value){
									
									$tag_name	=	$value['tag_name'];
									$tag_id		=	$value['tag_id'];
									
									?>
									
									<input type="checkbox" name="tag_item[]" value="<?php echo $tag_id;?>"/> <?php echo $tag_name;?> <br />
									
									<?php
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