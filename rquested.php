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
		$topic=wordwrap($topic, 70);

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
		$subject="Request for order ID: ".$order_id;
		$to="ryan@ryanwriters.com";
		sendmail($email, $to, $subject);
		


		#######################################################################mail

		
	}
echo $results;

}
 ?>