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
    public function __construct($item_id)
    {

     $sql = DB::query("SELECT name,price,description,image FROM cms_items WHERE item_id = '".$item_id."' LIMIT 1");
     $row = DB::fetch($sql);

	   $this->name = $row->name;
	   $this->price = $row->price;
	   $this->description = $row->description;
	   $this->image = $row->image;
	}

	// Get functies
  public function getName()
  {
    return $this->name;
  }
  public function getPrice()
  {
    return $this->price;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function getImage()
  {
    return $this->image;
  }


}

?>
