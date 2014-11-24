<?php  

if (!isset($_SESSION['userdata'])) {
	header('location: http://127.0.0.1/toets/index.php');
}

$rank = User::GetUserData("jobTitle");
$rank = strtolower($rank);

    // ik zou liever mijn  redirect($rank); functie willen gebruiken maar dat mag niet volgens de opdracht.
	if (strpos($rank,'sales') === false && strpos($rank,'president') === false && $page == 'sales') 
	{
       header("location: http://127.0.0.1/toets/index.php");
	   die($rank);
    }
	elseif (strpos($rank,'finance') === false && strpos($rank,'president') === false && $page == 'finance') 
	{
       header("location: http://127.0.0.1/toets/index.php");
	   die($rank);
    }
    elseif (strpos($rank,'president') === false && $page == 'admin') 
	{
       header("location: http://127.0.0.1/toets/index.php");
	   die($rank);
    }

?>