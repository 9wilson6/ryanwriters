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
		<div class="card m-5">
  <div class="card-header bg-secondary text-light" align="center">PROJECT DETAILS</div>
  <div class="card-body p-5"> 
  	  <?php 

  	  $order_id= $_REQUEST['id'];
  	  $query="SELECT * FROM orders where order_id='$order_id'";
  	  $results=$db->query($query);
  	   if (mysqli_num_rows($results)>0) {?>
  	   <div class="text-center mb-3 "> <span class="text-uppercase h6 text-danger">Update Time</span> 
		<form action="updatetime" method="POST" id="updatetime">
			<div class="form-inline justify-content-center ">
				<label for="time" class="mr-2 text-info">Adjust Deadline &rarr;</label>
				<input type="datetime-local" required id="date_time" class="form-control mr-2">
				<input type="submit" value="Submit" class="btn btn-info">
			</div>
		</form>
  	   </div>
		<table class="table table-striped  table-hover table-sm table-responsive-lg">
	 		<thead class="thead-default bg-secondary text-light text-uppercase">

<tr>
<th>ID</th>
<th>Subject</th>
<th>deadline</th>

 </tr>
 </thead>
  <tbody>

  	   <?php

  	   	foreach ($results as $result) {?>
  	   		<tr> 
				<td><?php echo $result['order_id']; ?></td>
				<td><?php echo $result['subject']; ?></td>

				<?php 
				$deadline=$result['deadline'];
				$deadline_=$result['deadline'];
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


  	   <?php  }else{
  	   	echo "<center class='text-danger h2'>This Order Is No Longer Available</center>";
  	   	  	   }

 echo "<b class='text-danger'>TOPIC:</b> <br> {$topic} <hr>" ;
 echo "<b class='text-danger'>INSTRUCTIONS:</b> <br> {$instructions} <hr>" ;
showFiles();

echo "<div class='m-3'>
	
</div>";

echo "</div>
<div class='card-footer bg-secondary p-3'></div>
</div>";
$query="SELECT * FROM request LEFT JOIN users ON  request.user_id=users.id where order_id='$order_id'";
$results=$db->query($query);?>
<div class="row">
	<div class="col-1 col-sm-1 col-md-1 col-lg-1"></div>
	<div class="col-10 col-sm-10 col-md-10 col-lg-10">

				<div class="card m-1">
		  <div class="card-header bg-dark"><center class="text-light">Order Requests:</center></div>
		  <div class="card-body">
<?php if ( mysqli_num_rows($results)>0) {?>

<table class='table table-hover table-responsive-sm table-bordered table-striped'>

<thead class='bg-dark text-light'>

<tr>
<th>User ID</th>
<th>User Name</th>
<th>User rating</th>
<th>---------</th>
 </tr>
 </thead>
  <tbody>
<?php 
// $user_id=$_SESSION['id'];
foreach ($results as $result) {?>
	<tr>
		
		<td><?php echo $result['user_id'] ?></td>
		<td><?php echo $result['user_name'] ?></td>

		<?php 
		$times=$result['timesi'];
		if ($times==0) {
			$times=1;
		} ?>
		<td><?php echo round($result['rating']/$times, 1) ?></td>
		<td class="text-center">
			<form action="award" method="POST">
				<input type="hidden" name="user_id" value="<?php echo $result['user_id'] ?> ">
				<input type="hidden" name="order_id" value="<?php echo $order_id ?> ">
				<input type="hidden" name="order_subject" value="<?php echo $subject ?> ">
				<input type="hidden" name="user_name" value="<?php echo $result['user_name'] ?> ">
				<input type="hidden" name="deadline" value="<?php echo $deadline_ ?> ">
				<input type="hidden" name="order_topic" value="<?php echo $topic ?> ">
				<input type="submit" class="btn btn-sm btn-outline-danger" name="submit" value="award" >
				
			</form>
		</td>
	</tr>
<?php }


 ?>


</tbody>
</table>
</div>
<div class="card-footer bg-dark"></div>
</div>
<?php  }else{
	echo "There is Nothing to show";
}

 ?>

 </div>           
<div class=" col-lg-1 side_div"></div>
</div>
 <hr class="mb-5">

<?php }else{

	header("admin");
}?>
 <script>
			$(document).ready(function(){

				
				$("#show_menu").click(function(){

					$(".show_menu_contents").toggle(500);
				})
					
				
				$('#updatetime').submit(function(e){
					e.preventDefault();
					var order_id= "<?php echo $order_id?>";
					var time=$("#date_time").val()
					$.post("updatetime.php",
						{
							order_id: order_id,
							time:time

						}).done(function(data){
							if (data==1) {
								alert("deadline adjusted successfully");
								 window.location="account_management";
								
							}else {
								alert(data);
								// window.location="admin_peding_approval";
							}
						});
				});

			});
		</script>	
	