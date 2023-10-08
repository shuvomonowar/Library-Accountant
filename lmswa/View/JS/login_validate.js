function validate(pForm) {
	let flag = "";

	if (pForm.uname_mail.value === "") {
		document.getElementById("unameErrorMsg").innerHTML = " *Please fill up the username";
		flag = "Empty";
	}
	if (pForm.uname_mail.value !== "") {
		document.getElementById("unameErrorMsg").innerHTML = "";
	}
	if (pForm.pword.value === "") {
		document.getElementById("passwordErrorMsg").innerHTML = " *Please fill up the password";
		flag = "Empty";
	}
	if (pForm.pword.value !== "") {
		document.getElementById("passwordErrorMsg").innerHTML = "";
	}



	if (flag === "") {
		return true;
	}else {
		return false;
	}
}