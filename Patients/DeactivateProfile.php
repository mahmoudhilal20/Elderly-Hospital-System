<?php
session_start();
$UserID=$_SESSION["UserID"];
require('config.php');
$sql = "update users set Status='Patient Patient'where UserID='".$UserID."'";
  
$result = mysqli_query($con, $sql);
if(!$result)
    echo"something went worng";
else{

    header("refresh:0,url='logout.php'");
}


?>