<?php
 require('../config.php');
 $User;
      $PatientID=$_GET['PatientID'];
      $sql="Select * from users where UserID =".$PatientID."";
      $result= mysqli_query($con, $sql);
      $row=mysqli_fetch_assoc($result);
    $sql1="Select * from patients where PatientID =".$PatientID."";
    $result1 = mysqli_query($con, $sql1);
    $row1=mysqli_fetch_assoc($result1);
    $FirstName=$row['FirstName'];
    $LastName=$row['LastName'];
    $Email=$row['Email'];
    $Gender=$row['Gender'];
    $DateofBirth=$row['DateofBirth'];
    $MaritalState=$row['MaritalState'];
    $Address=$row1['Address'];
    $HospitalName=$row1['Hospital'];
    
 $User['FirstName']=$FirstName;
 $User['LastName']=$LastName;
 $User['Email']=$Email;
 $User['Gender']=$Gender;
 $User['Address']=$Address;
 $User['DateofBirth']=$DateofBirth;
 $User['MaritalState']=$MaritalState;
 $User['Hospital']=$HospitalName;

 echo json_encode($User);
?>