<?php 
	include('includes/header.php');
?>
	
	<div class="col-md-8 col-md-offset-2">
	
		<div class="thumbnail">
		
			<div class="caption">
			
				<ul class="nav nav-tabs custom"> 
				
					<li class="active"><a href="#one" data-toggle="tab">All Services</a></li>
					
					<li><a href="#two" data-toggle="tab">Add new service</a></li>
					
				</ul>
				
				<div class="tab-content"> 
				
					<div class="tab-pane fade active in" id="one"> 
					
						<p>Bangladesh is our dear motherland. She is our hope pride and heart. There are many live in our country. But they don't know how to read and write. They can eat and sleep.</p>
						
					</div>
					
					<div class="tab-pane fade" id="two"> 
					
						<div class="row">
						
							<div class="col-md-12">
								<div class="panel panel-info"> 
									<div class="panel-heading"> 
										Service Create Form
									</div>
									
									<div class="panel-body"> 
									
										<form action="" method="post"> 
								
											<!-- Service Title Field  -->
											<div class="form-group"> 
												<label for="service_title" class="control-label">Service Title</label>
												<input type="text" name="service_title" id="service_title" class="form-control"/>
											</div>
											
											<!-- Service Description Field  -->
											<div class="form-group"> 
												<label for="service_time" class="control-label">Service Time</label>
												<input type="text" name="service_time" id="service_time" class="form-control"/>
											</div>
											
											
											<!-- Service Description Field  -->
											<div class="form-group"> 
												<label for="service_description" class="control-label">Service Description</label>
												<textarea name="service_description" id="service_description" cols="30" rows="7" class="form-control"></textarea>
											</div>
											
											<!-- Service Description Field  -->
											<div class="form-group"> 
												<button class="btn btn-default">Submit</button>
											</div>
										</form>
										
									</div>
									
								</div>
								
							</div>
						
						</div>
						
					</div>
					
				</div>
			
			</div>
		</div>
	</div>
	