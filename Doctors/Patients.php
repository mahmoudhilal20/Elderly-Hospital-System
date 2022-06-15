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
    <title>Patients</title>  </head>
  <style>
  .red{
    background-color: red;
    color: white;
  }
  h2{
    color: black;
  }
  </style>
  <script>
  function Search(str){
    var xhttp;
    
    
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    document.getElementById("Search").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "FilterPatient.php?q="+str, true);
  xhttp.send();} 
  </script>
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
require('../config.php');
$Hospital=$_SESSION["hospital"];
$sql = "select Users.FirstName, Users.LastName, Patients.Hospital, Patients.PatientID from Patients 
INNER JOIN users ON patients.PatientID=users.UserID  where Hospital='".$Hospital."' ORDER BY Hospital";
// execute the above query on the $con connection
$result = mysqli_query($con, $sql);
//  in case the query is not valid or misspelled (problem in the execution)
if(!$result){
    die('Something went wrong!');
}
echo'<br>';
echo'<h2>Search for Pateints in your Hospital</h2>';
echo'<input type="search" onkeyup="Search(this.value)">';
echo '<div id="Search">';
 echo' <table id="customers">
  <tr>
    <th>Name</th>
    <th>Hospital</th>
  </tr>';
  for($i=0; $i<mysqli_num_rows($result); $i++ ){
    $row = mysqli_fetch_assoc($result);
 echo' <tr>';
  echo'  <td><a href="ThisPatient.php?PatientID='.$row['PatientID'].'">'.$row['FirstName'].' '.$row['LastName'].'</a></td>';
  echo'  <td>'.$row['Hospital'].'</td>';
  echo' </tr>';
  echo' </table>';
  echo '</div>';
  }
?>
  </body>
  </html>