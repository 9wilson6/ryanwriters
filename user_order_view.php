<?php 
require "account_header.php";


if (isset($_SESSION['id'])) {

require 'db_config.php';
require "functions.php";
$id=$_SESSION['id'];
$sql="SELECT status FROM users where id='$id' and status='disabled'";
$res=$db->query($sql);
if (mysqli_num_rows($res)>0) {
	header("location:logout");
}

?>


<link rel="stylesheet" href="css/common.css">





<div class="row" id="main_row">
	 

<?php 
require "user_ul.php";
// ";

 ?>


	<div class="col-12 col-sm-12 col-md-12 col-lg-9">
		<div class="card mb-4">
  <div class="card-header bg-secondary text-light" align="center">PROJECT DETAILS</div>
  <div class="card-body p-5"> 
  		  <?php 

  	  $order_id= $_REQUEST['id'];

  	  $query="SELECT * FROM orders where order_id='$order_id'";
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
$user_id=$_SESSION['id'];
$query=" SELECT * FROM request WHERE order_id = '$order_id' and user_id='$user_id'";
$results=$db->query($query);

if (mysqli_num_rows($results)>0) {

	?>
	 <center> <button class="btn btn-info btn-lg disabled mx-5 my-3">Applied</button></center>
<?php }else{
	?>
 <center> <button id="apply" class="btn btn-danger btn-lg mx-5 my-3">Apply</button></center>
<?php }
?>

	<script>
		$(document).ready(function(){

			$("#apply").click(function(){
				var user_name="<?php echo $_SESSION['name']; ?>";
				var user_id ="<?php echo $_SESSION['id']; ?>";
				var order_id="<?php echo $_REQUEST['id']; ?>";
				var topic="<?php echo $topic ?>";
				$.ajax({
					type: "POST",
					url: 'rquested.php',
					data: {
						user_name: user_name,
						user_id: user_id,
						order_id: order_id, 
						topic: topic

					},
					success :  function(response){
							if (response==1) {
								alert("Application Successful");
								window.location = "view_projects";
								
							}
						}
				});

			});

			

		});
			
	</script>



  	   <?php  }else{
  	   	echo "<center class='text-danger h2'>This Order Is No Longer Available</center>";
  	   	  	   }


  	   ?>
</div>
<div class="card-footer bg-secondary p-3"></div>
</div>


 </div>           
<div class=" col-lg-1 side_div"></div>
</div>
 <hr class="mb-5">

<?php }else{

	header("register");
}?>
 <script>
			$(document).ready(function(){

				
				$("#show_menu").click(function(){

					$(".show_menu_contents").toggle(500);
				})
					
				

			});
		</script>	
