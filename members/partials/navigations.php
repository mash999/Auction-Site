
<?php 
session_start();
if(!isset($_SESSION['active_user'])){
	header("Location:../../visitors/views/authorize.php");
}
require_once '../../functions/functions.php';
?>


<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">


	<!-- OFFLINE -->
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../jquery-ui/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="../css/member-style.css">
	<link rel="stylesheet" type="text/css" href="../css/responsive.css">
	<link rel="stylesheet" type="text/css" href="../../font-awesome/css/font-awesome.css">

	<script src="../js/jquery.js"></script>
	<script src="../jquery-ui/jquery-ui.js"></script>
	<script src="../js/bootstrap.js"></script>
	<script src="../js/member-script.js"></script>

</head>
<body>

	<div id="page-wrapper">
		
		<div class="top-bar">
			
			<h3 align="left">online auction site</h3>
			<h3 align="center">contact us at info@oas.com</h3>
			<h3 align="right">hello,john</h3>

		</div> <!-- /top-bar -->

		


		<nav>
			
			<h4>Navigations</h4>
			<ul>
				<li><a href="profile.php"><i class="fa fa-user-o" aria-hidden="true"></i>Profile</a></li>
				<li><a href="auctions.php"><i class="fa fa-bookmark-o" aria-hidden="true"></i>Auctions</a></li>
				<!-- <li><a href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i>Message</a></li> -->
				<li><a href="favorites.php"><i class="fa fa-heart-o"></i>Favorites</a></li>
				<li><a href="post-sell.php"><i class="fa fa-tag"></i>Sell Posts</a></li>
				<li><a href="posts.php"><i class="fa fa-map-o"></i>Your Posts</a></li>
			</ul>	
			<hr>
			



			<h4>Accounts</h4>
			<ul>
				<li><a href="allies.php"><i class="fa fa-phone" aria-hidden="true"></i> Allies</a></li>
				<li><a href="settings.php"><i class="fa fa-cog" aria-hidden="true"></i> Settings</a></li>
				<li><a href="logout.php"><i class="fa fa-power-off" aria-hidden="true"></i> Logout</a></li>
			</ul>
			<hr>	
			



			<form>
				<input type="text" name="product-search" placeholder="Enter Product Code">
				<input type="submit" name="product-code-search" value="Go">
			</form>	


		</nav>



		<div class="right-container">
			
		