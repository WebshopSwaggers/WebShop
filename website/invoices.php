<?php
$title = "Games";
require 'includes/config.php';
require 'templates/header.php';
//DB require

$inv = getUserInvoices(User::GetUserData("user_id"));
?>

<!DOCTYPE html>
<html>

<head>
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 5px;
  text-align: left;
}
</style>
</head>

<body>
<center>
  <table style="width:40%">
    <caption>Invoices</caption>
    <tr>
      <th>invoice</th>
      <th>Created</th>
      <th>show</th>
    </tr>
<?php
while($row = DB::fetch($inv))
{
  $invoice = new Invoice($row->inv_id);
  echo'<tr>';
  echo'<td>#'.$row->inv_id.'</td>';
  echo'<td>'.date("m-d-y", $invoice->getStartDate()).'</td>';
  echo'<td><a href="invoice/'.$row->inv_id.'.pdf">Show Invoice</a></td>';
  echo'</tr>';
}
?>
  </table>

</body>
</html>
