<?php 

if (isset($_POST['submit'])) {
	require_once "db_config.php";

	
	$order_id=$db->quote($_POST['order_id']);
	$user_id=$_POST['user_id'];
	$topic=$_POST['topic'];
	
	$query="SELECT email FROM users WHere id='$user_id'";
		$result=$db->query($query);
		foreach ($result as $res) {
			$email=$res['email'];
		}
	

	if ($_POST['form_type']=="revision") {
      $rev_instructions=$db->quote($_POST['rev_instructions']);
    
     if (strtotime($_POST['datei'])) {
     	 $datei=strtotime($_POST['datei']);
     
	$query="INSERT INTO onrevision(order_id, user_id, rev_instructions, deadline) VALUES ('$order_id', '$user_id', '$rev_instructions', '$datei')";
	$result=$db->query($query);
	require_once"functions.php";
	$deadline=$_POST['datei'];
	$time=date('d/m/Y h:i:s a');
	//////////////////////////////////////////////////
	$message = '
							<html>
							<body style="background: #EEEEEE;">
							<p><strong>Order id:&nbsp;   &nbsp;'.$order_id.'</strong></p>
							<p> <strong>About:</strong> <br> '.$topic.' <br></p>
							  <p>
								  <strong><font color="#FF8800"> Has been sent back for revision</font></strong><br>
								  
								<font color="#222"> <b>Time:</b>&nbsp;  &nbsp; '.$time.'</font>
								 <p>Kindly check back and make the necessary adjustments</p><br>
							 <p> for more info vaist:http://ryanwriters.com/login</p><br>
							  </p>

							  
							</body>
							</html>
							';

		$subject="Revise the order ID: ".$order_id;
		$to=$email;
		$email="ryan@ryanwriters.com";
		$sender_name=$user_name;
		$receiver_name="Samryan";
		sendmail($email, $to, $subject);
	///////////////////////////////////////////////
	if ($result==1) {
		$query="DELETE FROM pedding_approval where order_id='$order_id' AND user_id='$user_id'";
		$result=$db->query($query);
		echo $result;

	
}else{

}
}
}
	if ($_POST['form_type']=="close") {
		$pages=trim($_POST['pages']);
	$slides=trim($_POST['slides']);
	$cpp=trim($_POST['cpp']);
	$cps=trim($_POST['cps']);
	$slides_total=trim($_POST['slides_total']);
	$pages_total=trim($_POST['pages_total']);
	$gross_total=trim($_POST['gross_total']);
		$query="SELECT * FROM users where id ='$user_id'";
		$results = $db->query($query);
		
		if (mysqli_num_rows($results)>0) {
			foreach ($results as $result) {
				$rating_=$result['rating'];
				$times_=$result['timesi'];
				$balance=$result['balance'];
			}
		}
		$rating=$_POST['rating'];
		$rating_=$rating + $rating_;
		$balance=$balance + $gross_total;
		$times_+=1;
		$query="UPDATE users SET rating='$rating_', timesi='$times_', balance='$balance' WHERE id='$user_id'";
		$result=$db->query($query);
		if ($result==1) {
			$query="INSERT INTO finished SELECT * FROM orders WHERE order_id='$order_id'";
			$results=$db->query($query);
			if ($results==1) {
			$today= date('d-m-Y h:i:s a');
			$todaystr=strtotime($today);
				$query="UPDATE finished SET user_id='$user_id', pages='$pages', slides='$slides', paid='$gross_total', deadline='$todaystr', rated='$rating' WHERE order_id='$order_id'";
				$results=$db->query($query);

					if ($results==1) {
					$query="DELETE FROM orders WHERE order_id='$order_id'";
					$results=$db->query($query);
					if ($results==1) {
						$query="DELETE FROM pedding_approval WHERE order_id='$order_id' AND user_id='$user_id'";
						$results=$db->query($query);
						echo $results;
					}else{
				echo $results;
			}
					
					}else{
				echo $results;
			}
				}else{
				echo $results;
			}
		}else{
			echo $results;
		}

			
					
				}
				
			}
	


 ?>