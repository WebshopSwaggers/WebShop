<?php

require '../includes/config.php';
if(!isset($_SESSION['userdata']))
{
  header("location: ../login.php");
  die();
}
else
{
  header("location: ./admin_item.php");
  die();
}
