<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" >
  <head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../style.css">
    <title>Comments on my Profile </title>
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
    <a class="red" href="Nprofile.php">Profile</a>
    <a href="MyPatient.php">My Patient</a>
    <a  href="NSchedule.php">Schedule</a>
    <a href="Contactadmin.php">Contact admin</a>
    <a class="Logout" href="../Logout.php">Logout</a>
  </div>
  <?php

if(!isset($_SESSION["Status"])){
  header("refresh:0,url=../home.php");
  die();}
else if(isset($_SESSION["Status"])){
  if($_SESSION["Status"]=="Nurse"){
  require('../config.php');
  $UserID=$_SESSION["UserID"];
 
  $sql="Select * from users where UserID =".$UserID."";
  $result = mysqli_query($con, $sql);
  $row=mysqli_fetch_assoc($result);
   
  echo'<h4>Comments on '.$row['FirstName'].' Here:<h4>';



  $sql1 = 'select nursecomments.comment, users.FirstName, users.LastName from nursecomments
   INNER JOIN users ON nursecomments.PatientID=users.UserID
   where nursecomments.nurseID='.$UserID.'';
  // execute the above query on the $con connection
  $result1 = mysqli_query($con, $sql1);

  //  in case the query is not valid or misspelled (problem in the execution)
  if(!$result1){
      die('Something went wrong!');
  }

  echo '<table border="1">';
  echo '<tr><th>Patient First Name</th><th>Last Name </th><th>Comment</th></tr>';


  for($i=0; $i<mysqli_num_rows($result1); $i++ ){
      $row1 = mysqli_fetch_assoc($result1);
      echo '<tr>';
      echo '<td width="300">'.$row1['comment'].'</a></td>';
      echo '<td width="100">'.$row1['FirstName'].'</td>';
      echo '<td width="100">'.$row1['LastName'].'</td>';
      echo '</tr>';

  }

  echo '</table>';
// test
/*
echo'<div class="gallery">';
  for($i=0; $i<mysqli_num_rows($result1); $i++ ){
      $row1 = mysqli_fetch_assoc($result1);
      echo '<tr>';
      echo '<div class="desc">'.$row1['comment'].'</div>';
      echo '<div class="desc">'.$row1['FirstName'].'</div>';
      echo '<div class="desc">'.$row1['LastName'].'</div>';
      echo '</tr>';

  }

  echo '</div>';*/
  //end of test
  }
}
  ?>



  </body>
  </html>