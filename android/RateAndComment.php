<?php
require('../config.php');
  $PatientID=$_GET['PatientID'];
  $NurseID = $_GET['NurseID'];
  $Ammount = $_GET['Ammount'];
  $Comment = $_GET['Comment'];
$response="";
  $sql="select * from nursecomments where PatientID='".$PatientID."' AND NurseID='".$NurseID."'";
  $result = mysqli_query($con, $sql);
  if(mysqli_num_rows($result)>0){
    $sql1="Update nursecomments SET Comment='".$Comment."'where PatientID='".$PatientID."' AND NurseID='".$NurseID."'";
    $result1 = mysqli_query($con, $sql1);
    else{
    $sql2="insert into nursecomments (PatientID,NurseID,Comment) values ('".$PatientID."','".$NurseID."','".$Comment."')";
    $result2 = mysqli_query($con, $sql2);
    }
    $sql="select * from nurserate where PatientID='".$PatientID."' AND NurseID='".$NurseID."'";
  $result = mysqli_query($con, $sql);
  if(mysqli_num_rows($result)>0){
    $sql1="Update nurserate SET Rate='".$Ammount."'where PatientID='".$PatientID."' AND NurseID='".$NurseID."'";
    $result1 = mysqli_query($con, $sql1);
    else{
    $sql2="insert into nurserate (PatientID,NurseID,Rate) values ('".$PatientID."','".$NurseID."','".$Ammount."')";
    $result2 = mysqli_query($con, $sql2);
    }
$response="Success";
  echo json_encode ($response);
  ?>