<?php 
	if(isset($_GET['deta'])){
		$file = $_GET['deta'];
		
		$file_path = 'upload/'.$file;
		
		header('Content-Type: application/octet-stream');
		
		header('Content-disposition:attachment; filename="'.$file_path.'"');
		
		readfile($file_path);
		
		exit();
	}

?>

<img src="<?php echo $file_path?>" alt="" />