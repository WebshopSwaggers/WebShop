<?php

require_once "/includes/core.php";
REQUIRE "/templates/header.php";

$sql = DB::query("SELECT * FROM user WHERE email = 'jordy.visser@hotmail.com' LIMIT 1");
$_SESSION['user'] = DB::fetch($sql);
?>

      <div class="row">
        <div class="col-sm-3">

          <div class="xe-widget xe-counter" data-count=".num" data-from="1" data-to="3" data-suffix="" data-duration="1" data-easing="false">
            <div class="xe-icon">
              <i class="linecons-cloud"></i>
            </div>
            <div class="xe-label">
              <strong class="num">0</strong>
              <span>VPS Servers</span>
            </div>
          </div>

          <div class="xe-widget xe-counter xe-counter-purple" data-count=".num" data-from="1" data-to="3" data-suffix="" data-duration="1" data-easing="false">
            <div class="xe-icon">
              <i class="linecons-cloud"></i>
            </div>
            <div class="xe-label">
              <strong class="num">0</strong>
              <span>Stream Servers</span>
            </div>
          </div>

          <div class="xe-widget xe-counter xe-counter-info" data-count=".num" data-from="0" data-to="10" data-duration="4" data-easing="true">
            <div class="xe-icon">
              <i class="linecons-camera"></i>
            </div>
            <div class="xe-label">
              <strong class="num">0</strong>
              <span>Beantwoorde tickets</span>
            </div>
          </div>

        </div>
        <div class="col-sm-6">

          <div class="panel panel-default">
          <!-- Bordered + Striped Table -->
          <strong>Yor-Game Server Status</strong>

          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Address</th>
              </tr>
            </thead>

            <tbody>

              <?php
              $query = DB::query("SELECT * FROM `nodes2`");
              while ($row = DB::fetch($query))
              {

                $ip = $row->nodeip;    // Geef hier het ip in
                $port = $row->ip;        // Geef hier de poort in
                $maint = $row->onderhoud;;        // Is de server in Maintenance mode? 1=ja, 0=nee

                //HIERONDER NIETS MEER VERANDEREN
                $ip = "$ip:$port";
                $array = explode(':',Security($ip));
                $fp = @fsockopen($array[0], $array[1], $errno, $errstr,1);

                if($maint == 1) {
                  $status = "<font color=\"orange\">Onderhoud</font>";
                }
                elseif($maint == 2) {
                  $status = "<font color=\"orange\">Comming soon</font>";
                }
                elseif($fp){
                  $status = "<font color=\"green\">Online</font>";
                  fclose($fp); // hier sluiten omdat in het andere geval geen verbinding is opgebouwd
                }
                else {
                  $status = "<font color=\"red\">Offline</font>";
              }


              echo'<tr>';
              echo'<td>'.$row->nodenaam.'</td>';
              echo'<td>'.$row->ipnodes.'</td>';
              echo'<td>'.$status.'</td>';
              echo'</tr>';

            }
            ?>
            </tbody>
          </table>

        </div>
      </div>
        <div class="col-sm-3">

          <div class="chart-item-bg">
            <div class="chart-label chart-label-small">
              <div class="h4 text-purple text-bold" data-count="this" data-from="0.00" data-to="95.8" data-suffix="%" data-duration="1.5">0.00%</div>
              <span class="text-small text-upper text-muted">Current Server Uptime</span>
            </div>
            <div id="server-uptime-chart" style="height: 134px;"></div>
          </div>

          <div class="chart-item-bg">
            <div class="chart-label chart-label-small">
              <div class="h4 text-secondary text-bold" data-count="this" data-from="0.00" data-to="320.45" data-decimal="," data-duration="2">0</div>
              <span class="text-small text-upper text-muted">Avg. of Sales</span>
            </div>
            <div id="sales-avg-chart" style="height: 134px; position: relative;">
              <div style="position: absolute; top: 25px; right: 0; left: 40%; bottom: 0"></div>
            </div>
          </div>

        </div>
      </div>


      <div class="row">

        <div class="col-md-6">

          <div class="panel-group" id="accordion-test-2">

            <?php
            $sql = DB::query("SELECT * FROM news ORDER BY id DESC LIMIT 3");


            while($row = DB::fetch($sql))
            {


              echo'<div class="panel panel-default">';
              echo'<div class="panel-heading">';
              echo'<h4 class="panel-title">';
              echo'<a data-toggle="collapse" data-parent="#accordion-test-'.$row->id.'" href="#collapseOne-'.$row->id.'">';
              echo $row->title;
              echo'</a>';
              echo'</h4>';
              echo'</div>';
              echo'<div id="collapseOne-'.$row->id.'" class="panel-collapse collapse in">';
              echo'  <div class="panel-body">';
              echo $row->text;
              echo'</div>';
              echo'</div>';
              echo'</div>';

          }
          ?>

          </div>

        </div>


        <div class="col-md-6">

          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">VPS Node status</h3>

              <div class="panel-options">


                <a href="#" data-toggle="panel">
                  <span class="collapse-icon">–</span>
                  <span class="expand-icon">+</span>
                </a>

                <a href="#" data-toggle="reload">
                  <i class="fa-rotate-right"></i>
                </a>

                <a href="#" data-toggle="remove">
                  ×
                </a>
              </div>
            </div>

            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Node Naam</th>
                  <th>Ruimte</th>
                </tr>
              </thead>

              <tbody>
                <tr>
                  <td>1</td>
                  <td>VPS Node 1</td>
                  <td class="middle-align node1">

                  </td>
                </tr>

                <tr>
                  <td>2</td>
                  <td>VPS Node 2</td>
                <td class="middle-align node2">

                  </td>
                </tr>

                <tr>
                  <td>3</td>
                  <td>VPS Node 3</td>
                  <td class="middle-align node3">

                  </td>
                </tr>
                <tr>
                  <td>4</td>
                  <td>VPS Node 4</td>
                  <td class="middle-align node4">

                  </td>
                </tr>

                <tr>
                  <td>5</td>
                  <td>VPS Node 5</td>
                  <td class="middle-align node5">

                  </td>
                </tr>
              </tbody>
            </table>
          </div>

        </div>
      </div>

<script>
$('.node1').load('./includes/scripts/nodemem.php?node=1');
$('.node2').load('./includes/scripts/nodemem.php?node=2');
$('.node3').load('./includes/scripts/nodemem.php?node=3');
$('.node4').load('./includes/scripts/nodemem.php?node=4');
$('.node5').load('./includes/scripts/nodemem.php?node=5');
</script>

  <?php
  require "/templates/footer.php"; ?>
  ?>
