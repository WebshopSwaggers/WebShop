<?php
ini_Set("display_errors","On");
$title = "Home";
require '../../includes/config.php';

$item_id = Security($_GET['itemid']);
if(empty($item_id))
{
  die("error");
}

$item = new Item($item_id);
?>
	<div class="popupImg">
		<img src="<?php echo $item->getImage()?>">
	</div>

<div class="popupInfo">
	<div class="popupTitle">
		<p><?php echo $item->getName()?></p>
		<br>
	</div>

	<div class="popupDesc">
		<p><?php echo $item->getDescription()?></p>
		<br>
	</div>

	<div class="popupPrice">
		<p>Price: € <?php echo $item->getPrice()?></p>
		<br>
	</div>

	<div class="popupLeft">
		<?php
		if($item->getLeftOver() =! 0){
			?>
		<p>Still <?php echo $item->getLeftOver()?> over!!</p>
		<?php
	}else{
		?>
		<p>Sorry we're out of stock :(</p>
		<?php
	}
	?>
	</div>
</div>

<div class="recomend">
	<div class="recomendTitle">
		<p>Recomendations</p>
	</div>
	<div class="recomendItems">
		<!-- Loopje waar eerste 4 items met zelfde tag wordeg weergeven -->
	</div>
</div>
<a href="./add/<?php echo $item->getId() ?>"><button id="popupAddToCart">Add to cart</button></a>
