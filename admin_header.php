<?php session_start();
date_default_timezone_set("Africa/Nairobi");
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/settings.css">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
  
    <title>ryanwriters</title>
</head>
<body>
	   <nav class="navbar navbar-expand-sm navbar-light" id="NavBar">
		  <!-- Brand -->
		    <a class="navbar-brand text-uppercase" style="color: #fff" href="#"><strong><span class="first">ry</span> <span class="sec">an</span> <span class="third">wri</span> <span class="forth">te</span> <span class="last">rs</span></strong></a>
			 <!-- Toggler/collapsibe Button -->
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
			    <span class="navbar-toggler-icon"></span>
			  </button>
		  <!-- Navbar links -->
		   <div class="collapse navbar-collapse" id="collapsibleNavbar">
         <ul class="navbar-nav ml-auto">
		    <span class="navbar-nav">
		      
		      <span class="nav-link text-light">Admin</span>
		      
		     <?php if (isset($_SESSION['user_type'])) {?>
		     	<a href="a_changepass"><span class="nav-link text-light"><i class=" fa fa-cog"></i></span></a>
		     	<a href="logout.php" class="nav-link text-light"> Log Out</a>
		   <?php  } ?>
		    </span>
		    </ul>
       </div>
	</nav>

 <?php require 'links.php'; ?>

 