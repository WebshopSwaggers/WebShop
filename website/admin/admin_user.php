    <link rel="stylesheet" href="http://bootswatch.com/flatly/bootstrap.min.css" />

<?php

require '../includes/config.php';


$query = DB::query( "SELECT * FROM cms_users") or die(mysqli_error(DB::$con)); //welke tabel je wilt gebruiken uit de database




	if (isset($_GET['id'])) //De functie isset() kijkt of een variabele bestaat
							//Je kan het dus gebruiken in formulieren of er op de submitknop gedrukt is (dan is de waarde van die knop 'gezet')
		{

			$id = Security($_GET['id']);
			$sql= "DELETE FROM cms_users WHERE user_id = '$id'";  //verwijderen via het id

			DB::query( $sql) OR die(mysqli_error(DB::$con));  		//kijkt of het verwijderen goed is gegaan.

		header ('location: admin_user.php');	//verwijderen is gelukt, dan blijft hij op zelfde pagina.
		}







	if( isset($_POST['submit'])){				//isset $_POST voegt gegevens toe aan database
		$email 			= 			 Security($_POST['email']); //variabele aanmaken
		$password 		= 	 		 Security($_POST['password']);//variabele aanmaken
		$firstname 			= 		 Security($_POST['firstname']);//variabele aanmaken
		$lastname 	=  				 Security($_POST['lastname']);//variabele aanmaken
		$street 	=  				 Security($_POST['street']);//variabele aanmaken
		$zip 	=  					 Security($_POST['zip']);//variabele aanmaken
		$number 				=  	 Security($_POST['number']);//variabele aanmaken
		$city 	=  					 Security($_POST['city']);//variabele aanmaken
		$country 	=  				 Security($_POST['country']);//variabele aanmaken


		DB::query("INSERT INTO cms_users (email, password, firstname, lastname, street, zip, number, city, country )
											VALUES ('$email', '$password','$firstname', '$lastname', '$street', '$zip', '$number', '$city', '$country')") or die(mysqli_error(DB::$con));  //hier voegt hij toe waar het precies inmoet in database.


	}
	$query = DB::query( "SELECT * FROM cms_users") or die(mysqli_error(DB::$con)); //welke tabel je wilt gebruiken uit de database

?>



<!DOCTYPE html>
<html>
<head>
	<title>Admin Pagina Users</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<div class="wrapper">
		<h1>Admin Pagina Users</h1>

			<table>
				<thead>
					<tr>
						<th class="email">Email</th>
						<th class="password">Password</th>
						<th class="firstname">Firstname</th>
						<th class="lastname">Lastname</th>
						<th class="street">Street</th>
						<th class="zip">Zip</th>
						<th class="number">Number</th>
						<th class="city">City</th>
						<th class="country">Country</th>

						<th class="bewerk">Edit</th>
						<th class="verwijder">Delete</th>
					</tr>
				</thead>

				<tbody>
					<tr>
						<?php
							while($row = DB::fetch_assoc($query)){
								echo '<tr>';
								echo '<td>' . $row['email'] . '</td>';
								echo '<td>' . $row['password'] . '</td>';
								echo '<td>' . $row['firstname'] . '</td>';
								echo '<td>' . $row['lastname'] . '</td>';
								echo '<td>' . $row['street'] . '</td>';
								echo '<td>' . $row['zip'] . '</td>';
								echo '<td>' . $row['number'] . '</td>';
								echo '<td>' . $row['city'] . '</td>';
								echo '<td>' . $row['country'] . '</td>';

								echo '<td> <a href="admin_user_edit.php?user_id='. $row['user_id'].'"> edit </a></td>';
								echo '<td> <a href="admin_user.php?id='. $row['user_id'].'"> X </a></td>';
								echo '</tr>';
							}
						?>

					</tr>
				</tbody>
			</table>

			<form action="" method="POST">
				<br>
				<label for="email">Email</label>
				<input type="email" name="email" id="email" required>

				<br>

				<label for="password">Password</label>
				<input type="text" name="password" id="password" required>

				<br>

				<label for="firstname">First Name</label>
				<input type="text" name="firstname" id="firstname" required>

				<br>

				<label for="lastname">Last Name</label>
				<input type="text" name="lastname" id="lastname" required>
				<br>
				<label for="street">street</label>
				<input type="text" name="street" id="street" required>
				<br>
				<label for="zip">zip </label>
				<input type="text" name="zip" id="zip" required>
				<br>
				<label for="number">number </label>
				<input type="text" name="number" id="number" required>
				<br>
				<label for="city">city</label>
				<input type="text" name="city" id="city" required>
				<br>
				<label for="country">country</label>
				<input type="text" name="country" id="country" required>
<br>
				<input name="submit" type="submit" value="toevoegen">
			</form>


	</div>
</body>
</html>
