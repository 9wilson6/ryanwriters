<?php 
if (isset($_SESSION['user_type'])) {
	$query="SELECT onrevision.deadline, onrevision.order_id, onrevision.user_id,  orders.subject, orders.topic FROM onrevision LEFT JOIN orders ON onrevision.order_id=orders.order_id";
}elseif(isset($_SESSION['id']) && isset($_SESSION['name'])){
	$id=$_SESSION['id'];
	$query="SELECT onrevision.deadline, onrevision.order_id, orders.subject, orders.topic FROM onrevision LEFT JOIN orders ON onrevision.order_id=orders.order_id WHERE onrevision.user_id = '$id'";
}

$results = $db->query($query);

if (mysqli_num_rows($results)>0) {

	?>

<table class="table table-striped  table-hover table-sm table-responsive-lg">
	 		<thead class="thead-default bg-secondary text-light text-uppercase">

			<tr>
				<th>Subject </th>
				<?php 
				if (isset($_SESSION['user_type'])) {
					echo "<th>User ID </th>";
				}
				 ?>
				<th>Project ID</th>
				<th>Topic</th>
				<th>Deadline</th>
 				</tr>
 				</thead>
				<tbody>
				<?php 
				foreach ($results as $result) {
									?>
					<tr>
						<?php $id=$result['order_id']; ?>
						<?php if (isset($_SESSION['user_type'])) {

						echo "<td> <a href='on_a_revision_view?id=$id'>".$result['subject']."</a> </td>" ;
						echo "<td>". $result['user_id']. "</td>";
						}
						if(isset($_SESSION['id']) && isset($_SESSION['name'])){
							
							echo "<td> <a href='on_u_resvision_view?id=$id'>".$result['subject']."</a> </td>" ;
						}?>

						<td><?php echo $result['order_id']; ?></td>
						
						<td><?php echo $result['topic']; ?></td>
							
							<?php 
						$deadline=$result['deadline'];
						$deadline=date('d-m-Y h:i:s a', $deadline);
						$deadline_str=strtotime($deadline);
						$deadline=new DateTime($deadline);
						time_difference($deadline, $today);

							 ?>

						<td><?php echo $difference; ?></td>
							
						
						
						
					</tr>
				<?php }

				 ?>

				</tbody>
					</table>
		<?php 

}else{
	echo "Nothing To show";
}
		 ?>