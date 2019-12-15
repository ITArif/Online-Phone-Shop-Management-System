<?php include_once "include/header.php" ?>

<?php include_once "include/slider.php" ?>

	
 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Our products</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
    	<!--pagination-->
    		
    		<?php 
    			$per_page=4;
    			if (isset($_GET['page'])) {
    				$page=$_GET['page'];

    			}else{
    				$page=1;
    			}
    			$start_form=($page-1)*$per_page;

    		 ?>
    	<!--pagination-->

	      <div class="section group">
	     <?php 

	      	$sql="SELECT product.*, brand.bname FROM product INNER join brand on product.brand_id=brand.brand_id limit $start_form,$per_page";
      			$query=mysqli_query($connection,$sql);
      			if ($query !=false) {
      				while ($value=mysqli_fetch_assoc($query)) {
	      ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="preview.php"><img src="<?php echo "admin/".$value['image'] ?>" alt="" style="width: 100%;height: 160px;"/></a>
					 <h2><?php echo $value['bname'] ?> <?php echo $value['model'] ?></h2>
					 <p>Price<span class="price"><?php echo $value['price']." TK"; ?></span></p>
				     <div class="button"><span><a href="preview.php?product_id=<?php echo $value['product_id'] ?>" class="details">Details</a></span></div>
				</div>
				<?php }} ?>
			</div>

		<!--pagination-->
			<?php   

				$sql="SELECT * FROM product";
				$query=mysqli_query($connection,$sql);
				$total_row=mysqli_num_rows($query);
				$total_page=ceil($total_row/$per_page);
				if ($total_row>0) {
					echo "<span class='pagination'> <a href='index.php?page=1'>".'First page'."</a>"; 
			         for ($i=1; $i <=$total_page ; $i++) { 
				    echo "<a href='index.php?page=".$i."'>".$i."</a>";
			       }
			       echo "<a href='index.php?page=$total_page'>".'Last page'."</a></span>" ;
				}
			 ?>
		<!--pagination-->
			<div class="content_bottom">
    		<div class="heading">
    		<h3>Best Sales Products</h3>
    		</div>
    		<div class="clear"></div>

    		<!--pagination-->
    		
    		<?php 
    			$each_page=4;
    			if (isset($_GET['page1'])) {
    				$page1=$_GET['page1'];

    			}else{
    				$page1=1;
    			}
    			$start=($page1-1)*$each_page;

    		 ?>
    	<!--pagination-->



    	   </div>
			<div class="section group">
				<?php 
$sql="SELECT product.*, brand.bname FROM product INNER join brand on product.brand_id=brand.brand_id  where salestatus>=4 limit $start, $each_page";
      			     $query=mysqli_query($connection,$sql);
      			        if ($query !=false) {
      				   while ($value=mysqli_fetch_assoc($query)) {
	      

				 ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="preview.html"><img src="<?php echo 'admin/'.$value['image'] ?>" alt="" style="width: 100%;height: 160px;"/></a>
					 <h2><?php echo $value['bname']; ?> <?php echo $value['model']; ?></h2>
					 <p><span class="price"><?php echo $value['price']." TK"; ?></span></p>
				     <div class="button"><span><a href="preview.php?product_id=<?php echo$value['product_id'] ?>" class="details">Details</a></span></div>
				</div>
				<?php }}else{ echo "no".mysqli_error($connection);}?>	
			</div>


		<!--pagination-->
			<?php   

				$sql="SELECT * FROM product where salestatus>=4";
				$query=mysqli_query($connection,$sql);
				$total_data=mysqli_num_rows($query);
				$total_pro=ceil($total_data/$each_page);
				if ($total_data>0) {
					echo "<span class='pagination'> <a href='index.php?page1=1'>".'First page'."</a>"; 
			         for ($i=1; $i <=$total_pro ; $i++) { 
				    echo "<a href='index.php?page1=".$i."'>".$i."</a>";
			       }
			       echo "<a href='index.php?page1=$total_pro'>".'Last page'."</a></span>" ;
				}
			 ?>
		<!--pagination-->

    </div>
 </div>


 <?php include_once "include/footer.php" ?>