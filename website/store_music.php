<?php
$title = "Music";
require 'includes/config.php';
require 'templates/header.php';
//DB require
$item = Item::getItems("music");
?>
<body>
	<div id="blanket" style="display:none;"></div>
	<div id="popUpDiv" style="display:none;">   
    	<a href="#" onclick="popup('popUpDiv')" >Click to Close CSS Pop Up</a>
	</div>	
  <a href="#" onclick="popup('popUpDiv')">Click to Open CSS Pop Up</a>

<div class="container">
<div class="musicStoreContainer">

<?php
$count = count($item);
$i= 0;
//while loop om het bedrag te bepalen
?>
<!--POPUP-->    
    


<!-- / POPUP-->  
<?php
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
					echo'<p>'.$item[$i]['item_description'].'</p>';
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
</body>
