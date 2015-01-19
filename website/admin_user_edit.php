<?php

require 'includes/config.php';


$query = DB::query( "SELECT * FROM cms_users") or die(mysqli_error(DB::$con)); //welke tabel je wilt gebruiken uit de database


if(isset($_GET['user_id'])){

$id = $_GET['user_id'];
$sql = DB::query("SELECT * FROM cms_users WHERE user_id = $id") or die(mysqli_error(DB::$con));
$row = DB::fetch_assoc($sql);




} else { header("location: admin_user.php");
}

if (isset($_POST['submit'])){
	$email 			= Security( $_POST['email']);
	$password 		= Security( $_POST['password']);
	$firstname 			= Security( $_POST['firstname']);
	$lastname 	= Security( $_POST['lastname']);

$sql = "UPDATE cms_users SET email = '$email', password = '$password', firstname = '$firstname', lastname = '$lastname'WHERE user_id = '$id'" or die(mysqli_error(DB::$con));


if (!$query = DB::query($sql)){

	echo 'kan gegevens niet updaten';
	die();
}

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

<form action="admin_user_edit.php" method="POST">
	<label for="email">email</label>
	<input type="email"  value='<?php echo $row['email'];?>'name="email" id="email" required>

	<br>

	<label for="uitgever">uitgever</label>
	<input type="text" value='<?php echo $row['password'];?>'name="password" id="password" required>

	<br>

	<label for="firstname">firstname</label>
	<input  type="text" value='<?php echo $row['firstname'];?>'name="firstname" id="firstname" required>
	<input type="hidden" value='<?php echo $row['user_id'];?>'>
	<br>

	<label for="lastname">lastname</label>
	<input type="text" value='<?php echo $row['lastname'];?>'name="lastname" id="lastname" required>
				
	<input name="submit" type="submit" value="bewerken">
</form>