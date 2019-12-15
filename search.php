
<?php include_once "include/header.php" ?>

 <div class="main">
    <div class="content">
    	<span>
				
				<?php 

					 if (isset($_GET["search"]) AND $_GET['search'] !=NULL) {
                        $search=$_GET["search"];
                        $search=preg_replace('/[^a-zA-Z0-9]/','',$search);       
                    }else{
                        echo "<script>window.location='404.php'</script>";
                    }

				 ?>
			</span>
    	<div class="content_top">
    		<div class="heading">
    		<h3>Brand</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
	      	<?php 
	      			$sql="SELECT product.*, brand.bname FROM product INNER JOIN brand on product.brand_id=brand.brand_id where price LIKE '%$search%' OR model LIKE '%$search%' OR bname LIKE '%$search%'";
	      			$query=mysqli_query($connection,$sql);
	      			if ($query !=false) {
	      				$row=mysqli_num_rows($query);
	      				if ($row>0) {
	      				while ($value=mysqli_fetch_assoc($query)) {	
	      			
	      	 ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="preview-3.html"><img src="<?php echo 'admin/'.$value['image'] ?>" alt="" /></a>
					 <h2><?php echo $value['bname'] ?>  <?php echo $value['model'] ?></h2>
					 <p><span class="price"><?php echo $value['price'] ?></span></p>
				     <div class="button"><span><a href="preview.php?product_id=<?php echo $value['product_id'] ?>" class="details">Details</a></span></div>
				</div>
		
				<?php }}else{?>
					<span style="color: red">Opps...! No product available for this search</span>
				<?php }} ?>
				
				
		  </div>
    </div>
 </div>
</div>

<?php include_once "include/footer.php" ?>
					
