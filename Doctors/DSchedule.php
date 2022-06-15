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
  h4{
    color:black;
  }
  .red{
    background-color: red;
    color: white;
  }
  </style>
<body>
<div class="topnav">
    <a class="active" >Elderly-Care</a>
    <a  href="Dprofile.php">Profile</a>
    <a  href="Patients.php">Patients</a>
    <a class="red" href="DSchedule.php">Schedule</a>
    <a href="Contactadmin.php">Contact admin</a>
    <a class="Logout" href="../Logout.php">Logout</a>
  </div>
  <?php
  if(!isset($_SESSION["Status"])){
    header("refresh:0,url=../home.php");
    die();}
else if(isset($_SESSION["Status"])){
    if($_SESSION["Status"]=="Doctor"){
      $UserID=$_SESSION["UserID"];
    require('../config.php');
    $sql="Select users.FirstName, users.LastName, Doctors.WorkingHospital from users
    INNER JOIN Doctors ON users.UserID=doctors.DoctorID  where users.UserID =".$UserID."";
    $result = mysqli_query($con, $sql);
    $row=mysqli_fetch_assoc($result);
    $FirstName=$row['FirstName'];
    $LastName=$row['LastName'];
    $WorkingHospital=$row['WorkingHospital'];
    echo'
    <br>
    <h4>
    Name: '.$FirstName.' '.$LastName.' <br></h4>
    
    <h4>
    Working Hospital:'.$WorkingHospital.'</h4>
    
    <br>
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


    $sql="Select * from DoctorSchedule where DoctorID =".$UserID." AND Day='Monday'";
    $result = mysqli_query($con, $sql);
    $row=mysqli_fetch_assoc($result);
    $From=$row['From'];
    $TO=$row['To'];
   echo'<td><div class="textbox">
      <div>'.$From.' - '.$TO.'</div>
    </div>
    </td>';
    $sql="Select * from DoctorSchedule where DoctorID =".$UserID." AND Day='Tuesday'";
    $result = mysqli_query($con, $sql);
    $row=mysqli_fetch_assoc($result);
    $From=$row['From'];
    $TO=$row['To'];
   echo'<td><div class="textbox">
      <div>'.$From.' - '.$TO.'</div>
    </div>
    </td>';
    $sql="Select * from DoctorSchedule where DoctorID =".$UserID." AND Day='Wednesday'";
    $result = mysqli_query($con, $sql);
    $row=mysqli_fetch_assoc($result);
    $From=$row['From'];
    $TO=$row['To'];
   echo'<td><div class="textbox">
      <div>'.$From.' - '.$TO.'</div>
    </div>
    </td>';
    $sql="Select * from DoctorSchedule where DoctorID =".$UserID." AND Day='Thursday'";
    $result = mysqli_query($con, $sql);
    $row=mysqli_fetch_assoc($result);
    $From=$row['From'];
    $TO=$row['To'];
   echo'<td><div class="textbox">
      <div>'.$From.' - '.$TO.'</div>
    </div>
    </td>';
    $sql="Select * from DoctorSchedule where DoctorID =".$UserID." AND Day='Friday'";
    $result = mysqli_query($con, $sql);
    $row=mysqli_fetch_assoc($result);
    $From=$row['From'];
    $TO=$row['To'];
   echo'<td><div class="textbox">
      <div>'.$From.' - '.$TO.'</div>
    </div>
    </td>';
    $sql="Select * from DoctorSchedule where DoctorID =".$UserID." AND Day='Saturday'";
    $result = mysqli_query($con, $sql);
    $row=mysqli_fetch_assoc($result);
    $From=$row['From'];
    $TO=$row['To'];
   echo'<td><div class="textbox">
      <div>'.$From.' - '.$TO.'</div>
    </div>
    </td>';
    $sql="Select * from DoctorSchedule where DoctorID =".$UserID." AND Day='Sunday'";
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