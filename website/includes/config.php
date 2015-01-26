<?php
error_reporting(E_ALL);
session_start();

$url = "http://localhost/";
$dir = "GitHub/WebShop/website/";
$link = $url.$dir;

require("classes/class.mysqli.php");

//Hostname, bijvoorbeeld: localhost of 127.0.0.1
$host = "127.0.0.1";
//Database gebruikersnaam
$dbuser = "root";
//Database wachtwoord
$dbpass = "1234";
//Database naam
$dbname = "webshop";

$con = new DB($host,$dbuser,$dbpass,$dbname);
$con2 = mysqli_connect('localhost','root','1234','webshop');

//connectie error?
if (mysqli_connect_error(DB::$con))
{
  // laat de error zien.
  die('Kan niet connecten: ' . mysqli_connect_error());
}


//Functies
require 'functions.php';
//Users class
require 'classes/class.user.php';
//Item class
require 'classes/class.item.php';
//Invoice items class
require 'classes/class.invoice.items.php';
//Invoice class
require 'classes/class.invoice.php';
?>
