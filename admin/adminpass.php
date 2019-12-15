<?php  include_once "include/header.php";?>


	
	<!-- start: Header -->
	<?php  include_once "include/sidebar.php";?>

						<!-- start: Content -->
			<div id="content" class="span10">
			
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="#">Update Password</a>
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
				 
			</span>
			<div class="row-fluid sortable">
				<?php 
				if ($_SERVER["REQUEST_METHOD"]=="POST") {
					$oldpass=$_POST["oldpass"];
					$newpass=$_POST["newpass"];
					if ($oldpass=="") {
						echo "<p style='color:red'>Enter old password</p>";
					}else if($newpass==""){
							echo "<p style='color:red'>Enter new password</p>";
					}else{
						 $oldpass=md5($oldpass);
						$sql="SELECT * FROM admin where admin_id='$admin_id' and password='$oldpass'";
						$query=mysqli_query($connection,$sql);
						if ($query !=false) {
							$row=mysqli_num_rows($query);
							if ($row>0) {
								$newpass=md5($newpass);
								$sql="UPDATE admin set password='$newpass' where admin_id='$admin_id' and password='$oldpass'";
								$query=mysqli_query($connection,$sql);
								if ($query !=false) {
									echo "<p style='color:green'>Password update successfully</p>";
								}
							}else{
									echo "<p style='color:red'>Old password is not correct</p>";
							}
						}
					}
				}

				 ?>
				<div class="box span12">
					<div class="box-content">
						<form class="form-horizontal" action="" method="POST">
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Old password</label>
							  <div class="controls">
								<input type="password" class="span6 typeahead" id="oldpass" name="oldpass">
							  </div>
							</div>  
							<div class="control-group">
							  <label class="control-label" for="typeahead">New password</label>
							  <div class="controls">
								<input type="password" class="span6 typeahead" id="newpass" name="newpass">
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