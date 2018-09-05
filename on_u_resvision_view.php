<?php 
require "account_header.php";


if (isset($_SESSION['id'])) {

require 'db_config.php';
require "functions.php";
?>


<link rel="stylesheet" href="css/common.css">





<div class="row" id="main_row">
	 

<?php 
require "user_ul.php";
// ";

 ?>


	<div class="col-12 col-sm-12 col-md-12 col-lg-9">
		<div class="card">
  <div class="card-header bg-secondary text-light" align="center">PROJECT DETAILS</div>
  <div class="card-body p-5"> 
  		  <?php 

  	  $order_id= $_REQUEST['id'];
  	  $user_id=$_SESSION['id'];
      $user_name=$_SESSION['name'];
  	  $query="SELECT * FROM orders LEFT JOIN onrevision ON orders.order_id=onrevision.order_id where orders.order_id='$order_id'";
  	  $results=$db->query($query);
     
  	   if (mysqli_num_rows($results)>0) {?>
  	   
		<table class='table table-hover table-bordered table-striped'>

<thead class='bg-dark text-light'>

<tr>
<th>ID</th>
<th>Subject</th>
<th>deadline</th>

 </tr>
 </thead>
  <tbody>

  	   <?php	foreach ($results as $result) {?>
  	   		<tr> 
				<td><?php echo $result['order_id']; ?></td>
				<td><?php echo $result['subject']; ?></td>

				<?php $deadline=$result['deadline'];
				$topic=$result['topic'];
        $order_subject=$result['subject'];
				$instructions=$result['description'];
				$deadline=date('d-m-Y h:i:s a', $deadline);
				$deadline_str=strtotime($deadline);
				$deadline=new DateTime($deadline);
        $rev_instructions=$result['rev_instructions'];
				time_difference($deadline, $today); ?>
				<td><?php echo $difference; ?></td>
  	   		</tr>

  	   <?php  }?>



</tbody>
</table>
<?php echo "<b class='text-danger'>TOPIC:</b> <br> {$topic} <hr>" ;
 echo "<b class='text-danger'>INSTRUCTIONS:</b> <br> {$instructions} <hr>" ;
showFiles();?>
<div class="container">
  <div class="card my-4">
    <div class="card-header text-uppercase text-center  bg-danger ">revision instructions</div>
    <div class="card-body">
      <?php echo $rev_instructions; ?>
    </div>
  </div>
</div>
</div>
<div class="card-footer bg-secondary p-3"></div>
</div>







 </div>  


<div class=" col-lg-1 side_div"></div>
</div>
<!--============================================================================================ -->
  <div class="container">
    <div class="row mt-3" id="main_row">

<div class="col-sm-12 col-md-12 col-lg-6">

<?php showResults_files(); ?>

 </div>
	<div class=" col-sm-12 col-md-12 col-lg-6">
   
	<div class="card mb-2">
  <div class="card-header bg-danger text-light text-uppercase" align="center"><strong>Upload Your Revision Results Here:</strong></div>
  <div class="card-body bg-warning"> 
    <form action="result" method="POST" enctype="multipart/form-data">
      <input type="file" name="file[]" class="form-control-file" id="filesToUpload" required multiple/>
      <input type="hidden" name="order_id" value="<?php echo $order_id ?>">
      <input type="hidden" name="form_type" value="revision">
      <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
      <input type="hidden" name="order_topic" value="<?php echo $topic ?>">
       <input type="hidden" name="user_name" value="<?php echo  $user_name ?>">
     
      <input type="hidden" name="order_subject" value="<?php echo $order_subject ?>">
      
      <div id="filename" class="mb-3"></div>
      <input type="submit" value="upload" name="submit" class="btn btn-danger">
    </form>
</div>
<div class="card-footer bg-danger p-3"></div>
</div>

 </div>           
<!-- <div class=" col-lg-2 side_div"></div> -->

</div>
</div>
<?php
    }else{
        echo "<center class='text-danger h2'>This Order Is No Longer Available</center>";
               }?>
<?php

 }else{

	header("register");
}?>
 <script>
			$(document).ready(function(){

				
				$("#show_menu").click(function(){

					$(".show_menu_contents").toggle(500);
				})
					
				//////////////////////////////////////////////////////////////////
				///
				///
				///
				//////////////////////////////////////////////////////////////////
	

			});

			var inputbtn=document.getElementById("filesToUpload");
  	inputbtn.onchange=function(){
  		var items="";
  		var filename = document.getElementById("filename");
  		if (inputbtn.files.length == 3 ) {
  		for( var i=0; i< inputbtn.files.length; i++){
  			items +='<li class="list-group-item">' + inputbtn.files[i].name + '</li>'
  		};
  		//var filename = document.getElementById("filename");
  		filename.innerHTML='<center> <b class="text-success text-uppercase"> files to be uploaded &darr;</b> <br> <hr> <ul class="list-group"> </center> '  + items +'</ul> <hr>' ;
  		}else if(inputbtn.files.length > 3 || inputbtn.files.length < 3){
  				$("#filename").html(" <b class='text-danger text-center mt-4'>You Must ONLY Upload 3 FIles ie Grammerly report, TurnItIn report and The Assignment Results!!</b>");
  			$("#filesToUpload").val("");
  		}
  	};
		</script>	
