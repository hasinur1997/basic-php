<?php require  'app/init.php';?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Like</title>
</head>
<body>
	<?php foreach($results as $result):?>
	<h2><?php echo $result->title;?></h2>
	<a href="like.php?type=article&id=<?php echo $result->id;?>">Like</a>

	<p>x people like this</p>
	<ul>
		<li>hasinur</li>
	</ul>








<?php endforeach?>
</body>
</html>