
$(document).ready(function () {
  $('#signinRegEmail').keyup(function () {
    var txt = $(this).val();
    if (txt != '') {
    }
    else {
      $('#donorSignInError').html('');
      $.ajax({
        url: 'checkDonorRegEmail.php',
        type: "POST",
        data: { 'emailid': txt },
        dataType: "text",
        success: function (data) {
          if (data != '0') {
            $('#donorSignInError').html('<label> email not registered</label>');
            $('#donorsignInsubmit').attr("disabled", true);
          }
          else {
            $('#donorSignInError').html("hi");
            $('#donorsignupsubmit').attr("disabled", false);
          }
        }
      });
    }

  });
});