<?php

require_once "/includes/core.php";
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

        <th class="sorting" tabindex="0" aria-controls="example-2" rowspan="1" colspan="1" aria-label="Student Name: activate to sort column ascending" style="width: auto;">IP</th>
        <th class="sorting" tabindex="0" aria-controls="example-2" rowspan="1" colspan="1" aria-label="Average Grade: activate to sort column ascending" style="width: auto;">Hostname</th>
        <th class="sorting" tabindex="0" aria-controls="example-2" rowspan="1" colspan="1" aria-label="Curriculum / Occupation: activate to sort column ascending" style="width: auto;">Status</th>
        <th class="sorting" tabindex="0" aria-controls="example-2" rowspan="1" colspan="1" aria-label="Curriculum / Occupation: activate to sort column ascending" style="width: auto;">Bestel datum</th>
        <th class="sorting" tabindex="0" aria-controls="example-2" rowspan="1" colspan="1" aria-label="Curriculum / Occupation: activate to sort column ascending" style="width: auto;">Verloop datum</th>
        <th class="sorting" tabindex="0" aria-controls="example-2" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" style="width: auto;">Actie's</th></tr>
      </thead>

      <tbody class="middle-align">

      <?php
      $sql = DB::query("SELECT * FROM services WHERE userid = '".User::Data('user_id')."'");
      while($row = DB::fetch($sql))
      {

        echo'<tr role="row" class="odd">';

        echo'<td>'.$row->ip.'</td>';
        echo'<td>'.$row->hostname.'</td>';
        if($row->enable == 0)
        {
          echo'<td>Verlopen</td>';
        }
        else
        {
          echo'<td>Actief</td>';
        }


        $verloopt = $row->suspenddate;
        $verloopdatum = date("d-m-Y",$verloopt);

        $setupdate = $row->setupdate;
        $besteldatum = date("d-m-Y",$setupdate);

        echo'<td>'.$besteldatum.'</td>';
        echo'<td>'.$verloopdatum.'</td>';

        echo'<td>';

        echo'<a href="./vpsaction.php?id='.$row->vmid.'" class="btn btn-secondary btn-sm btn-icon icon-left">';
        echo'Bekijk';
        echo'</a>';

        echo'<a href="#" class="btn btn-info btn-sm btn-icon icon-left">';
        echo'Verleng';
        echo'</a>';
        echo'</td>';
        echo'</tr>';
      }
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
