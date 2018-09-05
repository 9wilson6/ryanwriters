<?php 
$user_name= $_POST['user_name'];
$user_id= $_POST['user_id'];
$order_id= $_POST['order_id'];
$topic=$_POST['topic'];
	require "db_config.php";
	require_once"functions.php";
if (isset($user_name) && isset($user_id)) {
	$time=date('d/m/Y h:i:s a');
	$query="INSERT INTO request(order_id, user_id, user_name) VALUES('$order_id', '$user_id', '$user_name')";
	$results=$db->query($query);
	 // $results=1;
	if ($results==1) {
	
		######################################################################Mail
		$query="SELECT email FROM users WHere id='$user_id'";
		$result=$db->query($query);
		foreach ($result as $res) {
			$email=$res['email'];
		}
		$message = '<html>
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
		$email=$email;
		$to="ryan@ryanwriters.com";
		$sender_name=$user_name;
		$receiver_name="Samryan";
		sendmail($email, $to, $subject);
		


		#######################################################################mail

		
	}
echo $results;

}
 ?>