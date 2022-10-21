<?php

session_start();
include('dbconnet.php');
$_SESSION['userEmail'] = $_POST['hospitalEmail'];
$_SESSION['pass1'] = $_POST['hospitalPassword'];
$email = $_SESSION['userEmail'];
$password = $_SESSION['pass1'];

$s1 = " SELECT * from hosemail where  email='$email'";
$result1 = mysqli_query($conn, $s1);
$data = mysqli_fetch_assoc($result1);
$id = $data['hospid'];
$s2 = " SELECT * from hosinfo where  hospid='$id'";
$result2 = mysqli_query($conn, $s2);
$data2 = mysqli_fetch_assoc($result2);
$num=mysqli_num_rows($result2);


if ($num>0) {
    $_SESSION['hosId'] = $data['hosid'];
    $_SESSION['hEmail'] = $data['email'];
    header('location:hospitalHome.php');
} else {
    header('location:bloodbankhome.php');
   
}
