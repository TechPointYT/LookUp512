function initMap() {
	const austin = {lat: 30.2672, lng: -97.7431};

	const map = new google.maps.Map(document.getElementById("map"), {
		zoom: 13,
		center: austin,
	});

	const UT = new google.maps.Marker({
		position: austin,
		map: map,
		label: "UT",
	});
}