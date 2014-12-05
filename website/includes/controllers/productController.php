<?php

require '../config.php';

if ( isset($_POST['createProduct']) ) 
{
	$name = mysqli_real_escape_string($con, $_POST['name']);
	$price =mysqli_real_escape_string($con, $_POST['price']);
	$description =mysqli_real_escape_string($con, $_POST['description']);
	$image = mysqli_real_escape_string($con, $_POST['image']);
	$catagory =mysqli_real_escape_string($con, $_POST['catagory']);

    $sql = "INSERT INTO cms_items SET name= '$name', price= '$price', description= '$description', image= '$image', catagory= '$catagory' WHERE item_id= '$item_id'";
			
    
	$query = mysqli_query($con, $sql);
    
    if (!$query) {
		$fout = urlencode(trigger_error('query niet gelukt. geprobeerde query was ' . $sql));
		header('location: ../../product_aanmaken.php?msg='.$fout);	
	}

	$msg = urlencode('Customer is succesfully created.');
	header ('location: ../../product_aanmaken.php?msg='.$msg);
}
?>