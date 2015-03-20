// When the window has finished loading create our google map below
// google.maps.event.addDomListener(window, 'load', init);
$(window).load(function(){
	map.init();
})

var map = {

	init:function() {
	// Basic options for a simple Google Map
	// For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
	var mapOptions = {
		// How zoomed in you want the map to start at (always required)
		zoom : 16,

		// The latitude and longitude to center the map (always required)
		center : new google.maps.LatLng(41.990849, 21.440495),
		scrollwheel : false,
		panControl : false,
		zoomControl : false,
		streetViewControl : false,
		mapTypeControl : false,
		// How you would like to style the map.
		styles : [{
			"featureType" : "road.arterial",
			"elementType" : "geometry.fill",
			"stylers" : [{
				"hue" : "#ff8000"
			}, {
				"gamma" : 0.86
			}, {
				"color" : "#CD5A01"
			}, {
				"visibility" : "on"
			}, {
				"invert_lightness" : true
			}]
		}, {
			"stylers" : [{
				"invert_lightness" : true
			}, {
				"hue" : "#ff8000"
			}, {
				"saturation" : -6
			}, {
				"lightness" : -21
			}, {
				"weight" : 2
			}, {
				"visibility" : "on"
			}]
		}, {
			"featureType" : "road.local",
			"elementType" : "geometry.fill",
			"stylers" : [{
				"color" : "#CD5A01"
			}, {
				"hue" : "#ff8000"
			}, {
				"gamma" : 0.86
			}, {
				"visibility" : "on"
			}]
		}]
	};

	// Get the HTML DOM element that will contain your map
	// We are using a div with id="map" seen below in the <body>
	var mapElement = $('#map')[0];
	var base_url = $('#base_url').val();
	console.log(base_url);
// http://localhost/ICS_Engineering/
	// Create the Google Map using our element and options defined above
	var map = new google.maps.Map(mapElement, mapOptions);
	var image = base_url + 'assets/images/mapicon.svg';
	// Let's also add a marker while we're at it
	var marker = new google.maps.Marker({
		position : new google.maps.LatLng(41.991129,21.440031),
		map : map,
		icon : image,
		title : 'ICS!'
	});
}
}