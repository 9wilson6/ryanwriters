<?php
ob_start();
require 'db_config.php';
require  "functions.php";
if ($_POST['submit']) {
	$instructions=$db->quote($_POST['instructions']);
	$res="";
if ($instructions!="") {
	$query="UPDATE others SET note_to_writers='$instructions'";
  $res=$db->query($query);
}else{
	$res=2;
}

if ($res==1) {
	

if($_FILES['file']['size'][0] >=2000) {


							$name_array=$_FILES['file']['name'];
							$temp_name_array=$_FILES['file']['tmp_name'];
							$error_array=$_FILES['file']['error'];
						 $directory="./FILES/INSTRUCTIONS/";
					    // $directory="./".$_SESSION['id']." /" "./ ".$_SESSION['order_id']."/";
					    // 

							deleteFiles();
					    if (!file_exists($directory)) {
					    mkdir($directory, 0777, true);
					}

						for ($i=0; $i < count($temp_name_array); $i++) { 
							$name=str_replace("#","_", $name_array[$i]);
							if (move_uploaded_file($temp_name_array[$i], "{$directory}"."{$name}")) {
								// echo "{$name_array[$i]} was moved successfully <br>";
								
							}
							 else{
							 	// $error="something went wrong";
							 }
						}
					}else{
						
					}
header("location:account_management?status=3");
ob_end_flush(); 
}else{
	echo $res;
}

}


						

 ?>