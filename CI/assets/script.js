function myfunction() {

// Validation for First Name
  var fname = document.getElementById('myform').fname.value;
  if (fname == "") {
    document.getElementById("ans1").innerHTML="*First Name must be entered";
    return false;
  }else{
  	document.getElementById("ans1").innerHTML="";
  }


// Validation for Last Name
  var lname = document.getElementById('myform').lname.value;
  if (lname == "") {
    document.getElementById("ans2").innerHTML="*Last Name must be entered";
    return false;
  }else{
  	document.getElementById("ans2").innerHTML="";
  }


// Validation for DOB
  var dob = document.getElementById('myform').dob.value;
  if (dob == "") {
    document.getElementById("ans3").innerHTML="*DOB must be selected";
    return false;
  }else{
  	document.getElementById("ans3").innerHTML="";
  }


// // validation for Mobile number
	var mob = document.getElementById('myform').mob.value;
	if (mob == "") {
	document.getElementById("ans4").innerHTML="*Mobile Number must be entered";
	return false;
	}else if (mob.length !== 10) {
		document.getElementById("ans4").innerHTML="*Mobile Number must be 10 digit";
		return false;
	}
	else{
		document.getElementById("ans4").innerHTML="";
	}


// validation for MailID
	var mail = document.getElementById('myform').mail.value;
	if (mail == "") {
		document.getElementById("ans5").innerHTML="*Mail must be entered";
		return false;
	}else if (/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z]{2,3})$/.test(myform.mail.value)) {
			document.getElementById("ans5").innerHTML="";
	}else{
	document.getElementById("ans5").innerHTML="*You have entered an invalid email address!";
	return (false);
	}

// Vlidation for gender
  var gen = document.getElementById('myform').gender.value;
  if (gen == "") {
    document.getElementById("ans6").innerHTML="*Gender must be selected";
    return false;
  }else{
    document.getElementById("ans6").innerHTML="";
  }

// Validation for Skils
	var drop = document.getElementById('myform').dropdown.value;
	if (drop == "") {
		document.getElementById("ans7").innerHTML="*Skills must be selected";
		return false;
	}else{
		document.getElementById("ans7").innerHTML="";
	}

// Validation for Comments
  var com = document.getElementById('myform').text.value;
  if (com == "") {
    document.getElementById("ans8").innerHTML="*Skills must be selected";
    return false;
  }else{
    document.getElementById("ans8").innerHTML="";
  }

  if (!document.getElementById('myform').tick.checked) {
    document.getElementById("ans9").innerHTML="*Must Accept the terms and conditions";
    return false;
  }else{
    document.getElementById("ans9").innerHTML="";
  }
}


// // Mobile keypress Validation using separate functions
function isNumber(evt) {
		evt = (evt) ? evt : window.event;
		var charCode = (evt.which) ? evt.which : evt.keyCode;
		if (charCode > 31 && (charCode < 48 || charCode > 57)) {
		document.getElementById("ans4").innerHTML="Please enter only Numbers";
		return false;
	}
		return true;
}


// Function for display all warning

function myfun() {
  // Validation for First Name
  var fname = document.getElementById('myform').fname.value;
  if (fname == "") {
    document.getElementById("ans1").innerHTML="*First Name must be entered";
    // return false;
  }else{
    document.getElementById("ans1").innerHTML="";
  }


// Validation for Last Name
  var lname = document.getElementById('myform').lname.value;
  if (lname == "") {
    document.getElementById("ans2").innerHTML="*Last Name must be entered";
    // return false;
  }else{
    document.getElementById("ans2").innerHTML="";
  }


// Validation for DOB
  var dob = document.getElementById('myform').dob.value;
  if (dob == "") {
    document.getElementById("ans3").innerHTML="*DOB must be selected";
    // return false;
  }else{
    document.getElementById("ans3").innerHTML="";
  }


// // validation for Mobile number
  var mob = document.getElementById('myform').mob.value;
  if (mob == "") {
  document.getElementById("ans4").innerHTML="*Mobile Number must be entered";
  // return false;
  }else if (mob.length !== 10) {
    document.getElementById("ans4").innerHTML="*Mobile Number must be 10 digit";
    // return false;
  }
  else{
    document.getElementById("ans4").innerHTML="";
  }


// validation for MailID
  var mail = document.getElementById('myform').mail.value;
  if (mail == "") {
    document.getElementById("ans5").innerHTML="*Mail must be entered";
    // return false;
  }else if (/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z]{2,3})$/.test(myform.mail.value)) {
      document.getElementById("ans5").innerHTML="";
  }else{
  document.getElementById("ans5").innerHTML="*You have entered an invalid email address!";
  // return (false);
  }

// Vlidation for gender
  var gen = document.getElementById('myform').gender.value;
  if (gen == "") {
    document.getElementById("ans6").innerHTML="*Gender must be selected";
    // return false;
  }else{
    document.getElementById("ans6").innerHTML="";
  }

// Validation for Skils
  var drop = document.getElementById('myform').dropdown.value;
  if (drop == "") {
    document.getElementById("ans7").innerHTML="*Skills must be selected";
    // return false;
  }else{
    document.getElementById("ans7").innerHTML="";
  }
  // Validation for Comments
  var com = document.getElementById('myform').text.value;
  if (com == "") {
    document.getElementById("ans8").innerHTML="*Skills must be selected";
    // return false;
  }else{
    document.getElementById("ans8").innerHTML="";
  }

  if (!document.getElementById('myform').tick.checked) {
    document.getElementById("ans9").innerHTML="*Must Accept the terms and conditions";
  }else{
    document.getElementById("ans9").innerHTML="";
  }
}







































// if (b == "") {
//     var g = document.getElementById('ans2');
//     if (g.style.display === "none") {
//     	g.style.display = "block";
//     	return false;
//     }
//   }else{
//   	g.style.display = "none";
//   }