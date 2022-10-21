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
  <link rel="stylesheet" href="hospitalStyle.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
 
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
  <style>
  </style>
  <title>Blood bank </title>
</head>

<body>
  <!--nav block-->
  <nav class="navbar navbar-expand-lg ">
    <a class="navbar-brand" href="#">Blood Bank</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"><i class="fa fa-solid fa-bars"></i></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ">
        <li class="nav-item">
          <a class="nav-link" href="#notification">Notification</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" data-target="#donation" data-toggle="modal">Donate </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact us</a>
        </li>
        <li class="nav-item">
          <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?php echo  $_SESSION['dEmail'] ?>
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
  <div class="modal " role="dialog" id="donation">
    <div class="row model-dialog">
      <div class="g-col-4 model-content">
        <div class="model-header"><button type="button" class="close" data-dismiss="modal">&times;</button></div>
        <form id="requestForm" class="request_form" method="post" action="adminDonate.php" >
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
              <input class="input-grp" type="number" name="amountBloodDonate" id="amountbloodDonate" placeholder="Amount blood">
            </div>
          </div>
          <div class="row inputfield-container">
            <table>
              <tr>
                <td>
                  <input type="submit" class="submit-btn" id="donationBtn"  value="donate">
                 
                </td>
                <td><input type="button" data-dismiss="modal" class="submit-btn" value="cancel">
                </td>
            </table>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="container " id="dataContainer">
    <div class="row" id="dataTableRow">
      <div class="col-md-2"></div>
      <div class="col-sm-8" id="notificationTable">
        <div class="table-responsive">
          <table class="table" id="table1" class="display">
            <thead>
              <tr>
                <th> hospital name</th>
                <th>blood group</th>
                <th>amount</th>
                <th>donate</th>

              </tr>
            </thead>

            <tbody>
              <?php

              include('dbconnet.php');
              $email=$_SESSION['dEmail'] ;
              
              $query1 = "SELECT donorid from donoremail where email='$email'";
              $result2 = mysqli_query($conn, $query1);
              $row1= mysqli_fetch_assoc($result2);
              $id=$row1['donorid'];
              $query2 = "SELECT bloodgrp from donorinfo where donorid='$id'";
              $result3 = mysqli_query($conn, $query2);
              $row2= mysqli_fetch_assoc($result3);
                            $bloodgrp= $row2['bloodgrp'] ;
              $query = "SELECT * from request where bloodgrp='$bloodgrp'";
              $output = array();
              $result1 = mysqli_query($conn, $query);

              $num = mysqli_num_rows($result1);
              while ($row = mysqli_fetch_assoc($result1)) {
                $id = $row['hospid'];
                $query2 = "SELECT name from hosinfo where hospid=$id";

                $result2 = mysqli_query($conn, $query2);
                $data = mysqli_fetch_assoc($result2);
              ?>
                <tr>
                  <td><?php echo $data['name'] ?></td>
                  <td><?php echo $row['bloodgrp']; ?></td>
                  <td><?php echo $row['amount'] ?></td>
                  <td>
                    <form method="post" >
                      <input type="submit" placeholder="Donate" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn btn-danger" name="donateEditBtn" value="donate" onclick="deleteData(<?php echo $row['requestid'];?>)" id="edit">
                  
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
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
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
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>