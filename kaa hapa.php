<?php if(isset($_SESSION['id']) && isset($_SESSION['name'])){ 

if ($user_db_id==$_SESSION['id'] && $order_db_id==$order_id) {

	?>
	 <center> <button class="btn btn-info btn-lg disabled mx-5 my-3">Applied</button></center>
<?php }else{
	?>
 <center> <button id="apply" class="btn btn-danger btn-lg mx-5 my-3">Apply</button></center>
<?php }?>
	<script>
		
		$(document).ready(function(){

			$("#apply").click(function(){
				var user_name="<?php echo $_SESSION['name']; ?>";
				var user_id ="<?php echo $_SESSION['id']; ?>";
				var order_id="<?php echo $_REQUEST['id']; ?>";
				$.ajax({
					type: "POST",
					url: 'rquested.php',
					data: {
						user_name: user_name,
						user_id: user_id,
						order_id: order_id

					},
					success :  function(response){
							if (response==1) {
								alert("Application Successful");
								$("#apply").remove();
								
							}
						}
				});

			});

			

		});
			
	</script>
<?php 

}?>