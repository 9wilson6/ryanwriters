<?php
ob_start(); 
require "functions.php";
session_start();
$fileName=basename($_GET['file']);
$dir=$_GET['dir'];
$filePath=$dir."/".$fileName;

if (!$filePath) {
	die( "File Not Found");
}else{
header("Cache-Control: public");
header("Content-Description: File Transfer");
header("Content-Disposition: attachment; filename=".$fileName);
header("Content-Type: application/octet-stream");
// header("Content-Length:".filesize($filName));
header("Content-Transfer-Encoding: binary");
while (ob_get_level()) {
	ob_end_clean();
}
readfile($filePath);
exit;
}


 ?>