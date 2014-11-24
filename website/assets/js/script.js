function getRandomDate(min, max){
	return Math.floor(Math.random()*(max-min)+min);
}
document.getElementById('headerSlogan').innerHTML = "Bringing back arcade games since " + getRandomDate(1980, 2014);

$(document).ready(function(){
	/* This code is executed after the DOM has been completely loaded */

	$('nav a,footer a.up').click(function(e){

		// If a link has been clicked, scroll the page to the link's hash target:

		$.scrollTo( this.hash || 0, 1500);
		e.preventDefault();
	});

});
