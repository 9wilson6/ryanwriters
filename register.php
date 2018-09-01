	<?php 
require "header.php";

	 ?>
	  <div class="row">
    		<div class="col-sm-0 col-md-1 col-lg-1"></div>
    		<div class="col-12 col-sm-12 col-md-10 col-lg-10">
				<center id="forms">
	
	<!----------------------------------------start  register form----------------------------------------------------------->
    		<div class="card mb-3" id="register_form">
						<form  id="register-form" method="POST" action="register"><!--start log in form-->
					  <div class="card-header">Please Sign Up</div>
					  
					  <div class="card-body p-3">
							  	
		    				<div class="form-group">
		    					<input type="text" class="form-control" id="username" placeholder="username">
		    				</div>
		    				<div class="form-group">
		    					<input type="email" class="form-control" name="email" placeholder="email">
		    				</div>
		    				<div class="form-group">
		    					<input type="password" name="password" class="form-control" placeholder="password">
		    				</div>
		    			<div class="form-group">
		    					<input type="password" name="c_password" class="form-control" placeholder="confirm password">
		    			</div>
		    			
					  </div> 
					  <div class="card-footer">
					  	<div class="form-group">
					  		<button type="submit" id="submit" class="btn btn-info btn-inline mr-1">Register</button>
					  		<a href="login" class="btn btn-success btn-inline">Log In</a>
					  	</div>
					  	
					  </div>
						<div id="form-message"></div>
					  </form><!--end log in form-->

    			
    		</div>
    		</center>
    </div>
    <div class="col-sm-0 col-md-1 col-lg-1"></div>

</div>
    		<!---------------------------------------end register form------------------------------------------------------------->
    			<?php 
require "footer.php";

	 ?>

	  <script>
	 	$(document).ready(function(){
	 		$("#register-form").submit(function(event){
	 			event.preventDefault();

	 			var form_type="register";
	 			var submit =$("#submit").val();
				var name = $("#username").val();
				var password = $('[name="password"]').val();
				var c_password= $('[name="c_password"]').val();
				var email = $('[name="email"]').val();
	 			$("#form-message").load("Login_Register.php", {
	 			form_type: form_type,
				name: name,
				password: password,
				submit: submit,
				email: email,
				c_password: c_password
			});

	 		});




	 	});
	 </script>