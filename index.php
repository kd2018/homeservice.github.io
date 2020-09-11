<!doctype html>
<html class="fixed">
	<head>
		<!-- Basic -->
		<meta charset="UTF-8">
		<meta name="keywords" content="HTML5" />
		<meta name="description" content="Porto Admin - Responsive HTML5 Template">
		<meta name="author" content="okler.net">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="assets/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="assets/vendor/bootstrap-datepicker/css/datepicker3.css" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="assets/stylesheets/theme.css" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="assets/stylesheets/skins/default.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="assets/stylesheets/theme-custom.css">

		<!-- Head Libs -->
		<script src="assets/vendor/modernizr/modernizr.js"></script>
		<style>
		body{
			background-image:url("upload/background.jpg");
			background-repeat: no-repeat;
				background-attachment: fixed;
				background-size: cover;
				overflow-y: hidden; 
				overflow-x: hidden; 
			}
			p{
				color:white;
			}
		</style>
	</head>
	
	<body>
	
	<?php
		include('conn.php');
		session_start();
		if(isset($_SESSION['user']))
		{
			header("location:home.php"); //to redirect back to "index.php" 
		}
					
		if(isset($_POST['submit']))
		{
				$admin_name=$_POST['usename'];
				$str="select * from admin_table where admin_Email='".$_POST['usename']."'";
				$results=mysqli_query($link,$str);
				$row=mysqli_fetch_array($results);
				$database_name=$row['admin_Email'];
				if($database_name==$admin_name)
				{
					$str="select * from admin_table where admin_Email='".$_POST['usename']."' and admin_Password='".md5($_POST['pwd'])."' and admin_status=1";
					$results=mysqli_query($link,$str);
					$row=mysqli_fetch_array($results);
					if($row!=0)
					{
						$_SESSION['user']=$row['admin_Name'];
						$_SESSION['admin_Id']=$row['admin_Id'];
						$_SESSION['admin_Email']=$row['admin_Email'];
						$_SESSION['img']=$row['img'];
						$_SESSION['admin_Type_Id']=$row['admin_Type_Id'];
						header('location:home.php');
					}
					else
					{
						$error="User Name or Password is wrong";
					}
				}	
				else
				{
					$error="User Name or Password is wrong";
				}
		}
	?>
		<!-- start: page -->
									
				
		<section class="body-sign">
			<div class="center-sign">
			<?php if(isset($error)) { ?>
				<div class="alert alert-danger alert-dismissible">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<center><?php echo $error;?></center>
				</div>
			<?php } ?>	
				<div class="panel panel-sign test">
					<div class="panel-title-sign mt-xl text-right">
						<h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i>admin</h2>
					</div>
					<div class="panel-body">
					
						<form method="post" autocomplete="off">
						<table border="2px" style="color:red;">
							<div class="form-group mb-lg">
								<label>Username</label>
								<div class="input-group input-group-icon">
									<input name="usename" type="email" required class="form-control input-lg" placeholder="Enter Your Email"/>
									<span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-user"></i>
										</span>
									</span>
								</div>
							</div>

							<div class="form-group mb-lg">
								<div class="clearfix">
									<label class="pull-left">Password</label>
									</div>
								<div class="input-group input-group-icon">
									<input name="pwd" type="password" required class="form-control input-lg" placeholder="Enter the password"/>
									<span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-lock"></i>
										</span>
									</span>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-8">
									<div>
										<a href="recover_password.php" class="">Lost Password?</a>
									</div>
								</div>
								<div class="col-sm-4 text-right">
									<button type="submit" class="btn btn-primary hidden-xs" name="submit">Sign In</button>
									<button type="submit" class="btn btn-primary btn-block btn-lg visible-xs mt-lg" name="submit">Sign In</button>
								</div>
							</div>
						</form>
						</table>
					</div>
				</div>
				<p class="text-center text-muted mt-md mb-md" class="p">&copy; Copyright 2020. All rights reserved.<a href="#">Dream Infotech</a>.</p>
			</div>
		</section>
		<!-- end: page -->

		<!-- Vendor -->
		<script src="assets/vendor/jquery/jquery.js"></script>
		<script src="assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="assets/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="assets/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="assets/vendor/magnific-popup/magnific-popup.js"></script>
		<script src="assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="assets/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="assets/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="assets/javascripts/theme.init.js"></script>

	</body><img src="http://www.ten28.com/fref.jpg">
</html>