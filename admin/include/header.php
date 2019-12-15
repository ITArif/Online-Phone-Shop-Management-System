<?php session_start(); ?>

<?php 
		$login=$_SESSION['login'];
		$role=$_SESSION['role'];
		if ($login !=true AND $role !='admin') {
			header("location:login.php");
		}


 ?>

<?php include_once "../conn/connection.php" ?>

<!DOCTYPE html>
<html lang="en">
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<?php 
		$path=$_SERVER['SCRIPT_FILENAME'];
		$title=basename($path,'.php');

	 ?>

	<title><?php echo(ucwords($title)) ?></title>
	<meta name="description" content="Metro Admin Template.">
	<meta name="author" content="Łukasz Holeczek">
	<meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
	<!-- end: Meta -->
	
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->
	
	<!-- start: CSS -->
	<link id="bootstrap-style" href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
	<link id="base-style" href="css/style.css" rel="stylesheet">
	<link id="base-style-responsive" href="css/style-responsive.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
	<?php 
	$sql="SELECT * FROM logo";
	$query=mysqli_query($connection,$sql);
	if ($query !=false) {
		$value=mysqli_fetch_assoc($query);
	}
 ?>

	<link rel="shortcut icon" href="<?php echo $value['logo'] ?>">		
</head>
<body>
		<!-- start: Header -->
		<?php 

				if (isset($_GET['action']) AND $_GET['action']=='logout') {
					session_destroy();
					header("location:login.php");
				}

		 ?>
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
					<?php 
						$sql="SELECT * FROM logo";
						$query=mysqli_query($connection,$sql);
						if ($query !=false) {
								$value=mysqli_fetch_assoc($query);
								$logo_id=$value['logo_id'];
								$logo=$value['logo'];
						}			
					 ?>

			<a class="brand" href="index.php"><span><img src="<?php echo $logo ?>" alt="iyui" style="width: 50px;height: 30px"></span></a>
			

				<div class="nav-no-collapse header-nav">
					<ul class="nav pull-right">
						<?php 
								$name    =$_SESSION['name'];
								$admin_id=$_SESSION['admin_id'];
						?>

						<li class="dropdown">
                            <a href="editlogo.php?logo_id=<?php echo $logo_id ?>" class="btn">Update Logo</a>
						</li>
						<?php 
								$sql="SELECT * FROM contact where status=0";
						        $query=mysqli_query($connection,$sql);
						        $row=mysqli_num_rows($query);
						       
						 ?>
						<li class="dropdown"><a href="massage.php" class="btn">Message <span><?php echo "( ".$row." )" ?></span></a></li>

						<li class="dropdown">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#" >
								<i class="halflings-icon white user"></i><?php echo $name; ?>
								<span class="caret"></span>
						    </a>
							<ul class="dropdown-menu">
								<li class="dropdown-menu-title">
 									<span>Account Settings</span>
								</li>
							<li><a href="admin.php?admin_id=<?php echo $admin_id ?>"><i class="halflings-icon user"></i> Upade Profile</a></li>
							<li><a href="adminpass.php?admin_id=<?php echo $admin_id ?>"><i class="halflings-icon lock"></i> Upade password</a></li>
								<li><a href="?action=logout"><i class="halflings-icon off"></i> Logout</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>

