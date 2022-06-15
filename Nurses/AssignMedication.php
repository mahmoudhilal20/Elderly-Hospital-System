<?php
 require('../config.php');
 $MedicineName=$_GET['MedicineName'];
 $PatientID=$_GET['PatientID'];
 $Time=$_GET['Time'];
$Date =date('Y-m-d', strtotime($_GET['Date']));
$sql5 = "insert into assignedmedications(PatientID, Date, MedicineName,Time) values ($PatientID,'$Date ','$MedicineName','$Time')";
$result5 = mysqli_query($con, $sql5);
$B="";
if(!$result5)
   die($sql5);
else{
    $B.='<h3>Assigned</h3>';
}
echo $B;
?>