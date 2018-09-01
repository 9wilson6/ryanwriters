<?php 


require "admin_header.php";
// require "management_functions.php";

if ($_SESSION['user_type']==="Admin") {

require 'db_config.php';
require "functions.php";


?>


<link rel="stylesheet" href="css/common.css">





<div class="row" id="main_row">
	 

<?php 
require "side_div.php";

 ?>

<div class="col-12 col-sm-12 col-md-12 col-lg-10">
		<div class="card mb-4">
			 <div class="card-header text-dark" align="center"><strong>ACTION CENTER</strong></div>

  <div class="card-body table table-responsive"> 
<div class="text-center ">

	<button class="btn btn-sm btn-danger my-3 mx-2 text-uppercase" id="user_info"><strong>Users</strong></button>
	<button class="btn btn-sm btn-info my-3 mx-2 text-uppercase" id="order_info"><strong>Orders</strong></button>
	<button class="btn btn-sm btn-dark my-3 mx-2 text-uppercase" id="money"><strong>Money</strong></button>
	<button class="btn btn-sm btn-primary my-3 mx-2 text-uppercase" id="instructions"><strong>Instructions</strong></button>
	<button class="btn btn-sm btn-warning my-3 mx-2 text-uppercase"><strong>hello</strong></button>
	
<hr>
</div>


<div class="row">
	<div class=" col-md-1 col-lg-1" style="background: #E9ECEF"></div>
	<div class="col-md-10 col-lg-10">
		<div id="display_area" class="text-center">

		</div>
	</div>
	<div class=" col-md-1 col-lg-1" style="background: #E9ECEF"></div>
</div>
</div>
<div class="card-footer p-3"></div>
</div>


 </div>           


<?php

if (isset($_REQUEST['status'])) {
	$status=$_REQUEST['status'];
}else{
	$status=0;
}
 }else{?>
   <script>
   	window.location="admin";
   </script>
	header("admin");
<?php }?>
 <script>
			$(document).ready(function(){

				
				$("#show_menu").click(function(){

					$(".show_menu_contents").toggle(500);
				})
				function users(){
					var btn= "manage_users"
					$("#display_area").load('management_functions.php', {btn:btn});
				}	

				

				$("#user_info").click(function(){
					users();

				});
				////////////////////////////////////////////////////////////////////////////////////////////////
				function orders(){
					
					var btn= "manage_orders"
					$("#display_area").load('management_functions.php', {btn:btn});

				
				}


				$("#order_info").click(function(){
					orders();
				});
				


				////////////////////////////////////////////////////////////////////////////////////////////////
				function instructions(){
					
					var btn= "instructions"
					$("#display_area").load('management_functions.php', {btn:btn});

				
				}


				$("#instructions").click(function(){
					instructions();
				});
				
				/////////////////////////////////////////////////////////////////////////////////////////////////////////////////

				function money(){
					
					var btn= "money"
					$("#display_area").load('management_functions.php', {btn:btn});

				
				}


				$("#money").click(function(){
					money();
				});
				/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				
				
				/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				///
				///
				///
				///
				///
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				var status=" <?php echo $status ?> ";

				if (status==1) {
					users();
					
				}else if (status==2) {
					orders();
				}else if (status==3) {
					instructions();
				}else if (status==4) {
					money();
				}
			});
		</script>	
		