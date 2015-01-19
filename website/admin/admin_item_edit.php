<?php

require '../includes/config.php';


$query = DB::query( "SELECT * FROM cms_items") or die(mysqli_error(DB::$con)); //welke tabel je wilt gebruiken uit de database


if(isset($_GET['item_id'])){

$id = $_GET['item_id'];
$sql = DB::query("SELECT * FROM cms_items WHERE item_id = $id") or die(mysqli_error(DB::$con));
$row = DB::fetch_assoc($sql);




}
else
{
	header("location: admin_item.php");
}

if (isset($_POST['submit'])){

	$name 			=			 Security( $_POST['name']);
	$price 		= 			 Security( $_POST['price']);
	$description 			=		 Security( $_POST['description']);
	$image 	=				 Security( $_POST['image']);
	$catagory 	=  				 Security($_POST['catagory']);//variabele aanmaken
	$leftover 	=  					 Security($_POST['leftover']);//variabele aanmaken
	$tags 				=  	 Security($_POST['tags']);//variabele aanmaken


$sql = "UPDATE cms_items SET name = '$name', price = '$price', description = '$description', image = '$image' , catagory = '$catagory', leftover = '$leftover', tags = '$tags' WHERE item_id = '$id'" or die(mysqli_error(DB::$con));


$query = DB::query($sql) OR DIE (mysqli_error(DB::$con));


$msg = urlencode('item is succesvol upgedate');
header('location: admin_item_edit.php?msg='. $msg);
}
?>

<h1>Edit Pagina</h1>

<?php

if (isset($_GET['msg'])){
	echo '<p>' . $_GET ['msg']. '</p>';
}
?>

<form action="admin_item_edit.php?item_id=<?php echo $id; ?>" method="POST">
	<label for="name">name</label>
	<input type="text"  value='<?php echo $row['name'];?>'name="name" id="name" required>

	<br>

	<label for="price">price</label>
	<input type="text" value='<?php echo $row['price'];?>'name="price" id="price" required>

	<br>

	<label for="description">description</label>
	<input  type="text" value='<?php echo $row['description'];?>'name="description" id="description" required>
	<input type="hidden" value='<?php echo $row['item_id'];?>'>
	<br>

	<label for="image">image</label>
	<input type="text" value='<?php echo $row['image'];?>'name="image" id="image" required>
	<br>

	<label for="catagory">catagory</label>
	<input type="text" value='<?php echo $row['catagory'];?>'name="catagory" id="catagory" required>
		<br>

	<label for="leftover">leftover</label>
	<input type="text" value='<?php echo $row['leftover'];?>'name="leftover" id="leftover" required>
		<br>

	<label for="tags">tags</label>
	<input type="text" value='<?php echo $row['tags'];?>'name="tags" id="tags" required>
		<br>

	


	
	<input name="submit" type="submit" value="bewerken">
</form>
