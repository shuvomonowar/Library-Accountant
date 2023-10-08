function validate(pForm) {
	let flag = "";

	if (pForm.fname.value === "") {
		document.getElementById("fnameErrorMsg").innerHTML = " *fill up the first name";
		flag = "Empty";
	}
	if (pForm.fname.value !== "") {
		document.getElementById("fnameErrorMsg").innerHTML = "";
	}
	if (pForm.uname.value === "") {
		document.getElementById("unameErrorMsg").innerHTML = " *fill up the user name";
		flag = "Empty";
	}
	if (pForm.uname.value !== "") {
		document.getElementById("unameErrorMsg").innerHTML = "";
	}
	if (pForm.gender.value === "") {
		document.getElementById("genderErrorMsg").innerHTML = " *select the gender";
		flag = "Empty";
	}
	if (pForm.gender.value !== "") {
		document.getElementById("genderErrorMsg").innerHTML = "";
	}
	if (pForm.email.value === "") {
		document.getElementById("emailErrorMsg").innerHTML = " *fill up the email address";
		flag = "Empty";
	}
	if (pForm.email.value !== "") {
		document.getElementById("emailErrorMsg").innerHTML = "";
	}
	if (pForm.mobileno.value === "") {
		document.getElementById("mobilenoErrorMsg").innerHTML = " *fill up the mobileno";
		flag = "Empty";
	}
	if (pForm.mobileno.value !== "") {
		document.getElementById("mobilenoErrorMsg").innerHTML = "";
	}
	if (pForm.country.value === "Not Selected") {
		document.getElementById("countryErrorMsg").innerHTML = " *select the country";
		flag = "Empty";
	}
	if (pForm.country.value !== "Not Selected") {
		document.getElementById("countryErrorMsg").innerHTML = "";
	}
	if (pForm.password.value === "") {
		document.getElementById("passwordErrorMsg").innerHTML = " *fill up the password";
		flag = "Empty";
	}
	if (pForm.password.value !== "") {
		document.getElementById("passwordErrorMsg").innerHTML = "";
	}
	if (pForm.cpassword.value === "") {
		document.getElementById("cpasswordErrorMsg").innerHTML = " *fill up the confirm password";
		flag = "Empty";
	}
	if (pForm.cpassword.value !== "") {
		document.getElementById("cpasswordErrorMsg").innerHTML = "";
	}



	if (flag === "") {
		return true;
	}else {
		return false;
	}
}