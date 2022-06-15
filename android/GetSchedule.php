<?php
$UserID=$_GET['UserID'];
    require('../config.php');
    $User;
$sql="Select Status from users where UserID=".$UserID."";
$result = mysqli_query($con, $sql);
$row=mysqli_fetch_assoc($result);
if($row['Status']=="Nurse"){
  $Sechdule="nurseschedule";
  $userschedule="NurseID";
}
else if($row['Status']=="Doctor"){
  $Sechdule="doctorschedule";
  $userschedule="DoctorID";
}


    $sql="Select * from ".$Sechdule." where ".$userschedule." =".$UserID." AND Day='Monday'";
    $result = mysqli_query($con, $sql);
    $row=mysqli_fetch_assoc($result);
    $From=$row['From'];
    $TO=$row['To'];
    $User['Monday']=$From."-".$TO;

    $sql="Select * from ".$Sechdule." where ".$userschedule." =".$UserID." AND Day='Tuesday'";
    $result = mysqli_query($con, $sql);
    $row=mysqli_fetch_assoc($result);
    $From=$row['From'];
    $TO=$row['To'];
    $User['Tuesday']=$From."-".$TO;

    $sql="Select * from ".$Sechdule." where ".$userschedule." =".$UserID." AND Day='Wednesday'";
    $result = mysqli_query($con, $sql);
    $row=mysqli_fetch_assoc($result);
    $From=$row['From'];
    $TO=$row['To'];
    $User['Wednesday']=$From."-".$TO;

    $sql="Select * from ".$Sechdule." where ".$userschedule." =".$UserID." AND Day='Thursday'";
    $result = mysqli_query($con, $sql);
    $row=mysqli_fetch_assoc($result);
    $From=$row['From'];
    $TO=$row['To'];
    $User['Thursday']=$From."-".$TO;

    $sql="Select * from ".$Sechdule." where ".$userschedule." =".$UserID." AND Day='Friday'";
    $result = mysqli_query($con, $sql);
    $row=mysqli_fetch_assoc($result);
    $From=$row['From'];
    $TO=$row['To'];
    $User['Friday']=$From."-".$TO;
    
    $sql="Select * from ".$Sechdule." where ".$userschedule." =".$UserID." AND Day='Saturday'";
    $result = mysqli_query($con, $sql);
    $row=mysqli_fetch_assoc($result);
    $From=$row['From'];
    $TO=$row['To'];
    $User['Saturday']=$From."-".$TO;

    $sql="Select * from ".$Sechdule." where ".$userschedule." =".$UserID." AND Day='Sunday'";
    $result = mysqli_query($con, $sql);
    $row=mysqli_fetch_assoc($result);
    $From=$row['From'];
    $TO=$row['To'];
    $User['Sunday']=$From."-".$TO;


    echo json_encode($User);
    ?>