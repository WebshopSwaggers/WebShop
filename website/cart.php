<?php
ini_Set("display_errors","On");
$title = "Home";
$noheader=1;
require 'includes/config.php';
require 'templates/header.php';

?>
<div class="container">

<?php
if(!isset($_SESSION['userdata']))
{
  header("location: ./index.php");
}

if(isset($_GET['delete']))
{
  if(!empty($_GET['itemid']))
  {
    $itemid = Security($_GET['itemid']);
    DB::query("DELETE FROM cms_cart WHERE item_id = '" . $itemid . "' AND user_id = '".User::GetUserData("user_id")."'") OR DIE (mysqli_error(DB::$con));
  }
}

echo "<h2><a href='./index'>Keer terug</a></h2>";

$bedrag = 0;
$sql = DB::query("SELECT * FROM cms_cart WHERE user_id = '".User::GetUserData("user_id")."'");
$count = DB::num_rows($sql);

if($count == 0)
{
die("Winkelwagen is leeg");
}

while($row = DB::fetch($sql))
{
  $item = new Item($row->item_id);
  echo "<b>Item name: " . $item->getName() . "</b>";
  echo "<br>";
  echo "<br>";
  echo "Item Price excl. btw: &euro;" . $item->getPrice();
  echo "<br>";
  echo "Hoeveelheid: " . $row->count;
  echo "<br>";
  echo "<a href='?delete=yes&itemid=" . $row->item_id . "'>Delete</a>";
  echo "<br>";
  echo "<br>";
  $bedrag += ($item->getPrice() * $row->count);
}
$btw =($bedrag / 100) * 21;
echo "<br>";
echo "<br>";
echo "Subtotaal: &euro;". number_format($bedrag, 2, ',', ' ');
echo "<br>";
echo "BTW (21%): ". number_format($btw, 2, ',', ' ');
echo "<br>";
echo "Totaal: ". number_format(($bedrag + $btw), 2, ',', ' ');
?>

</div>
<?php require 'templates/footer.php'; ?></div>
