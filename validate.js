function validate() {
	user = document.getElementById("username");
	password = document.getElementById("password");

	if (user == "") {
		alert("Username must be filled");
		return false;
	}

	if (password == "") {
		alert("Password must be filled");
		return false
	}
}