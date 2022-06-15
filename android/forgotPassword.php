<?php
require("../config.php");
$str="";
$Email=$_GET['Email'];

if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) 
die("Invalid email");

$sql="select * from users where Email='".$Email."'";
$result=mysqli_query($con,$sql);
if(mysqli_num_rows($result)==0){
    $str="Not Registered";}
    else if(mysqli_num_rows($result)>0){
    $six_digit_random_number = rand(100000, 999999);
    $msg="Dear ".$Email."\n your new password is ".$six_digit_random_number."";
    $hashedpassword=hash('sha256',$six_digit_random_number);
    $sql = "update users set HashedPassword='".$hashedpassword."'where Email='".$Email."'";
    $result=mysqli_query($con,$sql);
    $str="Password has been changed.Please check your email for the new password.";
    $msg="Dear ".$Email."\n your new password is ".$six_digit_random_number."";
    mail($Email,"Elderly Care New Password",$msg);
}
echo json_encode($str);

      
?>
