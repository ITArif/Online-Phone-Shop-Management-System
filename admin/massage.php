<?php  include_once "include/header.php";?>

	
	<!-- start: Header -->
	
		<?php  include_once "include/sidebar.php";?>
			<!-- start: Content -->
			<div id="content" class="span10">
			
		
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="#">Show Message</a>
				</li>
			</ul>

			<?php 

					 if (isset($_GET["contact_id"]) AND $_GET['contact_id'] !=NULL) {
                        $contact_id=$_GET["contact_id"];
                        $contact_id=preg_replace('/[^a-zA-Z0-9]/','',$contact_id); 
		                        
		                    $sql="DELETE FROM contact WHERE contact_id='$contact_id'";
		                    $query=mysqli_query($connection,$sql);
		                    if ($query !=false) {
		                    		echo "<p style='color:green'>Massage deleted successfully</p>";
		                    }else{
		                    		echo "<p style='color:red'>Not deleted</p>".mysqli_error($connection);
		                    }
                    }

			 ?>
			
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Serial No</th>
								  <th>Message</th>
								  <th>Name</th>
								  <th>Email</th>
								  <th>Phone</th>
								  <th>Action</th>
							  </tr>
						  </thead>   
						  <tbody>
						  	<?php 

						  		$sql="SELECT * FROM contact";
						  		$query=mysqli_query($connection,$sql);
						  		if ($query !=false) {
						  			$i=0;
						  			while ($value=mysqli_fetch_assoc($query)) {
						  	 ?>
							<tr>
								<td><?php echo ++$i ?></td>
								<td>
									<a class="btn btn-success" href="viewmaage.php?contact_id=<?php echo $value['contact_id'] ?>">
										<i class="icon-eye-open white zoom-in"></i>  
									</a>
								</td>
								<td><?php echo $value['name'] ?></td>
								<td class="center"><?php echo $value['email'] ?></td>
								<td class="center"><?php echo $value['phone'] ?></td>
								<td>
								<?php if($value['status']==0){ ?>
								<a href="replymassage.php?contact_id=<?php echo $value['contact_id'] ?>" class="btn btn-success">Reply</a>
								<?php }else{ ?>
								<span class="btn btn-success">Seen</span>
								<?php } ?>
								<a href="?contact_id=<?php echo $value['contact_id'] ?>" class="btn btn-secondary" onclick="return confirm('Do you want to delete this massage ?')">Delete</a>
								</td>
							</tr>
						<?php }} ?>
						  </tbody>
					  </table>            
					</div>
							
					
				</div><!--/span-->
			
			</div><!--/row-->
	</div><!--/.fluid-container-->
	
			<!-- end: Content -->
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->
	<?php  include_once "include/footer.php";?>