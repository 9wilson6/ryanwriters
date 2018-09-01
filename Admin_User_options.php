<?php $query="SELECT * FROM request WHERE order_id={$_REQUEST['id']}";
			$results2=$db->query($query);
			$user_db_id="";
			$user_db_name="";
			 $order_db_id="";
			if (mysqli_num_rows($results2)>0) {

				foreach ($results2 as $result) {
					$order_db_id=$result['order_id'];
					$user_db_id=$result['user_id'];
					$user_db_name=$result['user_name'];
					$user_db_rating=$result['user_rating'];

				}	
			}
############################################################check if any user has  requested for this order################
#																															 #
#																															 #
#																															 #
#																															 #
#############################################################if it is the admin loged in######################################
if (isset($_SESSION['user_type'])) {?>
<meta http-equiv="refresh" content="600">	
<div class="row my-4">
	<div class="col-md-1 col-lg-1"></div>
	<div class="col-md-10 col-lg-10">
		<div class="card">
			<div class="card-header bg-dark text-light text-center h5 ">Requests for this order:</div>
			<div class="card-body bg-faded"> 
				<?php if ($order_db_id!="") {?>
					
				
			<table class='table table-hover table-bordered table-striped table-responsive-sm'>

			<thead class='bg-dark text-light'>

			<tr>
			<th>User ID</th>
			<th>User Name</th>
			<th>Rating</th>
			<th>.....</th>
 				</tr>
 				</thead>
				<tbody>
			<?php 
			#$query="SELECT * FROM request WHERE order_id={$_REQUEST['id']}";
			#$results2=$db->query($query);
			if (isset($_SESSION['user_type'])) {
				foreach ($results2 as $result) {
							if (isset($order_db_id)) {
								echo "<tr>
							 <td>{$result['user_id']}</td>
							  <td>{$result['user_name']}</td>
							  <td>{$result['user_rating']} </td>"?>
							 <td class='text-center'> 

								<form action="award" method="POST">
									<input type="hidden" name="user_id"  value=" <?php echo $result['user_id'] ?>">
									<input type="hidden" name="order_id"  value=" <?php echo $result['order_id'] ?>">
									<input type="hidden" name="order_subject"  value=" <?php echo $value['subject'] ?>">
									<input type="hidden" name="order_id"  value=" <?php echo $value['topic'] ?>">
									<input type="submit" name="submit" class='btn  btn-sm btn-success' value="Award">
								</form>
							  </td>

						<?php echo "</tr>";
							}
				}

				}
			 ?>
				</tbody>
			</table>
			<?php }else{
				echo "Nothing to show";
			} ?>

			</div>
			<div class="card-footer bg-dark"></div>
		</div>
	</div>
	<div class="col-md-1 col-lg-1"></div>

</div>

<?php }?> <?php if(isset($_SESSION['id']) && isset($_SESSION['name'])){ 

if ($user_db_id==$_SESSION['id'] && $order_db_id==$order_id) {

	?>
	 <center> <button class="btn btn-info btn-lg disabled mx-5 my-3">Applied</button></center>
<?php }else{
	?>
 <center> <button id="apply" class="btn btn-danger btn-lg mx-5 my-3">Apply</button></center>
<?php }?>
	<script>
		
		$(document).ready(function(){

			$("#apply").click(function(){
				var user_name="<?php echo $_SESSION['name']; ?>";
				var user_id ="<?php echo $_SESSION['id']; ?>";
				var order_id="<?php echo $_REQUEST['id']; ?>";
				$.ajax({
					type: "POST",
					url: 'rquested.php',
					data: {
						user_name: user_name,
						user_id: user_id,
						order_id: order_id

					},
					success :  function(response){
							if (response==1) {
								alert("Application Successful");
								$("#apply").remove();
								
							}
						}
				});

			});

			

		});
			
	</script>
<?php 

}?>