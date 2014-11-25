<?php
//Item Class - winkelwagen
Class InvoiceItem
{
   //variables
   private $inv_id;
   private $item_id;
   private $count;
   private $item;

   // De contructor
    public function __construct($inv_item_id)
    {
     $sql = DB::query("SELECT inv_item_id,inv_id,item_id,count FROM cms_invoice_items WHERE inv_item_id = '".$inv_item_id."' LIMIT 1");
     $row = DB::fetch($sql);

	   $this->inv_id = $row->inv_id;
     $this->item_id = $row->item_id;
     $this->count = $row->count;
     $this->item = new Item($this->item_id);
	}

	// Get functies
  public function getInvId()
  {
    return $this->inv_id;
  }
  public function getItemId()
  {
    return $this->item_id;
  }
  public function getCount()
  {
    return $this->count;
  }

  public function getItemName()
  {
    return $this->item->getName();
  }

  function getItemPrice()
  {
    return $this->item->getPrice();
  }

  public function getItemDesc()
  {
    return $this->item->getDescription();
  }

  public function getItemImage()
  {
    return $this->item->getImage();
  }


}

?>
