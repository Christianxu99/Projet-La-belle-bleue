'use strict';

// Nous ajoutons un marqueur
var marker = new google.maps.Marker({
	// Nous définissons sa position (syntaxe json)
	position: {lat: lat, lng: lon},
	// Nous définissons à quelle carte il est ajouté
	map: map
});