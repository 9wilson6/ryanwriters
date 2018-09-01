		<meta http-equiv="refresh" content="1200">
	<div class="col-12 col-sm-12 col-md-12 col-lg-9">
		<div class="card mb-4">
  <div class="card-header bg-secondary text-light" align="center">AVAILABLE PROJECTS</div>
  <div class="card-body p-5"> 
		

		<?php 

$today_str=strtotime(date('d-m-Y h:i:s a'));
$query=" SELECT * FROM orders where deadline > '$today_str' AND status = 0 ";
// $query="SELECT * FROM orders";

$result=$db->query($query);

if (mysqli_num_rows($result) > 0) {
	

echo "<table class='table table-striped  table-hover table-sm table-responsive-lg'>
	 		<thead class='thead-default bg-secondary text-light text-uppercase'>

<tr>
<th>ID</th>
<th>Subject</th>
<th class='text-center'>Topic</th>
<th class='text-center'>deadline</th>
<th>SL</th>
<th>PG</th>
 </tr>
 </thead>
<tbody>
	

";

if (isset($_SESSION['user_type'])) {
	$link="admin_order_view";
}elseif(isset($_SESSION['id'])){
$link="user_order_view";
}else{

	header("LOCATION:register");
}

foreach ($result as $value) {

echo "<tr>
<td>{$value['order_id']}</td>
<td><a href='{$link}?id={$value['order_id']}'>{$value['subject']} <i class='fa fa-external-link'></i></a></td>

<td>{$value['topic']}</td>";
$deadline=$value['deadline'];

$deadline=date('d-m-Y h:i:s a', $deadline);
$deadline_str=strtotime($deadline);
$deadline=new DateTime($deadline);



time_difference($deadline, $today);
//
// 
// 
// 

echo "

<td>{$difference}</td>
<td>{$value['slides']}</td>
<td>{$value['pages']}</td>
 </tr>

 ";	
}

// process_request?id={$value['order_id']}
echo "</tbody>";
echo "</table>";
}else{
	echo "No Projects Available";
}
 ?>





	
</div>
<div class="card-footer bg-secondary p-3"></div>
</div>


 </div>           
<div class=" col-lg-1 side_div"></div>

 <hr class="mb-5">