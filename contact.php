<?php include_once "include/header.php" ?>


 <div class="main">
    <div class="content">
    	<div class="support">
    		<H2>Find us</H2>
  			<div class="googlemap">
  				 <div id="map"></div>
  			</div>
  		</div>
    	<div class="section group" style="width: 60%;margin: 0 auto;">
				<div class="col span_2_of_3" style="">
				  <div class="contact-form">
				  	<h2>Contact Us</h2>
				  		<?php 

				  			if ($_SERVER["REQUEST_METHOD"]=="POST") {
				  				$name   =trim(stripcslashes(htmlspecialchars($_POST['name'])));
				  				$email  =trim(stripcslashes(htmlspecialchars($_POST['email'])));
				  				$phone  =trim(stripcslashes(htmlspecialchars($_POST['phone'])));
				  				$message=trim(stripcslashes(htmlspecialchars($_POST['message'])));
				  				if (empty($name) || empty($email) || empty($phone) || empty($message)) {
				  					echo "<p style='color:red'>Fields must not be empty</p>";
				  				}else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
				  					echo "<p style='color:red'>Enter valid email address</p>";
				  				}else{
				  					$sql="INSERT INTO contact(name,email,phone,message)VALUES('$name','$email','$phone','$message')";
				  					$query=mysqli_query($connection,$sql);
				  					if ($query !=false) {
				  					  echo "<p style='color:green'>Your massage has been send successfully....</p>";
				  					}else{
				  						 echo "<p style='color:red'>Your massage not send....</p>";
				  					}
				  						
				  					
				  				}
				  					

				  			}

				  		 ?>
				    <form action="" method="POST">
					    	<div>
						    	<span><label>NAME</label></span>
						    	<span><input type="text" name="name"></span>
						    </div>
						    <div>
						    	<span><label>E-MAIL</label></span>
						    	<span><input type="text" name="email"></span>
						    </div>
						    <div>
						     	<span><label>MOBILE.NO</label></span>
						    	<span><input type="text" name="phone"></span>
						    </div>
						    <div>
						    	<span><label>SUBJECT</label></span>
						    	<span><textarea name="message"> </textarea></span>
						    </div>
						   <div>
						   		<span><input type="submit" value="SUBMIT"></span>
						  </div>
					    </form>
				  </div>
  				</div>

				

			  </div>    	
    </div>
 </div>




</div>
   <div class="footer">
   	  <div class="wrapper">	
	     <div class="section group">
		<?php include_once "include/footer.php" ?>