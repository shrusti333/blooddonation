<?php
session_start();
include('dbconnet.php');
$bloodGrp = $_POST['dBloodGroup'];
$bloodAmount = $_POST['amountBloodDonate'];
$hosId = $_SESSION['hosPid'];
$query_1 = "SELECT * FROM hosstock where hospid='$hosId'";
$result_1 = mysqli_query($conn, $query_1);
$data = mysqli_fetch_assoc($result_1);
$percentage = $data[$bloodGrp];
$remainingAmount = ($percentage * 1000) / 100;
$remainingAmount = $remainingAmount + $bloodAmount;
$blood = ($remainingAmount * 100) / 1000;
$query_3 = "UPDATE  hosstock SET $bloodGrp = '$blood' where hospid='$hosId'";
mysqli_query($conn, $query_3);
header("location:hospitalHome.php");

?>