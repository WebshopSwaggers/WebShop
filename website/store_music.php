<?php
$title = "Music";
require 'includes/config.php';
require 'templates/header.php';
//DB require
$item = Item::getItems("music");
?>
	<div id="blanket" style="display:none;" onclick="popup('popUpDiv')"></div>
	<div id="popUpDiv" style="display:none;">
		<div id="data"></div>
	</div>

<div class="containerMusic" style = "
height: 1200px;">

	<div class="image_slider">
		<div class="mask">
			<ul class="images">
				<li>
					<img width="940" src="assets/images/sliderGunGodz.png" />
				</li>
				<li>
					<img width="940" src="assets/images/sliderSeriousSam.png" />
				</li>
				<li>
					<img width="940" src="assets/images/sliderSuperCrateBox.png" />
				</li>
				<li>
					<img width="940" src="http://static.ddmcdn.com/gif/sun-update-1.jpg" />
				</li>
				<li>
					<img width="940" src="http://upload.wikimedia.org/wikipedia/commons/thumb/0/06/Neptune.jpg/240px-Neptune.jpg" />
				</li>
			</ul>
		</div>
		<ul class="triggers">
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
		<span class="control prev"></span>
		<span class="control next"></span>
	</div>

	<div class="musicStoreContainer">
	<div class="empty"></div>
	<div class="h1Title">
		<h1>Music</h1>
	</div>
	<?php
	$count = count($item);
	$i= 0;
	//while loop om het bedrag te bepalen
	?>
	<?php
	for($count; $i < $count; $i++)
	{

			echo'<div class="itemHolder">';
				echo'<div class="itemPic">';
					echo'<img class="bottom" src="'.$item[$i]['item_image'].'" alt="itemPlaceholder">';
			?>
		<img class="top" onclick="realTime('<?php echo $item[$i]['item_id'];?>', '<?php echo $dir; ?>', 0);" src="assets/images/buyme.png">
		<?php
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
			?>
				<?php
	}
	?>
	</div>
</div>
