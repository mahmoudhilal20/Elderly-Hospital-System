<?php
session_start();
require('../config.php');

$PatientID=$_GET['PatientID'];
$MedicineName=$_GET['MedicineName'];
$sql="update medications set Status='Removed' where PatientID=".$PatientID." and MedicineName='".$MedicineName."'";
$result= mysqli_query($con, $sql);
if (!$result){
   die('something went wrong');
}
 
?>

