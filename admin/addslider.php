<?php  include_once "include/header.php";?>


	
	<!-- start: Header -->
	<?php  include_once "include/sidebar.php";?>

						<!-- start: Content -->
			<div id="content" class="span10">
			
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="#">Add Slider image</a>
				</li>
			</ul>
			<span>
				
				<?php 
					
					if ($_SERVER["REQUEST_METHOD"]=="POST") {
							
							$simage_name  =$_FILES['simage']['name'];
					        $simage_tmp   =$_FILES['simage']['tmp_name'];
					        $unique_name =time().$simage_name;
					        $upload_image="upload/".$unique_name;
					        if ($simage_name=="") {
					        	echo "<p style='color:red'>Slider image should be picked</p>";
					        }else{
					        	move_uploaded_file($simage_tmp, $upload_image);
					        	$sql="INSERT INTO slider (image)VALUES('$upload_image')";
					        	$query=mysqli_query($connection,$sql);
					        	if ($query !=false) {
					        		echo "<p style='color:green'>Slider image inserted</p>";
					        	}
					        }
						}	
				 ?>

			</span>
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-content">
						<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Pick image</label>
							  <div class="controls">
								<input type="file" class="span6 typeahead" id="simage" name="simage">
							  </div>
							</div>         
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Add Image</button>
							  
							</div>
						  </fieldset>
						</form>   
					</div>
				</div><!--/span-->

			</div><!--/row-->
	</div><!--/.fluid-container-->
	
			<!-- end: Content -->
		</div><!--/#con
	<?php  include_once "include/footer.php";?>