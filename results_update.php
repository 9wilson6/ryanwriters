<?php 
require "functions.php";
							$order_id= $_POST['order_id'];
							$error="";
							$user_name=$_POST['user_name'];
							$user_id= $_POST['user_id'];
							$date=strtotime(date("Y-m-d h:i:sa"));
							$order_topic=$_POST['order_topic'];
							$order_subject=$_POST['order_subject'];
###############################################################################################################
							$directory="./RESULTS/{$order_id}/{$user_id}/";
							
							deleteFiles();
#############################################################################################################################################################
								if(isset($_FILES['file'])) {
							

							$name_array=$_FILES['file']['name'];
							$temp_name_array=$_FILES['file']['tmp_name'];
							$error_array=$_FILES['file']['error'];
						 $directory="./RESULTS/{$order_id}/{$user_id}/";
					    // $directory="./".$_SESSION['id']." /" "./ ".$_SESSION['order_id']."/";
					    if (!file_exists($directory)) {
					    mkdir($directory, 0777, true);
					}

						for ($i=0; $i < count($temp_name_array); $i++) { 
							$name=str_replace("#","_", $name_array[$i]);
							if (move_uploaded_file($temp_name_array[$i], "{$directory}"."{$name}")) {
								// echo "{$name_array[$i]} was moved successfully <br>";
								
							}
							 else{
							 	$error=1;
							 }
						}
						
					}


 ?>
 <script>
 	
 	var error="<?php echo $error ?>"
 	if (error==="") {
 		alert("Files Updated Successfully");
 		window.location = "user_pedding_approval";
 	}
 </script>