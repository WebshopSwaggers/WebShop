<?php
$title = "Serious Sam";
$cat = "ss";
require '../includes/config.php';
require '../templates/header.php';
require './headers/header_ss.php';
?>

<div class="ss_container">
<div class="ss_bomb">
	<img src="../assets/images/ss_bomb.png" class="shakeimage" onMouseover="init(this);rattleimage()" onMouseout="stoprattle(this);top.focus()" onClick="top.focus()">
</div>

<!-- JQuery for Shake -->

<style>
.shakeimage{
position:relative
}
</style>
<script language="JavaScript1.2">

/*
Shake image script (onMouseover)-
© Dynamic Drive (www.dynamicdrive.com)
For full source code, usage terms, and 100's more DHTML scripts, visit http://dynamicdrive.com
*/

//configure shake degree (where larger # equals greater shake)
var rector=4

///////DONE EDITTING///////////
var stopit=0
var a=1

function init(which){
stopit=0
shake=which
shake.style.left=0
shake.style.top=0
}

function rattleimage(){
if ((!document.all&&!document.getElementById)||stopit==1)
return
if (a==1){
shake.style.top=parseInt(shake.style.top)+rector+"px"
}
else if (a==2){
shake.style.left=parseInt(shake.style.left)+rector+"px"
}
else if (a==3){
shake.style.top=parseInt(shake.style.top)-rector+"px"
}
else{
shake.style.left=parseInt(shake.style.left)-rector+"px"
}
if (a<4)
a++
else
a=1
setTimeout("rattleimage()",50)
}

function stoprattle(which){
stopit=1
which.style.left=0
which.style.top=0
}
</script>

<!-- Container -->
<h1>About This Game</h1>
<p>The legendary Serious Sam reloads and rearms in an explosive, turn-based RPG developed by indie developer Vlambeer (Super Crate Box, Ridiculous Fishing). Serious Sam: The Random Encounter follows Sam and his band of oddball mercenaries as they battle across a pixilated world teeming chaotic battles, hordes of bizarre creatures, and mysterious secrets. Choose your weapons and take aim at the most random Serious Sam adventure yet! </p>
<br>
<h2>Serious Sam Indie Series</h2>
<p>The Serious Sam Indie Series is an extraordinary program launched by Croteam and Devolver Digital to partner with gaming's most creative independent developers and design radically unique Serious Sam games in a variety of styles and genres. </p>
<br>
<h2>Key Feautures:</h2>
<ul>
	<li>Turn-Based Awesome: Battle across three worlds of pandemonium with Serious Sam and his band of quirky commandos as they clash with legions of relentless creatures hell-bent on ruining your day. Choose your weapons and prepare for an absolute onslaught of merciless enemies charging from every direction. </li>
	<li>Extraordinary Visual Design: Behold the pixilated brutality of Serious Sam’s struggle against evil in glorious retro-styled graphics. Visit the exotic locals of Egypt and dangerous caverns overrun by Mental’s twisted horde. Battle by land or take on all-new aquatic variations of classic Serious Sam baddies in underwater skirmishes unlike anything Sam has faced before! </li>
	<li>Serious Strategy: No magic here, son. Select from a variety of dynamic items to increase your party’s stats, toss out some Headless Kamikaze bait, or bring everything to a devastating halt with the all-powerful Serious Bomb. </li>
	<li>Challenge Mode: Take on a never-ending wave of Mental’s most fearsome minions and attempt to post the best score to win the admiration of your friends and family. </li>
</ul>
<br>
<p>Serious Sam: The Random Encounter was created by Dutch indie duo Rami Ismail & Jan Willem Nijman and features crisp pixel art by Roy Nathan de Groot & pixel-animator Paul Veer. The game had its chiptune music created by Alex Mauer and the trailers were produced by Canadian video-magician Kert Gartner.</p>
</div>

<?php
require '../templates/footer.php';
?>
