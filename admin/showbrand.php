<?php  include_once "include/header.php";?>

	
	<!-- start: Header -->
	
		<?php  include_once "include/sidebar.php";?>
			<!-- start: Content -->
			<div id="content" class="span10">
			
		
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="#">Show Brands</a>
				</li>
			</ul>
			<span>
				
				<?php 

					 if (isset($_GET["db_id"]) AND $_GET['db_id'] !=NULL) {
                        $db_id=$_GET["db_id"];
                        $db_id=preg_replace('/[^a-zA-Z0-9]/','',$db_id); 
		                        
		                    $sql="DELETE FROM brand WHERE brand_id='$db_id'";
		                    $query=mysqli_query($connection,$sql);
		                    if ($query) {
		                    		echo "<p style='color:green'>Brand  has been deleted successfully</p>";
		                    }else{
		                    		echo "<p style='color:red'>Brand name has not been deleted</p>";
		                    }
      
                    }

                   
				 ?>
			</span>
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Serial No</th>
								  <th>Brand Name</th>
								  <th>Action</th>
							  </tr>
						  </thead>   
						  <tbody>
						  	<?php 

						  		$sql="SELECT * FROM brand";
						  		$query=mysqli_query($connection,$sql);
						  		if ($query !=false) {
						  			$i=0;
						  			while ($value=mysqli_fetch_assoc($query)) {
						  	 ?>
							<tr>
								<td><?php echo ++$i ?></td>
								<td class="center"><?php echo $value['bname'] ?></td>
								<td class="center">
									<a class="btn btn-info" href="editBrand.php?eb_id=<?php echo $value['brand_id'] ?>">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" href="?db_id=<?php echo $value['brand_id'] ?>" onclick="return confirm(' Do you want to delete this brand name ?')">
										<i class="halflings-icon white trash"></i> 
									</a>
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