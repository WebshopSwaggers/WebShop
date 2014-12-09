<?php
//Item Class - winkelwagen
Class Item
{
   //variables
   private $item_id;
   private $name;
   private $price;
   private $description;
   private $image;
   private $catagory;
   private $leftover;

   // De contructor
  public function __construct($item_id)
  {
     $sql = DB::query("SELECT item_id,name,price,description,image,catagory,leftover FROM cms_items WHERE item_id = '".$item_id."' LIMIT 1");
     $row = DB::fetch($sql);

     $this->item_id = $row->item_id;
	   $this->name = $row->name;
	   $this->price = $row->price;
	   $this->description = $row->description;
     $this->image = $row->image;
     $this->catagory = $row->catagory;
     $this->leftover = $row->leftover;
  }

  public static function getItems($cat)
  {
    $sql = DB::query("SELECT item_id,name,price,description,image,catagory,leftover FROM cms_items WHERE catagory = '".$cat."'");
    $array = array();
    while($row = DB::fetch($sql))
    {
       $Item = new Item($row->item_id);
       $itemid = $Item->getId();
       $itemName = $Item->getName();
       $itemDesc = $Item->getDescription();
       $itemPrice = $Item->getPrice();
       $itemImage = $Item->getImage();
       $itemCatagory = $Item->getCatagory();
       $leftover = $Item->getLeftOver();
       //$itemCount = $item->GetCount();
       $items = array("item_id" => $itemid, "item_name" => $itemName, "item_description" => $itemDesc, "item_price" => $itemPrice, "items_catagory" => $itemCatagory, "item_image" => $itemImage, "item_left_over" => $leftover);
       array_push($array,$items);
    }
    return $array;
  }

	// Get functies
  public function getId()
  {
    return $this->item_id;
  }
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
   public function getCatagory()
  {
    return $this->catagory;
  }
  public function getLeftOver()
  {
    return $this->leftover;
  }

}

?>
