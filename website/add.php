<?php
ini_Set("display_errors","On");
$title = "Home";
require 'includes/config.php';
$item = new Item(Security($_GET['id']));
//echo 'Je wilt: '.$item->getDescription(). " kopen...";

if(!isset($_SESSION['cart']))
{
  $_SESSION['cart'] = array();
}

array_push($_SESSION['cart'], $item->getId());
header("location: ../cart.php");
?>
