<?php session_start();
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="mHomeStyle.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
</head>

<body>
  <!--nav block-->
  <nav class="navbar navbar-expand-lg ">
    <a class="navbar-brand" href="#">Blood Bank</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"><i class="fa fa-solid fa-bars" style="color:white"></i></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ">
        <li class="nav-item">
          <a class="nav-link" href="#home">Notification</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact us</a>
        </li>
        <li class="nav-item">
          <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              login
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="btn-2" href="#" data-target="#donor" data-toggle="modal"> donor Log In/Register</a>
              <a class="btn-2" href="#" data-target="#hospital" data-toggle="modal"> hospital Log In/Register</a>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </nav>
  <!--log in donor block-->
  <div class="modal" role="dialog" id="donor">
    <div class="row model-dialog">
      <div class="g-col-4 model-content">
        <div class="model-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!--signin sign up buttons-->
        <div class="button-box">
          <div id="btnD"></div>
          <button type="button" class="toggle-btn" onclick="signIndonor()">Sign In </button>
          <button type="button" class="toggle-btn" onclick="signUpdonor()">Sign UP </button>
        </div>
        <!--signIn form-->
        <form id="signInD" class="sign-grp" method="post" action="donorSignIn.php">
          <div class="form-label">
            <labe>Donor Sign In </label>
          </div>
          <span class="error" id="donorSignInError"></span>
          <div class="inputfield-container">
            <input class="input-grp" type="text" name="donorEmail" id="signinRegEmail" placeholder=" Registered Email ID ">
            <i class="fa fa-user signinicon"></i>
          </div>
          <div class="inputfield-container">
            <input class="input-grp" type="password" name="donorPassword" placeholder="Enter your password">
            <i class="fa fa-lock signinicon"></i>
          </div>
          <div class="inputfield-container">
            <button class="submit-btn" id="donorsignInsubmit" name="donorSubmit" value="Sign In">Sign In</button>
          </div>
        </form>
        <!--signUn form-->
        <form id="signUpD" class="sign-grp" method="post" action="donorRegistration.php" onsubmit="return validatform()">
          <div class="form-label">
            <labe>Donor Sign Up </label>
          </div>
          <div class="container">
            <div class="row inputfield-container">
              <div class="col-sm-12">
                <div class="row">
                  <div class="col-1">
                    <i class="fa fa-user icon"></i>
                  </div>
                  <div class="col-11">
                    <input class="input-grp" type="text" id="name" name="donorName" onkeyup="validateName()" placeholder="Enter your Name">
                  </div>
                </div>
                <div class="row">
                  <span class="error" id="nameError"></span>
                </div>
              </div>
            </div>
            <div class="row inputfield-container">
              <div class="col-12">
                <div class="row">
                  <div class="col-1">
                    <i class="fa fa-user icon"></i>
                  </div>
                  <div class="col-11">
                    <input class="input-grp" type="number" id="age" name="donorAge" onkeyup="validatedob()" placeholder="age">
                  </div>
                </div>
                <div class="row">
                  <span class="error" id="dobError"></span>
                </div>
              </div>
            </div>
            <div class="row inputfield-container">
              <div class="col-12">
                <div class="row">
                  <div class="col-1">
                    <i class="fa fa-envelope icon"></i>
                  </div>
                  <div class="col-11">
                    <input class="input-grp" type="text" id="donorRegEmail" name="donorRegEmail"  onkeyup="validateemail()" placeholder="Enter your Email">
                  </div>
                </div>
                <div class="row">
                  <span class="error" id="donorEmailCheck"></span>
                  <span class="error" id="emailError"></span>
                </div>
              </div>
            </div>
            <div class="row inputfield-container">
              <div class="col-12">
                <div class="row">
                  <div class="col-1">
                    <i class="fa fa-phone icon"></i>
                  </div>
                  <div class="col-11">
                    <input class="input-grp" type="tel" id="pno" name="donorPno" onkeyup="validatepno()" placeholder="Phone number">
                  </div>
                </div>
                <div class="row">
                  <span class="error" id="phoneError"></span>
                </div>
              </div>
            </div>
            <div class="row inputfield-container" onmouseover="validatebloodGrptick()">
              <div class="col-sm-12">
                <label class="labelGrp">Blood Group</label><span class="error" id="bloodGrpError"></span><br>
                <div class="row input-group-text">
                  <table>
                    <tr>
                      <td><input type="radio" name="bloodGroup" value="AP" id="A+" aria-label="Radio button for following text input"> <label>A+</label>
                      </td>
                      <td><input type="radio" name="bloodGroup" value="AN" id="A-" aria-label="Radio button for following text input"> <label>A-</label>
                      </td>
                      <td><input type="radio" name="bloodGroup" value="BP" id="B+" aria-label="Radio button for following text input"> <label>B+</label>
                      </td>
                      <td><input type="radio" name="bloodGroup" value="BN" id="B-" aria-label="Radio button for following text input"> <label>B-</label>
                      </td>
                    </tr>
                    <tr>
                      <td><input type="radio" name="bloodGroup" value="OP" id="O+" aria-label="Radio button for following text input"><label>O+</label>
                      </td>
                      <td><input type="radio" name="bloodGroup" value="ONEG" id="O-" aria-label="Radio button for following text input"><label>O-</label>
                      </td>
                      <td> <input type="radio" name="bloodGroup" value="ABP" id="AB+" aria-label="Radio button for following text input"><label>AB+</label>
                      </td>
                      <td><input type="radio" name="bloodGroup" value="ABN" id="AB-" aria-label="Radio button for following text input"><label>AB-</label>
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
            <div class="row inputfield-container" onmouseover="validategendertick()"">
              <div class=" col-12 input-group-text">
              <label>Gender</label>
              <input type="radio" name="gender" id="female" value="F" aria-label="Radio button for following text input"><label>Female</label>
              <input type="radio" name="gender" id="male" value="M" aria-label="Radio button for following text input"> <label>Male</label>
              <span class="error" id="genderError"></span>
            </div>
          </div>
          <div class="row inputfield-container">
            <div class="col-12">
              <div class="row">
                <div class="col-1">
                  <i class="fa fa-lock icon"></i>
                </div>
                <div class="col-11">
                  <input class="input-grp" type="password" id="password" name="donorRegPassword" onkeyup="validatePassword()" placeholder="Enter your password">
                </div>
              </div>
              <div class="row">
                <span class="error" id="passwordError1"></span>
              </div>
            </div>
          </div>
          <div class="row inputfield-container">
            <div class="col-12">
              <div class="row">
                <div class="col-1">
                  <i class="fa fa-lock icon"></i>
                </div>
                <div class="col-11">
                  <input class="input-grp" type="password" id="confirmpassword" onkeyup="validateconfirmPassword()" placeholder=" password confirmation">
                </div>
              </div>
              <div class="row">
                <span class="error" id="passwordError"></span>
              </div>
            </div>
          </div>
          <div class="row inputfield-container">
            <div class="col-12">
              <input type="submit" class="submit-btn" id="donorsignupsubmit"  name="submit" id="DonorSubmit" value="Sign Up">
              <span class="error" id="submitError"></span>
            </div>
          </div>
      </div>
      </form>
    </div>
  </div>
  </div>
  <!--log in hospita block-->
  <div class="modal" role="dialog" id="hospital">
    <div class="row model-dialog">
      <div class="g-col-4 model-content">
        <div class="model-header"><button type="button" class="close" data-dismiss="modal">&times;</button></div>
        <!--signin sign up buttons-->
        <div class="button-box">
          <div id="btnH"></div>
          <button type="button" class="toggle-btn" onclick="signInhospital()">Sign In </button>
          <button type="button" class="toggle-btn" onclick="signUphospital()">Sign UP </button>
        </div>
        <!--signIn form-->
        <form id="signInH" class="sign-grp" method="post" action="hospitalSignIn.php">
          <div class="form-label">
            <labe>Hospital Sign In </label>
          </div>
          <div class="inputfield-container">
            <input class="input-grp" type="text" name="hospitalEmail" placeholder=" Registered Email ID ">
            <i class="fa fa-user" id="hosicon"></i>
          </div>
          <div class="inputfield-container">
            <input class="input-grp" type="password" name="hospitalPassword" placeholder="Enter your password">
            <i class="fa fa-lock " id="hosicon"></i>
          </div>
          <div class="inputfield-container">
            <button class="submit-btn" value="Sign In">Sign In</button>
          </div>
        </form>
        <!--signUn form-->
        <form id="signUpH" class="sign-grp" method="post" action="hospitalRegistration.php" onsubmit="validathosform()">
          <div class="form-label">
            <labe>Hospital Sign Up </label>
          </div>
          <div class="inputfield-container">
            <input class="input-grp" type="text" id="hosName" name="hosName" placeholder="Enter hospital name" onkeyup="validatehosname()">
            <i class="fa fa-user" id="hosicon"></i>
            <span class="error" id="hosNameError"></span>
          </div>
          <div class="inputfield-container">
            <input class="input-grp" type="text" id="hosEmail" name="hosEmail" placeholder="Enter Email" onkeypress="validatehosemail()">
            <i class="fa fa-envelope" id="hosicon"></i>
            <span class="error" id="hosEmailError"></span>
            <span class="check" id="hosEmailCheck"></span>
          </div>
          <div class="inputfield-container">
            <input class="input-grp" type="tel" id="hosPno" name="hosPno" placeholder="Phone number" onkeyup="validatehospno()">
            <i class="fa fa-phone " id="hosicon"></i>
            <span class="error" id="hosPnoError"></span>
          </div>
          <div class="inputfield-container">
            <input class="input-grp" type="text" id="pincode" name="hosPin" placeholder="pincode" onkeypress="validatehospincode()">
            <span class="error" id="pinError"></span>
          </div>
          <Label id="label"> available blood</Label>
          <div class="inputfield-container" id="bloodAvailable">
            <label id="bGname">A+</label>
            <input class="input-grp" type="number" id="ap" placeholder="A+" name="a+amount" onkeyup="APinput()"><br><span class="error" id="APblooderror"></span>
            <span class="error" id="ApError"></span>
          </div>
          <div class="inputfield-container" id="bloodAvailable">
            <label id="bGname">A-</label>
            <input class="input-grp" type="number" placeholder="A-" id="an" name="a-amount" onkeyup="ANinput()"><span class="error" id="ANblooderror"></span>
            <span class="error" id="AnError"></span>
          </div>
          <div class="inputfield-container" id="bloodAvailable">
            <label id="bGname">B+</label>
            <input class="input-grp" type="number" placeholder="B+" id="bp" name="b+amount" onkeyup="BPinput()"><span class="error" id="BPblooderror"></span>
            <span class="error" id=BpError"></span>
          </div>
          <div class="inputfield-container" id="bloodAvailable">
            <label id="bGname">B-</label>
            <input class="input-grp" type="number" placeholder="B-" id="bn" name="b-amount" onkeyup="BNinput()"><span class="error" id="BNblooderror"></span>
            <span class="error" id="BnError"></span>
          </div>
          <div class="inputfield-container" id="bloodAvailable">
            <label id="bGname">O+</label>
            <input class="input-grp" type="number" placeholder="O+" id="op" name="o+amount" onkeyup="OPinput()"><span class="error" id="OPblooderror"></span>
            <span class="error" id="OpError"></span>
          </div>
          <div class="inputfield-container" id="bloodAvailable">
            <label id="bGname">O-</label>
            <input class="input-grp" type="number" placeholder="O-" id="on" name="o-amount" onkeyup="ONinput()"><span class="error" id="ONblooderror"></span>
            <span class="error" id="OnError"></span>
          </div>
          <div class="inputfield-container" id="bloodAvailable">
            <label id="bGname">AB+</label>
            <input class="input-grp" type="number" placeholder="AB+" id="abp" name="ab+amount" onkeyup="ABPinput()"><span class="error" id="ABPblooderror"></span>
            <span class="error" id="ABpError"></span>
          </div>
          <div class="inputfield-container" id="bloodAvailable">
            <label id="bGname">AB-</label>
            <input class="input-grp" type="number" placeholder="AB-" id="abn" name="ab-amount" onkeyup="ABNinput()"><span class="error" id="ABNblooderror"></span>
            <span class="error" id="ABnError"></span>
          </div>
          <div class="inputfield-container">
            <input class="input-grp" type="password" id="hosPassword" name="hosPassword" placeholder="Enter your password" onkeypress="validatehospassword()">
            <i class="fa fa-lock " id="hosicon"></i>
            <span class="error" id="hospassError1"></span>
          </div>
          <div class="inputfield-container">
            <input class="input-grp" type="password" id="hosConfirmPassword" name="hosConfirmPassword" placeholder=" Confirm Password" onkeypress="validateHosConfirmPassword()">
            <i class="fa fa-lock " id="hosicon"></i>
            <span class="error" id="hospassError2"></span>
          </div>
          <div class="inputfield-container">
            <button class="submit-btn" value="Sign Up" id="hosSubmit" name="hosSubmit" onclick="validatehos()">Sign Up</button>
            <span class="error" id="hossubmiteError"></span>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!--home-->
  <div class="container " id="dataContainer">
    <div class="row" id="dataTableRow">
      <div class="col-md-2"></div>
      <div class="col-sm-8" id="notificationTable">
        <div class="table-responsive">
          <table class="table" id="table1" class="display">
            <thead>
              <tr>
                <th>hospital name</th>
                <th>blood group</th>
                <th>blood amount</th>
                <th>donate</th>

              </tr>
            </thead>

            <tbody>
              <?php

              include('dbconnet.php');
              $query = "SELECT * from request";
              $output = array();
              $result1 = mysqli_query($conn, $query);

              $num = mysqli_num_rows($result1);
              while ($row = mysqli_fetch_assoc($result1)) {
                $id = $row['hospid'];
                $query2 = "SELECT name from hosinfo where hospid='$id'";

                $result2 = mysqli_query($conn, $query2);
                $data = mysqli_fetch_assoc($result2);
              ?>
                <tr>
                  <td><?php echo $data['name'] ?></td>
                  <td><?php echo $row['bloodgrp']; ?></td>
                  <td><?php echo $row['amount'] ?></td>
                  <td>
                    <form method="post" >
                      <button type="submit"  data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn btn-danger" name="donateEditBtn"  onclick="deleteData(<?php echo $row['requestid'];?>)" id="edit">donate</button>
                   
                    </form>
                  </td>
                </tr>

              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <script src="home.js"></script>
  <script src="donorsignup.js"></script>
  <script src="hospitalRegistration.js"></script>
<script>
function deleteData(id){
  $(document).ready(function() {
    $.ajax({
      url:'notificationEdit.php',
      type:'POST',
      data:{
        id:id,
        action:'delete'
      },
      success:function(response){
        if(response ==1){
          alert("Thank you for donating");
         }else {

        }
      }
    })
  });
}

</script>  

  <script>
    $(document).ready(function() {
      $('#table1').DataTable();
    });
  </script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script src="donoremailcheck.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

</body>

</html>