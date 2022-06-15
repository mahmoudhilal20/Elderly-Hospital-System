<?php
session_start();
require('../config.php');
$DateFrom=date('Y-m-d', strtotime($_GET['DateFrom']));
$DateTo=date('Y-m-d', strtotime($_GET['DateTo']));
$PatientID=$_GET['PatientID'];
$DoctorID=$_GET['DoctorID'];
$MedicineName=$_GET['MedicineName'];
$sql="insert into medications (PatientID,DoctorID,MedicineName,DateFrom,DateTo,Status) values 
('".$PatientID."','".$DoctorID."','".$MedicineName."','".$DateFrom."','".$DateTo."','Active')";
$result= mysqli_query($con, $sql);
if (!$result){
   die('something went wrong');
}

?>

