<?php
$title = "Home";
require 'includes/config.php';
require 'templates/header.php';
?>

<div class="container">
	<div class="container">
   <?php


    if(!isset($_SESSION['userdata']))
    {
		
       echo"<a href='".$link."/register'>Register</a></li>";


      if(isset($_SESSION['error']))
      {
        echo "<FONT color='white'>".$_SESSION['error']."</FONT><br>";
        unset($_SESSION['error']);
      }

      echo'<form action="'.$link.'/includes/controllers/authcontroller.php" METHOD="POST">';
      echo' <fieldset id="inputs">';
      echo'<input id="username" type="email" name="email" placeholder="Your email address" required>';
      echo'<input id="password" type="password" name="password" placeholder="Password" required>';
      echo'<input type="hidden" name="link" value="'.$_SERVER['REQUEST_URI'].'">';
      echo'</fieldset>';
      echo'<fieldset id="actions">';
      echo'<input type="submit" 		 name="login" value="Log in">';

      echo'<label><input type="checkbox" checked="checked"> Keep me signed in</label>';
      echo'</fieldset>';
      echo'</form>';
    }
//		else
//		{
//		  echo"<li style='float:right;right: 0px;position: absolute;' class='has-sub'><a href='#'><span>Welcome, ".User::GetUserData("firstname")."</span></a>";
//			echo"<ul>";
//			  echo"<li><a href='#'><span>Settings</span></a></li>";
//			  echo"<li class='last'><a href='".$link."/includes/controllers/authcontroller.php?logout'><span>Log out</span></a></li>";
//			echo"</ul>";
//		  echo"</li>";
//		}
    ?>
</div>
<script src="<?php echo $link; ?>/assets/js/walk.js"></script>
<?php require 'templates/footer.php'; ?></div>



