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
    <title>My Schedule</title>
  </head>
  <style>
  .red{
    background-color: red;
    color: white;
  }
  </style>
<body>
<div class="topnav">
    <a class="active" >Elderly-Care</a>
    <a  href="Nprofile.php">Profile</a>
    <a  href="MyPatient.php">My Patient</a>
    <a class="red" href="NSchedule.php">Schedule</a>
    <a href="Contactadmin.php">Contact admin</a>
    <a class="Logout" href="../Logout.php">Logout</a>
  </div>
  <?php
  if(!isset($_SESSION["Status"])){
    header("refresh:0,url=../home.php");
    die();}
else if(isset($_SESSION["Status"])){
    if($_SESSION["Status"]=="Nurse"){
      $UserID=$_SESSION["UserID"];
    require('../config.php');
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


    $sql="Select * from nurseschedule where NurseID =".$UserID." AND Day='Monday'";
    $result = mysqli_query($con, $sql);
    $row=mysqli_fetch_assoc($result);
    $From=$row['From'];
    $TO=$row['To'];
   echo'<td><div class="textbox">
      <div>'.$From.' - '.$TO.'</div>
    </div>
    </td>';
    $sql="Select * from nurseschedule where NurseID =".$UserID." AND Day='Tuesday'";
    $result = mysqli_query($con, $sql);
    $row=mysqli_fetch_assoc($result);
    $From=$row['From'];
    $TO=$row['To'];
   echo'<td><div class="textbox">
      <div>'.$From.' - '.$TO.'</div>
    </div>
    </td>';
    $sql="Select * from nurseschedule where NurseID =".$UserID." AND Day='Wednesday'";
    $result = mysqli_query($con, $sql);
    $row=mysqli_fetch_assoc($result);
    $From=$row['From'];
    $TO=$row['To'];
   echo'<td><div class="textbox">
      <div>'.$From.' - '.$TO.'</div>
    </div>
    </td>';
    $sql="Select * from nurseschedule where NurseID =".$UserID." AND Day='Thursday'";
    $result = mysqli_query($con, $sql);
    $row=mysqli_fetch_assoc($result);
    $From=$row['From'];
    $TO=$row['To'];
   echo'<td><div class="textbox">
      <div>'.$From.' - '.$TO.'</div>
    </div>
    </td>';
    $sql="Select * from nurseschedule where NurseID =".$UserID." AND Day='Friday'";
    $result = mysqli_query($con, $sql);
    $row=mysqli_fetch_assoc($result);
    $From=$row['From'];
    $TO=$row['To'];
   echo'<td><div class="textbox">
      <div>'.$From.' - '.$TO.'</div>
    </div>
    </td>';
    $sql="Select * from nurseschedule where NurseID =".$UserID." AND Day='Saturday'";
    $result = mysqli_query($con, $sql);
    $row=mysqli_fetch_assoc($result);
    $From=$row['From'];
    $TO=$row['To'];
   echo'<td><div class="textbox">
      <div>'.$From.' - '.$TO.'</div>
    </div>
    </td>';
    $sql="Select * from nurseschedule where NurseID =".$UserID." AND Day='Sunday'";
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
}}
?>
  </body>
  </html>