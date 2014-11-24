$(document).ready(function(){
	/* This code is executed after the DOM has been completely loaded */
	
	$('nav a,footer a.up').click(function(e){
										  
		// If a link has been clicked, scroll the page to the link's hash target:
		
		$.scrollTo( this.hash || 0, 1500);
		e.preventDefault();
	});


	// Demo
	
	$('#backToTheTut').hover(function(){
		$(this).stop().animate({'left':-20},'slow');
	},function(){
		$(this).stop().animate({'left':-410},'slow');
	});
	
	setTimeout(function(){$('#backToTheTut').animate({'left':-410},'slow');},2000);
});