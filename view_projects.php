<?php 

require "account_header.php";
require "db_config.php";
require "functions.php";
 ?>
	

<link rel="stylesheet" href="css/common.css">





<div class="row" id="main_row">
	 <hr>
<?php 
require "user_ul.php";
require "retreive_orders.php";
unset($_SESSION['assigned']);
 ?>
</div>
 <script>
			$(document).ready(function(){

				
				$("#show_menu").click(function(){

					$(".show_menu_contents").toggle(500);
				})
					
				

			});
		</script>	