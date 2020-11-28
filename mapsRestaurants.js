var restaurants = [];
var addresses = []
function retrieveInfo(){
$.ajax({
    type: 'POST',
    url: 'myFile.php',
    success: function(result) {
        restaurants = JSON.parse(result);
        // do something with the jsonData
        for (var i = 0; i < restaurants.length; i++) {
        	addresses.push(restaurants[i].address);
        }

    }
});

}

function formatInfo(restaurant){
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
						<th colspan="1"><h1 class="parkName">${restaurant.name}</h1></th>
						<tr>
							<td id="sectionInfo" class="sectionText">
								<span id="sectionInfoTitle">Food Type:</span> ${restaurant.type}
							</td>
						</tr>
						<tr>
							<td id="sectionDescription" class="sectionText">
								${restaurant.desc}  
							</td>
						</tr>
						<tr>
							<td id="sectionInfo" class="sectionText">
								<span id="sectionInfoTitle">Address:</span> ${restaurant.address}
							</td>
						</tr>
						<tr>
							<td id="sectionInfo" class="sectionText">
								<span id="sectionInfoTitle">Phone Number: </span> ${restaurant.phone}
							</td>
						</tr>
						<tr>
							<td id="sectionInfo" class="sectionText">
								<span id="sectionInfoTitle">Menu:</span> <a href="${restaurant.link}">${restaurant.link}</a>
							</td>
						</tr>
					</tbody></table>
				</td>
			</tr>

	`;

}

function populateInfo(){
	for (var i = 0; i < parks.length; i++) {
		$("#sectionList").append(formatInfo(restaurants[i]));	
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

	const addresses = ["1234 S Lamar Blvd, Austin, TX 78704","1421 South Congress Avenue, Austin, TX","2808 Guadalupe St, Austin, TX 78705"];
	addresses.forEach(address => {
		geocoder.geocode({address: address}, (results, status) => {
			if(status === "OK") {
				new google.maps.Marker({
					map: map,
					position: results[0].geometry.location,
				});
			}
			else{
				alert("Geocode was not successful for the following reason: " + status);
			}
		});
	});
}

