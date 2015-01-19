<?php

require '../includes/config.php';


$query = DB::query( "SELECT * FROM cms_users") or die(mysqli_error(DB::$con)); //welke tabel je wilt gebruiken uit de database


if(isset($_GET['user_id'])){

$id = $_GET['user_id'];
$sql = DB::query("SELECT * FROM cms_users WHERE user_id = $id") or die(mysqli_error(DB::$con));
$row = DB::fetch_assoc($sql);




}
else
{
	header("location: admin_user.php");
}

if (isset($_POST['submit'])){

	$email 			=			 Security( $_POST['email']);
	$password 		= 			 Security( $_POST['password']);
	$firstname 			=		 Security( $_POST['firstname']);
	$lastname 	=				 Security( $_POST['lastname']);
	$street 	=  				 Security($_POST['street']);//variabele aanmaken
	$zip 	=  					 Security($_POST['zip']);//variabele aanmaken
	$number 				=  	 Security($_POST['number']);//variabele aanmaken
	$city 	=  					 Security($_POST['city']);//variabele aanmaken
	$country 	=  				 Security($_POST['country']);//variabele aanmaken

$sql = "UPDATE cms_users SET email = '$email', password = '$password', firstname = '$firstname', lastname = '$lastname' , street = '$street', zip = '$zip', number = '$number', city = '$city', country =  '$country' WHERE user_id = '$id'" or die(mysqli_error(DB::$con));


$query = DB::query($sql) OR DIE (mysqli_error(DB::$con));


$msg = urlencode('User is succesvol upgedate');
header('location: admin_user_edit.php?msg='. $msg);
}
?>

<h1>Edit Pagina</h1>

<?php

if (isset($_GET['msg'])){
	echo '<p>' . $_GET ['msg']. '</p>';
}
?>

<form action="admin_user_edit.php?user_id=<?php echo $id; ?>" method="POST">
	<label for="email">email</label>
	<input type="email"  value='<?php echo $row['email'];?>'name="email" id="email" required>

	<br>

	<label for="password">password</label>
	<input type="text" value='<?php echo $row['password'];?>'name="password" id="password" required>

	<br>

	<label for="firstname">firstname</label>
	<input  type="text" value='<?php echo $row['firstname'];?>'name="firstname" id="firstname" required>
	<input type="hidden" value='<?php echo $row['user_id'];?>'>
	<br>

	<label for="lastname">lastname</label>
	<input type="text" value='<?php echo $row['lastname'];?>'name="lastname" id="lastname" required>
	<br>

	<label for="street">street</label>
	<input type="text" value='<?php echo $row['street'];?>'name="street" id="street" required>
		<br>

	<label for="zip">zip</label>
	<input type="text" value='<?php echo $row['zip'];?>'name="zip" id="zip" required>
		<br>

	<label for="number">number</label>
	<input type="text" value='<?php echo $row['number'];?>'name="number" id="number" required>
		<br>

	<label for="city">city</label>
	<input type="text" value='<?php echo $row['city'];?>'name="city" id="city" required>
		<br>

	<label for="country">country</label>
	<input type="text" value='<?php echo $row['country'];?>'name="country" id="country" required>
		<br>


	
	<input name="submit" type="submit" value="bewerken">
</form>
