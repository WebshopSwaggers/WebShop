    <link rel="stylesheet" href="http://bootswatch.com/flatly/bootstrap.min.css" />

<?php

require '../includes/config.php';







	if (isset($_GET['id'])) //De functie isset() kijkt of een variabele bestaat
							//Je kan het dus gebruiken in formulieren of er op de submitknop gedrukt is (dan is de waarde van die knop 'gezet')
		{

			$id = Security($_GET['id']);
			$sql= "DELETE FROM cms_items WHERE item_id = '$id'";  //verwijderen via het id

			DB::query( $sql) OR die(mysqli_error(DB::$con));  		//kijkt of het verwijderen goed is gegaan.

		header ('location: admin_item.php');	//verwijderen is gelukt, dan blijft hij op zelfde pagina.
		}







	if( isset($_POST['submit'])){				//isset $_POST voegt gegevens toe aan database
		$name 			= 			 Security($_POST['name']); //variabele aanmaken
		$price 		= 	 		 Security($_POST['price']);//variabele aanmaken
		$description 			= 		 Security($_POST['description']);//variabele aanmaken
		$image 	=  				 Security($_POST['image']);//variabele aanmaken
		$catagory 	=  				 Security($_POST['catagory']);//variabele aanmaken
		$leftover 	=  					 Security($_POST['leftover']);//variabele aanmaken
		$tags 				=  	 Security($_POST['tags']);//variabele aanmaken
		


		DB::query("INSERT INTO cms_items (name, price, description, image, catagory, leftover, tags)
											VALUES ('$name', '$price','$description', '$image', '$catagory', '$leftover', '$tags')") or die(mysqli_error(DB::$con));  //hier voegt hij toe waar het precies inmoet in database.


	}
	
	$query = DB::query( "SELECT * FROM cms_items") or die(mysqli_error(DB::$con)); //welke tabel je wilt gebruiken uit de database
?>



<!DOCTYPE html>
<html>
<head>
	<title>Admin Pagina Items</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<div class="wrapper">
		<h1>Admin Pagina Items</h1>

			<table>
				<thead>
					<tr>
						<th class="name">name</th>
						<th class="price">price</th>
						<th class="description">description</th>
						<th class="image">image</th>
						<th class="catagory">catagory</th>
						<th class="leftover">leftover</th>
						<th class="tags">tags</th>
						

						<th class="bewerk">Edit</th>
						<th class="verwijder">Delete</th>
					</tr>
				</thead>

				<tbody>
					<tr>
						<?php
							while($row = DB::fetch_assoc($query)){
								echo '<tr>';
								echo '<td>' . $row['name'] . '</td>';
								echo '<td>' . $row['price'] . '</td>';
								echo '<td>' . $row['description'] . '</td>';
								echo '<td>' . $row['image'] . '</td>';
								echo '<td>' . $row['catagory'] . '</td>';
								echo '<td>' . $row['leftover'] . '</td>';
								echo '<td>' . $row['tags'] . '</td>';
								

								echo '<td> <a href="admin_item_edit.php?item_id='. $row['item_id'].'"> edit </a></td>';
								echo '<td> <a href="admin_item.php?id='. $row['item_id'].'"> X </a></td>';
								echo '</tr>';
							}
						?>

					</tr>
				</tbody>
			</table>

			<form action="" method="POST">
				<br>
				<label for="name">name</label>
				<input type="text" name="name" id="name" required>

				<br>


				<label for="price">price</label>
				<input type="text" name="price" id="price" required>

				<br>

				<label for="description">description</label>
				<input type="text" name="description" id="description" required>
				<br>
				  
				  
				  
				  <label for="image">image*</label>
          <div class="col-lg-10">
        <input type="file" class="form-control" id="image" name="image" required>
				<br>
				
				
				
				
				
				<label for="catagory">catagory </label>
				<input type="text" name="catagory" id="catagory" required>
				<br>
				<label for="leftover">leftover </label>
				<input type="text" name="leftover" id="leftover" required>
				<br>
				<label for="tags">tags</label>
				<input type="text" name="tags" id="tags" required>
				<br>
				

				<input name="submit" type="submit" value="toevoegen">
			</form>


	</div>
</body>
</html>
