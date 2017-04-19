<?php 
	include('includes/header.php');
?>




	<div class="container"> 
	
		<div class="row"> 
		
			<div class="col-md-6 col-md-offset-3"> 
			
				<div class="panel panel-info"> 
				
					<div class="panel-heading"> 
					
						Admin Login
						
					</div>
					
					<div class="panel-body"> 
						
						<form action="" method="post"> 
						
							<!-- UserName Field  -->
							
							<div class="form-group"> 
							
								<label for="username" class="control-label">User Name</label>
								
								<input type="text" name="username" id="username" class="form-control"/>
								
							</div>
							
							<!-- Password Field  -->
							
							<div class="form-group"> 
							
								<label for="password" class="control-label">User Name</label>
								
								<input type="password" name="password" id="password" class="form-control"/>
								
							</div>
							
							<!-- Submit Field  -->
							
							<div class="form-group"> 
							
								<input type="submit" value="Submit" class="btn btn-default" />
								
							</div>
							
						</form>
						
					</div>
					
				</div>
				
			</div>
			
		</div>
		
	</div>






<?php 
	include('includes/footer.php');
?>	