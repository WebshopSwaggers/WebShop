<?php
ini_Set("display_errors","On");
$title = "Home";
require '../../includes/config.php';

$item_id = Security($_GET['itemid']);
if(empty($item_id))
{
  die("error");
}

$item = new Item($item_id);
echo '<center><img style="height:150px;width:100px;" src="'.$item->getImage().'"></center>';
echo "Product name: " . $item->getName();
echo "<br>";
echo "Product discription: ". $item->getDescription();
echo "<br>";
echo "Price: " . $item->getPrice();
echo "<br>";
echo '<a href="./add/'.$item->getId().'">Add to cart</a>';
?>
