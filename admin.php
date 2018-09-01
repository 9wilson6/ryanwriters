<?php 
 require "admin_header.php";
require "db_config.php";
?>



<?php 
$error="";

if (isset($_POST['submit'])) {
$name=$db->quote($_POST['username']);
$password=$db->quote($_POST['password']);
$name_="";
$password_="";
if (!empty($name) && !empty($password)) {
	


$query="SELECT id, name, password FROM users WHERE name='$name' and User_type='Admin'";
$results=$db->query($query);

        foreach ($results as $result) {
        	$password_=$result['password'];
        	$name_= $result['name'];
        	$id_ =$result['id'];

        }

        $password=hash('sha256', $password);
        if ($name_===$name && $password== $password_) {
        	$_SESSION['user_type']="Admin";
        	// header("Location:postproject");
        	?>
        	<script>
        		window.location="postproject";
        	</script>
       <?php  }else{

        	$error="Invalid Username and/ password!!!";
        }
}else{#end of empty check
	$error="All fields must be filled in!!";
}
}



 ?>
		<div id="log_in">
    	<div class="row">
    		<div class="col-sm-0 col-md-1 col-lg-1"></div>
    		<div class="col-12 col-sm-12 col-md-10 col-lg-10">
				<center id="forms">
<div class="card mb-0" id="login_form">
						<form method="POST" action="admin"><!--start log in form-->
					  <div class="card-header">Please Sign In</div>
					  
					  <div class="card-body p-3">
							  	
		    				<div class="form-group">
		    					<input type="text" class="form-control" placeholder="username" name="username" required>

		    				</div>
		    				<div class="form-group">
		    					<input type="password" name="password" class="form-control" placeholder="password" required>
		    				</div>

					  </div> 
					  <div class="card-footer">
					  	<div class="form-group">
					  		<button type="submit" name="submit" class="btn btn-success btn-inline">Log in</button>
					  	<!-- <a href="register" class="btn btn-info btn-inline">Register</a> -->
					  	</div>
					  	
					  </div>
						<?php if (isset($error)) {
							echo "<p class='bg-danger text-light' >$error</p>";
						} ?>
					  </form>
<!-------------------------------------------------end log in form------------------------------------------------->

    			
    		</div>
		</center>
	</div>
	<div class="col-sm-0 col-md-1 col-lg-1"></div>
</div>
<?php require "footer.php" ?>