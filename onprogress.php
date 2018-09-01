<?php 
if (isset($_SESSION['user_type'])) {
	$query="SELECT onprogress.user_id, onprogress.order_id , onprogress.order_subject,  onprogress.deadline, orders.pages, orders.slides, orders.topic FROM onprogress LEFT JOIN orders ON onprogress.order_id=orders.order_id";
}elseif(isset($_SESSION['id']) && isset($_SESSION['name'])){
	$id=$_SESSION['id'];
	$query="SELECT * FROM onprogress LEFT JOIN orders ON onprogress.order_id=orders.order_id WHERE onprogress.user_id = '$id'";
}

$results=$db->query($query);
if (mysqli_num_rows($results)>0) {?>
<table class="table table-striped table-bordered table-hover table-sm">

			<thead class='bg-dark text-light'>

			<tr>
				<th>Project ID</th>
				<th>Subject</th>
				<?php 
				if (isset($_SESSION['user_type'])) {
					echo "<th>User ID </th>";
				}
				 ?>
				<th>Deadline </th>
				<th>Topic </th>
				<th>PG </th>
				<th>SL </th>
				
				
				
 				</tr>
 				</thead>
				<tbody>
				<?php 
				foreach ($results as $result) {?>
					<tr>
						<?php
						 $id=$result['order_id']; ?>

						<td><?php echo $result['order_id']; ?></td>

						<?php if (isset($_SESSION['user_type'])) {

						echo "<td> <a href='on_a_progress_view?id=$id'>".$result['order_subject']." <i class='fa fa-external-link ml-3 mt-2'></i></a> </td>" ;
							echo "<td>". $result['user_id']. "</td>";
						
						}else if(isset($_SESSION['id']) && isset($_SESSION['name'])){
							
							echo "<td> <a href='on_u_progress_view?id=$id'>".$result['order_subject']." <i class='fa fa-external-link ml-3 mt-2'></i></a> </td>" ;
						}else(header("location:register"));
					
						$deadline=$result['deadline'];
						$deadline=date('d-m-Y h:i:s a', $deadline);
						$deadline_str=strtotime($deadline);
						$deadline=new DateTime($deadline);
						time_difference($deadline, $today); ?>
						
						<td><?php echo $difference; ?></td>
						<td><?php echo $result['topic']; ?></td>
						<td><?php echo $result['pages']; ?></td>
						<td><?php echo $result['slides']; ?></td>
					
					

						
						
						
						
						
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