
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
    $sql1="Select * from Doctors where DoctorID =".$UserID."";
    $result1 = mysqli_query($con, $sql1);
    $row1=mysqli_fetch_assoc($result1);
    $User['WorkingHospital']=$row1['WorkingHospital'];
    $User['Major']=$row1['Major'];


    echo json_encode($User); 

    ?>