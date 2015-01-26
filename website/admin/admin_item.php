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
REQUIRE "/templates/header.php";

?>
<div class="row">

  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">Een overzicht van uw VPS servers</h3>

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

            <th class="sorting" tabindex="0" aria-controls="example-2" rowspan="1" colspan="1" aria-label="Student Name: activate to sort column ascending" style="width: auto;">name</th>
            <th class="sorting" tabindex="0" aria-controls="example-2" rowspan="1" colspan="1" aria-label="Average Grade: activate to sort column ascending" style="width: auto;">price</th>
            <th class="sorting" tabindex="0" aria-controls="example-2" rowspan="1" colspan="1" aria-label="Curriculum / Occupation: activate to sort column ascending" style="width: auto;">description</th>
            <th class="sorting" tabindex="0" aria-controls="example-2" rowspan="1" colspan="1" aria-label="Curriculum / Occupation: activate to sort column ascending" style="width: auto;">image</th>
            <th class="sorting" tabindex="0" aria-controls="example-2" rowspan="1" colspan="1" aria-label="Curriculum / Occupation: activate to sort column ascending" style="width: auto;">catagory</th>
            <th class="sorting" tabindex="0" aria-controls="example-2" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" style="width: auto;">leftover</th>

            <th class="sorting" tabindex="0" aria-controls="example-2" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" style="width: auto;">tags</th>
            <th class="sorting" tabindex="0" aria-controls="example-2" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" style="width: auto;">Edit</th>
            <th class="sorting" tabindex="0" aria-controls="example-2" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" style="width: auto;">Delete</th></tr>
          </thead>

          <tbody class="middle-align">

            <?php

              echo'<tr role="row" class="odd">';

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
