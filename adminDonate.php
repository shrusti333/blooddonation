<?php
session_start();
include('dbconnet.php');
$bloodgrp=$_POST['dBloodGroup'];
$bloodamount=$_POST['amountBloodDonate'];

$query_2="SELECT * FROM adminbloodstock where bloodgrp='$bloodgrp'";
  $result_2=mysqli_query($conn,$query_2);
$data_2=mysqli_fetch_assoc($result_2);
$percentage_2=$data_2['percentage'];
$remainingAmount_2=($percentage_2*1000)/100;
$percentage=$data[$bloodgrp];

$remainingAmount_2=$remainingAmount_2+$bloodamount;
    $blood_2=($remainingAmount_2*100)/1000;
    
    $query_3="UPDATE  adminbloodstock set percentage = '$blood_2' where bloodgrp='$bloodgrp'";
    mysqli_query($conn,$query_3);
    header("location:donorHome.php");
?>