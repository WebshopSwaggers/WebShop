<link rel="stylesheet" href="http://templateninja.net/themes/clotheshop/v1.1/css/bootstrap.css"/><?php
ini_Set("display_errors","On");
$title = "Home";
$noheader=1;
require 'includes/config.php';
require 'templates/header.php';
if(!isset($_SESSION['userdata']))
{
  $userid = $_SESSION['key'];
}
else
{
  $userid = User::GetUserData("user_id");
}
?>
<div class="containercart">

<?php

if(isset($_GET['delete']))
{
  if(!empty($_GET['itemid']))
  {
    $itemid = Security($_GET['itemid']);
    DB::query("DELETE FROM cms_cart WHERE item_id = '" . $itemid . "' AND user_id = '".$userid."'") OR DIE (mysqli_error(DB::$con));
  }
}

if(isset($_POST['count']))
{
  if($_POST['item_id'] > 0)
  {
    DB::query("UPDATE cms_cart SET count = '".Security($_POST['count'])."' WHERE item_id = '".Security($_POST['item_id'])."' AND user_id = '".$userid."' LIMIT 1") OR DIE (mysqli_error(DB::$con));
  }
}


$bedrag = 0;
$sql = DB::query("SELECT * FROM cms_cart WHERE user_id = '".$userid."'");
$count = DB::num_rows($sql);

if($count == 0)
{
die("Winkelwagen is leeg");
}
/*
while($row = DB::fetch($sql))
{
  $item = new Item($row->item_id);
  echo "<b>Item name: " . $item->getName() . "</b>";
  echo "<br>";
  echo "<br>";
  echo "Item Price excl. btw: &euro;" . $item->getPrice();
  echo "<br>";
  echo "Hoeveelheid: " . $row->count;
  echo "<br>";
  echo "<a href='?delete=yes&itemid=" . $row->item_id . "'>Delete</a>";
  echo "<br>";
  echo "<br>";
  $bedrag += ($item->getPrice() * $row->count);
}
$btw =($bedrag / 100) * 21;
echo "<br>";
echo "<br>";
echo "Subtotaal: &euro;". number_format($bedrag, 2, ',', ' ');
echo "<br>";
echo "BTW (21%): ". number_format($btw, 2, ',', ' ');
echo "<br>";
echo "Totaal: ". number_format(($bedrag + $btw), 2, ',', ' ');
*/
?>
<div class="col-md-9 col-sm-8 content" style="width: 100%;">
<br>
  <div class="row">
    <div class="col-md-12">
      <ul class="nav nav-tabs"style="width: auto;height: 42px;">
        <li class="active"><a href="cart.html">Cart</a></li>
        <li><a href="#">Login</a></li>
        <li><a href="#">Account</a></li>
        <li><a href="#">Shipping</a></li>
        <li><a href="#">Payment</a></li>
      </ul>
      <br>
      <br>
      <h3>Your Cart</h3>
      <hr>

      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Product</th>
            <th>Description</th>
            <th>Qty</th>
            <th>Price</th>
            <th>Total</th>
          </tr>
        </thead>
        <tbody>
          <tr>
      <?php
        while($row = DB::fetch($sql))
        {
          $item = new Item($row->item_id);
          echo'<td><img src="'.$item->getImage().'" style="width:100px;height:100px;" class="img-cart"></td>';
          echo'<td><strong>'.$item->getName().'</strong></td>';
          echo'<td>';
          echo'<form action="#" method="POST" class="form-inline">';
          echo'<input class="form-control" name="count" type="text" value="'.$row->count.'">';
          echo'<input type="hidden" name="item_id" value="'.$item->getId().'">';
          echo'<button rel="tooltip" title="" class="btn btn-default" data-original-title="Update">Edit</button>';
          echo'<a href="?delete=yes&itemid=' . $item->getId() . '" class="btn btn-primary" rel="tooltip" title="" data-original-title="Delete">Delete</a>';
          echo'</form>';
          echo'</td>';
          echo'<td>&euro;'.number_format($item->getPrice(), 2, ',', ' ').'</td>';
          echo'<td>&euro;'.number_format($item->getPrice() * $row->count, 2, ',', ' ').'</td>';
          echo'</tr>';

          $bedrag += ($item->getPrice() * $row->count);
        }
        $btw =($bedrag / 100) * 21;
        ?>

          <tr>
            <td colspan="6">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="4" class="text-right">Total Product</td>
            <td>&euro;<?php echo number_format($bedrag, 2, ',', ' '); ?></td>
          </tr>
          <tr>
            <td colspan="4" class="text-right">Total Shipping</td>
            <td>&euro;<?php echo number_format($btw, 2, ',', ' '); ?></td>
          </tr>
          <tr>
            <td colspan="4" class="text-right"><strong>Total</strong></td>
            <td>&euro;<?php echo number_format(($bedrag + $btw), 2, ',', ' '); ?></td>
          </tr>
        </tbody>
      </table>
      <a href="index" class="btn btn-default">Continue Shopping</a>
      <?php
      $_SESSION['amounth'] = ($bedrag + $btw);
      if(isset($_SESSION['userdata']))
      {
         echo'<a href="includes/pay/ideal/1-new-payment.php" class="btn btn-primary pull-right">Next</a>';
      }
      else
      {
         echo'<a href="login.php?cart=1" class="btn btn-primary pull-right">Next</a>';
      }
      ?>
    </div>
  </div>
</div>
</div>
