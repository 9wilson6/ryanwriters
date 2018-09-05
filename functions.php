<?php 
date_default_timezone_set("Africa/Nairobi");
$today= date('d-m-Y h:i:s a');
$today_str=strtotime($today);
$today=new DateTime($today);
$difference="";
$deadline_str="";
// $deadline="";
$bid_enabled=1;

#############################################################################################################
function time_difference($time1, $time2){
	    global $deadline_str;
		global $today_str;
		global $difference;
		global $bid_enabled;
		global $deadline;
	$diff1 =$time1->diff($time2);
	

if ( $deadline_str >  $today_str) {
	$bid_enabled=1;
	if($diff1->y){$difference = $diff1->format("%y year(s) ");
}elseif($diff1->m){$difference = $diff1->format("%m month(s) ");
}else if($diff1->d){$difference = "<span class='text-success'>".$diff1->format("%d day(s) %h hour(s)");
}elseif($diff1->h){$difference ="<span class='text-warning'>". $diff1->format("%h hour(s) %i mins")."<span>";
}elseif($diff1->i){$difference ="<span class='text-warning'>". $diff1->format("%i min(s) ")."<span>";
}elseif($diff1->s){$difference = $diff1->format("%s sec(s) ");

}
}else{ 
	$bid_enabled=0;
$difference="<span class='text-danger'>";
if($diff1->y){$difference .=$diff1->format("%y year(s) ago");
}elseif($diff1->m){$difference .=$diff1->format("%m month(s) ago");
}else if($diff1->d){$difference .=$diff1->format("%d day(s) ago");
}elseif($diff1->h){$difference .=$diff1->format("%h hour(s) ago");
}elseif($diff1->i){$difference .=$diff1->format("%i min(s) ago");
}elseif($diff1->s){$difference .=$diff1->format("%s sec(s) ago");}

}
$difference .=" &nbsp;<i class='fa fa-clock-o'></i><span>";

}

##################################################################################################################################
###################################################################################################################################
					    function deleteFiles(){
									global $directory;
										 if (!file_exists($directory)) {
													echo "No Files Attached"; 
													}else{
						
										$allFiles=scandir($directory);
										$files=array_diff($allFiles, array('.', '..'));
		
										if(empty($files)) {
											echo "No Files Attached";
										}else{
										foreach ($files as  $file) {
								
									unlink($directory."/".$file);
													}
													rmdir($directory);
													}

								}
							}
##################################################################################################################################
#

#v#################################################################################################################################

function showfiles(){ 
global $user_id;
global $order_id;
	?>


<div class="row">
	<div class="col-1 col-sm-1 col-md-1 col-lg-1"></div>
	<div class="col-10 col-sm-10 col-md-10 col-lg-10">

				<div class="card mx-2">
		  <div class="card-header bg-secondary text-center"><strong class="text-light  text-uppercase">Files:<i class="fa fa-file-o ml-3"></i></strong></div>
		  <div class="card-body">
		<?php 

		$directory="./FILES/Admin/{$order_id}";
		 if (!file_exists($directory)) {
					echo "No Files Attached"; 
					}else{
						
		$allFiles=scandir($directory);
		$files=array_diff($allFiles, array('.', '..'));
		
		if(empty($files)) {
			echo "No Files Attached";
		}else{
		foreach ($files as  $file) {

						echo "<a href='download?file=".$file."&dir=".$directory."'>".$file." <i class='fa fa-download ml-3'></i></a><br/>";

					}
					}

}
		 ?>	  	
	
	

		  </div> 
		  <div class="card-footer bg-secondary p-3"></div>
			</div>

</div>
<div class="col-1 col-sm-1 col-md-1 col-lg-1"></div>
</div>




<?php }  ?>
<?php 

function showResults_files(){ 
global $user_id;
global $order_id;
	?>


<div class="row">
	<!-- <div class="col-1 col-sm-1 col-md-1 col-lg-1"></div> -->
	<div class="col-12 col-sm-12 col-md-12 col-lg-12">
<div class="card my-1">
		  <div class="card-header bg-info"><center class="text-light"><strong class="text-uppercase">Results For The Above Project:</strong></center></div>
		  <div class="card-body">
<?php 

$directory="./RESULTS/{$order_id}/{$user_id}/";

		 if (!file_exists($directory)) {
					echo "No Files Attached"; 
					}else{
						
		$allFiles=scandir($directory);
		$files=array_diff($allFiles, array('.', '..'));
		
		if(empty($files)) {
			echo "No Files Attached";
		}else{
		foreach ($files as  $file) {

						echo "<a href='download?file=".$file."&dir=".$directory."'>".$file."</a><br/>";
					}
					}

}
		 ?>	  	
	
	

		  </div> 
		  <div class="card-footer bg-info p-3 "></div>
			</div>

</div>
<!-- <div class="col-1 col-sm-1 col-md-1 col-lg-1"></div> -->
</div>




<?php } 

function sendmail($from, $to, $subject){
		global $user_name;
		global $message;
		require("PHPMailer-master/src/PHPMailer.php");
    	 require("PHPMailer-master/src/SMTP.php");
         require("PHPMailer-master/src/Exception.php");
         date_default_timezone_set("Africa/Nairobi");
		$time=date('d/m/Y h:i:s a');
		$deadline=date('d/m/Y h:i:s a', $deadline);
		$mail= new PHPMailer\PHPMailer\PHPMailer();
		$mail -> setFrom($email, $user_name);
		$mail->addAddress($to, $user_name);
		$mail->isHTML(TRUE);
		$mail->Subject=$subject;
		$mail->Body=$message;
		$mail->send();
}

 ?>




