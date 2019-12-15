
<?php  include_once "include/header.php";?>


	
	<!-- start: Header -->
	<?php  include_once "include/sidebar.php";?>
			<!-- start: Content -->
			<div id="content" class="span10">
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="#">Reply Massage</a>
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
				<?php 
					$sql="SELECT * FROM contact where contact_id='$contact_id'";
				  	$query=mysqli_query($connection,$sql);
				  		if ($query !=false) {
				  				$value=mysqli_fetch_assoc($query);
				  				$email=$value['email'];
				  				$contact_id=$value['contact_id'];
				  		}
				
				   ?>

				   <?php 

				   		if ($_SERVER["REQUEST_METHOD"]=="POST") {
				   			$tomail  =trim(stripcslashes(htmlspecialchars($_POST['tomail'])));
				   			$frommail=trim(stripcslashes(htmlspecialchars($_POST['frommail'])));
				   			$massage =trim(stripcslashes(htmlspecialchars($_POST['massage'])));
				   			$subject =trim(stripcslashes(htmlspecialchars($_POST['subject'])));
				   			if ($tomail=="" || $frommail=="" || $subject=="" || $massage=="") {
				   				echo "<p style='color:red'>Fields must not be empty</p>";
				   			}else if(!filter_var($frommail,FILTER_VALIDATE_EMAIL)){
				   				echo "<p style='color:red'>Enter valid email</p>";
				   			}else{
				   					$sendmail=mail($tomail, $subject, $massage, $frommail);
				   					$sql="UPDATE contact set status=1 where contact_id='$contact_id'";
				   					$query=mysqli_query($connection,$sql);	  
				   					if ($sendmail !=false) {
				   						echo "<p style='color:green'>Mail send successfully</p>";

				   					}else{
				   						echo "<p style='color:red'>Something went wroong</p>";
				   					}
				   			}
				   		}
				    ?>
				<div class="box span12">
					<div class="box-content">
						<form class="form-horizontal" action="" method="POST">
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="typeahead">To email</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="tomail" name="tomail" value="<?php echo $email ?>" readonly>
							  </div>
							</div>         
							<div class="control-group">
							  <label class="control-label" for="typeahead">From email</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="frommail" name="frommail">
							  </div>
							</div> 
							<div class="control-group">
							  <label class="control-label" for="typeahead">Subject</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="subject" name="subject">
							  </div>
							</div> 
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Your massage</label>
							  <div class="controls">
								<textarea class="cleditor" id="textarea2" rows="3" name="massage"></textarea>
							  </div>
							</div>
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Reply E-mail</button>
							</div>
						  </fieldset>
						</form>   
					</div>
				</div><!--/span-->

			</div><!--/row-->
	</div><!--/.fluid-container-->
	
			<!-- end: Content -->
		</div><!--/#con
	<?php  include_once "include/footer.php";?>