<?php
	$title = "Register";
	require 'includes/config.php';
	require 'templates/header.php';
	if(isset($_SESSION['userdata']))
	{
		header("location: ./index");
		die();
	}
?>
<body>
	<div class="container">
		<div class="message">
			<?php
			if(isset($_SESSION['regError']))
			{
				echo "<p id='msgError'>".$_SESSION['regError']."</p>";
				unset($_SESSION['regError']);
			}
			elseif (isset($_SESSION['regSucces']))
			{
			 	echo "<p id='msgSuccess'>".$_SESSION['regSucces']."</p>";
				unset($_SESSION['regSucces']);
			}
			?>
		</div>

		<form action="includes/controllers/registercontroller.php" method="POST">
		<div class="formTitle"><h1>Register to vlambeer!</h1></div>
		<div class="formInfo"><p>Registering will grant you access to our webshop, exclusive news and you will be the first to know about the deals</p></div>
	<div class="form">
		<label class="formLabel" for="email">E-mail address</label>
		<input class="formInput" type="email" name="email" placeholder="Email address" required>
		<br>
		<label class="formLabel" for="emailConfirm">Confirm your email</label>
		<input class="formInput" type="email" name="emailConfirm" placeholder="Email confirm">
		<br>
		<label class="formLabel" for="password">Password</label>
		<input class="formInput" type="password" name="password" placeholder="Password" required>
		<br>
		<label class="formLabel" for="passwordConfirm">Confirm your password</label>
		<input class="formInput" type="password" name="passwordConfirm" placeholder="Password confirm">
		<br>
		<input type="submit" id="formSubmit" name="submit" value="submit">

	</div>
</form>
	</div>
</body>
<?php require 'templates/footer.php' ?>
