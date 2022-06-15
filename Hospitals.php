<!DOCTYPE html>
<html >
  <head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style.css">
  </head>
  <style>
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
  xhttp.open("GET", "FilterHospitals.php?q="+str, true);
  xhttp.send();} 
  </script>
<body>
<div class="topnav">
        <a class="active" >Elderly-Care</a>
        <a href="home.php">Home</a>
        <a href="Signup.php">Sign up</a>
        <a href="Products.php">Products</a>
        <a class="red"  href="Hospitals.php">Hospitals</a>
        <a href="Donation.php">Donation</a>
        <a href="Aboutus.php">About us</a>
      </div>
<?php
require('config.php');

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
  </tr>';
  for($i=0; $i<mysqli_num_rows($result); $i++ ){
    $row = mysqli_fetch_assoc($result);
 echo' <tr>';
  echo'  <td>'.$row['HospitalName'].'</td>';
  echo'  <td>'.$row['HospitalLocation'].'</td>';
  echo'  <td>'.$row['HospitalPhoneNumber'].'</td>';
  echo' </tr>';

  }  echo' </table>';
  echo '</div>';
?>
  </body>
  </html>