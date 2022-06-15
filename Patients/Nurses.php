<!DOCTYPE html>
<html >
  <head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../style.css">
    <title>Search for Nurses</title>
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
  function Search(str){
    var xhttp;
    
    
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    document.getElementById("Search").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "FilterNurses.php?q="+str, true);
  xhttp.send();} 
  </script>
<body>
<div class="topnav">
    <a  class="active" >Elderly-Care</a>
    <a  href="Pprofile.php">Profile</a>
    <a  href="MyNurse.php">My Nurse</a>
    <a  href="MyNurseSchedule.php">My Nurse Schedule</a>
    <a  class="red" href="Nurses.php">Nurses</a>
    <a   href="Hospitals.php">Hospitals</a>
    <a  href="Contactadmin.php">Contact admin</a>
    <a  class="Logout" href="../Logout.php">Logout</a>
  </div>
<?php
require('../config.php');

$sql = "select users.FirstName, users.LastName, users.Email, users.PhoneNumber, nurserate.Rate, Nurses.WorkingHospital from users
 INNER JOIN nurses INNER JOIN nurserate on users.userID=nurses.NurseID where nurses.Online='1' " ;

// execute the above query on the $con connection
$result = mysqli_query($con, $sql);

//  in case the query is not valid or misspelled (problem in the execution)
if(!$result){
    die('Something went wrong!');
}
echo'<br>';
echo'<h2>Search of Online Nurses:</h2>';
echo'<input type="search" onkeyup="Search(this.value)">';
echo '<div id="Search">';
 echo' <table id="customers">
  <tr>
    <th>Name</th>
    <th>Email</th>
    <th>Phone Number</th>
    <th>Working Hospital</th>
    <th>Rate</th>

  </tr>';
  for($i=0; $i<mysqli_num_rows($result); $i++ ){
    $row = mysqli_fetch_assoc($result);
 echo' <tr>';
  echo'  <td>'.$row['FirstName'].' '.$row['LastName'].'</td>';
  echo'  <td>'.$row['Email'].'</td>';
  echo'  <td>'.$row['PhoneNumber'].'</td>';
  echo'  <td>'.$row['WorkingHospital'].'</td>';
  echo'  <td>'.$row['Rate'].'</td>';
  echo' </tr>';

  }  echo' </table>';
  echo '</div>';
?>
  </body>
  </html>