<?php
ini_Set("display_errors","On");
$title = "Home";
require 'includes/config.php';
$item = new Item(Security($_GET['id']));
//echo 'Je wilt: '.$item->getDescription(). " kopen...";

$sql = DB::query("SELECT item_id FROM cms_cart WHERE user_id = '".User::GetUserData("user_id")."' AND item_id = '".$item->getId()."'");
if(DB::num_rows($sql) > 0)
{
  DB::query("UPDATE cms_cart SET count = count + 1 WHERE user_id = '".User::GetUserData("user_id")."' AND item_id = '".$item->getId()."' LIMIT 1");
}
else
{
  DB::query("INSERT into cms_cart (user_id, item_id, count) VALUES ('".User::GetUserData("user_id")."','".$item->getId()."','1')");
}

header("location: ../cart.php");
?>
