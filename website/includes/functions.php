<?php
//Beveiliging tegen injecties
 function Security($input) {
	$output = $input;
	$output = addslashes($output);
	$output = DB::escape($output);
	$output = htmlspecialchars($output);

	return $output;
}

//eigen gebruiker veranderd? Update de sessie.
	function UpdateUser($id)
	{
	$sql = DB::query("SELECT * FROM users WHERE id = '".$id."' LIMIT 1");
	$data = DB::fetch($sql);
	$_SESSION['userdata'] = $data;
	return true;
	}
  
 function getUserInvoices($user_id)
  {
    $sql = DB::query("SELECT inv_id,user_id FROM cms_invoice_templates WHERE user_id = '".$user_id."'");
    if(DB::num_rows($sql) > 0)
    {
      return $sql;
    }
    else
    {
      return 0;
    }
  }

	//hash
function Passhash($string) {
	$output = sha1($string);

	return $output;
}

function welkom($name)
{
    $str = "Welkom ".$name.", uitloggen? <br> <a href='http://127.0.0.1/toets/controllers/authcontroller.php?logout'>Klik hier om uit te loggen</a>";
    return $str;
}

//redirecten naar de goede link.
function redirect($rank)
{
	$rank = strtolower($rank);
	if (strpos($rank,'sales') !== false)
	{
       header("location: http://127.0.0.1/toets/level/sales/index.php");
	   die();
    }
	elseif (strpos($rank,'finance') !== false)
	{
       header("location: http://127.0.0.1/toets/level/finance/index.php");
	   die();
    }
    elseif (strpos($rank,'president') !== false)
	{
       header("location: http://127.0.0.1/toets/level/admin/index.php");
	   die();
    }
	else
	{
	    session_destroy();
		session_start();
		$_SESSION['error'] = '403 (permission denied)';
	    header("location: http://127.0.0.1/toets/index.php");
		die();
	}

}

?>
