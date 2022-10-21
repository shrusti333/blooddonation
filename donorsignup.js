var nameError = document.getElementById("nameError");
var dobError = document.getElementById("dobError");
var emailError = document.getElementById("emailError");
var phoneError = document.getElementById("phoneError");
var bloodgrpError = document.getElementById("bloodgrpError");
var genderError = document.getElementById("genderError");
var passwordError = document.getElementById("passwordError");
var passwordError1 = document.getElementById("passwordError1");
var submitError = document.getElementById("submitError");
function validateName() {
    var name = document.getElementById("name").value;
    if (name.length == 0) {
        nameError.innerHTML = "Name is Required";
        return false;
    }
    if (!name.match(/^[A-Za-z]*\s{1}[A-Za-z]*$/)) {
        nameError.innerHTML = "write full name";
        return false;
    }
    nameError.innerHTML = '<i id="tick" class="fa fa-check-circle"></i>';
    return true;
}
function validatedob() {
    var dob = document.getElementById("age").value;
    dobError.innerHTML = "" + age;
    if (dob == 0) {
        dobError.innerHTML = 'required';
        return false;
    }
    if (dob > 18) {
        dobError.innerHTML = '<i id="tick" class="fa fa-check-circle"></i>';
        return true;
    }
    else {
        dobError.innerHTML = "above 18 only";
        return false;
    }
}
function validatepno() {
    var phone = document.getElementById("pno").value;
    if (phone.length == 0) {
        phoneError.innerHTML = "required";
        return false;
    }
    if (phone.length != 10) {
        phoneError.innerHTML = "enter valid no";
        return false;
    }
    if (!phone.match(/^[0-9]{10}$/)) {
        phoneError.innerHTML = "only numbers";
    }
    phoneError.innerHTML = '<i id="tick" class="fa fa-check-circle"></i>';
    return true;
}

function validateemail() {
    var email = document.getElementById("donorRegEmail").value;
    if (email.length == 0) {
        emailError.innerHTML = "required";
        return false;
    } if (!email.match(/^[A-ZA-z]*[0-9]*[@][A-Za-z]*[\.][a-z]*$/)) {
        emailError.innerHTML = "invalid";
        return false;
    }
    emailError.innerHTML = '<i id="tick" class="fa fa-check-circle"></i>';
    return true;
}
function validatePassword() {
    var password_1 = document.getElementById("password");
    if (password_1 == "") {
        passworderror1.innerHTML = "password required";
        return false;
    }
    passwordError1.innerHTML = '<i id="tick" class="fa fa-check-circle"></i>';
    return true;
}
function validateConfirmPassword() {
    var password_1 = document.getElementById("password").value;
    var password_2 = document.getElementById("confirmpassword").value;
    if (password_1 != password_2) {
        passwordError.innerHTML = "password did not match";
        return false;
    } else {
        passwordError.innerHTML = '<i id="tick" class="fa fa-check-circle"></i>';
        return true;
    }
}
function validategendertick() {
    if (document.getElementById('female').checked == true || document.getElementById('male').checked == true) {
        genderError.innerHTML = '<i id="tickf" class="fa fa-check-circle"></i>';
    } else {
        genderError.innerHTML = "required";
        return false;
    }
}
function validatform() {
    if (!validateName() || !validatedob() || !validateemail() || !validatepno() || !validatePassword() || !validateconfirmPassword() || !validategendertick()) {
        submitError.style.display = "block";
        submitError.innerHTML = "fix the error to submit";
        setTimeout(function () {
            submitError.style.display = 'none';
        }, 3000);
        return false;
    }
    else {
        return true;
    }
}
function validatebloodGrptick() {
    if (document.getElementById('A+').checked == true || document.getElementById('AB+').checked == true || document.getElementById('AB-').checked == true || document.getElementById('A-').checked == true || document.getElementById('B+').checked == true || document.getElementById('B-').checked == true || document.getElementById('O+').checked == true || document.getElementById('O-').checked == true) {
        bloodGrpError.innerHTML = '<i id="tickc" class="fa fa-check-circle"></i>';
    } else {
        bloodGrpError.innerHTML = "required";
        return false;
    }
}
