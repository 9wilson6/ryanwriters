<?php 

							$order_id= $_POST['order_id'];
							$error="";

							$user_name=$_POST['user_name'];
							$user_id= $_POST['user_id'];
							$form_type=$_POST['form_type'];
							$date=strtotime(date("Y-m-d h:i:sa"));
							$order_topic=$_POST['order_topic'];
							$order_subject=$_POST['order_subject'];
								if(isset($_FILES['file'])) {
							

							$name_array=$_FILES['files']['name'];
							$temp_name_array=$_FILES['files']['tmp_name'];
							$error_array=$_FILES['files']['error'];
						 $directory="./RESULTS/{$order_id}/{$user_id}/";
					    // $directory="./".$_SESSION['id']." /" "./ ".$_SESSION['order_id']."/";
					    if (!file_exists($directory)) {
					    mkdir($directory, 0777, true);
					}else{
					
						unlink($directory);
					}

						for ($i=0; $i < count($temp_name_array); $i++) { 
							if (move_uploaded_file($temp_name_array[$i], "{$directory}"." {$name_array[$i]}")) {
								// echo "{$name_array[$i]} was moved successfully <br>";
									
							}
							 else{
							 	$error=1;
							 }


						}
						require "db_config.php";
						$query="INSERT INTO pedding_approval( order_id, order_subject, order_topic, user_name, user_id, datei) VALUES('$order_id', '$order_subject', '$order_topic','$user_name', '$user_id','$date')";
						$results=$db->query($query);
						if ($results==1) {
							
							if ($form_type=="revision") {
							$query="DELETE FROM onrevision where order_id='$order_id' AND user_id='$user_id'";
							}else{
								$query="DELETE FROM onprogress where order_id='$order_id' AND user_id='$user_id'";
							}
							
							$results=$db->query($query);
							echo $results;
						}else{
							$error=1;
						}
					}


 ?>
 <script>
 	
 	var error="<?php echo $error ?>"
 	if (error==="") {
 		alert("Files Submited Successfully");
 		window.location = "on_u_progress";
 	}
 </script>