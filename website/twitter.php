<?php
	$title = "Register";
	require 'includes/config.php';
	require 'templates/header.php';

?>
<body>
	<div class="containerRegister">
		<div class="empty"></div>
		<div class="h1Title">
			<h1>Twitter</h1>
		</div>
		<div class="message">
			<?php
			if(isset($_SESSION['regError']))
			{
				echo "<p id='msgError'>".$_SESSION['regError']."</p>";
				unset($_SESSION['regError']);
			}
			elseif (isset($_SESSION['regSucces']))
			{
			 	echo "<p id='msgSuccess'>".$_SESSION['regSucces']."</p>";
				unset($_SESSION['regSucces']);
			}
			?>
		</div>
<center><a class="twitter-timeline" href="https://twitter.com/Vlambeer" data-widget-id="540805784414986240">Tweets door @Vlambeer</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></center>

	</div>
</body>
<?php require 'templates/footer.php' ?>
