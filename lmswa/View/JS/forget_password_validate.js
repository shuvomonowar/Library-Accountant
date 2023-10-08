function validate(pForm) {
	let flag = "";

	if (pForm.uname.value === "") {
		document.getElementById("unameErrorMsg").innerHTML = " *Please fill up the username";
		flag = "Empty";
	}
	if (pForm.npassword.value === "") {
		document.getElementById("npasswordErrorMsg").innerHTML = " *Please fill up the new password";
		flag = "Empty";
	}
	if (pForm.cpassword.value === "") {
		document.getElementById("cpasswordErrorMsg").innerHTML = " *Please fill up the confirm password";
		flag = "Empty";
	}



	if (flag === "") {
		return true;
	}else {
		return false;
	}
}