<?php
ob_start(); 
require("admin_header.php");
// require('links.php');
require("db_config.php");

 ?>

 <?php if (isset($_POST['submit'])) {
 	
 	
 	$error="";
 	$success="";
 	$subject=$db->quote($_POST['category']);
 	$topic=$db->quote($_POST['topic']);
 	$deadline=$_POST['due_date'];
 	$pages=$_POST['pages'];
 	$slides=$_POST['slides'];
 	date_default_timezone_set("Africa/Nairobi");
 	$posted_on=strtotime(date("m/d/Y h:i:s a"));
 	$user_id=$_SESSION['id'];

     // $time=strtotime($deadline);
 // echo "{$time} <br>";
 // echo date('m-d-Y H:i:s', $time);
 // 	// echo "{$deadline}";
 // 	
 	$details=$db->quote($_POST['details']);

 	if ($subject !="" && $deadline !="" && $details !=""  && $topic !="") {
 if (strtotime($deadline)) {
 			$deadline_string=strtotime($deadline);
 		$query="INSERT INTO orders(subject, deadline, description, date_posted, topic, pages, slides) VALUES('$subject','$deadline_string','$details', '$posted_on', '$topic', '$pages', '$slides')";
 		$result=$db->query($query);
 		
 		if ($result==1) {
 			
 			$query= "SELECT order_id FROM orders where date_posted='$posted_on' ";
 			$result=$db->query($query);
 			foreach ($result as $value) {
 				$_SESSION['order_id']= $value['order_id'];
 				//handle files
 				   
						if(isset($_FILES['file'])) {
							$name_array=$_FILES['file']['name'];
							$temp_name_array=$_FILES['file']['tmp_name'];
							$error_array=$_FILES['file']['error'];
						 $directory="./FILES/{$_SESSION['user_type']}/{$_SESSION['order_id']}/";
					    // $directory="./".$_SESSION['id']." /" "./ ".$_SESSION['order_id']."/";
					    if (!file_exists($directory)) {
					    mkdir($directory, 0777, true);
					}
						$x=1;
						for ($i=0; $i < count($temp_name_array); $i++) {
							$name=str_replace("#","_", $name_array[$i]);
							if (move_uploaded_file($temp_name_array, "{$directory}"."{$name}")) {
								// echo "{$name_array[$i]} was moved successfully <br>";
								$success="Homework posted successfully";
								$x+=1;
							}
							 else{
							 	// $error="something went wrong";
							 }
						}
					}
 			}
 			$success="Homework posted successfully";
 		}else{#end of check for successfully posting the order to database
 			$error=$result;
 		}
 }else{
 	$error="invalid date and time";
 }//check if time is valid
 	}else{

 		$error="All fields must be filled up.";
 	}#end check of if fields are filled up
 } ?>

 <?php if ($_SESSION['user_type']==="Admin") { ?>
<!-- <div class="over_lay"></div> -->
<link rel="stylesheet" href="css/common.css">
<div class="row mt-5" id="main_row">
	 <hr>
	<?php require "side_div.php"; ?>

	<div class="col-12 col-sm-12 col-md-12 col-lg-9">
		<div class="card my-4">
  <div class="card-header bg-secondary text-light text-uppercase" align="center"><strong>Post Homework</strong></div>

  <div class="card-body p-5 bg-secondary"> 
		
	<form action="postproject" id="postform" class="table table-responsive" method="POST" enctype="multipart/form-data">
		<?php if(isset($error)){
			echo "<div class=\"bg-danger text-center\">{$error}</div>";
		} ?>
		<?php if(isset($success)){
			echo "<div class=\"bg-success text-center\">{$success}</div>";
		} ?>
<div class="form-group">
<!-- ###################################################################################################### -->
	<label for="category" class="text-light"><strong>Select Subject &darr;</strong></label>
<select class="selectpicker form-control inputs" name="category" id="category">

  <option>Applied Sciences</option>
  <option>Biology</option>
  <option>Business Finance</option>
  <option>Chemistry</option>
  <option>Computer Science</option>
  <option>Engineering</option>
  <option>English</option>
  <option>History</option>
  <option>Law</option>
  <option>Mathematics</option>
  <option>Nursing</option>
  <option>Psychology</option>
  <option>Other</option>
</select>
</div>
<!-- ###################################################################################################### -->
<div class="form-group">
	<label for="topic" class="text-light"><strong>Topic &darr;</strong></label>
	<input type="text" name="topic" class="form-control inputs" required>
</div>
<!-- ###################################################################################################### -->	
<div class="form-group">
	<label for="due_date" class="text-light"><strong>Deadline Date & Time &darr;(EAT time zone)</strong></label>
	<input type="datetime-local" name="due_date" min="2019-04-02" class="form-control inputs" required placeholder="mm/dd/yyy --:-- --">
</div>
<!-- ###################################################################################################### -->

<div class="form-group">
	<label for="message" class="text-light"><strong>Details &darr;</strong></label>
	<textarea cols="30" rows="10" name="details" class="form-control inputs" id="message"></textarea>

</div>
<!-- ###################################################################################################### -->

<!-- ###################################################################################################### -->

	<div class="form-group">
	<div class="pr-5 mr-5">
	<label for="pages" class="text-light"><strong>Pages &darr;</strong></label>
	<input type="number" name="pages"  min="0" class="form-control inputs" required >
	</div>
	
	<div class="pr-5 mr-5">
	<label for="slides" class="text-light"><strong>Slides &darr;</strong></label>
	<input type="number" name="slides" min="0"  class="form-control inputs" required >
	</div>

	
</div>

<!-- ###################################################################################################### -->	
<div class="form-group">
	<label for="filesToUpload" class="text-light"><strong>Add files if any &darr;</strong></label>
	<input type="file" name="file[]" class="form-control-file inputs" id="filesToUpload" multiple/>
</div>
<!-- ###################################################################################################### -->
<div id="filename" class="mb-3"></div>
<input type="Submit" value="Submit" name="submit" class="form-control btn btn-outline-success btn-block">
<!-- ###################################################################################################### -->
</form>
</div>
<div class="card-footer bg-secondary p-3"></div>
</div>


 </div>           
<div class=" col-lg-1 side_div"></div>
</div>
 <hr class="mb-5">


  <script>
  	var inputbtn=document.getElementById("filesToUpload");
  	inputbtn.onchange=function(){
  		var items="";
  		if (inputbtn.files.length<=20) {
  		for( var i=0; i< inputbtn.files.length; i++){
  			items +='<li class="list-group-item">' + inputbtn.files[i].name + '</li>'
  		};
  		var filename = document.getElementById("filename");
  		filename.innerHTML='<center> <b class="text-success text-uppercase"> files to be uploaded &darr;</b> <br> <hr> <ul class="list-group"> </center> '  + items +'</ul> <hr>' ;
  		}else {
  			alert("Maxmum files u can upload is 20 plis try Zip your files and upload them as .zip");
  			$("#filesToUpload").val("");
  		}
  	};
  </script>
     	
    
     <?php

// require "links.php";
include("scripts/text_box.js");
      }

else{
	header("LOCATION:admin");
}

ob_end_flush();
  ?>
  <script>
			$(document).ready(function(){

				
				$("#show_menu").click(function(){

					$(".show_menu_contents").toggle(500);
				})
					
				

			});
		</script>	