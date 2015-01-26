<?php

require '../includes/config.php';
?>
    <?php       
                     $sql = "SELECT * FROM cms_items";
                     $query = mysqli_query($con2, $sql);
          

                     while ($row = mysqli_fetch_assoc($query)){
                     echo '<tr><td>' . $row['item_id'] .'</td>';
                     echo '<td>' . $row['name'] . '</td>';
                     echo '<td>' . $row['price'] . '</td>';
                     echo '<td>' . $row['description'] . '</td>';
                     echo '<td>' . $row['catagory'] . '</td>';
                     echo '<td><a href="setsale.php?id=' . $row['item_id'] . '">Zet op sale</a></td><tr><br>';
                }

                ?>