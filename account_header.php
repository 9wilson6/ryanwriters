<?php 
session_start();?>
<?php if (isset($_SESSION['name'] ) && isset($_SESSION['id'])) {
    date_default_timezone_set("Africa/Nairobi");
    require 'links.php';?>
	<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/account.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    
    
</head>
<body>
<nav class="navbar navbar-expand-md navbar-light" id="NavBar">
		  <!-- Brand -->
		   <a class="navbar-brand text-uppercase" style="color: #fff" href="#"><strong><span class="first">ry</span> <span class="sec">an</span> <span class="third">wri</span> <span class="forth">te</span> <span class="last">rs</span></strong></a>

		  <!-- Toggler/collapsibe Button -->
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
			    <span class="navbar-toggler-icon"></span>
			  </button>

		  <!-- Navbar links -->

		  <div class="collapse navbar-collapse" id="collapsibleNavbar">
		      <ul class="navbar-nav ml-auto">
     
       
        
    <!-- <span class="nav-link mt-2"> <i class="fa fa-bell-o text-light pt-0 mt-0" style="font-size: 30px;"> <sup><span class=" badge-pill badge-warning notification"><strong>2</strong></span></sup></i></span> -->
    <span class="nav-link text-light">
      <?php echo"Bal: Ksh" .$_SESSION['bal']; ?>
    </span>
<span class="mr-5">
    <!-- Dropdown -->

    <li class="nav-item dropdown">

      <a class="nav-link dropdown-toggle text-light" href="#" id="navbardrop" data-toggle="dropdown">
      <?php    
      $name=explode(" ", $_SESSION['name']);
          
          echo $name[0]." ID: ". $_SESSION['id'];

         ?>
       
      </a>

      <div class="dropdown-menu">
        <a class="dropdown-item" href="logout">Log Out</a>
        <hr>
        <a class="dropdown-item" href="home">Home</a>
        <hr>
        <a class="dropdown-item" href="changepass">Change Password</a>
      </div>
    </li>
  </span>
  </ul>
		  </div>
	</nav> 





<?php }else{

header("location:register");
};
 ?>

