const loader = new Loader({
	apiKey: "AIzaSyCTsBwav1a7NOIXcxJkoldq1je1pMroC4o", 
	version: "weekly",
	// ...additionalOptions,
  });
  
  loader.load().then(async () => {
	const { Map } = await google.maps.importLibrary("maps");
  
	map = new Map(document.getElementById("map"), {
	  center: { lat: 23.350403, lng: 85.4117181 },
	  zoom: 8,
	});
  });
  
  function initMap() {
	var address = 'Sarala Birla University,Ara,Jharkhand';
  
	var geocoder = new google.maps.Geocoder();
	geocoder.geocode({ 'address': address }, function(results, status) {
	  if (status === 'OK') {
		var location = results[0].geometry.location;
		var mapOptions = {
		  zoom: 15,
		  center: location,
		  scrollwheel: false
		};
		var mapElement = document.getElementById('map');
		var map = new google.maps.Map(mapElement, mapOptions);
		new google.maps.Marker({
		  position: location,
		  map: map
		});
	  } else {
		alert('Geocode was not successful for the following reason: ' + status);
	  }
	});
  }
  
  function loadMap() {
	initMap();
  }
  