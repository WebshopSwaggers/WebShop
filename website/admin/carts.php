<?php

require '../includes/config.php';
REQUIRE "/templates/header.php";
$query = DB::query("SELECT * FROM cms_cart WHERE status = '0'");
?>
<div class="row">

  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">Carts not paid</h3>

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

            <th class="sorting" tabindex="0" aria-controls="example-2" rowspan="1" colspan="1" aria-label="Student Name: activate to sort column ascending" style="width: auto;">user id</th>
            <th class="sorting" tabindex="0" aria-controls="example-2" rowspan="1" colspan="1" aria-label="Average Grade: activate to sort column ascending" style="width: auto;">Firstname</th>
            <th class="sorting" tabindex="0" aria-controls="example-2" rowspan="1" colspan="1" aria-label="Curriculum / Occupation: activate to sort column ascending" style="width: auto;">Lastname</th>
            <th class="sorting" tabindex="0" aria-controls="example-2" rowspan="1" colspan="1" aria-label="Curriculum / Occupation: activate to sort column ascending" style="width: auto;">Email</th>
            <th class="sorting" tabindex="0" aria-controls="example-2" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" style="width: auto;">Show</th></tr>
          </thead>

          <tbody class="middle-align">

            <?php

            echo'<tr role="row" class="odd">';
            $array = array();
            while($row = DB::fetch_assoc($query)){
              if (!in_array($row['user_id'], $array)) {

              $sql = DB::query("SELECT * FROM cms_users WHERE user_id = '".$row['user_id']."' LIMIT 1");
              $user = DB::fetch($sql);

              array_push($array, $row['user_id']);
              echo '<tr>';
              echo '<td>' . $row['user_id'] . '</td>';
              echo '<td>' . $user->firstname . '</td>';
              echo '<td>' . $user->lastname . '</td>';
              echo '<td>' . $user->email . '</td>';


              echo '<td> <a href="showcart?id='. $row['id'].'"> Show cart </a></td>';
              echo '</tr>';
            }
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
