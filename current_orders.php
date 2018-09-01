<?php 


require "admin_header.php";


if ($_SESSION['user_type']==="Admin") {

require 'db_config.php';
require "functions.php";
?>


<link rel="stylesheet" href="css/common.css">





<div class="row" id="main_row">
	 

<?php 
require "side_div.php";
require "retreive_orders.php";
 ?>

</div>

<?php }else{

	header("admin");
}?>

 <script>
			$(document).ready(function(){

				
				$("#show_menu").click(function(){

					$(".show_menu_contents").toggle(500);
				})
					
				

			});
		</script>	
		