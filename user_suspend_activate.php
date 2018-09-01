<?php 

if (isset($_POST['submit'])) {
	require_once "db_config.php";
	$action=$_POST['action'];
	$id=$_POST['user_id'];
if ($action=="suspend") {
	$sql="UPDATE users SET status='disabled' WHERE id='$id'";
	$res=$db->query($sql);
}elseif ($action=="restore") {
	$sql="UPDATE users SET status='active' WHERE id='$id'";
	$res=$db->query($sql);

}
 header("location:account_management?status=1");
}
 ?>

