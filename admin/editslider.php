<?php  include_once "include/header.php";?>


	
	<!-- start: Header -->
	<?php  include_once "include/sidebar.php";?>

						<!-- start: Content -->
			<div id="content" class="span10">
			
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="#">Update Slider</a>
				</li>
			</ul>

			<?php 
					
		        if (isset($_GET["slider_id"]) AND $_GET['slider_id'] !=NULL) {
		          $slider_id=$_GET["slider_id"];
		           $slider_id=preg_replace('/[^a-zA-Z0-9]/','',$slider_id);  
		        }else{
                        echo "<script>window.location='index.php'</script>";
                 }

            ?>
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
					        	$sql="UPDATE slider set image ='$upload_image' where slider_id='$slider_id'";
					        	$query=mysqli_query($connection,$sql);
					        	if ($query !=false) {
					        		echo "<p style='color:green'>Slider image updated</p>";
					        	}
					        }
						}	
				 ?>
			</span>
			<div class="row-fluid sortable">
				<?php 

					$sql="SELECT * FROM slider where slider_id='$slider_id'";
					$query=mysqli_query($connection,$sql);
					if ($query !=false) {
						$value=mysqli_fetch_assoc($query);

					}
				 ?>
				<div class="box span12">
					<div class="box-content">
						<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Slider image</label>
							  <div class="controls">
								<input type="file" class="span6 typeahead" id="simage" name="simage">
							  </div>
							</div>         
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Add image</button>
							</div>
						  </fieldset>
						</form>   
					</div>
				</div><!--/span-->
				<div style="width: 90%;padding:2px; margin:0 auto; height:300px;">
					<img src="<?php echo $value['image'] ?>" style="width: 100%;height:100%;">
				</div>

			</div><!--/row-->
	</div><!--/.fluid-container-->
	
			<!-- end: Content -->
		</div><!--/#con
	<?php  include_once "include/footer.php";?>