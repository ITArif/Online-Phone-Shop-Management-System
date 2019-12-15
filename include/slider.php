	<div class="header_bottom">
	
			 <div class="header_bottom_right_images">
		   <!-- FlexSlider -->
             
			<section class="slider">
				  <div class="flexslider">
					<ul class="slides">
						<?php 

							$sql="SELECT * FROM  slider where status=0";
							$query=mysqli_query($connection,$sql);
							if ($query !=false) {
								while ($value=mysqli_fetch_assoc($query)) {
						 ?>
						<li><img src="<?php echo 'admin/'.$value['image'] ?>" alt="" height="180px"></li>
						<?php }}?>
				    </ul>
				  </div>
	      </section>
<!-- FlexSlider -->
	    </div>
	  <div class="clear"></div>
  </div>