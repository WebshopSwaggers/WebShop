<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title><?php echo "Vlambeer | " . $title; ?></title>
    <link rel="stylesheet" href="assets/styles/style.css"/>
    <link rel="stylesheet" href="assets/styles/header.css"/>
    <link rel="stylesheet" href="assets/styles/menu.css"/>
    <script src="assets/js/popup.js"></script>
</head>
<body>

<section id="page"> <!-- Defining the #page section with the section tag -->

<article id="article1"> <!-- The new article tag. The id is supplied so it can be scrolled into view. -->
<div class="header">
	<img src="assets/images/vlambeer_logo.gif" alt="Vlambeer logo">
	<h1>Vlambeer</h1>
	<p id="headerSlogan"></p>


<?php
echo'<nav>';
if(!isset($_SESSION['userdata']))
{


    if(isset($_SESSION['error']))
    {
      echo "<FONT color='white'>".$_SESSION['error']."</FONT><br>";
      unset($_SESSION['error']);
    }
    echo'<ul>';
      echo'<li id="login">';
        echo'<a id="login-trigger" href="#">';
          echo'Log in <span>▼</span>';
          echo'</a>';
          echo'<div id="login-content">';
            echo'<form action="includes/controllers/authcontroller.php" METHOD="POST">';
              echo' <fieldset id="inputs">';
                echo'<input id="username" type="email" name="email" placeholder="Your email address" required>';
                echo'<input id="password" type="password" name="password" placeholder="Password" required>';
                echo'<input type="hidden" name="link" value="'.$_SERVER['REQUEST_URI'].'">';
                echo'</fieldset>';
                echo'<fieldset id="actions">';
                  echo'<input type="submit" id="submit" name="login" value="Log in">';
                  echo'<label><input type="checkbox" checked="checked"> Keep me signed in</label>';
                  echo'</fieldset>';
                  echo'</form>';
          echo'</div>';
          echo'</li>';
          echo'<li id="signup">';
            echo'<a href="">Sign up FREE</a>';
            echo'</li>';
            echo'</ul>';
}
else
{
  $countsql = DB::query("SELECT user_id,item_id,count FROM cms_cart WHERE user_id = '".User::GetUserData("user_id")."'");
  $superitems = 0;
  $bedrag = 0;
  while($count = DB::fetch($countsql))
  {
    $item = new Item($count->item_id);
    $bedrag += ($item->getPrice() * $count->count);
    $superitems += $count->count;
  }
  echo "<div class='header-login'>";
  echo "<FONT color='white'>Hello ".User::GetUserData("firstname").", <br></font>";
  echo "<FONT color='white'>You have ".$superitems." items in your shopping cart</font>";
  echo "<br>";
  echo "<FONT color='white'>A total of: &euro; ".number_format($bedrag, 2, ',', ' ')."</font>";
  echo "</div><br>";
}

echo'</nav>';
?>

</div>
<!-- <div class="nav">
	<ul>
		<li><a href="#article1">Home</a></li>
		<li><a href="#article2">News</a></li>
		<li><a href="#article3">Contact</a></li>
		<li><a href="store.php">Store</a></li>
	</ul>
</div> -->
</article>
<!-- Article 1 end -->
<div id='cssmenu'>
  <ul>
    <li class='<?php if($title == "Home") { echo "active"; } ?>'><a href='./index'><span>Home</span></a></li>
    <li class='<?php if($title == "Games" || $title == "Music" || $title == "Clothes") { echo "active"; } ?> has-sub'><a href='#'><span>Products</span></a>
      <ul>
        <li><a href='./store'><span>Games</span></a></li>
        <li><a href='./store_music'><span>Music</span></a></li>
        <li class='last'><a href='./store_clothes'><span>Clothes</span></a></li>
      </ul>
    </li>
    <li class='has-sub'><a href='#'><span>About</span></a>
      <ul>
        <li><a href='#'><span>Company</span></a></li>
        <li class='last'><a href='#'><span>Contact</span></a></li>
      </ul>
    </li>
    <?php
    if(isset($_SESSION['userdata']))
    {
       echo"<li><a href='#'><span>Contact</span></a></li>";
       echo"<li class='last'><a href='includes/controllers/authcontroller.php?logout'><span>Log out</span></a></li>";
    }
    else
    {
      echo"<li class='last'><a href='#'><span>Contact</span></a></li>";
    }
    ?>
  </ul>
</div>


<div class="container-img">
<div class="image_slider">
	<figure id="slideshow">

    <img src="assets/images/header-510x186.png" class="active" alt="banner-radius">
    <img src="assets/images/Logo600x4001.png" alt="banner-radius">
    <img src="assets/images/header-510x186.png" alt="banner-radius">
    <img src="assets/images/Logo600x4001.png" alt="banner-radius">

	</figure>
</div>


</div>
