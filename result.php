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
							

							$name_array=$_FILES['file']['name'];
							$temp_name_array=$_FILES['file']['tmp_name'];
							$error_array=$_FILES['file']['error'];
						 $directory="./RESULTS/{$order_id}/{$user_id}/";
					    // $directory="./".$_SESSION['id']." /" "./ ".$_SESSION['order_id']."/";
					    if (!file_exists($directory)) {
					    mkdir($directory, 0777, true);
					}else{
						$allFiles=scandir($directory);
						$files=array_diff($allFiles, array('.', '..'));
						foreach ($files as  $file) {

						unlink($directory.$file);
					}
						
					}

						for ($i=0; $i < count($temp_name_array); $i++) { 
							$name=str_replace("#","_", $name_array[$i]);
							if (move_uploaded_file($temp_name_array[$i], "{$directory}"."{$name}")) {
								
							}
							 else{

							 	$error=1;
							 }


						}
						require "db_config.php";
						require 'functions.php';
						$query="INSERT INTO pedding_approval( order_id, order_subject, order_topic, user_name, user_id, datei) VALUES('$order_id', '$order_subject', '$order_topic','$user_name', '$user_id','$date')";
						$results=$db->query($query);
						if ($results==1) {
							
							if ($form_type=="revision") {
							$query="DELETE FROM onrevision where order_id='$order_id' AND user_id='$user_id'";
							}else{
								$query="DELETE FROM onprogress where order_id='$order_id' AND user_id='$user_id'";
							}
							
							$results=$db->query($query);
							$sql="SELECT email FROM users where user_type ='Admin'";
							$results=$db->query($sql);
							foreach ($results as $result) {
								$email=$result['email'];
							}
							$time=date('d/m/Y h:i:s a');
			$subject="Results for order ID: ".$order_id;			
		$message = ' <html>
		<head>
			<title>Order complited</title>
		</head>
							<body style="background: #EEEEEE;">
							<p>Results for order id '. $order_id.' has been handed in by '.$user_name.' ID:<strong>'. $user_id.'</strong>;</p>
							<p> <strong>About:</strong> <br> '.$order_topic.' <br>
							</p>
							  <p>
								<font color="#222"> <b>Time:</b>&nbsp;  &nbsp; '.$time.'</font>
							  </p>

							  <p>You may have a look at the results now!!! :)</p><br>
							 <p> for more info vaist:http://ryanwriters.com/login</p><br>
							</body>
							</html>
							';
							$to="ryan@ryanwriters.com";
							$sender_name=$user_name;
							$receiver_name="Samryan";
								sendmail($email, $to, $subject);
		
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