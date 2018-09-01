<?php 
$user_name= $_POST['user_name'];
$user_id= $_POST['user_id'];
$order_id= $_POST['order_id'];
$topic=$_POST['topic'];


if (isset($user_name) && isset($user_id)) {
	require "db_config.php";
	$query="INSERT INTO request(order_id, user_id, user_name) VALUES('$order_id', '$user_id', '$user_name')";
	$results=$db->query($query);
	
	// die($results);
	if ($results==1) {

		######################################################################Mail
		$query="SELECT email FROM users WHere id='$user_id'";
		$result=$db->query($query);
		foreach ($result as $res) {
			$email=$res['email'];
		}
		date_default_timezone_set("Africa/Nairobi");
			$time=date('d/m/Y h:i:s a');
		$to = "ryan@ryanwriters.com";
		$subject ="Order Request";
		$message = '
							<html>
							<body style="background: #EEEEEE;">
							<p><strong>Order id:&nbsp;   &nbsp;'.$order_id.'</strong></p>
							<p> <strong>About:</strong> <br> '.$topic.' <br></p>
							  <p>
								 Was requested by: <strong>'.$user_name.'</strong><br>
								  <strong>
									Id:</strong> &nbsp;  &nbsp;'.$user_id.'
									<br>
								<font color="#222"> <b>Time:</b>&nbsp;  &nbsp; '.$time.'</font>
							  </p>

							  
							</body>
							</html>
							';
							// To send HTML mail, the Content-type header must be set
							$headers  = 'MIME-Version: 1.0' . "\r\n";
							$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
							$headers .= "From: ".$email. "\r\n";

         mail($to,$subject,$message,$headers);

		#######################################################################mail

		
	}
echo $results;

}
 ?>