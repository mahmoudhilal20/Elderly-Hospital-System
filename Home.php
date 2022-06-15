<?php

session_start();
if(isset($_SESSION["Status"])){
     if ($_SESSION["Status"]=="Nurse"){
        header("refresh:0,url=Nurses/NProfile.php"); 
    }
    else if ($_SESSION["Status"]=="Doctor"){
      header("refresh:0,url=Doctors/DProfile.php"); 
  }
  else if ($_SESSION["Status"]=="Patient"){
    header("refresh:0,url=Patients/PProfile.php"); 
}
}
?>
<!DOCTYPE html>
<html >
  <head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Eldery Care</title>
  </head>
  <style>
  .red{
    background-color: red;
  color: white;
  }
  </style>
  <script>
  function submitt(){
 var x = document.forms["signinform"]["email"].value;
 var y = document.forms["signinform"]["password"].value;
  if(x=="" || x==null )
  {
    event.preventDefault();
    alert("Please Fill the Email");
  }

  else if(y=="" || y==null )
  {
    event.preventDefault();
    alert("Please enter passowrd");
  }}
  </script>
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
        if(empty($_POST['email'] || empty($_POST['password'])))
            die('email or password not entered!');

        $email = $_POST['email'];
        $password = $_POST['password'];
        $hashedpassword=hash('sha256',$password);
        $sql = "select * from users where (Email='".$email."' OR UserID='".$email."') and HashedPassword='".$hashedpassword."'";
        $result = mysqli_query($con, $sql);
        if(!$result)
            die('something went wrong');
            
        if(mysqli_num_rows($result)==0){
           header('refresh:3, url=home.php');
           echo '<p>Wrong credential</p>';
            
        }
        else{
            $row = mysqli_fetch_assoc($result);
            $UserID=$row['UserID'];
            if($row['Status']=="Doctor"){
                $_SESSION["Status"]="Doctor";
                $_SESSION["UserID"]="$UserID";
                    header('refresh:0;url=Doctors/DProfile.php');
                   }
                   else if($row['Status']=="Nurse"){
                    $_SESSION["Status"]="Nurse";
                    $_SESSION["UserID"]="$UserID";
                        header('refresh:0;url=Nurses/NProfile.php');
                       }
                       else if($row['Status']=='Patient'){
                        $_SESSION["Status"]="Patient";
                        $_SESSION["UserID"]="$UserID";
                            header('refresh:0;url=Patients/PProfile.php');
                           }
                           else if($row['Status']=='PendingPatient'){
                           header("refresh:3,url=home.php");
                           die("Please wait until you get an email that your account is activated");}
                           else if($row['Status']=='PendingNurse'){
                           header("refresh:3,url=home.php");
                           die("Please wait until you get an email that your account is activated");}
                           else if($row['Status']=='PendingDoctor'){
                           header("refresh:3,url=home.php");
                           die("Please wait until you get an email that your account is activated");}
                           else if($row['Status']=='Deactivated Nurse'){
                            header("refresh:3,url=home.php");
                            die("This acount is Deactivated");}
        }
            
        
            
    }
    else{
        //  Show the form
        echo '
  <form name="signinform" action="home.php" id="p1" method="POST" onsubmit="submitt()">
  <div class="login-box">
    <h1>Login</h1>
    <div class="textbox">
      <input type="text" placeholder="Email or ID" name="email">
    </div>
  
    <div class="textbox">
      <input type="password" placeholder="Password" name="password">
    </div>
    <input type="submit" class="btn" value="Sign in" name="submit">
    
    <a class="Forget" href="Forgetpassword.php">Forget password?</a>
    </div>
    </form>';
    }?>
</body>
</html>