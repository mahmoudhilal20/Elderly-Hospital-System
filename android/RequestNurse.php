<?php
session_start();
require('../config.php');
$respone="";
$UserID=$_GET["PatientID"];
$HospitalName=$_GET['HospitalName'];
$sql = "insert into requestnurse (PatientID,HospitalName,Request) values ('".$UserID."','".$HospitalName."','Done')";
$result = mysqli_query($con, $sql);

if(!$result){
    die('something went wrong');
}
else{
$respone="Success";
}
echo json_encode ($respone);
?>
