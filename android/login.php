<?php
session_start();
require('../config.php');
$Email=$_GET['Email'];
$Password=$_GET['Password'];
$Email=mysqli_real_escape_string($con,$Email);
$Password=mysqli_real_escape_string($con,$Password);
$HashedPassword= hash('sha256', $Password);

$sql = "select * from users where (Email='".$Email."' OR UserID='".$Email."') and HashedPassword='".$HashedPassword."'";
$result=mysqli_query($con,$sql);
if(!$result){
    die("Something went wrong");
}
$user=array();
if(mysqli_num_rows($result)==0){
  $user['Status']="Failed";} 
if(mysqli_num_rows($result)>0){
    $row=mysqli_fetch_assoc($result);
    $user['UserID']=$row['UserID'];
    $user['Status']=$row['Status'];
    $user['FirstName']=$row['FirstName'];
    $user['LastName']=$row['LastName'];
}
echo json_encode($user); 

?>