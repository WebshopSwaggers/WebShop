<?php
$title = "Gun Godz";
$cat = "gg";
require 'includes/config.php';
require 'templates/header.php';
?>
<div class="gungodzSWF">
<object width="1000" height="1000">
	<param name="movie" value="gungodz.swf">
	<embed src="<?php echo $link ?>/assets/flash/gungodz.swf" width="890" height="500">
</object>	
</div>

<div class="gg_container">
	<h1>About This Game</h1>
	<p>GUN GODZ is our upcoming polytheistic, hip-hop inspired first person shooter in the style of the classics. We’re making GUN GODZ as one of four games exclusively offered as incentive for the Kickstarter Brandon Boyer held for his website on culture and videogames, Venus Patrol.</p>
</div>

<?php
require 'templates/footer.php';
?>
