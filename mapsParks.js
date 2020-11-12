function initMap() {
	const austin = {lat: 30.2672, lng: -97.7431};

	const map = new google.maps.Map(document.getElementById("map"), {
		zoom: 13,
		center: austin,
	});

	const geocoder = new google.maps.Geocoder();

	const UT = new google.maps.Marker({
		position: austin,
		map: map,
		label: "UT",
	});

	const addresses = ["3001 Harris Park Ave, Austin, TX 78705","1100 Kingsbury St, Austin, TX 78703","2207 Lou Neff Rd, Austin, TX 78746"];
	addresses.forEach(address => {
		geocoder.geocode({address: address}, (results, status) => {
			if (status === "OK") {
				new google.maps.Marker({
					map: map,
					position: results[0].geometry.location,
				});
			} else {
				alert("Geocode was not successful for the following reason: " + status);
			}
		});
	});
}