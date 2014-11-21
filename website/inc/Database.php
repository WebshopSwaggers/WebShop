<?php
error_reporting(E_ALL);
Session_start();


require($_SERVER['DOCUMENT_ROOT']."/toets/config/classes/class.mysqli.php");


//Hostname, bijvoorbeeld: localhost of 127.0.0.1
$host = "127.0.0.1";
//Database gebruikersnaam
$dbuser = "root";
//Database wachtwoord
$dbpass = "";
//Database naam
$dbname = "car-models";

$con = new DB($host,$dbuser,$dbpass,$dbname);

//connectie error?
if (mysqli_connect_error($con))
{
  // laat de error zien.
  die('Kan niet connecten: ' . mysqli_connect_error());
}


//Functies
require($_SERVER['DOCUMENT_ROOT']."/webshop/webroot/inc/functions.php");
//Users class
require($_SERVER['DOCUMENT_ROOT']."/webshop/webroot/inc/classes/class.users.php");


?>
