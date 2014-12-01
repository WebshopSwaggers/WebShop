<?php
$title = "Home";
require 'includes/config.php';
$item = new Item(Security($_GET['id']));
echo 'Je wilt: '.$item->getDescription(). " kopen...";
?>
