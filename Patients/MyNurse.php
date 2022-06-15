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
  <script>
 function Leave(UserID){
    var xhttp;
    if (confirm("Are you Sure you want to Leave this Nurse?")) {
    
    
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        window.location.href = "MyNurse.php";
    }
  };

  xhttp.open("GET", "LeaveNurse.php?q="+UserID, true);
  xhttp.send();} }

  </script>
  <style>
  h4{
    color: red;
  }  .red{
    background-color: red;
    color: white;}
  </style>
  
<body>
<div class="topnav">
<a  class="active" >Elderly-Care</a>
    <a  href="Pprofile.php">Profile</a>
    <a  class="red" href="MyNurse.php">My Nurse</a>
    <a   href="MyNurseSchedule.php">My Nurse Schedule</a>
    <a   href="Nurses.php">Nurses</a>
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
    $row1=mysqli_fetch_assoc($result1);
    if($row1==0)
    {echo'<br>you dont have a nurse<br><br>
      <button class="Mbtn"><a href="Hospitals.php"> Request for a nurse from a Hospital</a></button>';}
    else{
    $NurseID=$row1['NurseID'];
    $sql="select * from users where userID=".$NurseID."";
    $result = mysqli_query($con, $sql);
    $row=mysqli_fetch_assoc($result);
    $FirstName=$row['FirstName'];
    $LastName=$row['LastName'];
    $Email=$row['Email'];
    $Gender=$row['Gender'];
    $DateofBirth=$row['DateofBirth'];
    $from = new DateTime($DateofBirth);
    $to   = new DateTime('today');
    $MaritalState=$row['MaritalState'];
    $Status=$row['Status'];
    $UserPhoto=$row['UserPhoto'];
    $sql2="Select * from Nurses where NurseID =".$NurseID."";
    $result2 = mysqli_query($con, $sql2);
    $row2=mysqli_fetch_assoc($result2);
    $WorkingHospital=$row2['WorkingHospital'];
    $Online=$row2['Online'];
    echo'
    <br>
<div class="info" id="initialinfo">
<img src ="../UserPhotos/'.$UserPhoto.'"  width ="100px" height = "100px"/>
 <h4>First Name: '.$FirstName.'</h4>
 <h4>Last Name: '.$LastName.'</h4>
 <h4>Email: '.$Email.'</h4>
 <h4>Gender: '.$Gender.'</h4>
 <h4>Date of Birth: '.$DateofBirth.' ('. $from->diff($to)->y.' years Old)</h4>
 <h4>Marital State: '.$MaritalState.'</h4>
 ';
 if($WorkingHospital!=null){
   echo'
 <h4>Working Hospital: '.$WorkingHospital.'</h4>';}
 echo'
 <h4>Status: '.$Status.'</h4>
 </div>
 <button type="button" class ="Mbtn" id="Leave" onclick="Leave(\''.$UserID.'\')">Leave Nurse</button>';
 }
 }}



    ?>
</body>
</html>

