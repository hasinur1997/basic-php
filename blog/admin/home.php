<?php 
	include("includes/header.php");
?>
	<div class="main-content">

		<div class="content"> 
			<div class="panel panel-default">
				<div class="panel-heading">Post List</div>
				<div class="panel-body table-responsive"> 
					<table class="table table-striped table-condensed">
						<thead>
							<tr>
								<th>Sl</th>
								<th>Title</th>
								<th>Action</th>
							</tr>
						</thead>

						<tbody>
							<?php for($i = 1; $i <= 100; $i++): ?> 
							<tr>

								<td><?php echo $i?></td>
								<td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde officiis </td>
								<td><a href="" class="btn btn-info btn-xs">View</a> <a href="" class="btn btn-info btn-xs">Edit</a> <a href="" class="btn btn-info btn-xs">Delete</a></td>
							</tr>
							<?php endfor?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
<?php include("includes/footer.php");?>