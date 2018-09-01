

<link rel="stylesheet" href="css/bootstrap.min.css">

<?php 

	// require "functions.php";
	$order_id=$_REQUEST['id'];
	// require 'db_config.php';
		$query="SELECT * FROM orders WHERE order_id= '{$order_id}'";
		$results=$db->query($query);

if (mysqli_num_rows($results)>0) { 
// require "process_request_header.php";
require "Admin_User_options_progress.php";

 }else{

	echo "Order not Available!!!";
}

 ?>
