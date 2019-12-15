<?php include_once "include/header.php" ?>

<?php 
  if (isset($_SESSION['login']) and $_SESSION['login']==true) {
      header("location:profile.php");
  }

 ?>

 <div class="main">
    <div class="content">
    	<?php 
    		if ($_SERVER['REQUEST_METHOD']=="POST" and isset($_POST['logbut'])) {
    			$usernamelog   =trim(stripcslashes(htmlspecialchars($_POST['usernamelog'])));
    			$passwordlog   =trim(stripcslashes(htmlspecialchars($_POST['passwordlog'])));
    			if ($usernamelog=="" || $passwordlog=="") {
    				 echo "<p style='color:red'>No fields can be empty</p>";
    			}else{
    				$passwordlog=md5($passwordlog);
    				$sql="SELECT * FROM user where email='$usernamelog' and password='$passwordlog'";
    				$query=mysqli_query($connection,$sql);
    				$row=mysqli_num_rows($query);
    				if ($row>0) {
    					$value=mysqli_fetch_assoc($query);
    					$email=$value['email'];
    					$role =$value['role'];
    					$name =$value['name'];
                        $user_id=$value['user_id'];

    					$_SESSION['email']=$email;
                        $_SESSION['user_id']=$user_id;
    					$_SESSION['role']=$role;
    					$_SESSION['name']=$name;
    					$_SESSION['login']=true;
    					header("location:profile.php");
    				}else{
                         echo "<p style='color:red'>Information did not match</p>";
                    }
    			}
    		}
    	 ?>
    	 <div class="login_panel">
        	<h3>Existing Customers</h3>
        	<p>Sign in with the form below.</p>
        	<form action="" method="POST">
                	<input  type="text" placeholder="User_Email" name="usernamelog">
                    <input type="password" placeholder="Password" name="passwordlog">
                     <div class="buttons">
                	<button class="grey" name="logbut">Sign In</button>
             </div>   
               </form>
          </div>

    	
    		<?php 

    			if ($_SERVER['REQUEST_METHOD']=="POST" and isset($_POST['register'])) {
    				$name    =trim(stripcslashes(htmlspecialchars($_POST['name'])));
    				$city    =trim(stripcslashes(htmlspecialchars($_POST['city'])));
    				$zipcode =trim(stripcslashes(htmlspecialchars($_POST['zipcode'])));
    				$email   =trim(stripcslashes(htmlspecialchars($_POST['email'])));
    				$address =trim(stripcslashes(htmlspecialchars($_POST['address'])));
    				$phone   =trim(stripcslashes(htmlspecialchars($_POST['phone'])));
    				$password=trim(stripcslashes(htmlspecialchars($_POST['password'])));
    				if ($name=="" || $city=="" || $zipcode=="" || $email=="" || $address=="" || $phone=="" || $password=="") {
    					 echo "<p style='color:red'>No fields can be empty</p>";
    				}
    				else if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
    					 echo "<p style='color:red'>E-mail is not valid</p>";
    				}else{

    					$sql="SELECT * FROM user where email='$email'";
    					$query=mysqli_query($connection,$sql);
    					$row=mysqli_num_rows($query);
    					if ($row>0) {
    						 echo "<p style='color:red'>E-mail already axists</p>";
    					}else{
    						 $password=md5($password);
    					$sql="INSERT INTO user(name,city,zipcode,email,address,phone,password)VALUES('$name','$city','$zipcode','$email','$address','$phone','$password')";
    					$query=mysqli_query($connection,$sql);
    					if ($query !=false) {
    					 	 echo "<p style='color:green'>Successfully account has been created</p>";
    					}
    					}

    				}
    			}

    		 ?>
             <div class="register_account">
    		<h3>Register New Account</h3>
    		<form action="" method="POST">
		   			 <table>
		   				<tbody>
						<tr>
						<td>
							<div>
							<input type="text" placeholder="Name" name="name" >
							</div>
							
							<div>
							   <input type="text" placeholder="City" name="city">
							</div>
							
							<div>
								<input type="text" placeholder="Zip-code" name="zipcode">
							</div>
							<div>
								<input type="text" placeholder="E-Mail" name="email">
							</div>
		    			 </td>
		    			<td>
						<div>
							<input type="text" placeholder="Address" name="address">
						</div>	        
	
		           <div>
		          <input type="text" placeholder="Phone" name="phone">
		          </div>
				  <div>
					<input type="text" placeholder="Password" name="password">
				</div>
                  <div class="search"><div><button class="grey" name="register">Create Account</button></div></div>
		    	</td>
		    </tr> 
		    </tbody></table> 
		 
		  
		    <div class="clear"></div>
		    </form>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
</div>



<?php include_once "include/footer.php" ?>