<?php
	$title = "Register";
	require 'includes/config.php';
	require 'templates/header.php';
?>
<body>
	<div class="containerRegister">
		<div class="empty"></div>
		<div class="h1Title">
			<h1>Login</h1>
		</div>
		<?php


    if(!isset($_SESSION['userdata']))
    {
		
       echo"";


      if(isset($_SESSION['error']))
      {
        echo "<div class='form'><FONT color='black'>".$_SESSION['error']."</FONT></div><br>";
        unset($_SESSION['error']);
      }

      echo'<form action="'.$link.'/includes/controllers/authcontroller.php" METHOD="POST">';
      echo'<div class="form"><br><br><fieldset id="inputs">';
      echo'<label class="formLabel" for="username"></label><input class="formInput" id="loginmargin" type="email" name="email" placeholder="Your email address" required>';
      echo'<label class="formLabel" for="password"></label><input class="formInput" id="password" type="password" name="password" placeholder="Password" required>';
      echo'<input type="hidden" name="link" value="'.$_SERVER['REQUEST_URI'].'">';
      echo'</fieldset>';
      echo'<fieldset id="actions">';
      echo'<label><input id="logincheck" type="checkbox" checked="checked"> Keep me signed in</label><br>';
      echo'<input  id="formSubmit2" type="submit" name="login" value="Log in">';
       

     
      echo'</fieldset></div>';
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
</body>
<?php require 'templates/footer.php' ?>
