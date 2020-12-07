$(document).ready(function(){
	$("#eventForm").submit(function(e){
		e.preventDefault();
		$.ajax({
			type: "POST",
			url: "eventDisplayBackend.php",
			data: $(this).serialize(),
			success: function(response){
				console.log(response);
				var responseData = JSON.parse(response);
				
				if(responseData.success=="1"){
					window.location.replace("Events.php");
				}
			}
		});
	});
	$("#editForm").submit(function(e){
		e.preventDefault();
		$.ajax({
			type: "POST",
			url: "setEdit.php",
			data: $(this).serialize()
		});
		return false;
	});
});

function deleteEvent(id){
	var form = document.createElement("form");
    document.body.appendChild(form);
    form.method = "post";
	form.action = "eventDelete.php";
	form.type = "hidden";
	form.id = "deleteForm";

	var input = document.createElement("input");
	input.type = "hidden";
	input.name = "id";
	input.value = id;
	form.appendChild(input);

	form.submit();
}