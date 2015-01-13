// function getRandomDate(min, max){
// 	return Math.floor(Math.random()*(max-min)+min);
// }
// document.getElementById('headerSlogan').innerHTML = "Bringing back arcade games since " + getRandomDate(1980, 2014);

//$(document).ready(function(){
//	/* This code is executed after the DOM has been completely loaded */
//
//	$('nav a,footer a.up').click(function(e){
//
//		// If a link has been clicked, scroll the page to the link's hash target:
//
//		$.scrollTo( this.hash || 0, 1500);
//		e.preventDefault();
//	});
//
//});

function realTime(itemid, link) {

	$('#data').load(link + '/includes/scripts/iteminfo.php?itemid=' + itemid);

	popup('popUpDiv');
};

function slideSwitch() {  //Functie is slideshow
    var active = $('#slideshow IMG.active');  //Eerste foto word actief
    if ( active.length == 0 ) active = $('#slideshow IMG:last');  //Nadat de eerste foto actief is geweest krijg hij last mee van last active
    var next =  active.next().length ? active.next() //Hij gaat naar de volgende afbeelding
        : $('#slideshow IMG:first');  //
    $(active).addClass('last-active'); //Hij voegt last active toe aan je laatst gebruikte foto

    next.css({opacity: 0.0}) //Helderheid is niks
        .addClass('active') //De eerste afbeelding word active
        .animate({opacity: 2.0}, 5000, function() { // Na 1.0 opacity is de afbeelding helemaal verhelderd zodat hij naar de volgende afbeelding gaat.
            active.removeClass('active last-active'); // hij verwijderd last active.
            slideSwitch();// slidshow sluiten
        });
}

slideSwitch();
