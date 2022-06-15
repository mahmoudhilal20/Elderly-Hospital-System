<?php

require('../config.php');
$str="";
$UserID=$_GET['UserID'];
$Message = $_GET['Message'];
$sql="Select * from users where UserID =".$UserID."";
$result = mysqli_query($con, $sql);
$row=mysqli_fetch_assoc($result);
$email=$row['Email'];
$msg= "A message from ".$row['FirstName']." ".$row['LastName']."\n Email:".$row['Email']."\n".$Message."";
mail("71730026@students.liu.edu.lb","Elderly Care Message",$msg);
if($result){
$str="True";


echo json_encode($str);}
?>