<?php
/*
 * Example 6 - How to get the currently activated payment methods.
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
	$mollie->setApiKey("live_uoVrJ13YcDsUBYOCu8CLdYPhoAKn0s");

	/*
	 * Get the all the activated methods for this API key.
	 */
	$methods = $mollie->methods->all();

	foreach ($methods as $method)
	{
		echo '<div style="line-height:40px; vertical-align:top">';

		echo '<img src="' . htmlspecialchars($method->image->normal) . '"> ';
		echo htmlspecialchars($method->description) . ' (' .  htmlspecialchars($method->id) . ')';

		echo '</div>';
	}
}
catch (Mollie_API_Exception $e)
{
	echo "API call failed: " . htmlspecialchars($e->getMessage());
}
