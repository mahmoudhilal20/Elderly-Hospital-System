<?php
require('../config.php');
$UserID=$_GET['UserID'];
$User;
    $sql="Select * from users where UserID =".$UserID."";
    $result = mysqli_query($con, $sql);
    $row=mysqli_fetch_assoc($result);
    $User['FirstName']=$row['FirstName'];
    $User['LastName']=$row['LastName'];
    $User['Email']=$row['Email'];
    $User['Gender']=$row['Gender'];
    $User['DateofBirth']=$row['DateofBirth'];
    $User['MaritalState']=$row['MaritalState'];
    $User['Status']=$row['Status'];
    $sql1="Select * from Patients where PatientID =".$UserID."";
    $result1 = mysqli_query($con, $sql1);
    $row1=mysqli_fetch_assoc($result1);
    $User['Address']=$row1['Address'];
    $User['Hospital']=$row1['Hospital'];
    $Online=$row1['Online'];

 $sql2="select * from ordernurse where PatientID=".$UserID." AND Status='Active'";
 $result2 = mysqli_query($con, $sql2);
 $row2=mysqli_fetch_assoc($result2);
 
 if($Online=="0"){
$User['Status']="Home Patient";}
else if($Online=="1"){
 
$User['Status']="Hospital Patient";}

 if($row2==0)
$User['HaveANurse']="No";
 else
 $User['HaveANurse']="Yes";

echo json_encode($User);
?>
