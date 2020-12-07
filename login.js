$(document).ready(function(){
	$("#loginForm").submit(function(e){
		e.preventDefault();
		$.ajax({
			type: "POST",
			url: "loginBackend.php",
			data: $(this).serialize(),
			success: function(response){
				var responseData = JSON.parse(response);
				
				if(responseData.success=="1"){
					window.location.replace("index.html");
				}
				else{
					if(responseData.success=="2"){
						window.alert(responseData.displayMessage);
					}
					else{
						window.alert("Error: Something went wrong. Make sure you are logged in.");
					}
				}
			}
		});
	});
});