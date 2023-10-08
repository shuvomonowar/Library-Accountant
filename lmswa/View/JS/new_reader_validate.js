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
	if (pForm.mtype.value === "") {
		document.getElementById("mtypeErrorMsg").innerHTML = " *fill up the membership type";
		flag = "Empty";
	}
	if (pForm.mtype.value !== "") {
		document.getElementById("mtypeErrorMsg").innerHTML = "";
	}
	if (pForm.cbalance.value === "") {
		document.getElementById("cbalanceErrorMsg").innerHTML = " *fill up the current balance";
		flag = "Empty";
	}
	if (pForm.cbalance.value !== "") {
		document.getElementById("cbalanceErrorMsg").innerHTML = "";
	}
	if (pForm.dbalance.value === "") {
		document.getElementById("dbalanceErrorMsg").innerHTML = " *fill up the due balance";
		flag = "Empty";
	}
	if (pForm.dbalance.value !== "") {
		document.getElementById("dbalanceErrorMsg").innerHTML = "";
	}
	if (pForm.pstatus.value === "") {
		document.getElementById("pstatusErrorMsg").innerHTML = " *fill up the payment status";
		flag = "Empty";
	}
	if (pForm.pstatus.value !== "") {
		document.getElementById("pstatusErrorMsg").innerHTML = "";
	}
	if (pForm.mstatus.value === "") {
		document.getElementById("mstatusErrorMsg").innerHTML = " *fill up the membership status";
		flag = "Empty";
	}
	if (pForm.mstatus.value !== "") {
		document.getElementById("mstatusErrorMsg").innerHTML = "";
	}



	if (flag === "") {
		return true;
	}else {
		return false;
	}
}