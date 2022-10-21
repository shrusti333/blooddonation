<?php
include('dbconnet.php');
session_start();
$amountBlood = $_POST['amountBlood'];#blood amount requested
$name = $_POST['patientName'];
$age = $_POST['patientAge'];
$pno = $_POST['patientPno'];
$bloodGrp = $_POST['bloodGroup'];#blood group requested
$hosId = $_SESSION['hosPid'];#hospital id 
#selecting the blood stock int the hospital with the given id
$query_1 = "SELECT * FROM hosstock where hospid='$hosId'";
$result_1 = mysqli_query($conn, $query_1);
$data = mysqli_fetch_assoc($result_1);
$percentage = $data[$bloodGrp];
# '$remainingAmount_2'remaining amount of the mentioned blood group in hospital stock
$remainingAmount = ($percentage * 1000) / 100; 
#selecting the blood stock  with admin 
$query_2 = "SELECT * FROM adminbloodstock where bloodgrp='$bloodGrp'";
$result_2 = mysqli_query($conn, $query_2);
$data_2 = mysqli_fetch_assoc($result_2);
$percentage_2 = $data_2['percentage']; 
# '$remainingAmount_2'remaining amount of the mentioned blood group in admin stock
$remainingAmount_2 = ($percentage_2 * 1000) / 100;

#checking if the amount of blood requested is less the blood available with hospital
if ($remainingAmount > $amountBlood) {
    
    $remainingAmount = $remainingAmount - $amountBlood;
    $blood = ($remainingAmount * 100) / 1000;
    #updating the blood available with the hospital after donating
    $query_3 = "UPDATE  hosstock SET $bloodGrp = '$blood' where hospid='$hosId'";
    mysqli_query($conn, $query_3);
 header("location:hospitalHome.php");

} #checking if the amount of blood requested is less the blood available with admin
else if ($remainingAmount_2 > $amountBlood) {
    
    $remainingAmount_2 = $remainingAmount_2 - $amountBlood;
    $blood_2 = ($remainingAmount_2 * 100) / 1000;
    #updating the blood available with the admin after donating
    $query_3 = "UPDATE adminbloodstock set percentage = '$blood_2' where bloodgrp='$bloodGrp'";
    mysqli_query($conn, $query_3);
   header("location:hospitalHome.php");
} else {
    #if requested blood is not available with admin or hospital then a request is made 
    $query = "INSERT INTO request (hospid,requestid,name,age,bloodgrp,amount) VALUES ('$hosId','','$name','$age','$bloodGrp','$amountBlood')";
    mysqli_query($conn, $query);

    header("location:hospitalHome.php");
}
