var events = []

function pickfeaturedEvent(){
	var pickedEvent = Math.floor(Math.random()*events.length);
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
	$.ajax({
		type: 'POST',
		url: 'eventBackend.php',
		success: function(result) {
			var eventArray = result.split("}");
			eventArray = eventArray.slice(0,eventArray.length-1);
			eventArray.forEach(item => {
				events.push(JSON.parse(item+"}"));
			});
			addEvents();
		}
	});
});

function addEvents(){
	for (var i = 0; i < events.length; i++) {
		if(!events[i].link.match("http.+")){
			events[i].link = "https://"+events[i].link;
		}
		$(".columns").append(eventTemplate(events[i]));
	}
}