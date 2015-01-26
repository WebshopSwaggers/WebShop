 <?php

require '../includes/config.php';
?>


  <?php 
if ( isset($_GET['id']) )
    {
      $id = $_GET['id'];
      $sql = "UPDATE cms_items SET sales=1 WHERE item_id = '$id'";

      if (!$query = mysqli_query($con2, $sql)) {
        echo 'delete query is niet goed gegaan';
        die();
      }
      header('location: sales.php?');
    }
?>