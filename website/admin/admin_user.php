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
  REQUIRE "/templates/header.php";

  ?>
  <div class="row">

    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Users</h3>

        <div class="panel-options">
          <a href="#" data-toggle="panel">
            <span class="collapse-icon">–</span>
            <span class="expand-icon">+</span>
          </a>
          <a href="#" data-toggle="remove">
            ×
          </a>
        </div>
      </div>
      <div class="panel-body">



        <div id="example-2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer"><table class="table table-bordered table-striped dataTable no-footer" id="example-2" role="grid" aria-describedby="example-2_info">
          <thead>
            <tr role="row">

              <th class="sorting" tabindex="0" aria-controls="example-2" rowspan="1" colspan="1" aria-label="Student Name: activate to sort column ascending" style="width: auto;">Email</th>
              <th class="sorting" tabindex="0" aria-controls="example-2" rowspan="1" colspan="1" aria-label="Average Grade: activate to sort column ascending" style="width: auto;">Password</th>
              <th class="sorting" tabindex="0" aria-controls="example-2" rowspan="1" colspan="1" aria-label="Curriculum / Occupation: activate to sort column ascending" style="width: auto;">Firstname</th>
              <th class="sorting" tabindex="0" aria-controls="example-2" rowspan="1" colspan="1" aria-label="Curriculum / Occupation: activate to sort column ascending" style="width: auto;">Lastname</th>
              <th class="sorting" tabindex="0" aria-controls="example-2" rowspan="1" colspan="1" aria-label="Curriculum / Occupation: activate to sort column ascending" style="width: auto;">Street</th>
              <th class="sorting" tabindex="0" aria-controls="example-2" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" style="width: auto;">Zip</th>

              <th class="sorting" tabindex="0" aria-controls="example-2" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" style="width: auto;">Number</th>
              <th class="sorting" tabindex="0" aria-controls="example-2" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" style="width: auto;">City</th>
              <th class="sorting" tabindex="0" aria-controls="example-2" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" style="width: auto;">Country</th>
              <th class="sorting" tabindex="0" aria-controls="example-2" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" style="width: auto;">Edit</th>
              <th class="sorting" tabindex="0" aria-controls="example-2" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" style="width: auto;">Delete</th></tr>
            </thead>

            <tbody class="middle-align">

              <?php

              echo'<tr role="row" class="odd">';


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


              echo'</tr>';

              ?>


            </tbody>
          </table>
        </div>
      </div>


    </tbody>

  </div>
</div>
<?php
require "/templates/footer.php";
?>
