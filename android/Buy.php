<?php
require('../config.php');
  $ProductID=$_GET['ID'];
  $FirstName = $_GET['FirstName'];
  $LastName = $_GET['LastName'];
  $Address = $_GET['Address'];
  $tel = $_GET['PhoneNumber'];
  $quantity = $_GET['Quantity'];
$response="";
  $sql="select * from products where ProductID='".$ProductID."'";
  $result = mysqli_query($con, $sql);
  $row=mysqli_fetch_assoc($result);
  $quantityavailable=$row['Quantity'];
  if($quantity>$quantityavailable){
$response="The Amount is unavailable";
die();
  }
  
  $sql1 = "insert into purchase (ProductID, CustomerFirstName, CustomerlastName, Address, Phone,Quantity ) 
                   values ('$ProductID','$FirstName','$LastName','$Address','$tel','$quantity')";
$result1 = mysqli_query($con, $sql1);

$response="True";
  echo json_encode ($response);
  ?>