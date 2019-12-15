<?php include_once "include/header.php" ?>

 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Latest Brand products</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">

				<?php 

	         	$sql="SELECT product.*, brand.bname FROM product INNER join brand on product.brand_id=brand.brand_id ORDER BY brand.brand_id desc limit 4";
      			$query=mysqli_query($connection,$sql);
      			if ($query !=false) {
      				while ($value=mysqli_fetch_assoc($query)) {
	            ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="preview.php"><img src="<?php echo "admin/".$value['image'] ?>" alt="" style="width: 100%;height: 160px;"/></a>
					 <h2><?php echo $value['bname'] ?> <?php echo $value['model'] ?></h2>
					 <p>Price<span class="price"><?php echo $value['price']."TK"; ?></span></p>
				     <div class="button"><span><a href="preview.php?product_id=<?php echo $value['product_id'] ?>" class="details">Details</a></span></div>
				</div>
				<?php }} ?>
			</div>
				
				
				
	
    </div>
 </div>
</div>


<?php include_once "include/footer.php" ?>