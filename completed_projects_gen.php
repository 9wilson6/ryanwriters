<?php 
if (isset($_SESSION['user_type'])) {
	$query="SELECT * FROM finished";
}elseif(isset($_SESSION['id']) && isset($_SESSION['name'])){
	$id=$_SESSION['id'];
	$query="SELECT * FROM finished WHERE user_id = '$id'";
}

$results = $db->query($query);
if (mysqli_num_rows($results)>0) {?>
<table class="table table-striped  table-hover table-sm table-responsive-lg">
	 		<thead class="thead-default bg-secondary text-light text-uppercase">

			<tr>
				<th>Project ID</th>
				<th>Subject </th>
				<?php 
				if (isset($_SESSION['user_type'])) {
					echo "<th>User ID </th>";
				}
				 ?>
				
				<th>Topic</th>
				<th>Submited At</th>
 				</tr>
 				</thead>
				<tbody>
				<?php 
				foreach ($results as $result) {
					$time=date("Y-m-d h:i:s a", $result['deadline']);

					?>
					<tr>
						<?php $id=$result['order_id']; ?>
						<td><?php echo $result['order_id']; ?></td>

						<?php if (isset($_SESSION['user_type'])) {

						echo "<td> <a href='a_complited_view?id=$id'>".$result['subject']."</a> </td>" ;
						echo "<td>". $result['user_id']. "</td>";
						}
						if(isset($_SESSION['id']) && isset($_SESSION['name'])){
							
							echo "<td> <a href='u_complited_view?id=$id'>".$result['subject']."</a> </td>" ;
						}?>

												
						<td><?php echo $result['topic']; ?></td>
						<td><?php echo $time ?></td>
							
						
						
						
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