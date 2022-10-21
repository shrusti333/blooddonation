<?php 
include("dbconnet.php");
 

 if(isset($_POST["action"])){
    if($_POST["action"]=="delete"){
        $id=$_POST["id"];
        $query = "DELETE from request where requestid='$id'";
           mysqli_query($conn, $query);
           echo 1;
           
           exit;
        }}
  ?>