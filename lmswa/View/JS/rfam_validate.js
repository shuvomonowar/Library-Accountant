function validate(pForm) {
	let flag = "";

	if (pForm.uname.value === "") {
		document.getElementById("unameErrorMsg").innerHTML = " *Please fill up the username for searching";
		flag = "Empty";
	}
	if (pForm.uname.value !== "") {
		document.getElementById("unameErrorMsg").innerHTML = "";
	}


	if (flag === "") {
		return true;
	}else {
		return false;
	}
}