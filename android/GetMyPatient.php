<?php
require('../config.php');
$UserID=$_GET['UserID'];
$User;

$sql="Select PatientID from ordernurse where NurseID =".$UserID." AND Status='Active'";
    $result = mysqli_query($con, $sql);
    $row=mysqli_fetch_assoc($result);
    $PatientID=$row['PatientID'];
    $User['ID']=$row['PatientID'];
    $sql="Select * from users where UserID =".$PatientID."";
    $result = mysqli_query($con, $sql);
    $row=mysqli_fetch_assoc($result);

    $User['FirstName']=$row['FirstName'];
    $User['LastName']=$row['LastName'];
    $User['Email']=$row['Email'];
    $User['Gender']=$row['Gender'];
    $User['DateofBirth']=$row['DateofBirth'];
    $User['MaritalState']=$row['MaritalState'];

    $sql1="Select * from Patients where PatientID =".$PatientID."";
    $result1 = mysqli_query($con, $sql1);
    $row1=mysqli_fetch_assoc($result1);
    $User['Address']=$row1['Address'];
    $User['Hospital']=$row1['Hospital'];

    echo json_encode($User);
    ?>