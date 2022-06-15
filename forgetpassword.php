<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Forget password</title>
</head>
<style>
h4{
  color:black;
}
</style>
<script>
 function submitt(){
 var x = document.forms["forgetpasswordform"]["email"].value;
  if(x=="" || x==null )
  {
    event.preventDefault();
    alert("Please Fill the Email");
  }}</script>
<body>
<div class="topnav">
        <a class="active" >Elderly-Care</a>
        <a class="red" href="home.php">Home</a>
        <a href="Signup.php">Sign up</a>
        <a href="Products.php">Products</a>
        <a href="Hospitals.php">Hospitals</a>
        <a href="Donation.php">Donation</a>
        <a href="Aboutus.php">About us</a>
      </div>
<?php

if(isset($_POST['submit'])){
    require('config.php');
    if(empty($_POST['email'])){
    header('refresh:3, url=forgetpassword.php');
    echo '<p>Wrong credential</p>';}

    $email = $_POST['email'];
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
       die("Invalid email");
      


       $six_digit_random_number = rand(100000, 999999);
       $msg="Dear ".$email."\n your new password is ".$six_digit_random_number."";
       $hashedpassword=hash('sha256',$six_digit_random_number);
     $sql1="Select Email from users where Email ='".$email."'";
     $result = mysqli_query($con, $sql1);

    if(mysqli_num_rows($result)==0){
    header("refresh:2,url='forgetpassword.php'");
echo("This is not a registered Email");}
    else{
  $sql2 = "update users set HashedPassword='".$hashedpassword."'where Email='".$email."'";
  
    $result = mysqli_query($con, $sql2);
    if(!$result)
        die('something went wrong');
    else{
       mail($email,"Elderly Care New Password",$msg);
      header("refresh:2,url='home.php'");
        echo"<h4>Password Changed. Please check your Email for the new password</h4>";
    }}
        
    
        
}
else{
    //  Show the form
    echo '

    <form name="forgetpasswordform" action="forgetpassword.php" id="p1" method="POST" onsubmit="submitt()">
    <div class="login-box">
    <h1>Forget Password</h1>
    <div class="textbox">
        <input type="text" class="form-control" id="ex3" name="email" placeholder="Enter your email Address ">
        </div>
        <br>
        <input type="submit" value="send" class="btn btn-primary" id="p2"  name="submit">
        </div>
    </form>';
}
?>
</body>
</html>