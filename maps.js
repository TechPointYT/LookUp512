function initMap() {
	const austin = { lat: 30.2672, lng: -97.7431 };

	const map = new google.maps.Map(document.getElementById("map"), {
	  zoom: 12,
	  center: austin,
	});

	/*const marker = new google.maps.Marker({
	  position: austin,
	  map: map,
	});*/
}