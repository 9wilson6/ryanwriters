<?php 

if (isset($_POST['time'])) {
	require 'db_config.php';
	$order_id=$_POST['order_id'];
	$time=strtotime($_POST['time']);
	$sql="UPDATE orders SET deadline='$time' WHERE order_id='$order_id'";
	$res=$db->query($sql);
	echo $res;
}
 ?>