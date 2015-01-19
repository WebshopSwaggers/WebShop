    <link rel="stylesheet" href="http://bootswatch.com/flatly/bootstrap.min.css" />

<?php

require 'includes/config.php';


$query = DB::query( "SELECT * FROM cms_users") or die(mysqli_error(DB::$con)); //welke tabel je wilt gebruiken uit de database

	
	
	
	if (isset($_GET['id'])) //De functie isset() kijkt of een variabele bestaat
							//Je kan het dus gebruiken in formulieren of er op de submitknop gedrukt is (dan is de waarde van die knop 'gezet')
		{
		
			$id = $_GET['id'];
			$sql= "DELETE FROM cms_users WHERE user_id = '$id'";  //verwijderen via het id
		
			DB::query( $sql) OR die(mysqli_error(DB::$con));  		//kijkt of het verwijderen goed is gegaan.
			
		header ('location: admin_user.php');	//verwijderen is gelukt, dan blijft hij op zelfde pagina.
		}
	
	
	
	
	
	
	
	if( isset($_POST['submit'])){				//isset $_POST voegt gegevens toe aan database  	
		$email 			= 		$_POST['email']; //variabele aanmaken
		$password 		= 	$_POST['password'];//variabele aanmaken
		$firstname 			= 		$_POST['firstname'];//variabele aanmaken
		$lastname 	= $_POST['lastname'];//variabele aanmaken
		$street 	= $_POST['street'];//variabele aanmaken
		$zip 	= $_POST['zip'];//variabele aanmaken
		$number 	= $_POST['number'];//variabele aanmaken
		$city 	= $_POST['city'];//variabele aanmaken
		$country 	= $_POST['country'];//variabele aanmaken

		
		if (!$query 	= DB::query($con,"INSERT INTO cms_user(email, password, firstname, lastname) 
											VALUES ('$email', '$password','$firstname', '$lastname')"))  //hier voegt hij toe waar het precies inmoet in database.
		{
			echo 'kan data niet toevoegen aan database'; //alshet niet lukt krijg je dit 
		}else{
			header('location: admin_user.php');   //blijft op zelfde pagina.
		}
	}


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

						<th class="bewerk">Bewerken</th>
						<th class="verwijder">Verwijder</th>
					</tr>	
				</thead>

				<tbody>
					<tr>
						<?php
							while($row = mysqli_fetch_assoc($query)){
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

								echo '<td> <a href="admin_user_edit.php?user_id='. $row['user_id'].'"> Bewerk </a></td>';
								echo '<td> <a href="admin_user.php?id='. $row['user_id'].'"> X </a></td>';
								echo '</tr>';
							}
						?>

					</tr>
				</tbody>
			</table>

			<form action="" method="POST">
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

				<input name="submit" type="submit" value="toevoegen">
			</form>


	</div>
</body>
</html>	


