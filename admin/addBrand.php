<?php  include_once "include/header.php";?>


	
	<!-- start: Header -->
	<?php  include_once "include/sidebar.php";?>

						<!-- start: Content -->
			<div id="content" class="span10">
			
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="#">Add Brand Name</a>
				</li>
			</ul>
			<span>
				
				<?php 
						if ($_SERVER['REQUEST_METHOD']=="POST") {
								$bname=$_POST['bname'];
								$bname=trim(stripcslashes(htmlspecialchars($bname)));
								if ($bname=='') {
									echo "<p style='color:red'>Brand name must not be empty</p>";
								}else{
									$sql="SELECT * FROM brand where bname='$bname'";
									$query=mysqli_query($connection,$sql);
									if (mysqli_num_rows($query)==1) {
										echo "<p style='color:red'>This brand has been already exists</p>";
									}else{
										$sql="INSERT INTO brand (bname) VALUES('$bname')";
										$query=mysqli_query($connection,$sql);
										if ($query) {
											echo "<p style='color:green'>Brand name has been inserted successfully</p>";
										}else{
											echo "<p style='color:red'>Brand name has not been inserted</p>";
										}

									}
								}
						}
				 ?>

			</span>
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-content">
						<form class="form-horizontal" action="" method="POST">
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="typeahead"> Brand Name</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="bname" name="bname">
							  </div>
							</div>         
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Add Brand</button>
							  
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