
<?php
require('../config.php');
$UserID=$_GET['UserID'];
    

    $sql="Select * from users where UserID =".$UserID."";
    $result = mysqli_query($con, $sql);
    $row=mysqli_fetch_assoc($result);
    
    $User['FirstName']=$row['FirstName'];
    $User['LastName']=$row['LastName'];
    $User['Email']=$row['Email'];
    $User['Gender']=$row['Gender'];
    $User['DateofBirth']=$row['DateofBirth'];
    $User['MaritalState']=$row['MaritalState'];

    $User['UserPhoto']=$row['UserPhoto'];
    $UserPhoto=$row['UserPhoto'];
    $sql1="Select * from Nurses where NurseID =".$UserID."";
    $result1 = mysqli_query($con, $sql1);
    $row1=mysqli_fetch_assoc($result1);
    $User['WorkingHospital']=$row1['WorkingHospital'];
    $Online=$row1['Online'];
    if($Online=='1'){
        $User['Status']="Online Nurse";
    }
      else if($Online=='0'){
        $User['Status']="Hospital Nurse";}

    echo json_encode($User); 

    ?>