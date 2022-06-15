<?php
require('../config.php');
$item=array();
$items=array();
$DoctorID=$_GET['DoctorID'];
$sql="select WorkingHospital from doctors where DoctorID=".$DoctorID."";
$result = mysqli_query($con, $sql);

$row = mysqli_fetch_assoc($result);
$Hospital=$row["WorkingHospital"];
$sql1 = "select Users.FirstName, Users.LastName, Patients.Hospital, Patients.PatientID from Patients 
INNER JOIN users ON patients.PatientID=users.UserID  where Hospital='".$Hospital."' ORDER BY Hospital";
// execute the above query on the $con connection
$result1 = mysqli_query($con, $sql1);
//  in case the query is not valid or misspelled (problem in the execution)
if(!$result){
    die('Something went wrong!');
}
  for($i=0; $i<mysqli_num_rows($result1); $i++ ){
    $row = mysqli_fetch_assoc($result1);
$item['ID']=$row['PatientID'];
$item['Name']=$row['FirstName'].' '.$row['LastName'];
array_push($items,$item);
  }
  echo json_encode($items);
?>
