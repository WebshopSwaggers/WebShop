<?php include'includes/config.php'?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>zoekfunctie resultaat</title>
     <link rel="stylesheet" href="style.css">
</head>
<body>
  <div id='header_zoekpagina'>
        <form action='search.php' method='POST'>
            <input type='text' name='k' id='search_veld' size='10' />
            <input type='submit' id='search_icon' value=''>
            <input type="button" id='back_button_home' value="Terug naar home" onclick="window.location.href='index.php'" />
        </form> 
           
    <hr />
    
    <?php
        $k = $_POST['k'];
        $i = 0;
        $terms = explode(",", $k);
        $sql = DB::query("SELECT * FROM cms_items WHERE name OR price OR description OR image OR catagory OR tags LIKE '%".$k."%'") OR  die ('query werkt niet.');
       

       
        echo '<h1> Zoekresultaten: </h1>';

       
       
        
        
        // connect
        
        
        $numrows = DB::num_rows($sql);
        
        if ( $numrows > 0) {
            while ($row = DB:: fetch_assoc($sql) ) 
            {
//                echo '<a href="">' . $row['name'] .  '</a>';
//                echo '<a href="">' . $row['price'] .  '</a>';
//                echo '<a href="">' . $row['description'] .  '</a>';
//                echo '<a href="">' . $row['image'] .  '</a>';
//                echo '<a href="">' . $row['catagory'] .  '</a>';
//                echo '<a href="">' . $row['tags'] .  '</a>';
//                echo '<br>';
			echo'<div class="itemHolder">';
				echo'<div class="itemPic">';
					echo'<img class="bottom" src="'.$row['image'].'" alt="itemPlaceholder">';
			?>
		<img class="top" onclick="realTime('<?php echo $row['item_id'];?>', '<?php echo $dir; ?>', 0);" src="assets/images/buyme.png">
		<?php
		echo'</div>';

				echo'<div class="itemTitle">';
					echo'<strong>'.$row['name'].'</strong>';
				echo'<br>';
				echo'</div>';

				echo'<div class="itemDesc">';
						echo'<p>'.$row['description'].'</p>';
				echo'</div>';

				echo'<div class="itemPrice">';
					echo'<i>Price: &euro;'.$row['price'].'</i>';
				echo'</div>';
			echo'</div>';

            }            
        }
        else {
            echo "No results found for \"<b>$k</b>\"";
        }
        // disconnect  
    ?>
</body>
</html>