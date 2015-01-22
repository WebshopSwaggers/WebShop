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
	<div class="recomend">
		<div class="recomendTitle">
			<p>Recommendations</p>
		</div>
		<div class="recomendImg">
		<?php for($count; $i < $count; $i++): ?>
			<div><img src="<?php echo $getImage[$i]['item_image'] ?>" onclick="realTime('<?php echo $getImage[$i]['item_id'];?>', '<?php echo $dir; ?>' , 1);" class="gallery__img" alt="" /></div>
		<?php endfor; ?>
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
<script>

$(document).ready(function(){
	$('.recomendImg').slick({
	  infinite: true,
	  slidesToShow: 4,
	  slidesToScroll: 1,
	  autoplay: true,
  	  autoplaySpeed: 1500,
  	  variableWidth: true,
	  arrows: false
	});
});

</script>
