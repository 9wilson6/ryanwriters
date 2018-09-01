<meta http-equiv="refresh" content="300">
<?php 
ob_start();

require_once "db_config.php";

function available(){//check available orders
	global $db;
	$today_str=strtotime(date('d-m-Y h:i:s a'));
	$query=" SELECT * FROM orders where deadline > '$today_str' AND status = 0 ";
// $query="SELECT * FROM orders";
$results=$db->query($query);
$number=mysqli_num_rows($results);
return $number;
money();
}

function onProgress(){//check orders on progress
	global $db;
if (isset($_SESSION['user_type'])) {
	$query="SELECT * FROM onprogress";
	$results=$db->query($query);
	$number=mysqli_num_rows($results);
}
if (isset($_SESSION['name']) && isset($_SESSION['id'])) {
	
	$user_id=$_SESSION['id'];
	$query="SELECT * FROM onprogress WHERE user_id='$user_id'";
	$results=$db->query($query);
	$number=mysqli_num_rows($results);
}

return $number;
}

function pedingApproval(){//check orders pedding approval
global $db;
if (isset($_SESSION['user_type'])) {
	$query="SELECT * FROM pedding_approval";
	$results=$db->query($query);
	$number=mysqli_num_rows($results);
}
if (isset($_SESSION['name']) && isset($_SESSION['id'])) {
	
	$user_id=$_SESSION['id'];
	$query="SELECT * FROM pedding_approval WHERE user_id='$user_id'";
	$results=$db->query($query);
	$number=mysqli_num_rows($results);
}

return $number;

}

function onRevision(){//check orders on rivision
global $db;
if (isset($_SESSION['user_type'])) {
	$query="SELECT * FROM onrevision";
	$results=$db->query($query);
	$number=mysqli_num_rows($results);
}
if (isset($_SESSION['name']) && isset($_SESSION['id'])) {
	
	$user_id=$_SESSION['id'];
	$query="SELECT * FROM onrevision WHERE user_id='$user_id'";
	$results=$db->query($query);
	$number=mysqli_num_rows($results);
}

return $number;

}


function Approved(){//check approved orders
global $db;
if (isset($_SESSION['user_type'])) {
	$query="SELECT * FROM finished";
	$results=$db->query($query);
	$number=mysqli_num_rows($results);
}
if (isset($_SESSION['name']) && isset($_SESSION['id'])) {
	
	$user_id=$_SESSION['id'];
	$query="SELECT * FROM finished WHERE user_id='$user_id'";
	$results=$db->query($query);
	$number=mysqli_num_rows($results);
}
if ($number>10000) {
	$number="Over 10,000";
}
return $number;
}

function money(){
	global $db;
	$user_id=$_SESSION['id'];
	$query="SELECT balance FROM users WHERE id='$user_id'";
	$results=$db->query($query);
	// echo $results;
	foreach ($results as $row) {
		$_SESSION['bal']=$row['balance'];
	}
}
if (isset($_SESSION['name']) && isset($_SESSION['id'])) {
money();
}
ob_end_flush();
 ?>


