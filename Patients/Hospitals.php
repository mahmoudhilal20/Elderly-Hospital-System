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
    <title>Search for Hospitals</title>
  </head>
  <style>
  h2{
    color:black;
  }
  .red{
    background-color: red;
    color: white;
  }
  </style>
  <script>
    function Request(HospitalName){
    var xhttp;
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
location.reload();
    }
  };
  xhttp.open("GET", "RequestNurse.php?q="+HospitalName, true);
  xhttp.send();} 
  function Search(str){
    var xhttp;
    
    
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    document.getElementById("Search").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "FilterHospitals.php?q="+str, true);
  xhttp.send();} 
  </script>
<body>
<div class="topnav">
    <a  class="active" >Elderly-Care</a>
    <a  href="Pprofile.php">Profile</a>
    <a  href="MyNurse.php">My Nurse</a>
    <a  href="MyNurseSchedule.php">My Nurse Schedule</a>
    <a  href="Nurses.php">Nurses</a>
    <a  class="red" href="Hospitals.php">Hospitals</a>
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
$sql = 'select * from hospitals ORDER BY HospitalName';

// execute the above query on the $con connection
$result = mysqli_query($con, $sql);
//  in case the query is not valid or misspelled (problem in the execution)
if(!$result){
    die('Something went wrong!');
}
echo'<br>';
echo'<h2>Search of Hospitals:</h2>';
echo'<input type="search" onkeyup="Search(this.value)">';
echo '<div id="Search">';
 echo' <table id="customers">
  <tr>
    <th>Name</th>
    <th>Address</th>
    <th>Phone number</th>
    <th>Request For a Nurse</th>
  </tr>';
  for($i=0; $i<mysqli_num_rows($result); $i++ ){
    $row = mysqli_fetch_assoc($result);
 echo' <tr>';
  echo'  <td>'.$row['HospitalName'].'</td>';
  echo'  <td>'.$row['HospitalLocation'].'</td>';
  echo'  <td>'.$row['HospitalPhoneNumber'].'</td>';
  $sql1 = "select Request from requestnurse where hospitalName='".$row['HospitalName']."' AND PatientID='".$UserID."'";
// execute the above query on the $con connection
$result1 = mysqli_query($con, $sql1);

$row1= mysqli_fetch_assoc($result1);

if($row1['Request']=="Done")
  {echo' <td>Already Rquested</td>';}
  else 
  {echo' <td><input type="button" id="Request" onclick="Request(\''.$row['HospitalName'].'\')" value="Request" ></td>';}
  echo' </tr>';

  }  echo' </table>';
  echo '</div>';}}
?>
  </body>
  </html>