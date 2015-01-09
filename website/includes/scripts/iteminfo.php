<?php
ini_Set("display_errors","On");
require '../../includes/config.php';

$item_id = Security($_GET['itemid']);

if(empty($item_id))
{
  die("error");
}

$item     = new Item($item_id);
$tag      = DB::query("SELECT tags, catagory FROM cms_items WHERE item_id='".$item_id."'");

$row      = DB::fetch_assoc($tag);
$tag      = $row['tags'];
$cat      = $row['catagory'];

$getImage = Item::getImageByTag($tag, $cat);

$count    = count($getImage);
$i        = 0;

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
		if($item->getLeftOver() != 0){
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

	<div class="recomendTitle">
		<p>Recommendations</p>
	</div>
	<?php for($count; $i < $count; $i++): ?>
		<div class="gallery-wrap">
		  <div class="gallery clearfix">
		    <div class="gallery__item">
		      <img src="<?php echo $getImage[$i]['item_image'] ?>" class="gallery__img" alt="" />
		    </div>
		  </div>
		</div>
	
	<?php endfor; ?>
	  <div class="gallery__controls clearfix">
	    <div href="#" class="gallery__controls-prev">
	      <img src="images/prev1.png" alt="" />
	    </div>
	    <div href="#" class="gallery__controls-next">
	      <img src="images/next1.png" alt="" />
	    </div>
	  </div>
	

<?php
if($item->getLeftOver() != 0){
	?>
<a href="./add/<?php echo $item->getId() ?>"><button id="popupAddToCart">Add to cart</button></a>
<?php
}else{
	?>
	<a href="./add/<?php echo $item->getId() ?>"><button id="popupAddToCartDisabled" disabled>Add to cart</button></a>	
	<?php
}

?>

