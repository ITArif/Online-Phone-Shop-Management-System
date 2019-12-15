
<?php  include_once "include/header.php";?>


	
	<!-- start: Header -->
	<?php  include_once "include/sidebar.php";?>
			<!-- start: Content -->
			<div id="content" class="span10">
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="#">Update Brand</a>
				</li>
			</ul>
			<span>
				
				<?php 

					 if (isset($_GET["eb_id"]) AND $_GET['eb_id'] !=NULL) {
                        $eb_id=$_GET["eb_id"];
                        $eb_id=preg_replace('/[^a-zA-Z0-9]/','',$eb_id);       
                    }else{
                        echo "<script>window.location='showbrand.php'</script>";
                    }

				 ?>
			</span>
			<div class="row-fluid sortable">	
				<div class="box span12">
					<div class="box-content">
						<?php 
								$sql="SELECT * FROM brand where brand_id='$eb_id'";
								$query=mysqli_query($connection,$sql);
								if ($query !=false) {
									$value=mysqli_fetch_assoc($query);
									$bname=$value['bname'];
								}

						 ?>
						 <?php 

						 	if ($_SERVER['REQUEST_METHOD']=="POST") {
						 		$bname=$_POST['bname'];
						 		$bname=trim(stripcslashes(htmlentities($bname)));
						 		if ($bname=="") {
						 			 echo "<p style='color:red'>Brand name must nott be empty</p>";
						 		}else{

						 		$sql="UPDATE brand SET bname='$bname' where brand_id='$eb_id'";
						 		$query=mysqli_query($connection,$sql);
						 		if ($query !=false) {
						 			echo "<p style='color:green'>Brand name has been updated successfully</p>";
						 		}else{
						 		   echo "<p style='color:red'>Brand name has  not been updated</p>";
						 		}
						 	  }
						 	}
						  ?>
						  <?php 
								$sql="SELECT * FROM brand where brand_id='$eb_id'";
								$query=mysqli_query($connection,$sql);
								if ($query !=false) {
									$value=mysqli_fetch_assoc($query);
									$bname=$value['bname'];
								}

						 ?>
						<form class="form-horizontal" action="" method="POST">
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Brand Name</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="bname" name="bname" value="<?php echo $bname ?>">
							  </div>
							</div>         
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Update Brand</button>
							  
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