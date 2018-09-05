<?php if (isset($_POST['submit'])) {
	$user_id= $_POST['user_id'];
	$order_id= $_POST['order_id'];
	$order_subject= $_POST['order_subject'];
	$order_topic= $_POST['order_topic'];
	$user_name=$_POST['user_name'];
	$deadline=$_POST['deadline'];
	$email=$_POST['email'];
	$topic=$_POST['topic'];

	require 'db_config.php';
	require_once("functions.php");
	$query="INSERT INTO onprogress (order_id, user_id, order_subject, order_topic, user_name, deadline) VALUES('$order_id', '$user_id', '$order_subject', '$order_topic', '$user_name', '$deadline') ";
	$results=$db->query($query);
		
	$query="UPDATE orders SET status=1 WHERE order_id='$order_id'";

	$results=$db->query($query);
	$query= "DELETE FROM request WHERE order_id ='$order_id'";
	$results=$db->query($query);
	
	$result= $results;
	
	date_default_timezone_set("Africa/Nairobi");
	$time=date('d/m/Y h:i:s a');
	$deadline=date('d/m/Y h:i:s a', $deadline);
	if ($results==1) {

		
		$message = ' <html>
		<head>
			<title>Congratulations Bid Successful</title>
		</head>
							<body style="background: #EEEEEE;">
							<p><h3> The order id:'.$order_id.' has been assigned to you!!!!</h3></p>
							<p> <strong>About:</strong> <br> '.$topic.' <br>
							<small>deadline:'.$deadline.'</small>
							</p>
							  <p>
								<font color="#222"> <b>Time:</b>&nbsp;  &nbsp; '.$time.'</font>
							  </p>

							  <p>You may start working on it :)</p><br>
							 <p> for more info vaist:http://ryanwriters.com/login</p><br>
							</body>
							</html>
							';
		$subject="Congratulations!!!!!!! ". $user_name;
		$to=$email;
		$email="ryan@ryanwriters.com";
		$receiver_name=$user_name;
		$sender_name="Samryan";
		sendmail($email, $to, $subject);


	}
} ?>


<script>
  var result =" <?php echo $result ?> ";
  var id =" <?php echo $user_id ?> ";
  if (result==1) {
    alert("Orders assigned to USER ID:" + id );
    window.location = "current_orders";
  }else {
    alert("<?php echo $results?> ")
  }
</script>
