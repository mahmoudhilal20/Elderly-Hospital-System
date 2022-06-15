<?php
session_start();
require('../config.php');
$UserID=$_SESSION["UserID"];
$HospitalName=$_GET['q'];
$sql = "insert into requestnurse (PatientID,HospitalName,Request) values ('".$UserID."','".$HospitalName."','Done')";
$result = mysqli_query($con, $sql);

if(!$result){
    die('something went wrong');
}

?>
