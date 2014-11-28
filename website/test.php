<?php
require 'includes/config.php';

//$userinv = Invoice::getUserInvoices(1);

//$count = 0;
//while($row = DB::fetch($userinv))
//{
//  $count++;
  $invoice = addslashes($_GET['id']);
  echo "<h1>Factuur #".$invoice."</h1>";

  $inv = new Invoice($invoice);
  $row = $inv->GetItemsForInvoice();

  //variablen
  $count = count($row);
  $i= 0;
  $bedrag = 0;

  //while loop om het bedrag te bepalen
  while($i < $count)
  {
    echo "Product: ".$row[$i]['item_name'];
    echo "<br>";
    echo "Beschrijving: ".$row[$i]['item_description'];
    echo "<br>";
    echo "Prijs: &euro;" . $row[$i]['item_price'];
    echo "<br>";
    echo "Aantal: ". $row[$i]['count'];
    echo "<br>";
    echo "<img style='height:100px; width:70px;' src='".$row[$i]['item_image']."'>";
    echo "<br>";
    echo "<br>";
    $bedrag += $row[$i]['item_price'] * $row[$i]['count'];
    $i++;
  }

  //rekensommen
  $btw = $bedrag / 100 * 21;
  $btwinc = $bedrag * 1.21;

  //echo's
  echo "Totale bedrag is: &euro;" . $bedrag;
  echo "<br>";
  echo "BTW (21%): &euro;" . $btw;
  echo "<br>";
  echo "Bedrag inclusief btw: &euro;" . $btwinc;


?>
