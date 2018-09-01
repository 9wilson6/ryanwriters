<?php 


require "account_header.php";


if (isset($_SESSION['id'])) {

require 'db_config.php';
require "functions.php"
?>


<link rel="stylesheet" href="css/common.css">





<div class="row" id="main_row">
	 

<?php 
require "user_ul.php";
// ";

 ?>


	<div class="col-12 col-sm-12 col-md-12 col-lg-9">
		<div class="card mb-4">
  <div class="card-header bg-secondary text-light" align="center">ASSIGNED ORDERS</div>
  <div class="card-body p-5"> 
  	  <?php require "peddin_approval_gen.php"; ?>
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
