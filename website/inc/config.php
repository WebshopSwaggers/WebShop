<?php
error_reporting(E_ALL);
Session_start();


require("/inc/classes/class.mysqli.php");


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
require("/inc/functions.php");
//Users class
require("/inc/classes/class.users.php");


?>
