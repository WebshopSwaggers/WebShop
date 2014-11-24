<?php
//Item Class - winkelwagen
Class Invoice
{
   //variables
   private $inv_id;
   private $user_id;

   // De contructor
    public function __construct($inv_id)
    {

     $sql = DB::query("SELECT inv_id,user_id FROM cms_invoice_templates WHERE inv_id = '".$inv_id."' LIMIT 1");
     $row = DB::fetch($sql);

	   $this->inv_id = $row->inv_id;
	   $this->user_id = $row->user_id;
	}

	// Get functies
  public function getInvId()
  {
    return $this->inv_id;
  }
  public function getUserId()
  {
    return $this->user_id;
  }

  public function GetItems()
  {
    $sql = DB::query("SELECT inv_item_id FROM cms_invoice_items WHERE inv_id = '".$this->inv_id."'");
    $array = array();
    while($row = DB::fetch($sql))
    {
       $invItem = new InvoiceItem($row->inv_item_id);
       $itemid = $invItem->getItemId();
       $itemName = $invItem->getItemName();
       $itemDesc = $invItem->getItemDesc();
       $itemPrice = $invItem->getItemPrice();
       $itemImage = $invItem->getItemImage();
       $items = array($itemid,$itemName,$itemDesc,$itemPrice,$itemImage);
       array_push($array, $items);

    }
    return $array;
  }


}

?>
