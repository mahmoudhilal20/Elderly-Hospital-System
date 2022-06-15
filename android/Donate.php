<?php
$T="";
$FirstName=$_GET['FirstName'];

$LastName=$_GET['LastName'];

$Amount=$_GET['Amount'];

require("../config.php");

$sql="Insert into donations (DonatorFirstName,DonatorLastName,Quantity) values('".$FirstName."','".$LastName."','".$Amount."')";
$result = mysqli_query($con, $sql);
if($result){
$T="True";}


echo json_encode($T);


?>