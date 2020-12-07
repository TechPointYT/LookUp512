var events = []

function pickfeaturedEvent(){
	var pickedEvent = Math.floor(Math.random()*events.length);
	$("#highlight").append(eventTemplate(events[pickedEvent],pickedEvent));
}


function eventTemplate(event,index){
	return `
		<div id="event${index}" class="item">
			<h4 class="eventTitle">${event.name}</h4>
			<p class="eventDate">${event.date}</p>
			<p class="eventDesc">${event.description}</p>
			<p ><button class="eventLink" onclick="sendData(this)">Link</button></p>
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
			if(events.length>0){
				pickfeaturedEvent();
			}
		}
	});
});

function addEvents(){
	for (var i = 0; i < events.length; i++) {
		if(events[i].link!=""&&!events[i].link.match("http.+")){
			events[i].link = "https://"+events[i].link;
		}
		$(".columns").append(eventTemplate(events[i],i));
	}
}

function sendData(element){
	var eventId = element.parentElement.parentElement.id;
	var index = parseInt(eventId.substring(5));
	var form = document.createElement("form");
    document.body.appendChild(form);
    form.method = "post";
	form.action = "eventDisplay.php";
	form.type = "hidden";
	for (var item in events[index]){
		var input = document.createElement("input");
		input.type = "hidden";
		input.name = item;
		input.value = events[index][item];
		form.appendChild(input);
	}
	form.submit();
}