<?php  
    $UserID=$_GET["UserID"];
    require('../config.php');
    $sql="select * from users where userID=".$UserID."";
    $result = mysqli_query($con, $sql);
    $row=mysqli_fetch_assoc($result);
    $User['UserID']=$row['UserID'];
    $User['FirstName']=$row['FirstName'];
    $User['LastName']=$row['LastName'];
    $User['Email']=$row['Email'];
    $User['Gender']=$row['Gender'];
    $User['DateofBirth']=$row['DateofBirth'];
    $User['MaritalState']=$row['MaritalState'];
    $User['UserPhoto']=$row['UserPhoto'];
    $sql2="Select * from Nurses where NurseID =".$UserID."";
    $result2 = mysqli_query($con, $sql2);
    $row2=mysqli_fetch_assoc($result2);
    $User['WorkingHospital']=$row2['WorkingHospital'];
    $Online=$row2['Online'];
    if($Online=='1'){
        $User['Status']="Online Nurse";
    }
      else if($Online=='0'){
        $User['Status']="Hospital Nurse";}

    echo json_encode($User); 

    ?>
