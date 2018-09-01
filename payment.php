<?php
require "db_config.php";
if (isset($_POST['submit'])) {
date_default_timezone_set("Africa/Nairobi");
$date=date('d-m-Y h:i:s a');
$amount= $_POST['amount'];

$id= $_POST['id'];

$sql="SELECT * FROM users WHERE id='$id'";
$res=$db->query($sql);
foreach ($res as $row) {
	$bal=$row['balance'];

}
$sql="INSERT INTO payments(user_id, datei, amount_paid)VALUES('$id','$date','$amount')";
$res=$db->query($sql);
if ($res==1) {
$bal= $bal-$amount;
$sql="UPDATE users SET balance='$bal' WHERE id='$id'";
$res=$db->query($sql);
header("Location:account_management?status=4");

}else{
echo $res;
}

}

 ?>