<?php
ini_Set("display_errors","On");
$ip = "10.2.97.";

$i = 0;

for($i; $i < 20; $i++)
{
$_GET['ip'] = $ip.$i.":80";
$array=explode(':',$_GET['ip']);
$fp = @fsockopen($array[0], $array[1], $errno, $errstr,1);
if($fp)
{
  $status = "<font color=\"green\">Online</font>";
  fclose($fp); // hier sluiten omdat in het andere geval geen verbinding is opgebouwd
}
else
{
  $status = "<font color=\"red\">Offline</font>";
}
echo $ip.$i. " = " . $status."<br>";
}
?>
dd
