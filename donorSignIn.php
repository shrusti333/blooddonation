<?php

session_start();
include('dbconnet.php');
$_SESSION['userEmail'] = $_POST['donorEmail'];
$_SESSION['pass1'] = $_POST['donorPassword'];
$email = $_SESSION['userEmail'];
$password = $_SESSION['pass1'];
$query_1 = " SELECT *  from donoremail where  email='$email'";
$result_1 = mysqli_query($conn, $query_1);
$data = mysqli_fetch_assoc($result_1);
$id = $data['donorid'];
$query_2 = " SELECT * from donorinfo where  password=$password and donorid='$id'";
$result2 = mysqli_query($conn, $query_2);
$num = mysqli_num_rows($result2);
$data2 = mysqli_fetch_assoc($result2);
$pass = $data2['password'];
if ($num > 0) {
    $_SESSION['dEmail'] = $data['email'];
    $_SESSION['dBloodgrp'] = $data['bloodgrp'];
    header("location:donorHome.php");
} else {
    
}

?>