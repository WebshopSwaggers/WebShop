<?php
	require '../config.php';
	if(isset($_POST['submit']) && !empty($_POST['password']) && !empty($_POST['email']))
	{
		if($_POST['password'] == $_POST['passwordConfirm'])
		{
			if(trim($_POST['email']) == trim($_POST['emailConfirm']))
			{
				$password = sha1($_POST['password']);
				$firstName = Security(trim($_POST['firstname']));
				$lastName = Security(trim($_POST['lastname']));
				$country = Security(trim($_POST['country']));
				$city = Security(trim($_POST['city']));
				$street = Security(trim($_POST['street']));
				$streetNumber = Security(trim($_POST['streetNumber']));
				$email = Security(trim($_POST['email']));
				$zip = Security(trim($_POST['zip']));

        $sql = DB::query("SELECT user_id FROM cms_users WHERE email = '".$email."'");
				if(DB::num_rows($sql) == 0)
				{
				  if($query = "INSERT INTO cms_users
				  (email, password, firstname, lastname, country, city, street, number, zip)
				  VALUES
				  ('$email', '$password', '$firstName','$lastName', '$country', '$city', '$street', '$streetNumber', '$zip')")
			  	{
					  $result = DB::query($query) or die (mysqli_error(DB::$con));
				  	$_SESSION['regSucces'] = "You have successfully registered!";
				 	  header("location: ".$link."/register");
				  }
			  }
				else
				{
					$_SESSION['regError'] = "Email is already registered!";
					header("location: ".$link."/register");
				}
			}
			else
			{
				$_SESSION['regError'] = "Passwords don't match";
				header("location: ".$link."/register");
			}
		}
		else
		{
			$_SESSION['regError'] = "Emails don't match";
			header("location: ".$link."/register");
		}
		die();
	}
?>
