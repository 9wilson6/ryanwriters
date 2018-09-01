<?php 
require "db_config.php";
function manageUsers(){

	global $db;
	$sql="SELECT * FROM users where User_type='user'";
	$res=$db->query($sql);
	 if (mysqli_num_rows($res)>0) {
	 	$results="";?>
	 	<table class="table table-striped  table-hover table-sm table-responsive-lg">
	 		<thead class="thead-default bg-secondary text-light text-uppercase">
	 			<tr>
	 				<th>name</th>
	 				<th>Id</th>
	 				<th>Email</th>
	 				<th>Projects</th>
	 				<th>Rating</th>
	 				<th>Action</th>
	 			</tr>
	 		</thead>
	 		<tbody>
	 		
	 	<?php
	 	while ($row=mysqli_fetch_array($res)) {
	 		
	 		echo "<tr>
				<td>{$row['name']}</td>
				 <td>{$row['id']}</td>
				 <td>{$row['email']}</td>
				 <td>{$row['timesi']}</td>";
				 $times=$row['timesi'];
				if ($row['timesi']==0) {
					$times=1;
				}
				$rated=round(($row['rating'] / $times),2);
				$status=$row['status'];
				if ($status=="active") {
					$id="active";
					$class="btn btn-danger";
					$value="suspend";
				}elseif($status=="disabled"){
					$id="disabled";
					$class="btn btn-info";
					$value="restore";
				}
				 echo "<td>{$rated}</td>"?>
				  <td> <form action="user_suspend_activate" method="POST">
				  	<input type="hidden" name="action" value="<?php echo $value ?>">
				  	<input type="hidden" name="user_id" value="<?php echo $row['id']?>">
				  	<input type="submit" name="submit" value=" <?php echo $value ?> " class="<?php echo $class ?>" id="<?php echo $id ?>" >

				  </form></td>
	 		</tr>
	 <?php	}

	 	echo "</tbody>
	 	</table>";
	 }else{
	 	echo "Nothing To Show";
	 }
	
}

function manageOrders(){
global $db;
date_default_timezone_set("Africa/Nairobi");
$today_str=strtotime(date('d-m-Y h:i:s a'));
$sql=" SELECT * FROM orders where deadline > '$today_str' AND status = 0 ";
$res=$db->query($sql);?>
<table class="table table-striped  table-hover table-sm table-responsive-lg">
	 		
<?php
require_once("functions.php"); 
global $difference;
global $deadline_str;
 if (mysqli_num_rows($res)>0) {
?>
		<thead class="thead-default bg-secondary text-light text-uppercase">
	 			<tr>
	 				<th>Order_No:</th>
	 				<th>Subject</th>
	 				<th>Topic</th>
	 				<th>Posted On</th>
	 				<th>Deadline</th>
	 				<th>Action</th>
	 			</tr>
	 		</thead>
	 		<tbody>
	 		
	 	<?php
	 	while ($row=mysqli_fetch_array($res)) {
	 		
	 		$date_posted=date('d-m-Y h:i:s a', $row['date_posted']);
	 		 $deadline=date('d-m-Y h:i:s a', $row['deadline']);
	 		$deadline_str=strtotime($deadline);
			$deadline=new DateTime($deadline);

			
			time_difference($deadline, $today);
	 		echo "<tr>
				<td>{$row['order_id']}</td>
				<td><a href='admin_order_view?id={$row['order_id']}'>{$row['subject']} <i class='fa fa-external-link'></i></a></td>
				 <td>{$row['topic']}</td>
				
				 <td>{$date_posted}</td>"; ?>
				
				 <td><?php echo $difference; ?></td>
				 <td>
				 	<form action="delete_order" method="POST" id="del_form">
				 		<input type="hidden" name="order_id" id="del" value=" <?php echo $row['order_id'] ?>">
				 		<input type="submit" name="submit" value="Discard" class="btn btn-danger">
				 	</form>
				 </td>

	 		</tr>
	 	<?php }
	 	
			}else{
		echo ":)";
	}
		$sql=" SELECT * FROM orders where deadline < '$today_str' AND status = 0 ";
		$res=$db->query($sql);
		if (mysqli_num_rows($res)>0) { ?>
		<tr><td colspan="6" class="bg-secondary text-light my-5 text-uppercase"><strong>timed out orders</strong></td></tr>
		<?php 

		while ($row=mysqli_fetch_array($res)) {
	 		
	 		$date_posted=date('d-m-Y h:i:s a', $row['date_posted']);
	 		 $deadline=date('d-m-Y h:i:s a', $row['deadline']);
	 		 $dd=$deadline;
	 		$deadline_str=strtotime($deadline);
			$deadline=new DateTime($deadline);

			
			time_difference($deadline, $today);
	 		echo "<tr>
				<td>{$row['order_id']}</td>
				<td><a href='timedoutView?id={$row['order_id']}'>{$row['subject']} <i class='fa fa-external-link'></i></a></td>
				 <td>{$row['topic']}</td>
				
				 <td>{$date_posted}</td>"; ?>
				
				 <td><?php echo '<span class="text-danger">'.$dd.'</span>'; ?></td>
				 <td>
				 	<form action="delete_order" method="POST" id="del_form">
				 		<input type="hidden" name="order_id" id="del" value=" <?php echo $row['order_id'] ?>">
				 		<input type="submit" name="submit" value="Discard" class="btn btn-danger">
				 	</form>
				 </td>

	 		</tr>

		 

<?php }  ?>
		</tbody>
	 	</table>
<?php
	 	
} 
}


function instructions(){
	global $db;
$query="SELECT * FROM others";
$res=$db->query($query);
while ($row= mysqli_fetch_array($res)) {
	$instructions=$row['note_to_writers'];
}
	?>
<u><h2 class="text-center text-info">current instructions</h2></u>
<div class="jumbotron"><p class="lead" id="admin_instructions_show">
	<?php echo $instructions;
echo "<br> <hr> <div class='h4 text-uppercase'>
	<u>instruction files</u>
</div>";

		$directory="./FILES/INSTRUCTIONS/";

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

</p></div>
<form action="admin_instructions" method="POST" enctype="multipart/form-data">
	<div class="form-group">
		<textarea cols="30" placeholder="update instructions" rows="10" name="instructions" class="form-control" id="message"></textarea>
	</div>
	<div class="form-group pl-5 pr-5">
	<!-- ###################################################################################################### -->	
<div class="form-inline">
	<label for="filesToUpload" class="text-danger text-left text-uppercase"><strong>Add necessary files &darr;</strong></label>
	<input type="file" name="file[]" class="form-control-file" id="filesToUpload" multiple/>
</div>
<!-- ###################################################################################################### -->
		</div>
		<div class="form-group pl-5 pr-5">
			<input type="submit" class="btn btn-sm btn-outline-secondary btn-block text-uppercase" name="submit" value="update instructions">
		</div>
</form>




<?php

include("scripts/text_box.js");
 }

 function money(){ 

global $db;
$total=0;
?>
<u><h2 class="text-center text-info">Account status</h2></u>

<?php
$query="SELECT * FROM users where balance >0";
$res=$db->query($query);

if (mysqli_num_rows($res)>0) {?>

<table class="table table-striped  table-hover table-sm table-responsive-lg">
	 		<thead class="thead-default bg-secondary text-light text-uppercase">
	 			<tr>
	 				<th>USER NAME</th>
	 				<th>USER ID</th>
	 				<th>BALANCE (Ksh)</th>
	 				<th>ACTION</th>
	 			</tr>
	 		</thead>
	 		<tbody>
	<?php foreach ($res as $row) {
		$bal=$row['balance'];
		$id=$row['id'];
		
		echo "<tr>
				<td>{$row['name']}</td>
				<td>{$row['id']}</td>
				<td>{$row['balance']}</td>";
$total += $row['balance'];
?>
					<td>
						<form action="payment" method="POST" id="payment">
						<div class="form-inline">
							<input type="number" name="amount" value="<?php echo "{$bal}" ?>" required class="form-control">
							<input type="hidden" name="id" value=" <?php echo $id ?> ">
						<input type="submit" name="submit" class="btn btn-sm btn-info" id="settle" value="SETTLE">
					</div>

					</form
					></td>
				</tr>
			
<?php
	}
echo "</tbody>
			</table>";

}else{
$num="0.00";
}

 	?>


<center>
	<p class=" text-center">  <strong class="h1" >Total Bal: <?php echo $total ?></strong></p>
</center>
 <?php


  }





if ($_POST['btn']=="manage_users") {

	manageUsers();
}elseif ($_POST['btn']=="manage_orders") {
	manageOrders();
}elseif ($_POST['btn']=="instructions") {
	instructions();
}
elseif ($_POST['btn']=="money") {
	money();
}

 ?>