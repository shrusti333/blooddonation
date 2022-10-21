<?php
include('dbconnet.php');
session_start();
$email = $_SESSION['hEmail'];
$s1 = " SELECT * from hosemail where  email='$email'";
$result1 = mysqli_query($conn, $s1);
$data_1 = mysqli_fetch_assoc($result1);
$id = $data_1['hospid'];
$_SESSION['hosPid'] = $id;
$s1 = " SELECT * from hosstock where  hospid='$id'";
$result1 = mysqli_query($conn, $s1);
$data = mysqli_fetch_assoc($result1);
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!--progress bar CSS-->
  <link rel="stylesheet" href="progresscircle.css">
  <link rel="stylesheet" href="myHospitalStyle.css">
  <title>HOSPITAL HOME</title>
</head>

<body>
  <!--nav bar-->
  <nav class="navbar fixed-top navbar-expand-lg ">
    <a class="navbar-brand" href="#">Blood Bank</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"><i class="fa fa-solid fa-bars" style="color:white"></i></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ">
        <li class="nav-item">
          <a class="nav-link" href="#bloodAvailable">Blood Available</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="#" data-target="#donation" data-toggle="modal">Donate </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#" data-target="#request" data-toggle="modal">Request</a>
        </li>


        <li class="nav-item">
          <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?php echo  $_SESSION['hEmail'] ?>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="#mystatus">Status</a>
              <a class="dropdown-item" href="bloodbankhome.php">sign out</a>

            </div>
          </div>

        </li>
      </ul>
    </div>
  </nav>
  <!-- donation form for hodpital-->
  <div class="modal " role="dialog" id="donation">
    <div class="row model-dialog">
      <div class="g-col-4 model-content">
        <div class="model-header"><button type="button" class="close" data-dismiss="modal">&times;</button></div>
        <form id="requestForm" class="request_form" method="post" action="hospitalDonation.php">
          <div class="row">
            <div class="col-sm-12">
              <div class="form-label">
                <labe>Blood donation Form </label>
              </div>
            </div>
          </div>
          <div class="row inputfield-container">
            <div class="col-sm-5">
              <label class="labelGrp">donor name </label>
            </div>
            <div class="col-sm-7">
              <input class="input-grp" type="text" name="bloodDonorName" id="bloodDonorName" placeholder=" patient name ">
            </div>
          </div>
          <div class="row inputfield-container">
            <div class="col-sm-5">
              <label class="labelGrp">age</label>
            </div>
            <div class="col-sm-7">
              <input class="input-grp" type="int" name="donorAge" id="donorAge " placeholder="DOB">
            </div>
          </div>
          <div class="row inputfield-container">
            <div class="col-sm-12">
              <label class="labelGrp">Blood Group</label>
              <div class="row input-group-text">
                <table>
                  <tr>
                    <td><input type="radio" name="dBloodGroup" value="AP" id="DA+" aria-label="Radio button for following text input"> <label>A+</label>
                    </td>
                    <td><input type="radio" name="dBloodGroup" value="AN" id="DA-" aria-label="Radio button for following text input"> <label>A-</label>
                    </td>
                    <td><input type="radio" name="dBloodGroup" value="BP" id="DB+" aria-label="Radio button for following text input"> <label>B+</label>
                    </td>
                    <td><input type="radio" name="dBloodGroup" value="BN" id="DB-" aria-label="Radio button for following text input"> <label>B-</label>
                    </td>
                  </tr>
                  <tr>
                    <td><input type="radio" name="dBloodGroup" value="OP" id="DO+" aria-label="Radio button for following text input"><label>O+</label>
                    </td>
                    <td><input type="radio" name="dBloodGroup" value="ONEG" id="DO-" aria-label="Radio button for following text input"><label>O-</label>
                    </td>
                    <td> <input type="radio" name="dBloodGroup" value="ABP" id="DAB+" aria-label="Radio button for following text input"><label>AB+</label>
                    </td>
                    <td><input type="radio" name="dBloodGroup" value="ABN" id="DAB-" aria-label="Radio button for following text input"><label>AB-</label>
                    </td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
          <div class="row inputfield-container">
            <div class="col-sm-5">
              <label class="labelGrp"> Blood Amount</label>
            </div>
            <div class="col-sm-7">
              <input class="input-grp" type="number" name="amountBloodDonate" id="amountBloodDonate" placeholder="Amount blood">
            </div>
          </div>
          <div class="row inputfield-container">
            <table>
              <tr>
                <td>
                  <input type="submit" class="submit-btn" name="donationBtn" id="donationBtn" value="request">
                </td>
                <td><input type="button" data-dismiss="modal" class="submit-btn" value="cancel">
                </td>
            </table>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- request form -->
  <div class="modal" role="dialog" id="request">
    <div class="row model-dialog">
      <div class="g-col-4 model-content">
        <div class="model-header"><button type="button" class="close" data-dismiss="modal">&times;</button></div>
        <form id="requestForm" class="request_form" method="post" action="request.php">
          <div class="row">
            <div class="col-sm-12">
              <div class="form-label">
                <labe>Blood Request Form </label>
              </div>
            </div>
          </div>
          <div class="row inputfield-container">
              <div class="col-sm-12">
                <div class="row">
                  <div class="col-4">
                    <label class="labelGrp">patient name </label>
                  </div>
                  <div class="col-8">
                  <input class="input-grp" type="text" name="patientName" onchange="validateName()" id="name" placeholder=" patient name ">
           </div>
                </div>
                <div class="row">
                <span class="error" id="nameError"></span>
                </div>
              </div>
            </div>
            <div class="row inputfield-container">
              <div class="col-sm-12">
                <div class="row">
                  <div class="col-3">
                  <label class="labelGrp">DOB </label>
                  </div>
                  <div class="col-9">
                  <input class="input-grp" type="number" id="age" name="patientAge" onkeyup="validatedob()" placeholder="age">
                  </div>
                </div>
                <div class="row">
                <span class="error" id="dobError"></span>
                </div>
              </div>
            </div>
            <div class="row inputfield-container">
              <div class="col-sm-12">
                <div class="row">
                  <div class="col-3">
                  <label class="labelGrp">Phone no</label>
                  </div>
                  <div class="col-9">
                  <input class="input-grp" type="tel" id="pno" name="patientPno" onkeyup="validatepno()" placeholder="Phone number">
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
          <div class="row inputfield-container">
            <div class="col-sm-3">
              <label class="labelGrp">Amount Blood</label>
            </div>
            <div class="col-sm-8">
              <input class="input-grp" type="number" name="amountBlood" id="amountBlood" placeholder="Amount blood">
            
            </div>
            <div class="col-sm-1">
              <span class="error" id="amountError"></span>
            </div>
          </div>
          <div class="row inputfield-container">
            <table>
              <tr>
                <td>
                <div class="row inputfield-container">
            <div class="col-12">
              <input type="submit" class="submit-btn"  name="submit" id="requestBtn" value="request">
              <span class="error" id="submitError"></span>
            </div>
          </div>
                
                </td>
                <td><input type="button" class="submit-btn" data-dismiss="modal" value="cancel">
                </td>
            </table>
          </div>
        </form>
      </div>
    </div>
  </div>



  <div data-spy="scroll" data-target="#navbar2" data-offset="0">
    <!--DATA ABOUT BLOOD AVAILABLE-->
    <div class="container bloodContainer" id="bloodAvailable">
      <div class="row bloodRow">
        <div class="col bloodCol">
          <div class="row">
            <label id="availableBloodTitle">Available blood </label>
          </div>
          <div class="row">
            <div class="col-sm-3" class="bloodPercentage">
              <div class="circlechart" data-percentage="<?php echo $data['AP'] ?>">A+</div>
            </div>
            <div class="col-sm-3" class="bloodPercentage">
              <div class="circlechart" data-percentage="<?php echo $data['AN'] ?>">A-</div>
            </div>
            <div class="col-sm-3" class="bloodPercentage">
              <div class="circlechart" data-percentage="<?php echo $data['BP'] ?>">B+</div>
            </div>
            <div class="col-sm-3" class="bloodPercentage">
              <div class="circlechart" data-percentage="<?php echo $data['BN'] ?>">B-</div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-3" class="bloodPercentage">
              <div class="circlechart" data-percentage="<?php echo $data['OP'] ?>">O+</div>
            </div>
            <div class="col-sm-3" class="bloodPercentage">
              <div class="circlechart" data-percentage="<?php echo $data['ONEG'] ?>">O-</div>
            </div>
            <div class="col-sm-3" class="bloodPercentage">
              <div class="circlechart" data-percentage="<?php echo $data['ABP'] ?>">AB+</div>
            </div>
            <div class="col-sm-3" class="bloodPercentage">
              <div class="circlechart" data-percentage="<?php echo $data['ABN'] ?>">AB-</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <!--progress bar jquery-->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="progresscircle.js"></script>
  <script src="requestvalidation.js"></script>
  <script>
    $('.circlechart').circlechart(); // Initialization
  </script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>