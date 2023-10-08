function validate(pForm) {
	let flag = "";

	if (pForm.fname.value === "") {
		document.getElementById("fnameErrorMsg").innerHTML = " *fill up the first name";
		flag = "Empty";
	}
	if (pForm.fname.value !== "") {
		document.getElementById("fnameErrorMsg").innerHTML = "";
	}
	/*
	if (pForm.gender.value === "") {
		document.getElementById("genderErrorMsg").innerHTML = " *fill up the gender";
		flag = "Empty";
	}
	if (pForm.gender.value !== "") {
		document.getElementById("genderErrorMsg").innerHTML = "";
	}
	*/
	if (pForm.mobileno.value === "") {
		document.getElementById("mobilenoErrorMsg").innerHTML = " *fill up the mobileno";
		flag = "Empty";
	}
	if (pForm.mobileno.value !== "") {
		document.getElementById("mobilenoErrorMsg").innerHTML = "";
	}
	if (pForm.country.value === "") {
		document.getElementById("countryErrorMsg").innerHTML = " *fill up the country";
		flag = "Empty";
	}
	if (pForm.country.value !== "") {
		document.getElementById("countryErrorMsg").innerHTML = "";
	}



	if (flag === "") {
		return true;
	}else {
		return false;
	}
}