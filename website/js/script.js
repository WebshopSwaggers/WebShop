var apikey = "e80f8937d3736bd5034b5240d9836c3cbec07fea";
var baseUrl = "http://www.giantbomb.com/api";
console.log('lol');
// construct the uri with our apikey
var GamesSearchUrl = baseUrl + '/search/?api_key=' + apikey + '&format=json';
var query = "Batman";

$(document).ready(function() {

	// send off the query
	$.ajax({
		url: GamesSearchUrl + '&query=' + encodeURI(query),
		dataType: "json",
		success: searchCallback
	});


	// callback for when we get back the results
	function searchCallback(data) {
		$('body').append('Found ' + data.total + ' results for ' + query);
		var games = data.game;
		$.each(games, function(index, game) {
			$('body').append('<h1>' + game.name + '</h1>');
			$('body').append('<p>' + game.description + '</p>');
			console.log(game.description);
			$('body').append('<img src="' + game.posters.thumbnail + '" />');
		});
	}
});
