<?php
$title = "games";
require 'includes/config.php';
require 'templates/header.php';
//DB require
?>
<div class="container">
<div class="musicStoreContainer">

<?php
$item = Item::getItems("games");
$count = count($item);
$i= 0;
//while loop om het bedrag te bepalen
for($count; $i < $count; $i++)
{

	echo'<div class="itemHolder">';
	echo'<div class="itemPic">';
	echo'<img class="bottom" src="'.$item[$i]['item_image'].'" alt="itemPlaceholder">';
	echo'<a href="./add/'.$item[$i]['item_id'].'"><img class="top" src="assets/images/buyme.png"></a>';
	echo'</div>';

	echo'<div class="itemTitle">';
	echo'<strong>'.$item[$i]['item_name'].'</strong>';
	echo'<br>';
	echo'</div>';

	echo'<div class="itemDesc">';
	echo'<i>'.$item[$i]['item_description'].'</i>';
	echo'</div>';

	echo'<div class="itemPrice">';
	echo'<i>Price: &euro;'.$item[$i]['item_price'].'</i>';
	echo'</div>';
	echo'</div>';

}
?>

</div>

<?php require 'templates/footer.php';
?>
</div>
