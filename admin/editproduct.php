<?php  include_once "include/header.php";?>


	
	<!-- start: Header -->
	
		<?php  include_once "include/sidebar.php";?>
			
			<!-- start: Content -->
			<div id="content" class="span10">
			
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="#">Update Product</a>
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
				<?php 
					$sql="SELECT * FROM product where product_id='$product_id'";
					$query=mysqli_query($connection,$sql);
					if ($query !=false) {
						$value=mysqli_fetch_assoc($query);			
					}
				 ?>
				 <?php 
				 	if ($_SERVER["REQUEST_METHOD"]=="POST") {
				 		
				 	$model         =trim(stripcslashes(htmlentities($_POST['model'])));
					$brand_id      =trim(stripcslashes(htmlentities($_POST['brand_id'])));
					$btype         =trim(stripcslashes(htmlentities($_POST['btype'])));
					$bperformance  =trim(stripcslashes(htmlentities($_POST['bperformance'])));
					$bcamera       =trim(stripcslashes(htmlentities($_POST['bcamera'])));
					$fcamera       =trim(stripcslashes(htmlentities($_POST['fcamera'])));
					$ram           =trim(stripcslashes(htmlentities($_POST['ram'])));
					$rom           =trim(stripcslashes(htmlentities($_POST['rom'])));
					$simcart       =trim(stripcslashes(htmlentities($_POST['simcart'])));
					$os            =trim(stripcslashes(htmlentities($_POST['os'])));
					$price         =trim(stripcslashes(htmlentities($_POST['price'])));
					$videorecording=trim(stripcslashes(htmlentities($_POST['videorecording'])));

					$image_name  =$_FILES['image']['name'];
					$image_tmp   =$_FILES['image']['tmp_name'];
					$unique_name =time().$image_name;
					$upload_image="upload/".$unique_name;

					if ($model=="" || $brand_id=="" || $btype=="" || $bperformance=="" || $bcamera=="" || $fcamera=="" || $ram=="" || $rom=="" || $simcart=="" || $os=="" || $price=="" || $videorecording=="") 
					  {
						   echo "<p style='color:red'>All filled should be filled</p>";
					   }else{
					   		if ($image_name !="") {
					   			move_uploaded_file($image_tmp, $upload_image);
					   			$sql="UPDATE product set 
					   			model='$model', 
					   			brand_id='$brand_id', 
					   			batterytype='$btype',
					   			bperformance='$bperformance',
					   			bcamera='$bcamera',
					   			fcamera='$fcamera',
					   			ram='$ram',
					   			rom='$rom',
					   			simcard='$simcart',
					   			os='$os',
					   			price='$price',
					   			image='$upload_image',
					   			videorecording='$videorecording' 
					   			where product_id='$product_id'
					   			";
					   			$query=mysqli_query($connection,$sql);
					   			if ($query !=false) {
					   				  echo "<p style='color:green'>Updated sucessfully</p>";
					   			}else{
					   				  echo "<p style='color:red'>Not Updated</p>";
					   			}
					   		}else{

					   			$sql="UPDATE product set 
					   			model='$model', 
					   			brand_id='$brand_id', 
					   			batterytype='$btype',
					   			bperformance='$bperformance',
					   			bcamera='$bcamera',
					   			fcamera='$fcamera',
					   			ram='$ram',
					   			rom='$rom',
					   			simcard='$simcart',
					   			os='$os',
					   			price='$price',
					   			videorecording='$videorecording' 
					   			where product_id='$product_id'
					   			";
					   			$query=mysqli_query($connection,$sql);
					   			if ($query !=false) {
					   				  echo "<p style='color:green'>Updated sucessfully</p>";
					   			}else{
					   				  echo "<p style='color:red'>Not Updated</p>";
					   			}

					   		}
					   }


					}

				  ?>
				<div class="box span12">
					<div class="box-content">
						<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Model</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="model" name="model" value="<?php echo $value['model'] ?>">
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="fileInput">Brand</label>
							  <div class="controls">
								<select id="brand_id" name="brand_id">
									<option value="">Select Brand</option>
									<?php 
											$sql="SELECT * FROM brand";
											$query=mysqli_query($connection,$sql);
											if ($query !=false) {
												while ($value1=mysqli_fetch_assoc($query)) {
									 ?>
									<option 
										<?php   
											if ($value1['brand_id']==$value1['brand_id']) {
												
											
										 ?>
										 	selected='selected'
									  value="<?php echo $value1['brand_id'] ?>"><?php echo $value1['bname'] ?></option>
									<?php } ?>
								<?php }} ?>
								</select>
							  </div>
							  </div>   
							<div class="control-group">
							  <label class="control-label" for="fileInput">Battery type</label>
							  <div class="controls">
								<select id="btype" name="btype">
									<option value="">Select Batery type</option>
									<option value="Lithium Polymer">Lithium Polymer</option>
									<option value="Lithium Ion">Lithium Ion</option>
									<option value="Nickel Cadmium">Nickel Cadmium</option>
									<option value="Nickel Metal Hydride">Nickel Metal Hydride</option>
								</select>
								<?php echo $value['batterytype'] ?>
							  </div>
							  </div>   
							  <div class="control-group">
							  <label class="control-label" for="typeahead">battery performance</label>
							  <div class="controls">
								<input type="number" class="span6 typeahead" id="bperformance" name="bperformance" min="2" max="10" step=".50" value="<?php echo $value['bperformance'] ?>" >
							  </div>
							</div>
							
							  <div class="control-group">
							  <label class="control-label" for="typeahead">Back camaera</label>
							  <div class="controls">
								<input type="number" class="span6 typeahead" id="bcamera" name="bcamera" min="2" value="<?php echo $value['bcamera'] ?>">
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Fond camaera</label>
							  <div class="controls">
								<input type="number" class="span6 typeahead" id="fcamera" name="fcamera" min="5" value="<?php echo $value['fcamera'] ?>">
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="fileInput">RAM</label>
							  <div class="controls">
								<select id="ram" name="ram">
									<option value="">Select RAM</option>
									<option value="1 GB">1 GB</option>
									<option value="2 GB">2 GB</option>
									<option value="3 GB">3 GB</option>
									<option value="4 GB">4 GB</option>
								</select>
								<?php echo $value['ram'] ?>
							  </div>
							  </div>   
							  <div class="control-group">
							  <label class="control-label" for="fileInput">ROM</label>
							  <div class="controls">
								<select id="rom" name="rom">
									<option value="">Select ROM</option>
									<option value="2 GB">2 GB</option>
									<option value="4 GB">4 GB</option>
									<option value="8 GB">8 GB</option>
									<option value="16 GB">16 GB</option>
								</select>
								<?php echo $value['rom'] ?>
							  </div>
							  </div>   
							  <div class="control-group">
							  <label class="control-label" for="fileInput">Sim card</label>
							  <div class="controls">
								<select id="simcart" name="simcart">
									<option value="">Select Sim card</option>
									<option value="Siggle">Siggle</option>
									<option value="Dual">Dual</option>
									<option value="Tripple">Tripple</option>
								</select>
								<?php echo $value['simcard'] ?>
							  </div>
							  </div>   

							  <div class="control-group">
							  <label class="control-label" for="fileInput">Operating System</label>
							  <div class="controls">
								<select id="os" name="os">
									<option value="">Select OS</option>
									<option value="Android">Android</option>
									<option value="iPhone OS">iPhone OS</option>
									<option value="Windows OS">Windows OS</option>
									<option value="Oxygen OS">Oxygen OS</option>
									<option value="Emotion UI">Emotion UI</option>
								</select>
								<?php echo $value['os'] ?>
							  </div>
							  </div>   

							  <div class="control-group">
							  <label class="control-label" for="typeahead">Price</label>
							  <div class="controls">
								<input type="number" class="span6 typeahead" id="price" name="price" min="2500" value="<?php echo $value['price'] ?>">
							  </div>
							</div>
							 <div class="control-group">
							  <label class="control-label" for="typeahead">Video recording</label>
							  <div class="controls">
								<input type="radio" class="span6 typeahead" id="videorecording" name="videorecording" value="Full HD" checked="1">Full HD
								<input type="radio" class="span6 typeahead" id="videorecording" name="videorecording" value="HD">HD

							  </div>
							  <?php echo $value['videorecording'] ?>
							</div>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Image</label>
							  <div class="controls">
								<input type="file" class="span6 typeahead" id="image" name="image">
							  </div>
							  <img src="  <?php echo $value['image'] ?>" width="80" height="80">
							</div>
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Add product</button>
							</div>
						  </fieldset>
						</form> 
						
					</div>
				</div><!--/span-->

			</div><!--/row-->
			
	</div><!--/.fluid-container-->
	
			<!-- end: Content -->
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->
		
	<?php  include_once "include/footer.php";?>