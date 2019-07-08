<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php
	session_start(); ?>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="description" itemprop="description"  content="">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<!-- Fontawesome 5.5.0 link -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css">
	<!-- animate css CDN link-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css" />
	<!-- Animate On scroll cdn -->
	

	<?php if(isset($link)) { ?>
		
		<!--  -->
		<link rel="stylesheet" href="css/settings.css">
	<?php }else{?>
		<link rel="stylesheet" href="../css/settings.css">
	<?php } ?>
	<!-- Custom Css -->

	<?php  ?>
	<title>Lorem ipsum dolor sit.</title>
</head>
<body>