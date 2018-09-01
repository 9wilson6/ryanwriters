

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
	