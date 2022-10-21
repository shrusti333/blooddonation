<?php
session_start();
include('dbconnet.php');
if (isset($_POST['submit'])) {
    $name = $_POST['donorName'];
    $age = $_POST['donorAge'];
    $email = $_POST['donorRegEmail'];
    $pno = $_POST['donorPno'];
    $pass = $_POST['donorRegPassword'];
    $bloodgrp = $_POST['bloodGroup'];
    $pass=password_hash("$pass",PASSWORD_DEFAULT);
    $query = "INSERT INTO donoremail (donorid,email) VALUES ('','$email')";
    mysqli_query($conn, $query);
    $s1 = "SELECT * FROM donoremail where email='$email'";
    $result1 = mysqli_query($conn, $s1);
    $data = mysqli_fetch_assoc($result1);
    $_SESSION['dEmail'] = $email;
    $_SESSION['dBloodgrp'] = $bloodgrp;
    $id = $data['donorid'];
    $query = "INSERT INTO donorinfo (donorid,name,bloodgrp,pno,password,age) VALUES ('$id','$name','$bloodgrp','$pno','$pass','$age')";
    mysqli_query($conn, $query);
    header("location:donorHome.php");
}    
?>