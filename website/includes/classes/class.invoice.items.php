<?php
//Item Class - winkelwagen
Class InvoiceItem
{
   //variables
   private $inv_id;
   private $item_id;

   // De contructor
    public function __construct($inv_item_id)
    {
     $sql = DB::query("SELECT inv_item_id,inv_id,item_id FROM cms_invoice_items WHERE inv_item_id = '".$inv_item_id."' LIMIT 1");
     $row = DB::fetch($sql);

	   $this->inv_id = $row->inv_id;
	   $this->item_id = $row->item_id;
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

  public function getItemName()
  {
    $item = new Item($this->item_id);
    return $item->getName();
  }

  function getItemPrice()
  {
    $item = new Item($this->item_id);
    return $item->getPrice();
  }

  public function getItemDesc()
  {
    $item = new Item($this->item_id);
    return $item->getDescription();
  }

  public function getItemImage()
  {
    $item = new Item($this->item_id);
    return $item->getName();
  }


}

?>
