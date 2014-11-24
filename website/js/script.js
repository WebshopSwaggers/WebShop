function getRandomDate(min, max){
	return Math.floor(Math.random()*(max-min)+min);
}
document.getElementById('headSlogan').innerHTML = "Bringing back arcade games since " + getRandomDate(1980, 2014);

