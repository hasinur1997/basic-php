<?php
	require('init.php');
	 
	if(!logged_in()){
		header('location:index.php');
	}
	$rules = [ 

		'required' => ':field is required',

	];
	$errors = [
		'post-title' => [ 
			'required' => true,

			'size' => 255,
		], 

		'post-body' => [
			'required' => true,
		],
	];

	if(!empty($_POST)){

		$title = $_POST['post-title'];

		$body = $_POST['post-body'];

		$image = $_FILES['post-image'];

		$img_name = $image['name'];

		$img_tmp = $image['tmp_name'];

		$img_size = $image['tmp_name'];


		if(empty($title)){

			$errors = "Title is required";
		}

		if(empty($body)){

			$errors = "Post description is required";
		}

		if($img_name){
			echo"Ok";
		}else{
			echo "Not found";
		}
	}
include("includes/header.php");
?>

	<div class="content"> 
		<div class="col-md-8 col-md-offset-2"> 
			<div class="panel panel-info"> 
				<div class="panel-heading"> 
					Create Post
				</div>
				<div class="panel-body"> 
					<form action="" method="post" enctype="multipart/form-data"> 
						<!-- Post Title -->
						<div class="form-group"> 
							<label for="post-title" class="control-label">Post Title</label>
							<input type="text" name="post-title" id="post-title" class="form-control">
						</div>

						<!-- Post Body -->
						<div class="form-group"> 
							<label for="post-body" class="control-label">Post Body</label>
							<textarea  name="post-body" id="post-body" cols="30" rows="5" class="form-control text"></textarea>
						</div>

						<!-- Post Body -->
						<div class="form-group"> 
							<label for="post-img" class="control-label">Post Image</label>
							<input type="file" class="form-control" name="post-image" id="post-img">
						</div>

						<!-- Submit Field -->

						<div class="form-grup"> 
							<button class="btn btn-default" type="submit">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>



<?php include("includes/footer.php");?>