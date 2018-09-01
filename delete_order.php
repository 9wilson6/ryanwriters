<?php 
if (isset($_POST['submit'])) {
	require_once "db_config.php";
	$order_id=$_POST['order_id'];
	




	###############################################################################################################
							$directory="./FILES/Admin/".trim($order_id)."/";
							function deleteFiles(){
									
									
									global $directory;
									global $db;
									global $order_id;
										 if (!file_exists($directory)) {
													// echo $directory;
													}else{
						
										$allFiles=scandir($directory);
										$files=array_diff($allFiles, array('.', '..'));
		
										if(empty($files)) {
											rmdir($directory);
										}else{
										foreach ($files as  $file) {
								
									unlink($directory."/".$file);
													}
													rmdir($directory);
													}

								}

								$sql="DELETE FROM orders WHERE order_id='$order_id'";
								$res= $db->query($sql);
								if ($res==1) {
									 $sql="DELETE FROM onprogress WHERE order_id='$order_id'";
								$res= $db->query($sql);
									if ($res==1) {
										 $sql="DELETE FROM onrevision WHERE order_id='$order_id'";
										$res= $db->query($sql);
										if ($res==1) {
											$sql="DELETE FROM pedding_approval WHERE order_id='$order_id'";
										$res= $db->query($sql);
										if ($res==1) {
											header("location:account_management?status=2");
										}
									}else{
									echo $res;
								}
									}else{
									echo $res;
								}
								}else{
									echo $res;
								}

								
								
									
							}
						
#############################################################################################################################################################
	deleteFiles(); 
}elseif (isset($_POST['addtime'])) {
	$order_id=$_POST['order_id'];
}

 ?>
