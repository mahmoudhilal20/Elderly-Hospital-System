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
    <title>My Patient</title>
  </head>
  <script>
  function assignn(MedicineName,date,PatientID,Time) {
 var checkBox = document.getElementById("mycheck");
  if (checkBox.checked == true){
    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
      document.getElementById("BB").innerHTML = this.responseText;
      }
    };
    xhttp.open("GET", "AssignMedication.php?MedicineName="+MedicineName+"&Date="+date+"&PatientID="+PatientID+"&Time="+Time, true);
    xhttp.send();
    } 
  } 
  
  
  </script>
  <style>
  h4{
    color:red;
  }
  .red{
    background-color: red;
    color: white;
  }.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
  </style>
  
<body>
<div class="topnav">
    <a class="active" >Elderly-Care</a>
    <a  href="Nprofile.php">Profile</a>
    <a class="red" href="MyPatient.php">My Patient</a>
    <a  href="NSchedule.php">Schedule</a>
    <a href="Contactadmin.php">Contact admin</a>
    <a class="Logout" href="../Logout.php">Logout</a>
  </div>
  <?php
$UserID=$_SESSION["UserID"];
 require('../config.php');
if(isset($_SESSION["Status"])){
  if($_SESSION["Status"]=="Nurse"){ 
    $sql="Select PatientID from ordernurse where NurseID =".$UserID." AND Status='Active'";
    $result = mysqli_query($con, $sql);
    $row=mysqli_fetch_assoc($result);
    $PatientID=$row['PatientID'];
    $sql1="Select * from patients where PatientID =".$PatientID."";
    $result1= mysqli_query($con, $sql1);
    $row1=mysqli_fetch_assoc($result1);

    $sql2="Select * from users where UserID =".$PatientID."";
    $result2= mysqli_query($con, $sql2);
    $row2=mysqli_fetch_assoc($result2);
    
    $sql3="Select * from medications where PatientID =".$PatientID." AND Status='Active'";
    $result3= mysqli_query($con, $sql3);
    $FirstName=$row2['FirstName'];
    $LastName=$row2['LastName'];
    $Gender=$row2['Gender'];
    $DateofBirth=$row2['DateofBirth'];
    $from = new DateTime($DateofBirth);
    $to   = new DateTime('today');
    $MaritalState=$row2['MaritalState'];
    $Address=$row1['Address'];
    $Online=$row1['Online'];
    echo'
 <h4>First Name: '.$FirstName.'</h4>
 <h4>Last Name: '.$LastName.'</h4>
 <h4>Gender: '.$Gender.'</h4>
 
 <h4>Date of Birth: '.$DateofBirth.' ('. $from->diff($to)->y.' years Old)</h4>
 <h4>Marital State: '.$MaritalState.'</h4>
 <h4>Marital State: '.$Address.'</h4>';
 if($Online=='1'){
  echo'<h4>Status: Home Patient</h4>';
 }
 else {
   $HospitalName=$row1['Hospital'];
  echo'<h4>Status: Hospital Patient Patient</h4>';
  echo'<h4>Hospital Name:'.$HospitalName.'</h4>';
 }
 echo'<h4>Medications:</h4>'; 
 echo '<table border="1">';
$Medicinearray=array();
$AssignArray=array();
 echo '<tr><th>Medicine Name</th><th>Morning</th><th>AfterNoon</th><th>Night</th></tr>';
 $Date=date("Y-m-d");
 for($i=0; $i<mysqli_num_rows($result3); $i++ ){
  $row3=mysqli_fetch_assoc($result3);
  $DateFrom= $row3['DateFrom'];
  $DateTO= $row3['DateTo'];
  if ($Date>$DateFrom && $Date<$DateTO ){
  echo '<tr>';
  echo '<td >'.$row3['MedicineName'].'</td>';
  $MedicineName=$row3['MedicineName'];
  $sql4="select * from assignedmedications where PatientID =".$PatientID." AND Date='".$Date."' AND MedicineName='".$MedicineName."' AND 
  Time='Morning'";
  $result4= mysqli_query($con, $sql4);
  $row4=mysqli_fetch_assoc($result4);
  if(mysqli_num_rows($result4)==0) {
  echo'<td><label id="BB" class="switch">
  <input type="checkbox" id="mycheck"  onclick="assignn(\''.$MedicineName.'\',\''.$Date.'\',\''.$PatientID.'\',\'Morning\')">
  <span class="slider round"></span>
</label></td>';

 }  
 else 
 {
 echo'<td>
<h3>Assigned</h3>
  </td>';

 }
 $sql4="select * from assignedmedications where PatientID =".$PatientID." AND Date='".$Date."' AND MedicineName='".$MedicineName."' AND 
 Time='AfterNoon'";
 $result4= mysqli_query($con, $sql4);
 $row4=mysqli_fetch_assoc($result4);
 if(mysqli_num_rows($result4)==0) {
 echo'<td><label id="BB" class="switch">
 <input type="checkbox" id="mycheck"  onclick="assignn(\''.$MedicineName.'\',\''.$Date.'\',\''.$PatientID.'\',\'AfterNoon\')">
 <span class="slider round"></span>
</label></td>';

}  
else 
{
echo'<td>
<h3>Assigned</h3>
 </td>';

}
$sql4="select * from assignedmedications where PatientID =".$PatientID." AND Date='".$Date."' AND MedicineName='".$MedicineName."' AND 
Time='Night'";
$result4= mysqli_query($con, $sql4);
$row4=mysqli_fetch_assoc($result4);
if(mysqli_num_rows($result4)==0) {
echo'<td><label id="BB" class="switch">
<input type="checkbox" id="mycheck"  onclick="assignn(\''.$MedicineName.'\',\''.$Date.'\',\''.$PatientID.'\',\'Night\')">
<span class="slider round"></span>
</label></td>';

}  
else 
{
echo'<td>
<h3>Assigned</h3>
</td>';

} 

 echo'</tr>';
}
}
 echo '</table>'; 
}}
else  {header("refresh:0,url=../home.php");
die();}?>
</body>
</html>