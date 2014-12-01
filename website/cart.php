<?php
ini_Set("display_errors","On");
$title = "Home";
require 'includes/config.php';

//echo '<pre>';
//print_r($_SESSION['cart']);
//echo '</pre>';

$items = $_SESSION['cart'];
$count = count($items);

for($i = 0; $i < $count; $i++)
{
  $item = new Item($items[$i]);
  echo "<b>Item name: " . $item->getName() . "</b><br><br>";
  echo "Item Price excl. btw: &euro;" . $item->getPrice() . "<br>";
  echo "Item Price incl. btw: &euro;" . (($item->getPrice() / 100 * 21) + $item->getPrice()) . "<br><br>";
}


?>
