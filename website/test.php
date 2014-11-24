<?php
require 'includes/config.php';


$inv = new Invoice(1);

echo '<pre>';
print_r($inv->GetItemsForInvoice());
echo '</pre>';
?>
