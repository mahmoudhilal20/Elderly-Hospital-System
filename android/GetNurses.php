<?php
require('../config.php');
$sql = "select users.UserID, users.FirstName, users.LastName, users.Email, users.PhoneNumber, nurserate.Rate, Nurses.WorkingHospital from users
 INNER JOIN nurses INNER JOIN nurserate on users.userID=nurses.NurseID where nurses.Online='1' " ;

// execute the above query on the $con connection
$result = mysqli_query($con, $sql);
$User=array();
$Users=array();
  for($i=0; $i<mysqli_num_rows($result); $i++ ){
    $row = mysqli_fetch_assoc($result);
$User['UserID']=$row['UserID'];
$User['Name']=$row['FirstName'].' '.$row['LastName'];
$User['Email']=$row['Email'];
$User['PhoneNumber']=$row['PhoneNumber'];
$User['WorkingHospital']=$row['WorkingHospital'];
$User['Rate']=$row['Rate'];
array_push($Users,$User);
  }
  echo json_encode($Users);
?>
