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
  	  $query="SELECT * FROM orders where order_id='$order_id'";
  	  $results=$db->query($query);
  	   if (mysqli_num_rows($results)>0) {?>
  	   
	 	<table class="table table-striped  table-hover table-sm table-responsive-lg">
	 		<thead class="thead-default bg-secondary text-light text-uppercase">

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

				<?php 
				$deadline=$result['deadline'];
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


  	  

<?php echo "<b class='text-danger'>TOPIC:</b> <br> {$topic} <hr>" ;
 echo "<b class='text-danger'>INSTRUCTIONS:</b> <br> {$instructions} <hr>" ;
showFiles();

echo "<div class='m-3'>
	
</div>";?>

</div>
<div class="card-footer bg-secondary p-3"></div>
</div>
<?php  
$query="SELECT * FROM onprogress where order_id = '$order_id'";

$results=$db->query($query);
// echo $results;
?><div class="row">
	<div class="col-1 col-sm-1 col-md-1 col-lg-1"></div>
	<div class="col-10 col-sm-10 col-md-10 col-lg-10">

				<div class="card">
		  <div class="card-header bg-dark"><center class="text-light">Order Info:</center></div>
		  <div class="card-body">
<?php if ( mysqli_num_rows($results)>0) {?>

<?php 
// $user_id=$_SESSION['id'];
foreach ($results as $result) {
echo "<center class='h4 text-danger'>{$result['user_name']} Id {$result['user_id']} Is Working On This Order</center>";

 }


 ?>


</div>
<div class="card-footer bg-dark"></div>
<?php  }else{
	echo "There is Nothing to show";
}

 ?>

 </div>           
<div class=" col-lg-1 side_div"></div>
</div>
 <hr class="mb-5">
 <?php  }else{
  	   	echo "<center class='text-danger h2'>This Order Is No Longer Available</center>";
  	   	  	   }


  	   ?>
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
	