

<?php  include_once "include/header.php";?>


	<?php  include_once "include/sidebar.php" ?>
	<!-- start: Header -->

			
			<!-- start: Content -->
			<div id="content" class="span10">
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="#">Dashboard</a>
				</li>
			</ul>



		   <?php 
		   		
		   	    $email=$_SESSION['email'];
				//$admin_id=$_SESSION['admin_id'];
				echo $email;
		   		
				
			 ?>

	</div><!--/.fluid-container-->
	
			<!-- end: Content -->
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->

<?php  include_once "include/footer.php" ?>