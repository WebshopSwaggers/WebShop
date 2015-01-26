<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title><?php echo "Vlambeer | " . $title; ?></title>
    <link rel="stylesheet" href="<?php echo $link; ?>/assets/styles/style.css"/>
    <link rel="stylesheet" href="<?php echo $link; ?>/assets/styles/header.css"/>
    <link rel="stylesheet" href="<?php echo $link; ?>/assets/styles/vlam_header.css"/>
    <link rel="stylesheet" href="<?php echo $link; ?>/assets/styles/menu.css"/>
    <link rel="stylesheet" href="<?php echo $link; ?>/assets/styles/footer.css"/>
    <link rel="stylesheet" href="<?php echo $link; ?>/slick/slick.css"/>
    <script src="<?php echo $link; ?>/assets/js/jquery-2.1.3.min.js"></script>
    <script src="<?php echo $link; ?>/assets/js/script.js"></script>
    <script src="<?php echo $link; ?>/assets/js/popup.js"></script>
    <script src="<?php echo $link; ?>/assets/js/imageSlider.js"></script>
    <script type="text/javascript" src="slick/slick.min.js"></script>
    <meta name="viewport" content="width=device-width, initial scale=1.0">
</head>
<body>
<div class="header">
  <div class="header_animation">
    <?php
    echo'<nav>';


      if(!isset($_SESSION['userdata']))
      {
        if(!isset($_SESSION['key']))
        {
          $_SESSION['key'] = rand(1,99999);
        }
        $userid = $_SESSION['key'];
      }
      else
      {
        $userid = User::GetUserData("user_id");
      }

         $countsql = DB::query("SELECT user_id,item_id,count FROM cms_cart WHERE user_id = '".$userid."'") OR DIE(mysqli_error(DB::$con));

      $superitems = 0;
      $bedrag = 0;
      if(DB::num_rows($countsql) == 0)
      {
        $bedrag = 0;
        $superitems = 0;
      }
      else
      {
      while($count = DB::fetch($countsql))
      {
        $item = new Item($count->item_id);
        $bedrag += ($item->getPrice() * $count->count);
        $superitems += $count->count;
      }
    }
      echo "<div class='cart_header'>";
        if(isset($_SESSION['userdata']))
        {
           echo "<FONT color='white'>Hello ".User::GetUserData("firstname").", <br></font>";
        }
        else
        {
          echo "<FONT color='white'>Hello, <br></font>";
          }
            echo "<FONT color='white'>You have ".$superitems." items in your <a href='cart.php' style='color:white;'> shopping cart</a></font>";
            echo "<br>";
            echo "<FONT color='white'>A total of: &euro; ".number_format($bedrag, 2, ',', ' ')."</font>";
              echo "<br>";

              if(isset($_SESSION['userdata']))
              {
              echo "<a href='invoices.php' style='color:white;'>click here to show your invoices</a>";
              }
      echo "</div><br>";



            ?>
<div id="headerSlogan" style="
color: black;
top: 80px;
position: relative;">

</div>
    </div>
</div>

<div class="navbar"></div>
<div class="nav_balk">
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="store.php">Games</a></li>
        <li><a href="store_music.php">Music</a></li>
        <li><a href="store_clothes.php">Clothes</a></li>
        <?php
        if(!isset($_SESSION['userdata']))
        {
        echo'<li><a href="login.php">Login</a></li>';
        echo'<li><a href="register.php">Register</a></li>';
        }
        else
        {

          echo'<li><a href="twitter.php">Tweets</a></li>';
          echo'<li><a href="includes/controllers/authcontroller.php?logout">Log out</a></li>';
        }
        ?>
    </ul>
</div>
