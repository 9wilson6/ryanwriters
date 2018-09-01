<?php 

require "account_header.php";
require "db_config.php";
 ?>

    	



<link rel="stylesheet" href="css/common.css">

	
			<div class="row" id="main_row">
				<?php require "user_ul.php"; ?>
				<div class="col-12 col-sm-12 col-md-12 col-lg-8" id="right-bar">
					
						
						<div class="text-center text-uppercase text-secondary"><h3>&darr;<u>Important!!!</u>&darr;</h3>
						<div class="lead" id="instructions_to_user_div">
							
							<?php 

								$query="SELECT note_to_writers FROM others";
								$results=$db->query($query);
								foreach ($results as $result) {
									echo $result['note_to_writers'];
								}
							 ?>
						</div>

					
            <div class="text-center text-uppercase text-secondary"><h3>&darr;<u>sample files</u>&darr;</h3></div>
            	<div id="files_to_user_div">
						<div class="bg-light ml-5 mr-5 py-3" id="user_files" >
						
					<?php 

							$directory="./FILES/INSTRUCTIONS/";

							 if (!file_exists($directory)) {
							echo "No Files Attached"; 
							}else{
						
						$allFiles=scandir($directory);
						$files=array_diff($allFiles, array('.', '..'));
		
						if(empty($files)) {
							echo "No Files Attached";
						}else{
						foreach ($files as  $file) {

										echo "<a href='download?file=".$file."&dir=".$directory."'>".$file."</a><br/>";
									}
									}

				}

					 ?>
						</div>
					</div>
            </div>

				
				
		</div>

	</div>



<script>
			$(document).ready(function(){

				
				$("#show_menu").click(function(){

					$(".show_menu_contents").toggle(500);
				})
					
				

			});
		</script>	