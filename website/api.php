<?php
$json = file_get_contents("http://www.giantbomb.com/api/search/?api_key=9ae39b3b6550e22e4dbab6ac9132bfc86f969b06&format=json&resources=game&limit=10&query=COD");
$array = json_decode($json, true);

echo "<pre>";
print_r($array);
echo "</pre>";
