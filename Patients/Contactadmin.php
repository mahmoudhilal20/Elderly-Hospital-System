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
    <title>Contact Admin</title>
  </head>
  <script>
    function submitt(){
 var x = document.forms["signupform"]["Message"].value;
  if(x=="" || x==null )
  {
    event.preventDefault();
    alert("Please Fill message");
  }}
  </script>
  <style>
  .red{
    background-color: red;
    color: white;
  }
  </style>
<body>
<div class="topnav">
    <a class="active" >Elderly-Care</a>
    <a  href="Pprofile.php">Profile</a>
    <a  href="MyNurse.php">My Nurse</a>
    <a href="MyNurseSchedule.php">My Nurse Schedule</a>
    <a  href="Hospitals.php">Nurses</a>
    <a  href="Hospitals.php">Hospitals</a>
    <a class="red" href="Contactadmin.php">Contact admin</a>
    <a class="Logout" href="../Logout.php">Logout</a>
  </div>
  <?php
   if(!isset($_SESSION["Status"])){
    header("refresh:0,url=../home.php");
    die();}
elseif(isset($_SESSION["Status"])){
  if($_SESSION["Status"]=="Patient"){ 
     if(isset($_POST['submit'])){
      require('../config.php');
      $UserID=$_SESSION["UserID"];
      $Message = $_POST['Message'];
      $sql="Select * from users where UserID =".$UserID."";
      $result = mysqli_query($con, $sql);
      $row=mysqli_fetch_assoc($result);
      $email=$row['Email'];
      $msg= "A message from ".$row['FirstName']." ".$row['LastName']."\n Email:".$row['Email']."\n".$Message."";
      mail("71730026@students.liu.edu.lb","Elderly Care Message",$msg);}
      else {
      echo'
  <form action="ContactAdmin.php" name="signupform" method="POST" onsubmit="submitt()">
  <div class="login-box">
    <h2>you can contact us hear:</h2>
    <div class="textbox">
      <i class="fas fa-user"></i>
      <input type="text" placeholder="Type Your message here" name="Message">
    </div>
    <input type="submit" class="btn" value="Submit">
    </div>
    </form>
';}
}
}
?>
</body>
</html>