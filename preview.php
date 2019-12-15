<?php include_once "include/header.php" ?>

 <div class="main">

    <div class="content">
    	<span>
				
				<?php 

					 if (isset($_GET["product_id"]) AND $_GET['product_id'] !=NULL) {
                        $product_id=$_GET["product_id"];
                        $product_id=preg_replace('/[^a-zA-Z0-9]/','',$product_id);       
                    }else{
                        echo "<script>window.location='index.php'</script>";
                    }

				 ?>
					<?php 
				 
				 		if ($_SERVER["REQUEST_METHOD"]=="POST" and isset($_POST["submit"])) {
				 			$quantity=trim(stripcslashes(htmlspecialchars($_POST['quantity'])));
				 			$sessionid=session_id();
				 			$userId=$_SESSION['user_id'];
				 			if ($quantity=="") {
				 				echo "<p style='color:red'>Quantity must not be empty</p>";
				 			}else{
				 				$sql="SELECT * FROM orderdetails where product_id='$product_id' and sessionid='$sessionid' and user_id='$userId'";
				 				$result=mysqli_query($connection,$sql);
				 				 $row=mysqli_num_rows($result);
				 				if ($row>0) {
				 						echo "<p style='color:red'>This product already bought</p>";
				 				}else{
				 					$sql="SELECT product.*, brand.bname from product INNER JOIN brand on product.brand_id=brand.brand_id where product_id='$product_id'";
				 					$query=mysqli_query($connection,$sql);
				 					if ($query) {
				 						$value=mysqli_fetch_assoc($query);
				 						$bname=$value['bname'];
				 						$sql="INSERT INTO orderdetails(product_id,user_id,bname,quantity,sessionid)VALUES('$product_id','$userId','$bname','$quantity','$sessionid')";
				 						$query=mysqli_query($connection,$sql);
				 						if ($query !=false) {
				 							$_SESSION['orderstatus']="order";
				 							header("location:orderpage.php");
				 						}
				 					}
				 				}	
				 			}
				 		}
 
				  ?>

			</span>
    	<div class="section group">
				<div class="cont-desc span_1_of_2">	
					<?php 
							$sql="SELECT product.*, brand.bname FROM product INNER JOIN brand on product.brand_id=brand.brand_id WHERE product_id='$product_id'";
							$query=mysqli_query($connection,$sql);
							if ($query !=false) {
								while ($value=mysqli_fetch_assoc($query)) {	
					 ?>			
					<div class="grid images_3_of_2">
						<img src="<?php echo "admin/".$value['image'] ?>" alt="" />
					</div>
				<div class="desc span_3_of_2">			
					<div class="price">
						<p>Brand <span><?php echo $value['bname']; ?></span></p>
						<p>Model: <span><?php echo $value['model']; ?></span></p>
						<p>Battery type:<span><?php echo $value['batterytype']; ?></span></p>
						<p>Battery performance: <span><?php echo $value['bperformance']." hours"; ?></span></p>
						<p>Back camera: <span><?php echo $value['bcamera']." Mexapixel"; ?></span></p>
						<p>Fond camera:<span><?php echo $value['fcamera']." Mexapixel"; ?></span></p>
						<p>RAM: <span><?php echo $value['ram']; ?></span></p>
						<p>ROM: <span><?php echo $value['rom']; ?></span></p>
						<p>SIM card:<span><?php echo $value['simcard']; ?></span></p>
						<p>Oprerating system: <span><?php echo $value['os']; ?></span></p>
						<p>Video recoding: <span><?php echo $value['videorecording']; ?></span></p>
						<p>Price:<span><?php echo $value['price']." TK"; ?></span></p>
					</div>
				<div class="add-cart">
					<form action="" method="post">
						<input type="number" class="buyfield" name="quantity" value="1" min="1" />
						<?php 
							if (isset($_SESSION['login']) and $_SESSION['login']==true) {
								
						 ?>
						<input type="submit" class="buysubmit" name="submit" value="Buy Now"/>
					<?php } else{?>

						<a href="login.php" class="buysubmit my-bysubmit">Buy Now</a>
						<?php 

							}
						 ?>
					</form>				
				</div>
			</div>
		<?php }} ?>	
				
	</div>
				<div class="rightsidebar span_3_of_1">
					<h2>All Brands</h2>
					<ul>
						<?php 
								$sql="SELECT * FROM brand";
								$query=mysqli_query($connection,$sql);
								if ($query !=false) {
								while ($valueb=mysqli_fetch_assoc($query)) {
						 ?>
				      <li><a href="productbycat.php?brand_id=<?php echo $valueb['brand_id'] ?>" class="my-category-style"><?php echo $valueb['bname']; ?></a></li>
				     <?php }} ?>
    				</ul>
    	
 				</div>
 		</div>
 	</div>
	</div>


	<?php include_once "include/footer.php" ?>