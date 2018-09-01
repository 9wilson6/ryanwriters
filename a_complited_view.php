<?php 


require "admin_header.php";


if ($_SESSION['user_type']==="Admin") {

require 'db_config.php';
require "functions.php"
?>


<link rel="stylesheet" href="css/common.css">





<div class="row" id="main_row">
	 

<?php 
require "side_div.php";
// ";

 ?>


	<div class="col-12 col-sm-12 col-md-12 col-lg-9">

		<div class="card mb-4">
  <div class="card-header bg-secondary text-light" align="center">PROJECT DETAILS</div>
  <div class="card-body p-5"> 
  	  <?php 

  	  $order_id= $_REQUEST['id'];
  	  $use_id="";
  	  $query="SELECT * FROM finished where order_id='$order_id'";
  	  $results=$db->query($query);
  	  
  	   if (mysqli_num_rows($results)>0) {?>
  	   
<table class="table table-striped  table-hover table-sm table-responsive-lg">
	 		<thead class="thead-default bg-secondary text-light text-uppercase">

<tr>
<th>Order ID</th>
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
				$subject=$result['subject'];
				$topic=$result['topic'];
				$instructions=$result['description'];
				$deadline=date('d-m-Y h:i:s a', $deadline);
				$deadline_str=strtotime($deadline);
				$deadline=new DateTime($deadline);

				time_difference($deadline, $today); ?>
				<td><?php echo $difference; ?></td>
  	   		</tr>

  	   <?php  }?>
</tbody>
</table>


  	  

<?php
   echo "<b class='text-danger'>TOPIC:</b> <br> {$topic} <hr>" ;
 echo "<b class='text-danger'>INSTRUCTIONS:</b> <br> {$instructions} <hr>" ;
showFiles();

echo "<div class='m-3'>
	
</div>";
?>
</div>
<div class="card-footer bg-secondary p-3"></div>
</div>
<?php 
$query="SELECT * FROM finished LEFT JOIN users ON finished.user_id=users.id where order_id = '$order_id'";

$results=$db->query($query);
// echo $results;
?>
<?php if ( mysqli_num_rows($results)>0) {?>

<?php 
foreach ($results as $result) {
	$user_id=$result['user_id'];
	$user_name=$result['name'];
	$date=date('d-m-Y h:i:s a', $result['deadline']);
	$rated=$result['rated'];
	$paid=$result['paid']; 
}



 ?>
<div class="jumbotron bg-transparent py-5 ml-3">
	<div class="row">
		<div class="col-12 col-sm-12 col-md-6 col-lg-6 text-light bg-transparent">
			<p>
				<?php showResults_files(); ?>
			</p>

		</div>
<!-- ############################################################################################################### -->
		<div class="col-12 col-sm-12 col-md-6 col-lg-6 text-light bg-transparent">
			<p>
				<div class="card">
					<div class="card-header bg-info text-center"><strong>EXTRA INFO</strong></div>
					<div class="card-body bg-dark">
						<p> <strong class="text-danger text-uppercase">completed on:</strong> <?php echo "$date <br>"; ?>
							<?php if ($_SESSION['user_type']==="Admin"): ?>
								<strong class="text-danger text-uppercase"> BY:</strong>  <?php echo " $user_name <strong>ID</strong> $user_id <br>" ; ?>
							<?php endif ?>
							<strong class="text-danger text-uppercase">Rated: </strong> <?php echo "$rated <br>"; ?>
							<strong class="text-danger text-uppercase">Pay: </strong> <?php echo "$paid<br>"; ?>
						 </p>
					</div>
					<div class="card-footer bg-info"></div>
				</div>
			</p>
		</div>
<!-- ############################################################################################################### -->
	</div>
	
</div>
<?php  }else{
	echo "There is Nothing to show";
}

 ?>

 <hr class="mb-5">

 <?php  }else{
  	   	echo "<center class='text-danger h2'>This Order Is No Longer Available</center>";
  	   	  	   }?>
<?php }else{

	header("admin");
}?>
 <script>
			$(document).ready(function(){

				
				$("#show_menu").click(function(){

					$(".show_menu_contents").toggle(500);
				})
					
			});
		</script>	
	<?php include("scripts/text_box.js"); ?>
