<?php
	require '../config.php';
	$alphaRegex  = "/^[a-zA-Z]{1,30}$/";
	$alphaRegex2 = "/^[a-zA-Z]{1,40}$/";
	$numbRegex	 = "/^[0-9]{1,}$/";
	$zipRegex	 = "/^[0-9]{4}\s[A-Z]{2}$/";

	if(isset($_POST['submit']) && !empty($_POST['password']) && !empty($_POST['email']))
	{
		if(preg_match($alphaRegex, trim($_POST['firstname']))){
			if(preg_match($alphaRegex, trim($_POST['lastname']))){
				if(preg_match($alphaRegex2, trim($_POST['city']))){
					if(preg_match($alphaRegex2, trim($_POST['street']))){
						 if(preg_match($numbRegex, trim($_POST['houseNumber']))){
							if(preg_match($zipRegex, trim($_POST['zip']))){
								if($_POST['email'] == $_POST['emailConfirm'])
								{
									if(trim($_POST['password']) == trim($_POST['passwordConfirm']))
									{
										$password    = sha1($_POST['password']);
										$firstName   = Security(trim($_POST['firstname']));
										$lastName    = Security(trim($_POST['lastname']));
										$country     = Security(trim($_POST['country']));
										$city        = Security(trim($_POST['city']));
										$street      = Security(trim($_POST['street']));
										$houseNumber = Security(trim($_POST['houseNumber']));
										$email       = Security(trim($_POST['email']));
										$zip         = Security(trim($_POST['zip']));

						        $sql = DB::query("SELECT user_id FROM cms_users WHERE email = '".$email."'");
										if(DB::num_rows($sql) == 0)
										{
										  if($query = "INSERT INTO cms_users
										  (email, password, firstname, lastname, country, city, street, number, zip)
										  VALUES
										  ('$email', '$password', '$firstName','$lastName', '$country', '$city', '$street', '$houseNumber', '$zip')")
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
							}else{
								$_SESSION['regError'] = "Please use the following format: 1111 AB";
								header("location: ".$link."/register");
								die();								
							}		
						}else{
							$_SESSION['regError'] = "Please use numeric characters only for your house number";
							header("location: ".$link."/register");
							die();								
						}		
					}else{
						$_SESSION['regError'] = "Please use alphabetic characters only for your street";
						header("location: ".$link."/register");
						die();							
					}		
				}else{
					$_SESSION['regError'] = "Please use alphabetic characters only for your city";
					header("location: ".$link."/register");
					die();						
				}		
			}else{
				$_SESSION['regError'] = "Please use alphabetic characters only for your last name";
				header("location: ".$link."/register");
				die();					
			}			
		}else{
			$_SESSION['regError'] = "Please use alphabetic characters only for your First name";
			header("location: ".$link."/register");
			die();				
		}
	

			




	}
?>
