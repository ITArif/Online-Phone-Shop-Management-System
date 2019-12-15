<?php  include_once "include/header.php";?>



	
	<!-- start: Header -->
	
	<?php  include_once "include/sidebar.php";?>
			<!-- start: Content -->
			<div id="content" class="span10">
			
		
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="#">Show product</a>
				</li>
			</ul>
			<?php 

					 if (isset($_GET["product_id"]) AND $_GET['product_id'] !=NULL) {
                        $product_id=$_GET["product_id"];
                        $product_id=preg_replace('/[^a-zA-Z0-9]/','',$product_id); 
		                 
		                 $sql="SELECT * FROM product where product_id='$product_id'"; 
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
		                 		$sql="DELETE  FROM product where product_id='$product_id'";
		                 	   $query=mysqli_query($connection,$sql);
		                 	   if ($query !=false) {
		                 	   		echo "<p style='color:green'>Product deleted successfully</p>";
		                 	   }else{
		                 	   	    echo "<p style='color:red'>>Product did not delete</p>";
		                 	   }     
                    }     
				 ?>

			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Serial</th>
								  <th>Model</th>
								  <th>Brand</th>
								   <th>Price</th>
								  <th>Image</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
						  	<?php 
								$sql="SELECT product.*, brand.bname FROM product INNER JOIN brand on product.brand_id=brand.brand_id";
								$query=mysqli_query($connection,$sql);
								if ($query !=false) {
									$i=0;
									while ($value=mysqli_fetch_assoc($query)) {
							?>
							<tr>
								<td><?php echo ++$i ?></td>
								<td class="center"><?php echo $value['model'] ?></td>
								<td class="center"><?php echo $value['bname'] ?></td>
								<td class="center"><?php echo $value['price'] ?></td>
								<td class="center">
									<img src="<?php echo $value['image'] ?>" style="width: 80px; height: 80px">
								</td>
								<td class="center">
									<a class="btn btn-success" href="view.php?product_id=<?php echo $value['product_id'] ?>">
										<i class="icon-eye-open white zoom-in"></i>  
									</a>
									<a class="btn btn-info" href="editproduct.php?product_id=<?php echo $value['product_id'] ?>">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" href="?product_id=<?php echo $value['product_id'] ?>" onclick="return confirm('Do you wnat to delete this product ?')">
										<i class="halflings-icon white trash"></i> 
									</a>
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