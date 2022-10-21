<?php
session_start();
include('dbconnet.php');
if(isset($_POST['hosSubmit'])){
    $name=$_POST['hosName'];  
   
    $email=$_POST['hosEmail'];
    $pno=$_POST['hosPno'];
    $pincode=$_POST['hosPin'];
    $password1=$_POST['hosPassword'];
    $pass=password_hash("$password1",PASSWORD_DEFAULT);
    #storing the amount of the blood available in percentage
 $abp=($_POST['ab+amount']*100)/1000;
 $abn=($_POST['ab-amount']*100)/1000;
 $bp=($_POST['b+amount']*100)/1000;
 $ap=($_POST['a+amount']*100)/1000;
 $bn=($_POST['b-amount']*100)/1000;
 $an=($_POST['a-amount']*100)/1000;
 $op=($_POST['o+amount']*100)/1000;
 $on=($_POST['o-amount']*100)/1000;
  
#insert the email
    $query="INSERT INTO hosemail (hospid,email) VALUES ('','$email')";
    mysqli_query($conn,$query);
    
    $_SESSION['hemail']=$email;
    #getting the hospital id
    $s1=" SELECT * from hosemail where  email='$email'";
    $result1=mysqli_query($conn,$s1);
    $data=mysqli_fetch_assoc($result1);
    $id=$data['hospid'];
    $_SESSION['hosId']=$data['hospid'];
    
    $_SESSION['hEmail']=$data['email'];
    $query="INSERT INTO hosinfo (hospid,name,pno,pincode,dpassword) VALUES ('$id','$name','$pno','$pincode','$pass')";
    mysqli_query($conn,$query);
   #insert in the hospital market;
    $query="INSERT INTO hosstock (hospid,AP,AN,BP,BN,OP,ONEG,ABP,ABN) VALUES ('$id','$ap','$an','$bp','$bn','$op','$on','$abp','$abn')";
    mysqli_query($conn,$query);
    header("location:hospitalHome.php");}
