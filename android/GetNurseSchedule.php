<?php
$UserID=$_GET['UserID'];
    require('../config.php');
    $User;

$sql="Select NurseID from orderNurse where PatientID=".$UserID." AND Status='Active'";
$result = mysqli_query($con, $sql);
$row=mysqli_fetch_assoc($result);
$UserID=$row['NurseID'];



    $sql="Select * from nurseschedule where NurseID =".$UserID." AND Day='Monday'";
    $result = mysqli_query($con, $sql);
    $row=mysqli_fetch_assoc($result);
    $From=$row['From'];
    $TO=$row['To'];
    $User['Monday']=$From."-".$TO;

    $sql="Select * from nurseschedule where NurseID =".$UserID." AND Day='Tuesday'";
    $result = mysqli_query($con, $sql);
    $row=mysqli_fetch_assoc($result);
    $From=$row['From'];
    $TO=$row['To'];
    $User['Tuesday']=$From."-".$TO;

    $sql="Select * from nurseschedule where NurseID =".$UserID." AND Day='Wednesday'";
    $result = mysqli_query($con, $sql);
    $row=mysqli_fetch_assoc($result);
    $From=$row['From'];
    $TO=$row['To'];
    $User['Wednesday']=$From."-".$TO;

    $sql="Select * from nurseschedule where NurseID =".$UserID." AND Day='Thursday'";
    $result = mysqli_query($con, $sql);
    $row=mysqli_fetch_assoc($result);
    $From=$row['From'];
    $TO=$row['To'];
    $User['Thursday']=$From."-".$TO;

    $sql="Select * from nurseschedule where NurseID =".$UserID." AND Day='Friday'";
    $result = mysqli_query($con, $sql);
    $row=mysqli_fetch_assoc($result);
    $From=$row['From'];
    $TO=$row['To'];
    $User['Friday']=$From."-".$TO;
    
    $sql="Select * from nurseschedule where NurseID =".$UserID." AND Day='Saturday'";
    $result = mysqli_query($con, $sql);
    $row=mysqli_fetch_assoc($result);
    $From=$row['From'];
    $TO=$row['To'];
    $User['Saturday']=$From."-".$TO;

    $sql="Select * from nurseschedule where NurseID =".$UserID." AND Day='Sunday'";
    $result = mysqli_query($con, $sql);
    $row=mysqli_fetch_assoc($result);
    $From=$row['From'];
    $TO=$row['To'];
    $User['Sunday']=$From."-".$TO;


    echo json_encode($User);
    ?>