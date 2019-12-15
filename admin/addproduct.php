<?php  include_once "include/header.php";?>


	
	<!-- start: Header -->
	
		<?php  include_once "include/sidebar.php";?>
			
			<!-- start: Content -->
			<div id="content" class="span10">
			
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="#">Dashboard</a>
				</li>
			</ul>
			<span>
				

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

					if ($model=="" || $brand_id=="" || $btype=="" || $bperformance=="" || $bcamera=="" || $fcamera=="" || $ram=="" || $rom=="" || $simcart=="" || $os=="" || $price=="" || $videorecording=="" || $image_name=="") {
						echo "<p style='color:red'>All fields should be filled</p>";
					}else{
						move_uploaded_file($image_tmp, $upload_image);
						$sql="INSERT INTO product(model,brand_id,batterytype,bperformance,bcamera,fcamera,ram,rom,simcard,os,price,image,videorecording)
						VALUES
						('$model','$brand_id','$btype','$bperformance','$bcamera','$fcamera','$ram','$rom','$simcart','$os','$price','$upload_image','$videorecording')";
						$query=mysqli_query($connection,$sql);
						if ($query !=false) {
							echo "<p style='color:green'>product inserted successfully</p>";
						}else{
							echo "<p style='color:red'>product did not insert</p>";
						}
					}

				}

			 ?>

			</span>
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-content">
						<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Model</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="model" name="model">
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
												while ($value=mysqli_fetch_assoc($query)) {
									 ?>
									<option value="<?php echo $value['brand_id'] ?>"><?php echo $value['bname'] ?></option>
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
							  </div>
							  </div>   
							  <div class="control-group">
							  <label class="control-label" for="typeahead">battery performance</label>
							  <div class="controls">
								<input type="number" class="span6 typeahead" id="bperformance" name="bperformance" min="2" max="10" step=".50">
							  </div>
							</div>
							
							  <div class="control-group">
							  <label class="control-label" for="typeahead">Back camaera</label>
							  <div class="controls">
								<input type="number" class="span6 typeahead" id="bcamera" name="bcamera" min="2">
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Fond camaera</label>
							  <div class="controls">
								<input type="number" class="span6 typeahead" id="fcamera" name="fcamera" min="5">
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
							  </div>
							  </div>   

							  <div class="control-group">
							  <label class="control-label" for="typeahead">Price</label>
							  <div class="controls">
								<input type="number" class="span6 typeahead" id="price" name="price" min="2500" step="1">
							  </div>
							</div>
							 <div class="control-group">
							  <label class="control-label" for="typeahead">Video recording</label>
							  <div class="controls">
								<input type="radio" class="span6 typeahead" id="videorecording" name="videorecording" value="Full HD" checked="1">Full HD
								<input type="radio" class="span6 typeahead" id="videorecording" name="videorecording" value="HD">HD
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Image</label>
							  <div class="controls">
								<input type="file" class="span6 typeahead" id="image" name="image">
							  </div>
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