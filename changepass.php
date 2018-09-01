<?php 
$error="";
$success="";
require "account_header.php";

if (isset($_POST['submit'])) {

$password=$_POST['current_pass'];
$newpass=$_POST['newpass'];
$confirm_pass=$_POST['confirm_pass'];


	if (strlen($newpass) >= 7 && strlen($newpass) <= 30) {
				if ($newpass===$confirm_pass) {
							$id=$_SESSION['id'];
						$name=$_SESSION['name'];
					require "db_config.php";

					$password=hash('sha256',$password );
					$query="SELECT * FROM users where id='$id' and name='$name'";
					$results=$db->query($query);
					foreach ($results as $result) {
						$password_=$result['password'];

					}
					
					if($password==$password_) {
						$newpass=hash('sha256', $newpass);
						$query="UPDATE users SET password='$newpass' WHERE id='$id' AND name='$name' ";
						$results=$db->query($query);
						if ($results==1) {
							$success="password updated successfully";
						}
					}else{
						$error="current password does not exist in our systems!!";
					}
				}else{
					$error="Dude Passwords didn't match!";
				}


	}else{
	$error="Dude Password Lenght Must Be Between 7 to 30 characters!";
}
}
 ?>

    	



<link rel="stylesheet" href="css/common.css">

	<div class="m-5">
		<div class="jumbotron" id="main_row">
			<div class="row">
				<?php require "user_ul.php"; ?>
				<div class="col-12 col-sm-12 col-md-12 col-lg-8" id="right-bars">
					<form action="changepass" method="POST" id="change_pass_form" class="mx-auto">
						<center class="mb-5"><strong>CHANGE PASSWORD</strong></center>
						<div class="form-group">
							<input type="password" class="form-control"name="current_pass" id="current_pass" required minlength="6" placeholder="current password">
							</div>
							<div class="form-group">
							<input type="password" class="form-control" name="newpass" id="newpass" required minlength="6" placeholder="new password">
							</div>
							<div class="form-group">
							<input type="password" class="form-control" name="confirm_pass" id="confirm_pass" required minlength="6" placeholder="confirm new password"> 
							</div>
							<div class="form-inline">
							<input type="submit" class=" btn btn-info form-control  px-5" name="submit"  value="update">
						</div>
						<div class="error_log bg-danger mt-3 text-center">
							<?php 

							if (!empty($error)) {
								echo $error;
							}else{}
							if (!empty($success)) {
								echo $success;
							}else{}
							 ?>
							
						</div>
					</form>
						

					

				</div>
				<div class="col-lg-2">

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