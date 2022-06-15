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
    <title>Patient</title>
  </head>
  <script>
  function remove(PatientID,MedicineName){

    xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {

    location.reload();
  };
  xhttp.open("GET", "removeMedicine.php?PatientID="+PatientID+"&MedicineName="+MedicineName, true);
  xhttp.send();}
  function AddMedicine(){

    document.getElementById("AddMedicine").style.display="none";
      document.getElementById("Add").style.display="block";
  } 

  function Add(PatientID,DoctorID){
    var DateFrom= document.getElementById("DateFrom").value;
    var DateTo= document.getElementById("DateTo").value;
    var MedicineName= document.getElementById("MedicineName").value;
    if(MedicineName=="" || MedicineName==null)
  {
    event.preventDefault();
    alert("Please Fill the Medicine Name");
  }
   else if(DateFrom=="" || DateFrom==null  || DateFrom=="1970-01-01" )
  {
    event.preventDefault();
    alert("Please Fill the Date From");
  }

  else if(DateTo=="" || DateTo==null  || DateTo=="1970-01-01" )
  {
    event.preventDefault();
    alert("Please Fill the Date To");
  }
  else{
    xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {

    window.location.href = "ThisPatient.php?PatientID="+PatientID;
  };
  xhttp.open("GET", "AddMedicine.php?PatientID="+PatientID+"&DoctorID="+DoctorID+"&MedicineName="+MedicineName+"&DateFrom="+DateFrom+"&DateTo="+DateTo, true);
  xhttp.send();}}
  </script>
  <style>
  .red{
    background-color: red;
    color: white;}
  </style>
<body>
<div class="topnav">
    <a class="active" >Elderly-Care</a>
    <a  href="Dprofile.php">Profile</a>
    <a class="red"  href="Patients.php">Patients</a>
    <a href="DSchedule.php">Schedule</a>
    <a href="Contactadmin.php">Contact admin</a>
    <a class="Logout" href="../Logout.php">Logout</a>
  </div>
  <?php
$UserID=$_SESSION["UserID"];
 require('../config.php');
if(isset($_SESSION["Status"])){
  if($_SESSION["Status"]=="Doctor"){ 
      $PatientID=$_GET['PatientID'];
      $sql="Select * from users where UserID =".$PatientID."";
      $result= mysqli_query($con, $sql);
      $row=mysqli_fetch_assoc($result);
    $sql1="Select * from patients where PatientID =".$PatientID."";
    $result1 = mysqli_query($con, $sql1);
    $row1=mysqli_fetch_assoc($result1);
    $sql2="Select * from medications where PatientID =".$PatientID." AND Status='Active'";
    $result2= mysqli_query($con, $sql2);
    $FirstName=$row['FirstName'];
    $LastName=$row['LastName'];
    $Gender=$row['Gender'];
    $DateofBirth=$row['DateofBirth'];
    $from = new DateTime($DateofBirth);
    $to   = new DateTime('today');
    $MaritalState=$row['MaritalState'];
    $Address=$row1['Address'];
    $HospitalName=$row1['Hospital'];
    echo'
 <h4>First Name: '.$FirstName.'</h4>
 <h4>Last Name: '.$LastName.'</h4>
 <h4>Gender: '.$Gender.'</h4>
 <h4>Date of Birth: '.$DateofBirth.' ('. $from->diff($to)->y.' years Old)</h4>
 <h4>Marital State: '.$MaritalState.'</h4>
 <h4>Marital State: '.$Address.'</h4>';
echo'<h4>Status: Hospital Patient </h4>';
echo'<h4>Hospital Name:'.$HospitalName.'</h4>';
echo'<h4>Medications:</h4>'; 
echo '<table border="1">';
echo '<tr><th>Medicine Name</th><th></th></tr>';
for($i=0; $i<mysqli_num_rows($result2); $i++ ){
  $row2=mysqli_fetch_assoc($result2);
  echo '<tr>';
  $MedicineName=$row2['MedicineName'];
  echo '<td >'.$MedicineName.'</td>';
  echo'<td><button onclick="remove(\''.$PatientID.'\',\''.$MedicineName.'\')">Remove</button></td>';
  echo '</tr>';
 }  
 echo '</table>'; 
 echo'<button class="Mbtn" id="AddMedicine" onclick="AddMedicine()">Add Medicine</button>';
 echo'<br>';
 echo'<br>';

 echo'<div id="Add" style="display:none">
<input type="text" id=MedicineName placeholder="Put the medicine Name here">
From: <input type="Date" id="DateFrom">
To: <input type="Date" id="DateTo">

<button class="Mbtn" onclick="Add(\''.$PatientID.'\',\''.$UserID.'\')">Add</button>
 </div>';
}}
else  {
    header("refresh:0,url=../home.php");
die();}?>
</body>
</html>