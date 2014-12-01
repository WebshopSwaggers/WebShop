<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title><?php echo "Vlambeer | " . $title; ?></title>
    <link rel="stylesheet" type="text/css" href="assets/styles/style.css"/>
    <link rel="stylesheet" type="text/css" href="assets/styles/header.css"/>
</head>
<body>

<section id="page"> <!-- Defining the #page section with the section tag -->

<article id="article1"> <!-- The new article tag. The id is supplied so it can be scrolled into view. -->
<div class="header">
	<img src="assets/images/vlambeer_logo.gif" alt="Vlambeer logo">
	<h1>Vlambeer</h1>
	<p id="headerSlogan"></p>
<?php
if(!isset($_SESSION['userdata']))
{
  echo'<div class="coming-soon">';
    if(isset($_SESSION['error']))
    {
      echo "<FONT color='white'>".$_SESSION['error']."</FONT>";
      unset($_SESSION['error']);
    }
    echo'<form action="includes/controllers/authcontroller.php" METHOD="POST">';
      echo'<input type="email" name="email" placeholder="E-mail">';
      echo'<input type="password" name="password" placeholder="password" required>';
      echo'<input type="hidden" name="link" value="'.$_SERVER['REQUEST_URI'].'">';
      echo'<input type="submit" name="login" value="Sign In">';
    echo'</form>';
  echo'</div>';
}
else
{
  echo "<div class='header-login'>";
  echo "<FONT color='white'>Hello ".User::GetUserData("firstname").", <br></font>";
  echo "<FONT color='white'>You have 0 items in your shopping car</font>";
  echo "</div>";
}
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
<div class="menu">
  <div class="menuit">
    <div style="float:left;
    padding: 11px;">Vlambeer Webshop</div>
    <a class="menuitems" href="./index.php"><div class="menut">Home</div></a>
    <a class="menuitems" href="./store.php"><div class="menut">Store</div></a>
    <a class="menuitems" href="./store_music.php"><div class="menut">Music Store</div></a>
    <a class="menuitems" href="#"><div class="menut">Contact</div></a>
    <a class="menuitems" href="./invoice/1.pdf"><div class="menut">Invoice (test)</div></a>
    <?php
    if(isset($_SESSION['userdata']))
    {
       echo'<div class="menuitems right"><a class="menut" href="includes/controllers/authcontroller.php?logout">Logout</a></div>';
    }
    ?>
  </div>
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
