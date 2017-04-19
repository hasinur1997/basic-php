<?php 

	include('includes/header.php');
?>
	<div class="container"> 
		<div class="row"> 
			<div class="col-md-7">
				<?php  for($i = 1; $i <= 10; $i++):?>
				<article id="article"> 
					<div class="post-title">
					
						<a href="single-post.php"><h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h3></a>
						
					</div>
					
					<div class="post-description"> 
						<div class="post-thumb"> 
						<img src="images/post-thumb.jpg" class="img-responsive" alt="">
					</div> 
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam eius, exercitationem aliquam libero dolores quidem blanditiis distinctio, magnam modi, obcaecati a vitae saepe recusandae voluptatem. Possimus sed rerum tempora aspernatur pariatur ratione provident eum, aliquid dolore repellat labore veritatis alias laudantium, fugit totam, aliquam quis accusamus vitae! Architecto, pariatur earum?<a href="single-post.php">Read more</a>
					
					</div>
				</article>
				
				<?php endfor?>
			</div>
			<div class="col-md-2"></div>
			<div class="col-md-3"> 
				
				<div class="card"> 
					<h2>Categories</h2>
					<ul class="list-group"> 
						<li class="list-group-item"><a href="">Category One</a></li>
						<li class="list-group-item"><a href="">Category Two</a></li>
						<li class="list-group-item"><a href="">Category Three</a></li>
						<li class="list-group-item"><a href="">Category Four</a></li>
						<li class="list-group-item"><a href="">Category Five</a></li>
						
					</ul>
				</div>
				
				<div class="card"> 
					<h2>Tags</h2>
					<ul class="list-group"> 
						<li class="list-group-item"><a href="">Tag One</a></li>
						<li class="list-group-item"><a href="">Tag Two</a></li>
						<li class="list-group-item"><a href="">Tag Three</a></li>
						<li class="list-group-item"><a href="">Tag Four</a></li>
						<li class="list-group-item"><a href="">Tag Five</a></li>
						
					</ul>
				</div>
				
				<div class="card"> 
					<h2>Archives</h2>
					<ul class="list-group"> 
						<li class="list-group-item"><a href="">January 2017</a></li>
						<li class="list-group-item"><a href="">January 2017</a></li>
						<li class="list-group-item"><a href="">January 2017</a></li>
						<li class="list-group-item"><a href="">January 2017</a></li>
					</ul>
				</div>
				
			</div>
		</div>
	</div>
<?php include('includes/footer.php'); ?>