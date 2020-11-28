

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


function DemoEvent(){
	return `

		<div class="item">
			<h4 class="eventTitle">Event Name</h4>
			<p class="eventDate">11/11/20</p>
			<p class="eventDesc">Demo Event description</p>
			<p ><a class="eventLink" href="event.html">Link</a></p>
		</div>
	`;
}

$(document).ready(function(){
	addEvents();
});

function addEvents(){
	for (var i = 0; i < 10; i++) {
		$(".columns").append(DemoEvent());
	}
	
}