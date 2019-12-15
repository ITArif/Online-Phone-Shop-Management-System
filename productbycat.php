
<?php include_once "include/header.php" ?>

 <div class="main">
    <div class="content">
    	<span>
				
				<?php 

					 if (isset($_GET["brand_id"]) AND $_GET['brand_id'] !=NULL) {
                        $brand_id=$_GET["brand_id"];
                        $brand_id=preg_replace('/[^a-zA-Z0-9]/','',$brand_id);       
                    }else{
                        echo "<script>window.location='index.php'</script>";
                    }

				 ?>

				 
			</span>
    	<div class="content_top">
    		<div class="heading">
    		<h3>Going To See There Desire Brands</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
	      	<?php 
	      		$sql="SELECT product.*, brand.bname FROM product INNER JOIN brand on product.brand_id=brand.brand_id where product.brand_id='$brand_id'";
	      		$query=mysqli_query($connection,$sql);
	      		if ($query !=false) {
	      			$row=mysqli_num_rows($query);
	      			if ($row>0) {
	      				while ($value=mysqli_fetch_assoc($query)) {

	      	 ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="preview-3.html"><img src="<?php echo "admin/".$value['image'] ?>" alt="" style="width: 100%;height: 160px;"/></a>
					 <h2><?php echo $value['bname']; ?> <?php echo $value['model']; ?></h2>
					 <p><span class="price"><?php echo $value['price']." TK"; ?></span></p>
				     <div class="button"><span><a href="preview.php?product_id=<?php echo $value['product_id'] ?>" class="details">Details</a></span></div>
				</div>
			<?php }}else{?>
				
					<p style="color: red">Opp's !!! No Product is available for this brand !!!</p>
			<?php }} ?>
				
		  </div>
    </div>
 </div>
</div>

<?php include_once "include/footer.php" ?>