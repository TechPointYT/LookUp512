var restaurants = [];
var addresses = []
$.ajax({
    type: 'POST',
    url: 'restaurantsBackend.php',
    success: function(result) {
		var restaurantsArray = result.split("}");
		restaurantsArray = restaurantsArray.slice(0,restaurantsArray.length-1);
		restaurantsArray.forEach(item => {
			restaurants.push(JSON.parse(item+"}"));
		});
		for (var i = 0; i < restaurants.length; i++) {
        	addresses.push(restaurants[i].address);
		}
		populateInfo();
    }
});

function formatInfo(restaurant){
	return ` 
		<tr>
				<td>
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
	for (var i = 0; i < restaurants.length; i++) {
		if(!restaurants[i].link.match("http.+")){
			restaurants[i].link = "https://"+restaurants[i].link;
		}
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

