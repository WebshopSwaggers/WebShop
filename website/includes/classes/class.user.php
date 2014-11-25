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


//UserData Class
Class UserData
{
	//variables
	private $user_id;
	private $email;
	private $password;
	private $firstname;
	private $lastname;
	private $street;
	private $number;
	private $zip;
	private $city;
	private $country;

	// De contructor
	public function __construct($user_id)
	{

		$sql = DB::query("SELECT * FROM cms_users WHERE user_id = '".$user_id."' LIMIT 1");
		$row = DB::fetch($sql);

		$this->user_id = $row->user_id;
		$this->email = $row->email;
		$this->password = $row->password;
		$this->firstname = $row->firstname;
		$this->lastname = $row->lastname;
		$this->street = $row->street;
		$this->number = $row->number;
		$this->zip = $row->zip;
		$this->city = $row->city;
		$this->country = $row->country;
	}

	// Get functies
	public function getUserId()
	{
		return $this->user_id;
	}
	public function getEmail()
	{
		return $this->email;
	}
	public function getPassword()
	{
		return $this->password;
	}
	public function getFirstName()
	{
		return $this->firstname;
	}
	public function getLastName()
	{
		return $this->lastname;
	}
	public function getStreet()
	{
		return $this->street;
	}
	public function getNumber()
	{
		return $this->number;
	}
	public function getZip()
	{
		return $this->zip;
	}
	public function getCity()
	{
		return $this->city;
	}
	public function getCountry()
	{
		return $this->country;
	}

}


?>
