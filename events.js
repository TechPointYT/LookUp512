

var events = []
function retrieveInfo(){
$.ajax({
    type: 'POST',
    url: 'myFile.php',
    success: function(result) {
        events = JSON.parse(result);
    }
});

}


function eventTemplate(event){
	return `

		<div class="item">
			<h4 class="eventTitle">${event.name}</h4>
			<p class="eventDate">${event.date}</p>
			<p class="eventDesc">${event.description}</p>
			<p ><a class="eventLink" href="${event.link}">Link</a></p>
		</div>
	`;
}



$(document).ready(function(){
	addEvents();
});

function addEvents(){
	for (var i = 0; i < events.length; i++) {
		$(".columns").append(eventTemplate(events[i]));
	}
	
}