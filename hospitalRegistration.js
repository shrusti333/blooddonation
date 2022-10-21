var hosNameError = document.getElementById("hosNameError");
var hosEmailError = document.getElementById("hosEmailError");
var hosPhoneError = document.getElementById("hosPnoError");
var hosPinerror = document.getElementById("pinError");


function validatehosName() {
    var hosName = document.getElementById("hosName").value;

    if (hosName.length == 0) {
        hosNameError.innerHTML = "Name is Required";
        return false;
    }
    if (!hosName.match(/^[[A-Za-z]*\s{1}[A-Za-z]*]+$/)) {
        hosNameError.innerHTML = "write full name";
        return false;
    }
    hosNameError.innerHTML = '<i id="tick" class="fa fa-check-circle"></i>';
    return true;
}

function validatehospno() {
    var phone = document.getElementById("hosPno").value;
    if (phone.length !== 10) {
        hosPhoneError.innerHTML = "enter valid no";
        return false;
    }
    if (phone.length == 0) {
        hosPhoneError.innerHTML = "required";
        return false;
    }
    if (!phone.match(/^[0-9]{10}$/)) {
        hosPhoneError.innerHTML = "only numbers";
    }
    hosPhoneError.innerHTML = '<i id="tick" class="fa fa-check-circle"></i>';
    return true;
}
function validatehosemail() {

    var email = document.getElementById("hosEmail").value;

    if (email.length == 0) {
        hosEmailError.innerHTML = "required";
        return false;
    }
    if (!email.match(/^[A-ZA-z]*[0-9]*[@][A-Za-z]*[\.][a-z]*$/)) {
        hosEmailError.innerHTML = "invalid";
        return false;
    }

    hosEmailError.innerHTML = '<i id="tick" class="fa fa-check-circle"></i>';
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
    var password_1 = document.getElementById("password");
    var password_2 = document.getElementById("confirmpassword");

    if (password_1 == password_2) {
        passwordError.innerHTML = '<i id="tick" class="fa fa-check-circle"></i>';
        return true;

    } else {
        passwordError.innerHTML = "password did not match";
        return false;
    }


    

}

function validathosform(){
    if(!validatehosName()|| !validatehosemail() ||!validatehospno() || !validatePassword() || !validateconfirmPassword() || !validategendertick())
    {
        submitError.style.display="block";
        submitError.innerHTML="fix the error to submit";
        setTimeout(function(){
            submitError.style.display='none';
        },3000);
return false;}
    else{
return true;
    }
}

