<?php
/*
 * Example 3 - How to show a return page to the customer.
 *
 * In this example we retrieve the order stored in the database.
 * Here, it's unnecessary to use the Mollie API Client.
 */
$con = mysqli_connect("192.168.1.228","root","Lolo1211","betaling");
$sql = $con->query("SELECT * FROM betalingen WHERE orderid = '".$_GET["order_id"]."'");
$row = mysqli_fetch_object($sql);

$status = $row->status;
define("IN_INDEX", true);
/*
 * Determine the url parts to these example files.
 */
$protocol = isset($_SERVER['HTTPS']) && strcasecmp('off', $_SERVER['HTTPS']) !== 0 ? "https" : "http";
$hostname = $_SERVER['HTTP_HOST'];
$path     = dirname(isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : $_SERVER['PHP_SELF']);

if($status == "paid")
{
$_SESSION['paid'] = 1;
echo "betaald!";
}
else
{
?>
De betaling is mislukt!<br>
<a href="http://yor-game.nl">Klik hier om weer naar Yor-Game te gaan!</a>
<?php
}



/*
 * NOTE: This example uses a text file as a database. Please use a real database like MySQL in production code.
 */
function database_read ($order_id)
{
	$order_id = intval($order_id);
	$database = dirname(__FILE__) . "/orders/order-{$order_id}.txt";

	$status  = @file_get_contents($database);

	return $status ? $status : "unknown order";
}
function database_write ($order_id, $status)
{
	$order_id = intval($order_id);
	$database = dirname(__FILE__) . "/orders/order-{$order_id}.txt";

	file_put_contents($database, $status);
}
