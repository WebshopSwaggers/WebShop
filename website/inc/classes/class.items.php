<?php
//Item Class - winkelwagen
Class Item
{
   //variables
   private $name;
   private $price;
   private $description;
   private $image;

   // De contructor
    public function __construct($id)
    {

     sql = DB::query("SELECT name,price,description,image FROM items WHERE id = '".$id."' LIMIT 1");
     $row = DB::fetch($sql);

	   $this->name = $row->name;
	   $this->price = $row->price;
	   $this->description = $row->description;
	   $this->image = $row->image;
	}

	// Get functies
  public function getName($sql)
  {
    return $this->name;
  }
  public function getPrice($sql)
  {
    return $this->price;
  }
  public function geDescription($sql)
  {
    return $this->description;
  }
  public function getImage($sql)
  {
    return $this->image;
  }


}

?>
