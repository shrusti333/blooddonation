<?php 
include("dbconnet.php");
if($_POST["action"]=="check"){
    $email=$_POST["email"];
    $query="SELECT * from donorinfo where email='$email'";
    $result=mysqli_query($conn,$query);
    if(mysqli_num_rows($result)>0){
        echo 1;
        exit;
    }
    else{
       
        exit;
    }
}