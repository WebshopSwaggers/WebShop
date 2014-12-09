<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title><?php echo "Vlambeer | " . $title; ?></title>
    <link rel="stylesheet" href="<?php echo $link; ?>/assets/styles/style.css"/>
    <link rel="stylesheet" href="<?php echo $link; ?>/assets/styles/header.css"/>
    <link rel="stylesheet" href="<?php echo $link; ?>/assets/styles/menu.css"/>
    <script src="<?php echo $link; ?>/assets/js/popup.js"></script>
</head>
<body>

<section id="page"> <!-- Defining the #page section with the section tag -->

<article id="article1"> <!-- The new article tag. The id is supplied so it can be scrolled into view. -->
<div class="header">
	<img src="<?php echo $link; ?>/assets/images/vlambeer_logo.gif" alt="Vlambeer logo">
	<h1>Vlambeer | <?php echo $title ?></h1>
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
    <li class='<?php if($title == "Home") { echo "active"; } ?>'><a href='<?php echo $link; ?>/index'><span>Home</span></a></li>
    <li class='<?php if($title == "Games" || $title == "Music" || $title == "Clothes") { echo "active"; } ?> has-sub'><a href='#'><span>Products</span></a>
      <ul>
        <li><a href='<?php echo $link; ?>/store'><span>Games</span></a></li>
        <li><a href='<?php echo $link; ?>/store_music'><span>Music</span></a></li>
        <li class='last'><a href='<?php echo $link; ?>/store_clothes'><span>Clothes</span></a></li>
      </ul>
    </li>
    <li class='has-sub'><a href='#'><span>About</span></a>
      <ul>
        <li><a href='#'><span>Company</span></a></li>
        <li class='last'><a href='#'><span>Contact</span></a></li>
      </ul>
    </li>
    <li class='last'><a href='#'><span>Contact</span></a></li>
    <?php


    if(!isset($_SESSION['userdata']))
    {

       echo"<li style='float:right;'><a href='<?php echo $link; ?>/register'>Register</a></li>";
       echo"<li style='float:right;' class='trigger has-sub'><a href='#'>Login <span>&#x25BC;</span></a></li>";


      if(isset($_SESSION['error']))
      {
        echo "<FONT color='white'>".$_SESSION['error']."</FONT><br>";
        unset($_SESSION['error']);
      }

      echo'<div id="login-content">';
      echo'<form action="'.$link.'/includes/controllers/authcontroller.php" METHOD="POST">';
      echo' <fieldset id="inputs">';
      echo'<input id="username" type="email" name="email" placeholder="Your email address" required>';
      echo'<input id="password" type="password" name="password" placeholder="Password" required>';
      echo'<input type="hidden" name="link" value="'.$_SERVER['REQUEST_URI'].'">';
      echo'</fieldset>';
      echo'<fieldset id="actions">';
      echo'<input type="submit" id="submit2" name="login" value="Log in">';
      echo'<label><input type="checkbox" checked="checked"> Keep me signed in</label>';
      echo'</fieldset>';
      echo'</form>';
      echo'</div>';
    }
    else
    {
      echo"<li style='float:right;right: 0px;position: absolute;' class='has-sub'><a href='#'><span>Welcome, ".User::GetUserData("firstname")."</span></a>";
        echo"<ul>";
          echo"<li><a href='#'><span>Settings</span></a></li>";
          echo"<li class='last'><a href='<?php echo $link; ?>/includes/controllers/authcontroller.php?logout'><span>Log out</span></a></li>";
        echo"</ul>";
      echo"</li>";
    }
    ?>
  </ul>
</div>


<div class="container-img">
<?php
$item = Item::getItems("games");
$count = count($item);
$i= 0;
for($count; $i < $count; $i++)
{
?>

<div class="imgInfo">
	<div class="imgInfoTitle">
		<p><?php echo $item[$i]['item_name']; ?></p>
	</div>
	<div class="imgInfoDesc">
		<p><?php echo $item[$i]['item_description']; ?></p>
	</div>
</div>
<?php
}
?>
<div class="image_slider">
	<figure id="slideshow">

    <img src="<?php echo $link; ?>/assets/images/header-510x186.png" class="active" alt="banner-radius">
    <img src="<?php echo $link; ?>/assets/images/Logo600x4001.png" alt="banner-radius">

	</figure>

</div>
</div>
