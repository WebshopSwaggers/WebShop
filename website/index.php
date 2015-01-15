<?php
$title = "Home";
require 'includes/config.php';
require 'templates/header.php';
?>

<div class="container">

	<div class="image_slider">
		<div class="mask">
			<ul class="images">
				<li>
					<img width="940" src="http://upload.wikimedia.org/wikipedia/commons/thumb/9/97/The_Earth_seen_from_Apollo_17.jpg/270px-The_Earth_seen_from_Apollo_17.jpg" />
				</li>
				<li>
					<img width="940" src="http://www.mallorcaweb.net/masm/Planetas/Jupiter.jpg" />
				</li>
				<li>
					<img width="940" src="http://upload.wikimedia.org/wikipedia/commons/thumb/e/e1/FullMoon2010.jpg/280px-FullMoon2010.jpg" />
				</li>
				<li>
					<img width="940" src="http://static.ddmcdn.com/gif/sun-update-1.jpg" />
				</li>
				<li>
					<img width="940" src="http://upload.wikimedia.org/wikipedia/commons/thumb/0/06/Neptune.jpg/240px-Neptune.jpg" />
				</li>
			</ul>
		</div>

		<ul class="triggers">
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>

		<span class="control prev"></span>
		<span class="control next"></span>

	</div>

<div class="news">

	<div class="h1Title">
		<h1>News</h1>
	</div>
	<div class="contentContainer">
		<p>
		As you might’ve noticed, the Nuclear Throne was added to the game earlier this weekend. It took us 33 weekly updates to take the game jam prototype to where it is now – and you can now reach the titular throne after you and your mutant complete the gruelling fight to the Palace from the campfire.

		Creating this final moment of the game threw a major wrench into our LIVE STREAMING and even led to some tension in the team about our approach to hiding our work on this reveal. Some of us wanted the Throne to be perfect before we revealed it, while some of us felt we should develop it completely in the open. We eventually agreed upon something in the middle: as soon as the Throne worked, we’d throw it in.

		This does mean that now we can finally get back to not having secrets from you all, and that’s quite a relief. Sure, we’ll hide some thing from the livestream for fun every now and then, like the Frozen City Bandits last week, but it won’t be something that takes months anymore. We thank you for your patience while we learned that lesson.

		As a little thank-you, we want to show you some of the things that we hid from you during development now that it’s all there.</p>
	</div>

	<div class="contentContainer">
		<p>
			"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
		</p>
	</div>
</div>


<script src="<?php echo $link; ?>/assets/js/walk.js"></script>
<?php require 'templates/footer.php'; ?></div>
