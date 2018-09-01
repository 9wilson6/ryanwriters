<?php 
session_start();
if($_SESSION['user_type']==="Admin") {

session_unset();
session_destroy();
header("location:admin");
}else{
	session_unset();
session_destroy();
header("location:login");
}

 ?>