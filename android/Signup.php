<?php
  require('../config.php');
  $str="";
  $FirstName = $_GET['FirstName'];
  $LastName = $_GET['LastName'];
  $Gender = $_GET['Gender'];
  $DateofBirth=date('Y-m-d', strtotime($_GET['DateofBirth']));
  $MaritalState = $_GET['MaritalState'];
  $PhoneNumber = $_GET['PhoneNumber'];
  $Email = $_GET['Email'];
  $Password = $_GET['Password'];
  $Address=$_GET['Address'];
$sql="select * from users where Email='".$Email."'";
$result = mysqli_query($con, $sql);
if(mysqli_num_rows($result)!=0) 
{ 
$str="Already Registered";
}
else{
$hashedpassword=hash('sha256',$Password);
$sql1 = "insert into users(Email, HashedPassword, FirstName, LastName, Gender,DateofBirth,PhoneNumber,MaritalState,Status ) 
                   values ('$Email','$hashedpassword','$FirstName','$LastName','  $Gender','$DateofBirth','.$PhoneNumber.','$MaritalState','PendingPatient')";
$result1 = mysqli_query($con, $sql1);
    $sql2="select * from users where Email='$Email'";
    $result2 = mysqli_query($con, $sql2);  
    $row2= mysqli_fetch_assoc($result2);
    $UserID=$row2['UserID'];
  $sql7="insert into Patients(PatientID,Address,Online)values('".$UserID."','".$Address."',1)";
  $result7 = mysqli_query($con, $sql7);


$str="successful";
}
echo json_encode($str); 
  ?>