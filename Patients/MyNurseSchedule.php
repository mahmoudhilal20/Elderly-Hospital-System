<?php
session_start();
?>
<!DOCTYPE html>
<html >
  <head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../style.css">
    <title>My Nurse</title>
  </head>
  <style>
  .red{
    background-color: red;
    color: white;}
    h4{
      color:black;
    }
  </style>
  
<body>
<div class="topnav">
<a  class="active" >Elderly-Care</a>
    <a  href="Pprofile.php">Profile</a>
    <a  href="MyNurse.php">My Nurse</a>
    <a  class="red" href="MyNurseSchedule.php">My Nurse Schedule</a>
    <a  href="Nurses.php">Nurses</a>
    <a   href="Hospitals.php">Hospitals</a>
    <a  href="Contactadmin.php">Contact admin</a>
    <a  class="Logout" href="../Logout.php">Logout</a>
  </div>

  <?php
  if(!isset($_SESSION["Status"])){
    header("refresh:0,url=../home.php");
    die();}
else if(isset($_SESSION["Status"])){
    if($_SESSION["Status"]=="Patient"){
      $UserID=$_SESSION["UserID"];
    require('../config.php');
    $sql1="select * from ordernurse where PatientID=".$UserID." AND Status='Active'";
    $result1 = mysqli_query($con, $sql1);
    
    if(mysqli_fetch_assoc($result1)==0)
    {echo'<br>you dont have a nurse<br><br>
      <button class="Mbtn"><a href="Hospitals.php"> Request for a nurse from a Hospital</a></button>';}
    else{
    echo'
  <table id="customers">
  <tr>
    <th>Days</th>
    <th>Monday</th>
    
    <th>Tuesday</th>
    <th>Wednesday</th>
    <th>Thursday</th>
    <th>Friday</th>
    <th>Saturday</th>
    <th>Sunday</th>
  </tr>

  <tr>
    <td>Hours</td>';

$sql1="select * from ordernurse where PatientID=".$UserID." AND Status='Active'";
$result1 = mysqli_query($con, $sql1);
$row1=mysqli_fetch_assoc($result1);
$NurseID=$row1['NurseID'];
$sql2="select * from users where userID=".$NurseID."";
$result2 = mysqli_query($con, $sql2);
$row2=mysqli_fetch_assoc($result2);
echo'<h4><br><div> Nurse Name:'.$row2['FirstName'].' '.$row2['LastName'].' </div></h4>';

    $sql="Select * from nurseschedule where NurseID =".$NurseID." AND Day='Monday'";
    $result = mysqli_query($con, $sql);
    $row=mysqli_fetch_assoc($result);
    $From=$row['From'];
    $TO=$row['To'];
   echo'<td><div class="textbox">
      <div>'.$From.' - '.$TO.'</div>
    </div>
    </td>';
    $sql="Select * from nurseschedule where NurseID =".$NurseID." AND Day='Tuesday'";
    $result = mysqli_query($con, $sql);
    $row=mysqli_fetch_assoc($result);
    $From=$row['From'];
    $TO=$row['To'];
   echo'<td><div class="textbox">
      <div>'.$From.' - '.$TO.'</div>
    </div>
    </td>';
    $sql="Select * from nurseschedule where NurseID =".$NurseID." AND Day='Wednesday'";
    $result = mysqli_query($con, $sql);
    $row=mysqli_fetch_assoc($result);
    $From=$row['From'];
    $TO=$row['To'];
   echo'<td><div class="textbox">
      <div>'.$From.' - '.$TO.'</div>
    </div>
    </td>';
    $sql="Select * from nurseschedule where NurseID =".$NurseID." AND Day='Thursday'";
    $result = mysqli_query($con, $sql);
    $row=mysqli_fetch_assoc($result);
    $From=$row['From'];
    $TO=$row['To'];
   echo'<td><div class="textbox">
      <div>'.$From.' - '.$TO.'</div>
    </div>
    </td>';
    $sql="Select * from nurseschedule where NurseID =".$NurseID." AND Day='Friday'";
    $result = mysqli_query($con, $sql);
    $row=mysqli_fetch_assoc($result);
    $From=$row['From'];
    $TO=$row['To'];
   echo'<td><div class="textbox">
      <div>'.$From.' - '.$TO.'</div>
    </div>
    </td>';
    $sql="Select * from nurseschedule where NurseID =".$NurseID." AND Day='Saturday'";
    $result = mysqli_query($con, $sql);
    $row=mysqli_fetch_assoc($result);
    $From=$row['From'];
    $TO=$row['To'];
   echo'<td><div class="textbox">
      <div>'.$From.' - '.$TO.'</div>
    </div>
    </td>';
    $sql="Select * from nurseschedule where NurseID =".$NurseID." AND Day='Sunday'";
    $result = mysqli_query($con, $sql);
    $row=mysqli_fetch_assoc($result);
    $From=$row['From'];
    $TO=$row['To'];
   echo'<td><div class="textbox">
      <div>'.$From.' - '.$TO.'</div>
    </div>
    </td>';
echo'
  </tr>
</table>';
}}}
?>
  </body>
  </html>