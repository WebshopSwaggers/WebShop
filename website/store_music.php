<?php
$title = "Music";
require 'includes/config.php';
require 'templates/header.php';
//DB require
$item = Item::getItems("music");
?>
<body>
	<div id="blanket" style="display:none;" onclick="popup('popUpDiv')"></div>
	<div id="popUpDiv" style="display:none;">
		<div id="data"></div>
	</div>

<div class="container">
<div class="musicStoreContainer">

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
	<img class="top" onclick="realTime('<?php echo $item[$i]['item_id'];?>', '<?php echo $dir; ?>');" src="assets/images/buyme.png">
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
}
?>

</div>

<?php require 'templates/footer.php';
?>
</div>
</script>
</body>
