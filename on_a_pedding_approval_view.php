<?php 
require "admin_header.php";
if ($_SESSION['user_type']==="Admin") {

require 'db_config.php';
require "functions.php"
?>

<meta http-equiv="refresh" content="600">
<link rel="stylesheet" href="css/common.css">





<div class="row" id="main_row">
	 

<?php 
require "side_div.php";
// ";

 ?>


	<div class="col-12 col-sm-12 col-md-12 col-lg-9">

		<div class="card">
  <div class="card-header bg-secondary text-light" align="center">PROJECT DETAILS</div>
  <div class="card-body p-5"> 
  	  <?php 

  	  $order_id= $_REQUEST['id'];
  	  $use_id="";
  	  $query="SELECT * FROM pedding_approval LEFT JOIN orders ON pedding_approval.order_id=orders.order_id where pedding_approval.order_id='$order_id'";
  	  $results=$db->query($query);
  	   if (mysqli_num_rows($results)>0) {?>
  	   
		<table class='table table-hover table-bordered table-striped'>

<thead class='bg-dark text-light'>

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
				<td><?php echo $result['order_subject']; ?></td>

				<?php
				 $deadline=$result['deadline'];
				$subject=$result['order_subject'];
				$topic=$result['order_topic'];
				$instructions=$result['description'];
				$deadline=date('d-m-Y h:i:s a', $deadline);
				$deadline_str=strtotime($deadline);
				$deadline=new DateTime($deadline);
				$pages=$result['pages'];
				$slides=$result['slides'];
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
$query="SELECT * FROM pedding_approval where order_id = '$order_id'";

$results=$db->query($query);
// echo $results;
?>
<?php if ( mysqli_num_rows($results)>0) {?>

<?php 
foreach ($results as $result) {
	$user_id=$result['user_id'];
}



 ?>

<div class="jumbotron bg-transparent py-0 ml-3">
	<!-- ############################################################################################################### -->
	</div>
	<div class="row">
		<div class="col-md-2 col-lg-2"></div>
		<div class="col-12 col-sm-12 col-md-8 col-lg-8">
			<p>
				<?php showResults_files(); ?>
			</p>
		</div>
		<div class="col-md-2 col-lg-2"></div>
	</div>
	<!-- ############################################################################################################### -->
	<div class="row">
		<div class="col-12 col-sm-12 col-md-6 col-lg-6 text-light bg-transparent">
						<p>
				<div class="card">
					<div class="card-header bg-info text-center"><strong>CLOSE THIS PROJECT</strong></div>
					<div class="card-body bg-dark">
						
						<form action="close_order" method="POST" id="close_order" class="px-5">
							<div class="form-group">
								<input type="number" name="rated" min='1' max="10"  placeholder="rate (1-10)" class="form-control" required id="rate">
								
							</div>
							<div class="form-group">
								
									<label for=""><strong>pages &darr;</strong></label>
								
								<input type="number" name="pages" required min='0' class="form-control" id='pages' value="<?php echo $pages ?>">
								
							</div>
							<div class="form-group">
								
									<label for=""><strong>slides &darr;</strong></label>
								<input type="number" name="slides" required min='0' id="slides" class="form-control"  value="<?php echo $slides ?>">

								
							</div>
							<div class="form-group">
								
									<label for=""><strong>cpp&darr;</strong> </label>
								<input type="number" name="cpp" required min='0'  id="cpp" class="form-control" value="250">
								
							</div>
							<div class="form-group">
								
									<label for="" class="mr-5"><strong>cps&darr;</strong> </label>
								<input type="number" name="cps" required min='0'  id="cps" class="form-control" value="150">
								
							</div>
							
							<div class="form-group">
								<input type="submit" name="submit" value="SATISFIED" class="btn btn-sm  btn-info">
							</div>
						</form>
					</div>
					<div class="card-footer bg-info"></div>
				</div>
			</p>

		</div>
<!-- ############################################################################################################### -->
		<div class="col-12 col-sm-12 col-md-6 col-lg-6 text-light bg-transparent">
			<div class="card my-3">
					<div class="card-header bg-danger text-center"><strong class="text-light">SEND BACK FOR REVISION</strong></div>
					<div class="card-body bg-dark">
						
						<form action="revision.php" id="revise" method="POST">
							<div class="form-group">
								<textarea cols="30" placeholder="Revision instructions" rows="10" name="details" class="form-control" id="message"></textarea>
								<div id="error" class="bg-danger text-center mt-3 mx-5 text-light"></div>
							</div>
								<div class="form-group mr-5 pr-5">
									<label class="text-light">new deadline &darr;</label><input type="datetime-local" class="form-control" name="date" id="date" required placeholder="mm/dd/yyy --:-- --">
								</div>
							<div class="form-group ">
								<input type="submit" name="submit" value="SEND BACK" class="btn btn-sm btn-danger">
							</div>
						</form>
					</div>
					<div class="card-footer bg-danger"></div>
			</div>
			

		</div>

<!-- ############################################################################################################### -->

<!-- ############################################################################################################### -->
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
					
				var topic='<?php echo $topic ?>';
				$("#revise").submit(function(e){
					e.preventDefault();
					var order_id= "<?php echo $order_id?>";
					var rev_instructions=$("#message").val();
					var submit= "submit"
					var user_id="<?php echo $user_id ?>"
					var form_type="revision"
					var datei= $("#date").val();
					if (rev_instructions!="") {
						$.post("revision.php", 
							{order_id: order_id,
							rev_instructions: rev_instructions,
							submit: submit,
							user_id: user_id,
							datei: datei,
							topic: topic,
							form_type: form_type }
						).done(function(data){
							if (data==1) {
								alert("Revision activated Successfully");
								window.location="admin_peding_approval";
							}else {
								alert(data);
								window.location="admin_peding_approval";
							}
						});
					}else {
						$("#error").html("&uarr; &nbsp;  Instructions missing  &nbsp; &uarr;");
					}
				})

				$("#close_order").submit(function(e){
					e.preventDefault();
					var form_type="close";
					var rating=$("#rate").val();
					var user_id="<?php echo $user_id ?>";
					var submit= "submit";
					var pages=$("#pages").val();
					var slides=$("#slides").val();
					var cpp=$("#cpp").val();
					var cps=$("#cps").val();
					var pages_total= (pages * cpp);
					var slides_total=(slides * cps);
					var gross_total=(pages_total + slides_total);
					var order_id= "<?php echo $order_id?>";
					$.post("revision.php",
						{
							form_type: form_type,
							rating: rating,
							user_id: user_id,
							order_id: order_id,
							submit: submit,
							pages: pages,
							slides: slides,
							cpp: cpp,
							cps: cps,
							gross_total: gross_total,
							pages_total: pages_total,
							slides_total: slides_total
						}).done(function(data){
							if (data==1) {
								alert("Project closed Successfully");
								window.location="admin_peding_approval";
							}else {
								alert(data);
								// window.location="admin_peding_approval";
							}
						});
				});

			});
		</script>	
	<?php include("scripts/text_box.js"); ?>
