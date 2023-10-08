function validate(pForm) {
	let flag = "";

	if (pForm.npword.value !== "") {
		if(pForm.cpword.value === "") {
			document.getElementById("cpasswordErrorMsg").innerHTML = " *fill up the confirm password";
			document.getElementById("npasswordErrorMsg").innerHTML = "";
			flag = "Empty";
		}
	}
	if (pForm.cpword.value !== "") {
		if(pForm.npword.value === "") {
			document.getElementById("npasswordErrorMsg").innerHTML = " *fill up the new password";
			document.getElementById("cpasswordErrorMsg").innerHTML = "";
			flag = "Empty";
		}
	}



	if (flag === "") {
		return true;
	}else {
		return false;
	}
}