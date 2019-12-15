<?php  include_once "include/header.php";?>


	
	<!-- start: Header -->
	<?php  include_once "include/sidebar.php";?>

						<!-- start: Content -->
			<div id="content" class="span10">
			
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="#">Customer Detailes</a>
				</li>
			</ul>
			<span>
				
				
				<?php 

					 if (isset($_GET["user_id"]) AND $_GET['user_id'] !=NULL) {
                        $user_id=$_GET["user_id"];
                        $user_id=preg_replace('/[^a-zA-Z0-9]/','',$user_id);       
                    }else{
                        echo "<script>window.location='orderlist.php'</script>";
                    }
				 ?>
			</span>
			<div class="row-fluid sortable">
				<?php 
						$sql="SELECT * FROM user where user_id='$user_id'";
						$query=mysqli_query($connection,$sql);
						if ($query !=false) {
							$value=mysqli_fetch_assoc($query);

						}


				 ?>
				<div class="box span12">
					<div class="box-content">
						<form class="form-horizontal" action="" method="POST">
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Customer Name</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" value="<?php echo $value['name'] ?>" readonly="">
							  </div>
							</div>  
							<div class="control-group">
							  <label class="control-label" for="typeahead">City</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" value="<?php echo $value['city'] ?>" readonly="">
							  </div>
							</div>  
							<div class="control-group">
							  <label class="control-label" for="typeahead">Zip-code</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" value="<?php echo $value['zipcode'] ?>" readonly="">
							  </div>
							</div>  
							<div class="control-group">
							  <label class="control-label" for="typeahead">E-mail</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" value="<?php echo $value['email'] ?>" readonly="">
							  </div>
							</div>  
							<div class="control-group">
							  <label class="control-label" for="typeahead">Address</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" value="<?php echo $value['address'] ?>" readonly="">
							  </div>
							</div>  
							<div class="control-group">
							  <label class="control-label" for="typeahead">Phone</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" value="<?php echo $value['phone'] ?>" readonly="">
							  </div>
							</div>  
						       
							<div class="form-actions">
							
							  <a href="orderlist.php" class="btn btn-primary">Go Back</a>
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