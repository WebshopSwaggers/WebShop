<?php 
	require '../config.php';
	if(isset($_POST['submit']) && !empty($_POST['password']) && !empty($_POST['email']))
	{
		if($_POST['password'] == $_POST['passwordConfirm'])
		{
			if(trim($_POST['email']) == trim($_POST['emailConfirm']))
			{
				$password = Security($_POST['password']);
				$email = Security(trim($_POST['email']));

				if($query = "INSERT INTO cms_users (email, password) VALUES ('$email', '$password')")
				{
					$result = DB::query($query);
					$msgSuccess = "You have successfully registered!";
					header("location: ../../register.php?msgSuccess=".$msgSuccess);
				}
			}else{
				$msgError = "Passwords don't match";
				header('location: ../../register.php?msgError='.$msgError);
			}
		}else{
			$msgError = "Emails don't match";
			header('location: ../../register.php?msgError='.$msgError);
		}
	}
?>