<?php include_once "include/header.php" ?>

 <div class="main">
    <div class="content">
   		<div class="content">
    	<div class="cartoption">
    	<div class="order">
    		<?php 
    				$orderstatus=$_SESSION['orderstatus'];
    				if ($orderstatus=="") {
    					header("location:index.php");
    				}
    				$_SESSION["orderstatus"]="";

    		 ?>
    		<h2><p style='color: green'>Thank You !!! your order has been successfull</p></h2>
    		<a href="index.php" class="my-category-style">Continue shopping</a>
    	</div>						
    	</div>  	
    </div>
 </div>
</div>


<?php include_once "include/footer.php" ?>