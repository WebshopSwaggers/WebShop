<?php
	require '../config.php';
	if(isset($_POST['submit']) && !empty($_POST['password']) && !empty($_POST['email']))
	{
		if($_POST['password'] == $_POST['passwordConfirm'])
		{
			if(trim($_POST['email']) == trim($_POST['emailConfirm']))
			{
				$password = sha1($_POST['password']);
				$email = Security(trim($_POST['email']));

        $sql = DB::query("SELECT user_id FROM cms_users WHERE email = '".$email."'");
				if(DB::num_rows($sql) == 0)
				{
				  if($query = "INSERT INTO cms_users (email, password) VALUES ('$email', '$password')")
			  	{
					  $result = DB::query($query);
				  	$_SESSION['regSucces'] = "You have successfully registered!";
				 	  header("location: ../../register");
				  }
			  }
				else
				{
					$_SESSION['regError'] = "Email is already registered!";
					header("location: ../../register");
				}
			}
			else
			{
				$_SESSION['regError'] = "Passwords don't match";
				header("location: ../../register");
			}
		}
		else
		{
			$_SESSION['regError'] = "Emails don't match";
			header("location: ../../register");
		}
		die();
	}
?>
