<?php  include_once "include/header.php";?>



	
	<!-- start: Header -->
	
	<?php  include_once "include/sidebar.php";?>
			<!-- start: Content -->
			<div id="content" class="span10">
			
		
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="#">View Product details</a>
				</li>
			</ul>
			<span>
				
				<?php 

					 if (isset($_GET["product_id"]) AND $_GET['product_id'] !=NULL) {
                        $product_id=$_GET["product_id"];
                        $product_id=preg_replace('/[^a-zA-Z0-9]/','',$product_id);       
                    }else{
                        echo "<script>window.location='showproduct.php'</script>";
                    }

				 ?>
			</span>
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-content">
						<table class="table table-strip">
						  <thead>
							  <tr>
								    <th>Serial</th>
									<th>Title</th>
									<th>Info</th>
							  </tr>
							 	<?php 
								$sql="SELECT product.*, brand.bname FROM product INNER JOIN brand on product.brand_id=brand.brand_id where product_id='$product_id'";
								$query=mysqli_query($connection,$sql);
								if ($query !=false) {
									$i=0;
									while ($value=mysqli_fetch_assoc($query)) {
							?>
							   <tr>
								    <th><?php echo ++$i; ?></th>
									<th>Model</th>
									<th><?php echo $value['model']; ?></th>
							  </tr>
							  <tr>
								  <th><?php echo ++$i; ?></th>
									<th>Brand</th>
									<th><?php echo $value['bname']; ?></th>
							  </tr>
							   <tr>
								  <th><?php echo ++$i; ?></th>
									<th>Battery Performance</th>
									<th><?php echo $value['bperformance']; ?> hours</th>
							  </tr>
							   <tr>
								  <th><?php echo ++$i; ?></th>
									<th>Battery Type</th>
									<th><?php echo $value['batterytype']; ?></th>
							  </tr>
							   <tr>
								  <th><?php echo ++$i; ?></th>
									<th>Back Camera</th>
									<th><?php echo $value['bcamera']; ?> Megapixel</th>
							  </tr>
							   <tr>
								  <th><?php echo ++$i; ?></th>
									<th>Fond Camera</th>
									<th><?php echo $value['fcamera']; ?> Megapixel</th> 
							  </tr>

							   <tr>
								  <th><?php echo ++$i; ?></th>
									<th>ram</th>
									<th><?php echo $value['ram']; ?></th>
							  </tr>
							   <tr>
								  <th><?php echo ++$i; ?></th>
									<th>ROM</th>
									<th><?php echo $value['rom']; ?></th>
							  </tr>
							   <tr>
								  <th><?php echo ++$i; ?></th>
									<th>Sim caart</th>
									<th><?php echo $value['simcard']; ?> SIM</th>
							  </tr>
							   <tr>
								  <th><?php echo ++$i; ?></th>
									<th>OS</th>
									<th><?php echo $value['os']; ?></th>
							  </tr>
							   <tr>
								  <th><?php echo ++$i; ?></th>
									<th>price</th>
									<th><?php echo $value['price']; ?> TK</th>
							  </tr>
							   <tr>
								  <th><?php echo ++$i; ?></th>
									<th>Image</th>
									<th><img src="<?php echo $value['image']; ?>" width="80" height="80"></th>
							  </tr>
							   <tr>
								  <th><?php echo ++$i; ?></th>
									<th>Total Sell</th>
									<th><?php echo $value['salestatus']; ?> sales</th>
							  </tr>
							<?php }} ?>
						  </thead>   
						  <tbody>
						  	
							
						
						  </tbody>
					  </table>
					  <div class="form-actions">
							 <a href="showproduct.php" class="btn btn-primary">Go Back</a>
						</div>            
					</div>					
				</div><!--/span-->
			
			</div><!--/row-->
	</div><!--/.fluid-container-->
	
			<!-- end: Content -->
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->
	<?php  include_once "include/footer.php";?>