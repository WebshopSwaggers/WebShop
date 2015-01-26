<?php
$title = "Serious Sam";
$cat = "ss";
require 'includes/config.php';
require 'templates/header.php';
require 'templates/header_ss.php';
?>

<div class="ss_container">
<div class="ss_bomb">
	<img src="assets/images/ss_bomb.png" class="shakeimage" onMouseover="init(this);rattleimage()" onMouseout="stoprattle(this);top.focus()" onClick="top.focus()">
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
<div class="containerserioussam">
	<div class="h1Title">
		<h1>About this Game</h1>
	</div>

	<?php
	$homepage = file_get_contents('http://www.giantbomb.com/api/search/?api_key=e80f8937d3736bd5034b5240d9836c3cbec07fea&format=json&query=Serious Sam.');
	$code = json_decode($homepage,true);
	echo "<p>". $code['results'][0]['description']. "</p>";
	?>
</div>

<script src="js/script.js" charset="utf-8">
