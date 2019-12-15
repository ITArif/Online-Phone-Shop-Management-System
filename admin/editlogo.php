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
					
		        if (isset($_GET["logo_id"]) AND $_GET['logo_id'] !=NULL) {
		          $logo_id=$_GET["logo_id"];
		           $logo_id=preg_replace('/[^a-zA-Z0-9]/','',$logo_id);  
		        }else{
                        echo "<script>window.location='index.php'</script>";
                 }

            ?>
			<span>
				
				<?php 
					
					if ($_SERVER["REQUEST_METHOD"]=="POST") {
							
					        $logo  =$_FILES['logo']['name'];
					        $logo_tmp   =$_FILES['logo']['tmp_name'];
					        $unique_name =time().$logo;
					        $upload_image="upload/".$unique_name;
					        if ($logo=="") {
					        	echo "<p style='color:red'>Select image for logo</p>";
					        }else{
					        	move_uploaded_file($logo_tmp, $upload_image);
					        	$sql="UPDATE logo set logo ='$upload_image' where logo_id='$logo_id'";
					        	$query=mysqli_query($connection,$sql);
					        	if ($query !=false) {
					        		echo "<p style='color:green'>Logo updated</p>";
					        	}
					        }
						}	
				 ?>
			</span>
			<div class="row-fluid sortable">
				<?php 

					$sql="SELECT * FROM logo where logo_id='$logo_id'";
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
							  <label class="control-label" for="typeahead">Logo image</label>
							  <div class="controls">
								<input type="file" class="span6 typeahead" id="logo" name="logo">
							  </div>
							</div>         
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Add Logo</button>
							</div>
						  </fieldset>
						</form>   
					</div>
				</div><!--/span-->
				<div style="width: 25%;padding:2px; margin:0 auto; height:300px;">
					<img src="<?php echo $value['logo'] ?>" style="width: 100%;height:100%;">
				</div>

			</div><!--/row-->
	</div><!--/.fluid-container-->
	
			<!-- end: Content -->
		</div><!--/#con
	<?php  include_once "include/footer.php";?>