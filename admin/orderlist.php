<?php  include_once "include/header.php";?>



	
	<!-- start: Header -->
	
	<?php  include_once "include/sidebar.php";?>
			<!-- start: Content -->
			<div id="content" class="span10">
			
		
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="#">Order list</a>
				</li>
			</ul>
			<?php 
					
		        if (isset($_GET["dorder_id"]) AND $_GET['dorder_id'] !=NULL) {
		        $dorder_id=$_GET["dorder_id"];
		        $dorder_id=preg_replace('/[^a-zA-Z0-9]/','',$dorder_id);

		        $sql="DELETE FROM orderdetails where order_id='$dorder_id'";
		        $query=mysqli_query($connection,$sql); 
		        if ($query !=false) {
		                  echo "<p style='color:green'>Order deleted successfully</p>";
		            }      
		        }

            ?>

			<?php 

					 if (isset($_GET["order_id"]) AND $_GET['order_id'] !=NULL) {
                        $order_id=$_GET["order_id"];
                        $order_id=preg_replace('/[^a-zA-Z0-9]/','',$order_id); 

                     	$sql="UPDATE orderdetails set status='1' where order_id='$order_id'"; 
                     	$query=mysqli_query($connection,$sql);
                     	if ($query !=false) {
                     	     	$sql="SELECT * FROM orderdetails where order_id='$order_id'";
                     	     	$query=mysqli_query($connection,$sql);
                     	     	if ($query !=false) {
                     	     		$row=mysqli_num_rows($query);
                     	     		if ($row>0) {
                     	     			$value=mysqli_fetch_assoc($query);
                     	     			$product_id=$value['product_id'];
                     	     		

                     	     			    $sql="SELECT * FROM product where product_id='$product_id'";
                     	     			    $query=mysqli_query($connection,$sql);
                     	     			    if ($query !=false) {
                     	     			 	$value=mysqli_fetch_assoc($query);
                     	     			 	$salestatus=$value['salestatus'];
                     	     			 	$salestatus=$salestatus+1;
                     	     			 	$sql="UPDATE product set salestatus='$salestatus' where product_id='$product_id'";
                     	     			 	$query=mysqli_query($connection,$sql);
                     	     			 	if ($query !=false) {
                     	     			 		echo "<p style='color:green'>Order has been confirmed successfully</p>";
                     	     			 	}

                     	     			 }

                     	     		}
                     	     	}
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
								  <th>Product Detailes</th>
								   <th>Customer Detailes</th>
								  <th>Quantity</th>
								  <th>Unit price</th>
								   <th>Total price</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
						  	<?php 
						  	$sql="SELECT orderdetails.*, product.* from orderdetails INNER JOIN product on orderdetails.product_id=product.product_id";
						  			$query=mysqli_query($connection,$sql);
						  			if ($query !=false) {
						  				$i=0;
						  				while ($value=mysqli_fetch_assoc($query)) {
				                	 ?>
							<tr>
								<td><?php echo ++$i; ?></td>
								<td><a class="btn btn-success" href="view.php?product_id=<?php echo $value['product_id'] ?>">
								<i class="icon-eye-open white zoom-in"></i>  
								</a></td>
								<td class="center">
									<a class="btn btn-success" href="user.php?user_id=<?php echo $value['user_id'] ?>">
										<i class="icon-eye-open white zoom-in"></i>  
									</a>
								</td>
								<td class="center"><?php echo $value['quantity']; ?></td>
								<td class="center"><?php echo $value['price']; ?></td>
								<td class="center"><?php echo ($value['price']*$value['quantity']); ?></td>
								<td class="center">
									<?php 
									
									   if ($value['status']=="0") {
									?>
									<a class="btn btn-warning" href="?order_id=<?php echo $value['order_id'] ?>">Not Confirmed</a>
									<a class="btn btn-success" href="?dorder_id=<?php echo $value['order_id'] ?>" onclick="return confirm('Do you wnat to delete this order ???')">Delete</a>
								<?php }else if($value['status']=="1"){ ?>
									<span class="btn btn-success">Confirmed</span></a>
									<a class="btn btn-success" href="?dorder_id=<?php echo $value['order_id'] ?>" onclick="return confirm('Do you wnat to delete this order ??')">Delete</a>
									<?php }else{ ?>
								       <span class="btn btn-success">Delievred</span></a>
									<a class="btn btn-success" href="?dorder_id=<?php echo $value['order_id'] ?>" onclick="return confirm('Do you wnat to delete this order ?')">Delete</a>
									<?php } ?>
									
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