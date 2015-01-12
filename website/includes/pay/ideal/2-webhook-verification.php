<?php
/*
 * Example 2 - How to verify Mollie API Payments in a webhook.
 */
require_once dirname(__FILE__) . "/../src/Mollie/API/Autoloader.php";

try
{
	/*
	 * Initialize the Mollie API library with your API key.
	 *
	 * See: https://www.mollie.nl/beheer/account/profielen/
	 */
	$mollie = new Mollie_API_Client;
	$mollie->setApiKey("test_2VY93krXHnxXDrmE7qu1sToEiMQedl");

	/*
	 * Retrieve the payment's current state.
	 */
	$payment  = $mollie->payments->get($_POST["id"]);
	$order_id = $payment->metadata->order_id;

	/*
	 * Update the order in the database.
	 */
	database_write($order_id, $payment->status);
	$con = mysqli_connect("192.168.1.228","root","Lolo1211","betaling");
	$con->query("UPDATE betalingen set status = '".$payment->status."' WHERE orderid = '".$order_id."'");

	if ($payment->isPaid() == TRUE)
	{
		/*
		 * At this point you'd probably want to start the process of delivering the product to the customer.
		 */
	}
	elseif ($payment->isOpen() == FALSE)
	{
		/*
		 * The payment isn't paid and isn't open anymore. We can assume it was aborted.
		 */
	}
}
catch (Mollie_API_Exception $e)
{
	echo "API call failed: " . htmlspecialchars($e->getMessage());
}


/*
 * NOTE: This example uses a text file as a database. Please use a real database like MySQL in production code.
 */
function database_write ($order_id, $status)
{
	$order_id = intval($order_id);
	$database = dirname(__FILE__) . "/orders/order-{$order_id}.txt";

	file_put_contents($database, $status);
}
