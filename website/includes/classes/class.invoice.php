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
     if(DB::num_rows($sql) > 0)
     {
        $row = DB::fetch($sql);
        $this->inv_id = $row->inv_id;
	      $this->user_id = $row->user_id;
	   }
     else
     {
        die("Invoice does not exist");
     }
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

  public static function getUserInvoices($user_id)
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

  public function getItemsForInvoice()
  {
    $sql = DB::query("SELECT inv_item_id FROM cms_invoice_items WHERE inv_id = '".$this->inv_id."'");
    $array = array();
    while($row = DB::fetch($sql))
    {
       $invItem = new InvoiceItem($row->inv_item_id);
       $itemid = $invItem->getItemId();
       $count = $invItem->getCount();
       $itemName = $invItem->getItemName();
       $itemDesc = $invItem->getItemDesc();
       $itemPrice = $invItem->getItemPrice();
       $itemImage = $invItem->getItemImage();
       $items = array("item_id" => $itemid, "item_name" => $itemName, "item_description" => $itemDesc, "item_price" => $itemPrice, "item_image" => $itemImage, "count" => $count);
       array_push($array, $items);

    }
    return $array;
  }


}

?>
