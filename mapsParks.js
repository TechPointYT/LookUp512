

var parks = [];
var addresses = []
function retrieveInfo(){
$.ajax({
    type: 'POST',
    url: 'myFile.php',
    success: function(result) {
        parks = JSON.parse(result);
        // do something with the jsonData
        for (var i = 0; i < parks.length; i++) {
        	addresses.push(parks[i].address);
        }

    }
});

}

function formatInfo(park){
	return ` 
		<tr>
				<td>
					<div>
						<img id='sectionImage' src='images\\eastwoods.jpg' alt='eastwoods'>
					</div>
					<div id="sectionName" class="sectionText">
						
					</div>
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

	const addresses= ["3001 Harris Park Ave, Austin, TX 78705","1100 Kingsbury St, Austin, TX 78703","2207 Lou Neff Rd, Austin, TX 78746"];
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