<?php

ini_SET("display_errors","On");
include("../config.php");
if(isset($_POST['login']))
{
  if(empty($_POST['email']) || empty($_POST['password']))
  {
    $_SESSION['error'] = "Don't forget to fill all te fields";
    header("location: ".$url."/".Security($_POST['link']));
    die();
  }

  $email = Security($_POST['email']);
  $password = Security($_POST['password']);

  $sql = DB::query("SELECT * FROM cms_users WHERE email = '".$email."' AND password = '".sha1($password)."' LIMIT 1");
  if(DB::num_rows($sql) == 0)
  {
    $_SESSION['error'] = "Wrong username or password";
    header("location: ".$url."/".Security($_POST['link']));
    die();
  }

$_SESSION['userdata'] = DB::fetch($sql);
header("location: ".$url."/".Security($_POST['link']));
}

if(isset($_GET['logout']))
{
  if(isset($_SESSION['userdata']))
  {
     unset($_SESSION['userdata']);
  }
  header("location: ".$link."/index.php");
}
?>
