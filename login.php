<?php 
session_start();
	require "header.php";?>
	 <div class="row">
    		<div class="col-sm-0 col-md-1 col-lg-1"></div>
    		<div class="col-12 col-sm-12 col-md-10 col-lg-10">
				<center id="forms">
<!----------------------------------------log in--------------------------------------------------------------------------->
					<div class="card" id="login_form">
						<form  id="log_in_form" action="login"><!--start log in form-->
					  <div class="card-header">Please Sign In</div>
					  
					  <div class="card-body p-3">
							  	
		    				<div class="form-group">
		    					<input type="text" class="form-control" id="username" <?php if (isset($_SESSION['name'])) {
		    						echo "value='".$_SESSION['name']."'";
		    					}else{
		    						echo "placeholder='username'";
		    					}; ?> name="username" required>

		    				</div>
		    				<div class="form-group">
		    					<input type="password" class="form-control" id="password" <?php if (isset($_SESSION['password'])) {
		    						echo "value='".$_SESSION['password']."'";
		    					}else{
		    						echo "placeholder='password'";
		    					}; ?> required>
		    				</div>
		    				<?php session_unset();
		    					session_destroy() ?>
					  </div> 
					  <div class="card-footer">
					  	<div class="form-group">
					  		<button type="submit" id="submit" class="btn btn-success btn-inline mr-1">Log in</button>
					  	<a href="register" class="btn btn-info btn-inline">Register</a>
					  	</div>
					  	
					  </div>
						<div id="form-message"></div>
					  </form>
<!-------------------------------------------------end log in form------------------------------------------------->

    			
    		</div>
    	</center>
    </div>
    <div class="col-sm-0 col-md-1 col-lg-1"></div>

</div>

    	<?php 
require "footer.php";

	 ?>
	   <script>
	 	$(document).ready(function(){
	 		$("#log_in_form").submit(function(event){
	 			event.preventDefault();
	 			var form_type="login";
	 			var submit =$("#submit").val();
				var name = $("#username").val();
				var password = $("#password").val();
	 			$("#form-message").load("Login_Register.php", {
	 			form_type: form_type,
				name: name,
				password: password,
				submit: submit
			});

	 		});




	 	});
	 </script>