

<?php include_once "include/header.php" ?>

<?php 

 	$login=$_SESSION['login'];
 	$role=$_SESSION['role'];
 	$user_id=$_SESSION['user_id'];
 	if ($login!=true AND $role='user') {
 		header("location:login.php");
 	}
?>
 <div class="main">
   		<div class="content">
    	<div class="cartoption">

    	<div class="order">

    		<div class="leftorder">

            <?php 

                 if (isset($_GET["cancel_id"]) AND $_GET['cancel_id'] !=NULL) {
                    $cancel_id=$_GET["cancel_id"];
                    $cancel_id=preg_replace('/[^a-zA-Z0-9]/','',$cancel_id);

                    $sql="DELETE FROM orderdetails  where order_id='$cancel_id'";
                    $query=mysqli_query($connection,$sql); 
                    if ($query !=false) {
                              echo "<p style='color:green'>You have canceled your order</p>";
                        }      
                }
            ?>

            <?php 

                 if (isset($_GET["recive_id"]) AND $_GET['recive_id'] !=NULL) {
                    $recive_id=$_GET["recive_id"];
                    $recive_id=preg_replace('/[^a-zA-Z0-9]/','',$recive_id);

                    $sql="UPDATE orderdetails set status='2' where order_id='$recive_id'";
                    $query=mysqli_query($connection,$sql); 
                    if ($query !=false) {
                              echo "<p style='color:green'>You have received order successfully</p>";
                        }      
                }

            ?>
            <table>
    				<tr>
	    				<th width="10%">Brand</th>
	    				<th width="8%">Model</th>
	    				<th width="12%">image</th>
	    				<th width="15%">Unit price</th>
	    				<th width="5%">Quantity</th>
	    				<th width="15%">Total</th>
	    				<th width="45%">Action</th>
    				</tr>
    			<?php 
                $sessionid=session_id();
    				$sql="SELECT orderdetails.*,product.* from orderdetails INNER JOIN product on orderdetails.product_id=product.product_id where user_id='$user_id' AND sessionid='$sessionid'";
    				$query=mysqli_query($connection,$sql);
    				if ($query !=false) {
    					$i=0;
                        $row=mysqli_num_rows($query);
                        if ($row>0) {
                           while($value=mysqli_fetch_assoc($query)){
    			 ?>
    				<tr>
    					
    					<td><?php echo $value['bname'] ?></td>
    					<td><?php echo $value['model'] ?></td>
    					<td><img src="<?php echo 'admin/'.$value['image'] ?>" alt="" width="80px;"></td>
    					<td><?php echo $value['price']." TK" ?></td>
    					<td><?php echo $value['quantity'] ?></td>
    					<td><?php echo ($value['price']*$value['quantity']." TK"); ?></td>
    					<td>
    						<?php 
    							if ($value['status']=='0') {			
    						 ?>
    						 	<span style="color: red">Not Confirmed</span>
    						 	<a href="?cancel_id=<?php echo $value['order_id'] ?>" style="color: red" onclick="return confirm('Do you wnat to delete your order ?')" class="my-category-style">Cancel</a>
    						<?php }else if($value['status']==1){ ?>
    						<a href="?recive_id=<?php echo $value['order_id'] ?>" style="color: green" class="my-category-style">Click here to receive</a>
    						<?php }else{ ?>
                                <span style="color:green">Got it</span>
                            <?php } ?>

    					</td>
    				</tr>
    			<?php }}else{?>
                    <span style="padding-bottom: 4px;">You have no any order</span>
              <?php } }?>
    			</table>
    		</div>
    		<div class="profileright">
    			<?php 
    					$sql="SELECT * FROM user where user_id='$user_id'";
    					$query=mysqli_query($connection,$sql);
    					$row=mysqli_num_rows($query);
    					if ($row>0) {
    						$value=mysqli_fetch_assoc($query);
    						$name=$value['name'];
    						$city=$value['city'];
    						$email=$value['email'];
    						$address=$value['address'];
    						$zipcode=$value['zipcode'];
    				    	$phone=$value['phone'];

    					}
    			 ?>

    				<table class="profiletable">
    				
    						<tr>
    							<th>Name</th>
    							<td><?php echo $name ?></td>
    						</tr>
    					<tr>
    							<th>City</th>
    							<td><?php echo $city ?></td>
    						</tr>
    					
    					<tr>
    							<th>Zip-code</th>
    							<td><?php echo $zipcode ?></td>
    						</tr>
    					
    					<tr>
    							<th>E-mail</th>
    							<td><?php echo $email ?></td>
    						</tr>
    					
    					<tr>
    							<th>Phone</th>
    							<td><?php echo $phone ?></td>
    						</tr>
    					
    					<tr>
    							<th>Address</th>
    							<td><?php echo $address ?></td>
    				  </tr>
    					
    					
    				</table>
    		</div>
    			
    	</div>						
    	</div>  	
    </div>
 
</div>


<?php include_once "include/footer.php" ?>