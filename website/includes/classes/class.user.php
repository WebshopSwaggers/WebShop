<?php
//USERS CLASS by Jordy
//Haalt alle Data uit een sessie
//Je kan nu gebruik maken van GetUserData("id");
//Maar je kunt hier natuurlijk ook de andere values mee ophalen.
class User
{
	
	private static $superuser;
	
	public static function GetUserData($value)
	{
	
		if(isset($_SESSION['userdata'])) {
			static::$superuser = $_SESSION['userdata'];
		
			return self::$superuser->$value;
		}
		else
		{
		return "Niet gevonden";
		}
		
		
	
	}
}
?>