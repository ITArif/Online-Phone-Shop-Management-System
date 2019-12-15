<?php  include_once "include/header.php";?>


	
	<!-- start: Header -->
	<?php  include_once "include/sidebar.php";?>

						<!-- start: Content -->
			<div id="content" class="span10">
			
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="#">Update Profile</a>
				</li>
			</ul>
			<span>
				
				
				<?php 

					 if (isset($_GET["admin_id"]) AND $_GET['admin_id'] !=NULL) {
                        $admin_id=$_GET["admin_id"];
                        $admin_id=preg_replace('/[^a-zA-Z0-9]/','',$admin_id);       
                    }else{
                        echo "<script>window.location='index.php'</script>";
                    }

				 ?>
				 <?php 
				 	$sql="SELECT * FROM admin where admin_id='$admin_id'";
				 	$query=mysqli_query($connection,$sql);
				 	if ($query !=false) {
				 		$value=mysqli_fetch_assoc($query);

				 	}


				  ?>
			</span>
			<div class="row-fluid sortable">
				<?php 

						if ($_SERVER['REQUEST_METHOD']=="POST") {
							$name=trim(stripcslashes(htmlspecialchars($_POST['name'])));
							$email=trim(stripcslashes(htmlspecialchars($_POST['email'])));
							if ($name=="" || $email=="") {
								echo "<p style='color:red'>Fields must be not be empty</p>";
							}else if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
								echo "<p style='color:red'>Enter valid email</p>";
							}else{
								$sql="UPDATE admin set name='$name', email='$email'";
								$query=mysqli_query($connection,$sql);
								if ($query !=false) {
									echo "<p style='color:green'>Your profile Update successfull</p>";
								}
							}
						}

				 ?>
				<div class="box span12">
					<div class="box-content">
						<form class="form-horizontal" action="" method="POST">
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Name</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="name" name="name" value="<?php echo $value['name'] ?>">
							  </div>
							</div>  
							<div class="control-group">
							  <label class="control-label" for="typeahead">E-mail</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="email" name="email" value="<?php echo $value['email'] ?>">
							  </div>
							</div>          
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Update</button>
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