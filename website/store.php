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
			echo'<img src="'.$item[$i]['item_image'].'" alt="itemPlaceholder">';
		echo'</div>';
		echo'<strong>'.$item[$i]['item_name'].'</strong>';
		echo'<br>';
		echo'<i>'.$item[$i]['item_description'].'</i>';
	echo'</div>';

}
?>

</div>

<?php require 'templates/footer.php';
?>
</div>