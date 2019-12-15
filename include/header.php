<?php session_start(); ?>


<?php 
	$realpath=realpath(dirname(__FILE__));

	include_once "include/../conn/connection.php";
?>

<!DOCTYPE HTML>
<head>
	<?php 
		$path=$_SERVER['SCRIPT_FILENAME'];
		$title=basename($path,'.php');

	 ?>
	<title><?php echo(ucwords($title)) ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>

<link href="css/menu.css" rel="stylesheet" type="text/css" media="all"/>
<?php 
	$sql="SELECT * FROM logo";
	$query=mysqli_query($connection,$sql);
	if ($query !=false) {
		$value=mysqli_fetch_assoc($query);
	}
 ?>
<link rel="icon" type="text/css" href="<?php echo 'admin/'.$value['logo'] ?>">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">


<!--<link rel="stylesheet" type="text/css" href="css/fontawesome.min.css">
<script src="js/fontawesome.min.js"></script>-->

<script src="js/jquerymain.js"></script>

<script src="js/script.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="js/nav.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script> 
<script type="text/javascript" src="js/nav-hover.js"></script>
<link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>

<script type="text/javascript">
  $(document).ready(function($){
    $('#dc_mega-menu-orange').dcMegaMenu({rowItems:'4',speed:'fast',effect:'fade'});
  });
</script>
</head>
<body>
  <div class="wrap">
  	<?php 
  		if (isset($_GET['action']) AND $_GET['action']=='logout') {
  			session_destroy();
  			header('location:login.php');
  		}
  	 ?>
		<div class="header_top">
			<div class="logo">
				<?php 

					$sql="SELECT * FROM logo";
					$query=mysqli_query($connection,$sql);
					if ($query !=false) {
						$value=mysqli_fetch_assoc($query);
				 ?>
				<a href="index.php"><img src="<?php echo 'admin/'.$value['logo'] ?>" alt="logo" style="width: 120px;height: 80px;"/></a>
			<?php } ?>

			</div>
			  <div class="header_top_right">
			    <div class="search_box">
				    <form action="search.php" method="get">
				    	<input type="text" name="search" placeholder="Ask me...">
				    	<input type="submit" value="SEARCH">
				    </form>
			    </div>
		 <div class="clear"></div>
	 </div>
	 <div class="clear"></div>
 </div>
<div class="menu">
	<ul id="dc_mega-menu-orange" class="dc_mm-orange">
	  <li><a href="index.php">Home</a></li>
	  <li><a href="products.php">Products</a> </li>
	   <li><a href="about.php">About</a> </li>
	  <li><a href="contact.php">Contact</a> </li>
	  <?php 
	  	if (isset($_SESSION['login']) and $_SESSION['login']==true) {
	   ?>
	   <!-- <li><a href="profile.php">Profile</a> </li> -->
	<?php } ?>
	 
	  <?php 
	  	if (isset($_SESSION['login']) AND $_SESSION['login']==true) {
	   ?>
	    <li><a href="?action=logout">Logout</a></li>
	<?php }else{ ?>
	  <li><a href="login.php">Login</a> </li>
	<?php } ?>
	  <div class="clear"></div>
	</ul>
</div>
