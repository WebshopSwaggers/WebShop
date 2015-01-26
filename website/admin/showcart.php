<?php

require '../includes/config.php';
REQUIRE "/templates/header.php";
$query = DB::query("SELECT * FROM cms_cart WHERE status = '0' AND id = '".Security($_GET['id'])."'");
?>
<div class="row">

  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">Cart Id: <?php echo Security($_GET['id']); ?></h3>

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

            <th class="sorting" tabindex="0" aria-controls="example-2" rowspan="1" colspan="1" aria-label="Student Name: activate to sort column ascending" style="width: auto;">Item Id</th>
            <th class="sorting" tabindex="0" aria-controls="example-2" rowspan="1" colspan="1" aria-label="Average Grade: activate to sort column ascending" style="width: auto;">Item Name</th>
            <th class="sorting" tabindex="0" aria-controls="example-2" rowspan="1" colspan="1" aria-label="Curriculum / Occupation: activate to sort column ascending" style="width: auto;">Item Price</th>
            <th class="sorting" tabindex="0" aria-controls="example-2" rowspan="1" colspan="1" aria-label="Curriculum / Occupation: activate to sort column ascending" style="width: auto;">Description</th>
              </thead>

          <tbody class="middle-align">

            <?php

            echo'<tr role="row" class="odd">';
            while($row = DB::fetch_assoc($query)){


              $item = new Item($row['item_id']);


                echo '<tr>';
                  echo '<td>' . $item->getId() . '</td>';
                  echo '<td>' . $item->getName() . '</td>';
                  echo '<td>' . $item->getDescription() . '</td>';
                  echo '<td>' . $item->getPrice() . '</td>';
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
