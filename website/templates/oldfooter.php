		</section> <!-- Closing the #page section -->

		<!-- JavaScript Includes -->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
		<script src="<?php echo $link; ?>/assets/js/jquery.scrollTo-min.js"></script>
		<script src="assets/js/recomendGaleryScript.js"></script>	
		<script src="<?php echo $link; ?>/fancybox/jquery.fancybox-1.3.1.js"></script>
		<link rel="stylesheet" href="<?php echo $link; ?>/fancybox/jquery.fancybox-1.3.1.css" media="screen">
		<script src="<?php echo $link; ?>/assets/js/script.js"></script>
		<script>

		


		$(document).ready(function(){
			$('.trigger').click(function(){
				$(this).next('#login-content').slideToggle();
				$(this).toggleClass('active');

				if ($(this).hasClass('active')) $(this).find('span').html('&#x25B2;')
					else $(this).find('span').html('&#x25BC;')
					})
				});
		</script>
	</div>
</body>
<div class="footer">
		<div class="clear"></div>
	<div class="contact">
		<div class="contactTop"><strong>VLAMBEER IS A DUTCH INDEPENDENT GAME STUDIO</strong>
		<br>Made up of Rami Ismail and Jan Willem Nijman, bringing back arcade games since 1764.
		</div>
		<br>info@vlambeer.com | Neude 5, 3512 AD, Utrecht, the Netherlands | +31621206363
	</div>
	<div class="owners">
		<div class="teamRami">
			<div class="ramiPic">
				<img src="<?php echo $link; ?>/assets\images\team_rami.png" alt="team_rami">
			</div>
			<strong>Rami Ismail</strong>
			<br>
			<i>Business and Development</i>
			<br>
			rami@vlambeer.com
			<br>
			<a href="http://twitter.com/tha_rami">@tha_rami</a>
			<br>
		</div>
		<div class="teamJw">
			<div class="jwPic">
				<img src="<?php echo $link; ?>/assets\images\team_jw.png" alt="team_jw">
			</div>
			<strong>Jan Willem Nijman</strong>
			<br>
			<i>Game Design</i>
			<br>
			jw@vlambeer.com
			<br>
			<a href="http://twitter.com/jwaaaap">@jwaaaap</a>
			<br>
		</div>
	</div>
	<div class="friends">
		<strong>FRIENDS OF VLAMBEER</strong>
	    <ul>
	    	<li>
		    	<a href="http://www.pietepiet.net/"><li>Paul Veer</li></a>
		    	<a href="http://www2.hku.nl/~roy/"><li>Roy Nathan de Groot</li></a>
		    	<a href="http://kozilek.bandcamp.com/"><li>KOZILEK</li></a>
		        <a href="http://www.stfj.net/"><li>Zach Gage</li></a>
		        <a href="http://www.aeiowu.com/"><li>Greg Wohlwend</li></a>
		    	<a href="http://www.kertgartner.com/"><li>Kert Gartner</li></a>
		    	<a href="http://www.strotch.net/"><li>Phlogiston</li></a>
		        <a href="http://www.devolverdigital.com/"><li>Devolver Digital</li></a>
		        <a href="http://www.sparpweed.nl/"><li>Sparpweed</li></a>
		        <a href="http://www.dutchgamegarden.nl/"><li>Dutch Game Garden</li></a>
                <a href="http://brandonnn.tumblr.com/"><li>Brandon Boyer</li></a>
            	<a href="http://www.bramruiter.nl/"><li>Bram Ruiter</li></a>
	    	</li>
	    </ul>
	</div>
	<div class="friends">
		<ul>
			<li>
				<a href="http://www.alexmauer.com/"><li>Alex Mauer</li></a>
		    	<a href="http://brotherandroid.110mb.com/"><li>Brother Android</li></a>
		    	<a href="http://www.thepoppenkast.com/"><li>The Poppenkast</li></a>
		    	<a href="http://www.venuspatrol.com/"><li>Venus Patrol</li></a>
		    	<a href="http://www.control-online.nl/"><li>Control Magazine</li></a>
	    	 	<a href="http://www.iimusic.net/"><li>Pause music</li></a>
            	<a href="http://notch.tumblr.com/"><li>Notch</li></a>
                <a href="http://adamatomic.com/"><li>Adam Atomic</li></a>
            	<a href="http://halfbot.com/"><li>Halfbot</li></a>
                <a href="http://www.bitcollective.ca/"><li>Bit Collective</li></a>
            	<a href="http://www.glitchhiker.com/"><li>Aardbever</li></a>
           		<strong><a href="http://www.facebook.com/Vlambeer"><li style="color:#fff;">Become friends too?</li></a></strong>
			</li>
		</ul>
	</div>
</div>
</html>
