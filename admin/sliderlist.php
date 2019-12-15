<?php  include_once "include/header.php";?>

	
	<!-- start: Header -->
	
		<?php  include_once "include/sidebar.php";?>
			<!-- start: Content -->
			<div id="content" class="span10">
			
		
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="#">Dashboard</a>
				</li>
			</ul>
			<span>
				
				<?php 
					 if (isset($_GET["disable_id"]) AND $_GET['disable_id'] !=NULL) {
                        $disable_id=$_GET["disable_id"];
                        $disable_id=preg_replace('/[^a-zA-Z0-9]/','',$disable_id); 

                        $sql="UPDATE slider set status=1 where slider_id='$disable_id'"; 
                        $query=mysqli_query($connection,$sql);
                        if ($query !=false) {
                        	 echo "<p style='color:green'>This image is disabled from slider</p>";
                        }

                    }
				 ?>

				<?php 
					 if (isset($_GET["enable_id"]) AND $_GET['enable_id'] !=NULL) {
                        $enable_id=$_GET["enable_id"];
                        $enable_id=preg_replace('/[^a-zA-Z0-9]/','',$enable_id); 

                        $sql="UPDATE slider set status=0 where slider_id='$enable_id'"; 
                        $query=mysqli_query($connection,$sql);
                        if ($query !=false) {
                        	 echo "<p style='color:green'>This image is enabled from slider</p>";
                        }

                    }
				 ?>

				 <?php 

					 if (isset($_GET["delete_id"]) AND $_GET['delete_id'] !=NULL) {
                        $delete_id=$_GET["delete_id"];
                        $delete_id=preg_replace('/[^a-zA-Z0-9]/','',$delete_id); 
		                 
		                 $sql="SELECT * FROM slider where slider_id='$delete_id'"; 
		                 $query=mysqli_query($connection,$sql);
		                 if ($query !=false) {
		                 	$value=mysqli_fetch_assoc($query);
		                 	$imagename=$value['image'];
		                 	if (file_exists($imagename)) {
		                 		unlink($imagename);
		                 	}else{
		                 		echo "<p style='color:red'>This file is not available in folder</p>";
		                 	}	
		                 }
		                 		$sql="DELETE  FROM slider where slider_id='$delete_id'";
		                 	   $query=mysqli_query($connection,$sql);
		                 	   if ($query !=false) {
		                 	   		echo "<p style='color:green'>Slider image deleted successfully</p>";
		                 	   }else{
		                 	   	    echo "<p style='color:red'>>Image did not delete</p>";
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
								  <th width="10%">Serial No</th>
								  <th width="60%">Slider Image</th>
								  <th width="30%">Action</th>
							  </tr>
						  </thead>   
						  <tbody>
							<?php 
								$sql="SELECT * FROM slider";
								$query=mysqli_query($connection,$sql);
								if ($query !=false) {
									$i=0;
									while ($value=mysqli_fetch_assoc($query)) {
									
							 ?>
							<tr>
								<td><?php echo ++$i; ?></td>
								<td class="center"><img src="<?php echo $value['image'] ?>" alt="ok" style="width: 100%;height:130px"></td>
								<td class="center">
									<?php 
									   if ($value['status']==0) {		
									 ?>
									  <a href="?disable_id=<?php echo $value['slider_id'] ?>"  class="btn btn-danger">Disable</a>
									<?php }else{ ?>
									<a href="?enable_id=<?php echo $value['slider_id'] ?>"  class="btn btn-success">Enable</a>
								<?php } ?>
									
									<a href="editslider.php?slider_id=<?php echo $value['slider_id'] ?>"  class="btn btn-dark">Edit</a>
									<a href="?delete_id=<?php echo $value['slider_id'] ?>" class="btn btn-dark" onclick="return confirm('Do you want to delete this slider image ?')">Delete</a>
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