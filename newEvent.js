$(document).ready(function(){
	$("#eventForm").submit(function(e){
		e.preventDefault();
		console.log($(this).serialize());
		$.ajax({
			type: "POST",
			url: "newEventBackend.php",
			data: $(this).serialize(),
			success: function(response){
				var responseData = JSON.parse(response);
				
				if(responseData.success=="1"){
					window.alert(responseData.displayMessage);
					window.location.replace("Events.html");
				}
				else{
					if(responseData.success=="2"){
						window.alert(responseData.displayMessage);
					}
					else{
						window.alert("Error: AJAX Response from PHP");
					}
				}
			}
		});
	});
	$("#cancel").click(function(){
		window.location.replace("Events.html");
	});
});