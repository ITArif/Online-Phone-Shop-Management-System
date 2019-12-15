
<?php  include_once "include/header.php";?>


	
	<!-- start: Header -->
	<?php  include_once "include/sidebar.php";?>
			<!-- start: Content -->
			<div id="content" class="span10">
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="#">View details massage</a>
				</li>
			</ul>
			<span>
				
				<?php 

					 if (isset($_GET["contact_id"]) AND $_GET['contact_id'] !=NULL) {
                        $contact_id=$_GET["contact_id"];
                        $contact_id=preg_replace('/[^a-zA-Z0-9]/','',$contact_id);       
                    }else{
                        echo "<script>window.location='massage.php'</script>";
                    }

				 ?>
			</span>
			<div class="row-fluid sortable">
				
				<div class="box span12">
					<div class="box-content">
						<div style="width: 50%;padding:8px;margin:0 auto;text-align:justify;">
							<h4>Read Message</h4>
							<?php 
								$sql="SELECT * FROM contact where contact_id='$contact_id'";
						  		$query=mysqli_query($connection,$sql);
						  		if ($query !=false) {
						  			$i=0;
						  			while ($value=mysqli_fetch_assoc($query)) {
						  	 ?>
							<p><?php echo $value['message'] ?></p>
							<?php }} ?>
							<a href="massage.php" class="btn btn-success">Done</a>
						</div>
					</div>
				</div><!--/span-->

			</div><!--/row-->
	</div><!--/.fluid-container-->
	
			<!-- end: Content -->
		</div><!--/#con
	<?php  include_once "include/footer.php";?>