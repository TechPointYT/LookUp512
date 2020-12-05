var parks = [];
var addresses = []
$(document).ready(function(){
	$.ajax({
		type: 'POST',
		url: 'parksBackend.php',
		success: function(result) {
			var parksArray = result.split("}");
			parksArray = parksArray.slice(0,parksArray.length-1);
			parksArray.forEach(item => {
				parks.push(JSON.parse(item+"}"));
			});
			for (var i = 0; i < parks.length; i++) {
				addresses.push(parks[i].address);
			}
			//populateInfo();
			initMap();
		}
	});
});

function formatInfo(park){
	return `
		<tr>
				<td>
					<table id="section">
						<tbody>
						<th colspan="1"><h1 class="parkName">${park.name}</h1></th>
						<tr>
							<td id="sectionInfo" class="sectionText">
								<span id="sectionInfoTitle">Hours: </span> ${park.times}
							</td>
						</tr>
						<tr>
							<td id="sectionInfo" class="sectionText">
								<span id="sectionInfoTitle">Address:</span> ${park.address}
							</td>
						</tr>
						<tr>
							<td id="sectionInfo" class="sectionText"> 
								<span id="sectionInfoTitle">Size:</span> ${park.size}
							</td>
						</tr>
						<tr>
							<td id="sectionInfo" class="sectionText">
								<span id="sectionInfoTitle">Amenities:</span> ${park.amenities}
							</td>
						</tr>
					</tbody></table>
				</td>
			</tr>
	`;

}

function populateInfo(){
	for (var i = 0; i < parks.length; i++) {
		$("#sectionList").append(formatInfo(parks[i]));	
	}
}

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

	parks.forEach(park => {
		geocoder.geocode({address: park.address}, (results, status) => {
			if (status === "OK") {
				const infoWindow = new google.maps.InfoWindow({
					content: formatInfo(park),
				});
				const marker = new google.maps.Marker({
					map: map,
					position: results[0].geometry.location,
					label: ""+(parks.indexOf(park)+1),
				});
				marker.addListener("click", () => {
					infoWindow.open(map, marker);
				});
			} else {
				alert("Geocode was not successful for the following reason: " + status);
			}
		});
	});
}