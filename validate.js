function validate() {
	user = document.getElementById("username");
	password = document.getElementById("password");

	if (user.value == "") {
		alert("Username must be filled");
		return false;
	}

	if (password.value == "") {
		alert("Password must be filled");
		return false
	}
}
