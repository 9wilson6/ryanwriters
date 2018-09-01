<?php 
require "db_config.php";
$error=true;
$empty=false;
$passerror=false;
$email_check=false;
if (isset($_POST['submit'])) {
	if ($_POST['form_type']==="register") {
		$name= $db->quote($_POST['name']);
		$email=$db->quote($_POST['email']);
		$password=$db->quote($_POST['password']);
		$c_password=$db->quote($_POST['c_password']);

if (!empty($name) && !empty($email) && !empty($password) && !empty($c_password)) {
				if ($password===$c_password) {
					if (strlen($password) >= 7 && strlen($password) <= 30) {
						$query="SELECT * FROM users WHERE name='$name'";
						$result=$db->query($query);

						if (mysqli_num_rows($result)==0) {
							if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
								$query="SELECT * FROM users WHERE email='$email'";
								$result=$db->query($query);
								if (mysqli_num_rows($result)==0) {
									// $password_harshed=password_hash($password, PASSWORD_DEFAULT);
									$password_harshed=hash('sha256', $password);
									$query="INSERT INTO users(name, email, password) VALUES('$name', '$email', '$password_harshed')";
									$result=$db->query($query);
									session_start();
									$_SESSION['name']=$name;
									$_SESSION['password']=$password;
										echo '<p class="text-success pt-2">Registration Successful!</p>';
										$error=false;
								}else{
									$email_check=true;
									echo '<p class="text-danger pt-2">Email Is Already Taken!</p>';
								}
							
						}else{#email validity check end
							$email_check=true;
							echo '<p class="text-danger pt-2">Dude Email Is Not Valid!</p>';
						}
						}else{#check if username is alredy take end

							echo '<p class="text-danger pt-2">Dude Username Is Already Taken!</p>';
						}
					}else{#check pass len end
						$passerror=true;
						echo '<p class="text-danger pt-2">Dude Password Lenght Must Be Between 7 to 30 characters!</p>';

				}
}else{#password mismatch check end
	$passerror=true;
	echo '<p class="text-danger pt-2">Dude Passwords Must Match!</p>';
}

}else{#empty fields check end
	$empty=true;
echo '<p class="text-danger pt-2">Dude All Fields Must Be Filled Up!</p>';
}
?>



       <script>
       	$("#username, [name='password'], [name='c_password'], [name='email']").removeClass("invalid-input");
    		var error="<?php echo $error; ?>";
    		var empty="<?php echo  $empty; ?>";
			var passerror="<?php echo $passerror; ?>";
			var email_check="<?php echo $email_check; ?>";
			
			if(empty==false) {
				if (passerror==false) {
					if (email_check==false) {
						if (error==false) {
    					window.location = "login";
    							}
					}else {// mail error check end
						$('[name="email"]').addClass("invalid-input");
					}

				}else {//pass error check end
					$("[name='password'], [name='c_password']").addClass("invalid-input");
				}
			}else {//check empty end
				$("#username, [name='password'], [name='c_password'], [name='email']").addClass("invalid-input");
			}
    		
    	</script>







	<?php }elseif ($_POST['form_type']==="login") {
		$name= $db->quote($_POST['name']);
        $password=$db->quote($_POST['password']);

        $query="SELECT * FROM users WHERE name ='$name'";
        $results=$db->query($query);
      if (mysqli_num_rows($results)>0) {
      	  $name_="";
        $status="";
        $bal="";
        foreach ($results as  $result) {
        	$password_=$result['password'];
        	$name_=$result['name'];
        	$id=$result['id'];
        	$status=$result['status'];
        	$bal=$result['balance'];
        }
       if ($status=="active") {
       	$password=hash('sha256', $password);
        if ($name==$name_ && $password== $password_ ) {
        	session_start();

        	$_SESSION['name']=$name;
        	$_SESSION['id']=$id;
        	$_SESSION['bal']=$bal;
        	
        	?>
        	<script>
        		window.location = "home";
        	</script>
       <?php }else{
        	echo '<p class="text-danger pt-2">Inavlid username and/password</p>';
        }
	}else{
		echo '<p class="text-danger pt-2">Your Account Is disabled contact Admin For Assistance</p>';
	}
      }else{
      	echo '<p class="text-danger pt-2">You Are Not Registered</p>';
      }
       }
	}

 ?>

    	