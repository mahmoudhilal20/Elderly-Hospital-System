<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Sign Up</title>
</head>
<script>

function submitt(){
 var x = document.forms["signupform"]["FirstName"].value;
 var y = document.forms["signupform"]["LastName"].value;
 var z = document.forms["signupform"]["DateofBirth"].value;
 var h = document.forms["signupform"]["Email"].value;
 var u = document.forms["signupform"]["Password"].value;
 var p = document.forms["signupform"]["ConfirmPassword"].value;
  if(x=="" || x==null )
  {
    event.preventDefault();
    alert("Please Fill the first Name");
  }

  else if(y=="" || y==null )
  {
    event.preventDefault();
    alert("Please Fill the Last Name");
  }

  else if(z=="" || z==null || z=="1970-01-01")
  {
    event.preventDefault();
    alert("Please Choose your birth date");
  }

  else  if(h=="" || h==null)
  {
    event.preventDefault();
    alert("Please enter your email");
  }

  else if(u=="" || u==null)
  {
    event.preventDefault();
    alert("Please Enter Password");
  }
  else if (u.length<6){
    event.preventDefault();
    alert("Password should be at least 6 characters");
  }

  else if(p=="" || p==null)
  {
    event.preventDefault();
    alert("Please fill the confirmed password field");}
    else if( p!=u)
  {  event.preventDefault();
    alert(" Password and Confirmed password does not match");
}}
function Patient(){
  document.getElementById("Psignup").style.display = "block"; 
  document.getElementById("Dsignup").style.display = "none"; 
  document.getElementById("Nsignup").style.display = "none"; 
}
function Doctor(){
  document.getElementById("Psignup").style.display = "none"; 
  document.getElementById("Dsignup").style.display = "block"; 
  document.getElementById("Nsignup").style.display = "none"; 
}
function Nurse(){
  document.getElementById("Psignup").style.display = "none"; 
  document.getElementById("Dsignup").style.display = "none"; 
  document.getElementById("Nsignup").style.display = "block"; 
}
function nothing(){
  document.getElementById("Psignup").style.display = "none"; 
  document.getElementById("Dsignup").style.display = "none"; 
  document.getElementById("Nsignup").style.display = "none"; 
}
</script>
<body>
    <div class="topnav">
        <a class="active" >Elderly-Care</a>
        <a href="home.php">Home</a>
        <a class="red" href="Signup.php">Sign up</a>
        <a href="Products.php">Products</a>
        <a href="Hospitals.php">Hospitals</a>
        <a href="Donation.php">Donation</a>
        <a href="Aboutus.php">About us</a>
      </div>
<?php  require('config.php');
if(isset($_POST['submit'])){
  if(empty($_POST['FirstName'])){
    die("First Name is empty");
  }
  if(empty($_POST['LastName'])){
    die("Last Name is empty");
  }
  if(empty($_POST['Email'])){
    die("Email is empty");
  }
  if(empty($_POST['PhoneNumber'])){
    die("Phone Number is empty");
  }
  if(empty($_POST['Password'])){
    die("Password is empty");
  }
  if(empty($_POST['ConfirmPassword'])){
    die("Confirm Password is empty");
  }
  $FirstName = $_POST['FirstName'];
  $LastName = $_POST['LastName'];
  $Gender = $_POST['Gender'];
  $DateofBirth=date('Y-m-d', strtotime($_POST['DateofBirth']));
  $MaritalState = $_POST['MaritalState'];
  $Email = $_POST['Email'];
  $PhoneNumber = $_POST['PhoneNumber'];
  $Password = $_POST['Password'];
  $CPassword = $_POST['ConfirmPassword'];
  $Status=$_POST['Status'];
  if($Password!=$CPassword){
    die("Password and confirmed password does not match");
  }

$sql="select * from users where Email='".$Email."'";
$result = mysqli_query($con, $sql);
if(mysqli_num_rows($result)!=0) 
{  header('refresh:3, url=signup.php');
die ('<p>Email is already taken</p>');
header("refresh:3;url=signup.php");
}

$hashedpassword=hash('sha256',$Password);

if($Gender=="Male"){
  $Gender="Male";}
  else if($Gender=="Female"){
    $Gender="Female";
  }
  
  if($Status=="Doctor"){
    $Status="PendingDoctor";
    $DoctorMajor = $_POST['DoctorMajor'];
    $DHospital = $_POST['DHospital'];
  }
    else if($Status=="Nurse"){
      $Status="PendingNurse";
      $NStatus = $_POST['NStatus'];
  $NHospital = $_POST['NHospital'];}

      else if($Status=="Patient"){
        $Status="PendingPatient";
        $PatientAddress = $_POST['PatientAddress'];}


$sql1 = "insert into users(Email, HashedPassword, FirstName, LastName, Gender,DateofBirth,PhoneNumber,MaritalState,Status ) 
                   values ('$Email','$hashedpassword','$FirstName','$LastName','  $Gender','$DateofBirth','.$PhoneNumber.','$MaritalState','$Status')";
$result1 = mysqli_query($con, $sql1);
if(!$result1)
die('1:something went wrong');
    $sql2="select * from users where Email='$Email'";
    $result2 = mysqli_query($con, $sql2);  
    if(!$result2)
    die('2:something went wrong');
    $row2= mysqli_fetch_assoc($result2);
    $UserID=$row2['UserID'];
if($Status=="PendingDoctor"){
          if(isset($_FILES['Dimgsrc'])){

          $errors= array();
          $file_name = $_FILES['Dimgsrc']['name'];
          $file_size =$_FILES['Dimgsrc']['size'];
          $file_tmp =$_FILES['Dimgsrc']['tmp_name'];
          $file_type=$_FILES['Dimgsrc']['type'];
          $fileNameCmps = explode(".", $file_name);
          $file_ext = strtolower(end($fileNameCmps));
          
          $expensions= array("jpeg","jpg","png");
          
          if(in_array($file_ext,$expensions)=== false){
             $errors[]="extension not allowed, please choose a JPEG or PNG file.";
          }
          
          if($file_size > 2097152){
             $errors[]='File size must be excately 2 MB';
          }
          
          if(empty($errors)==true){
             move_uploaded_file($file_tmp,"UserPhotos/".$UserID.".".$file_ext."");
             $Dimgsrc= $UserID.".".$file_ext;
              $sql3="update users set UserPhoto='".$Dimgsrc."' where UserID=".$UserID."";
              $result3 = mysqli_query($con, $sql3);
          }else{
             print_r($errors);
          }
       }
  if(isset($_FILES['CVDoctor'])){
    $errors= array();
    $file_name = $_FILES['CVDoctor']['name'];
    $file_size =$_FILES['CVDoctor']['size'];
    $file_tmp =$_FILES['CVDoctor']['tmp_name'];
    $file_type=$_FILES['CVDoctor']['type'];
    $fileNameCmps = explode(".", $file_name);
    $file_ext = strtolower(end($fileNameCmps));
    $expensions= array("pdf");
    if(in_array($file_ext,$expensions)=== false){
       $errors[]="extension not allowed, please choose a pdf file.";
    }
    if($file_size > 10485760){
       $errors[]='File size must be less than 10 MB';
    }
    if(empty($errors)==true){
       move_uploaded_file($file_tmp,"Doctors/CVDoctors/".$UserID.".pdf");
    }else{
       print_r($errors);
       echo $file_ext;
       header("refresh:3;url=signup.php");
    }
 }
 $CVFile= $UserID.".".$file_ext;
  $sql4="insert into doctors(DoctorID,WorkingHospital,Major,CVDoctor)values('".$UserID."','".$DHospital."','".$DoctorMajor."','".$CVFile."')";
  $result4 = mysqli_query($con, $sql4);}
else if($Status=="PendingNurse"){
           if(isset($_FILES['Nimgsrc'])){

          $errors= array();
          $file_name = $_FILES['Nimgsrc']['name'];
          $file_size =$_FILES['Nimgsrc']['size'];
          $file_tmp =$_FILES['Nimgsrc']['tmp_name'];
          $file_type=$_FILES['Nimgsrc']['type'];
          $fileNameCmps = explode(".", $file_name);
          $file_ext = strtolower(end($fileNameCmps));
          
          $expensions= array("jpeg","jpg","png");
          
          if(in_array($file_ext,$expensions)=== false){
             $errors[]="extension not allowed, please choose a JPEG or PNG file.";
          }
          
          if($file_size > 2097152){
             $errors[]='File size must be excately 2 MB';
          }
          
          if(empty($errors)==true){
             move_uploaded_file($file_tmp,"UserPhotos/".$UserID.".".$file_ext."");
             $Nimgsrc= $UserID.".".$file_ext;
              $sql5="update users set UserPhoto='".$Nimgsrc."' where UserID=".$UserID."";
              $result5 = mysqli_query($con, $sql5);
          }else{
             print_r($errors);
          }
       }
  if(isset($_FILES['CVNurse'])){
    $errors= array();
    $file_name = $_FILES['CVNurse']['name'];
    $file_size =$_FILES['CVNurse']['size'];
    $file_tmp =$_FILES['CVNurse']['tmp_name'];
    $file_type=$_FILES['CVNurse']['type'];
    $fileNameCmps = explode(".", $file_name);
    $file_ext = strtolower(end($fileNameCmps));
    $expensions= array("pdf");
    if(in_array($file_ext,$expensions)=== false){
       $errors[]="extension not allowed, please choose a pdf file.";
    }
    if($file_size > 10485760){
       $errors[]='File size must be less than 10 MB';
    }
    if(empty($errors)==true){
       move_uploaded_file($file_tmp,"Nurses/CVNurses/".$UserID.".pdf");
       echo $UserID;
    }else{
       print_r($errors);
       header("refresh:3;url=signup.php");
    }
 }
 $CVFile= $UserID.".".$file_ext;
  $sql6="insert into nurses(NurseID,WorkingHospital,Online,CVNurse)values('".$UserID."','".$NHospital."',1,'".$CVFile."')";
  $result6 = mysqli_query($con, $sql6);
  if(!$result6)
  die('6:something went wrong');}
    else if($Status=="PendingPatient"){
  $sql7="insert into Patients(PatientID,Address,Online)values('".$UserID."','".$PatientAddress."',1)";
  $result7 = mysqli_query($con, $sql7);
  if(!$result7)
  die('7:something went wrong');}
    header("refresh:3;url=home.php");
    
    echo '<p>successful insertion<p>';
     
}
else{
  //  Show the form
  echo '
      <form name="signupform" action="Signup.php"  method="POST" enctype="multipart/form-data" onsubmit="submitt()">
      <div class="login-box">
    <h1>Signup</h1>
    <div class="textbox">
      <input type="text" placeholder="Firstname" name="FirstName">
    </div>
    <div class="textbox">
      <input type="text" placeholder="Lastname" name="LastName">
    </div>
    <h2>Gender:</h2>
      <input type="radio" value="male" name="Gender" checked>
      <label for="male">Male</label><br>
      <input type="radio"   value="Female" name="Gender">
      <label for="female">Female</label><br>
    <div class="textbox">
      <input type="date" name="DateofBirth">
    </div>
 <h2> Marital Status</h2>
  <input type="radio" value="Single" name="MaritalState" checked>
      <label for="Single">Single</label><br>
      <input type="radio" value="Married" name="MaritalState">
      <label for="Married">Married</label><br>
    <div class="textbox">
      <input type="email" placeholder="email" name="Email">
    </div>

    <div class="textbox">
  <h2>Phone Number:</h2>
  <input type="tel" id="phone" name="PhoneNumber" placeholder="70123456" pattern="[0-9]{2}[0-9]{6}" required>

    </div>

    <div class="textbox">
      <input type="password" placeholder="password" name="Password">
    </div>
    <div class="textbox">
      <input type="password" placeholder="Confirm Password" name="ConfirmPassword">
    </div>
  <div class="dropdown">
  Category:  <select  class="dropbtn" name="Status">
  <option value="0" onclick="nothing()">--</option>
  <option onclick="Patient()" value="Patient">Patient</option>
  <option onclick="Nurse()" value="Nurse">Nurse</option>
  <option onclick="Doctor()" value="Doctor">Doctor</option>
</select>
</div>

<div id="Psignup" style="display:none">
      <h3>please enter your address</h3>
      <div class="textbox">
      <input type="text" placeholder="Address" name="PatientAddress">
    </div>
    </div>


    <div id="Dsignup" style="display:none">
    <div class="textbox">
    <h3>Please Type your Major</h3>
      <input type="text" placeholder="Major" name="DoctorMajor">
    </div>
    <br>
    <h3>Please Enter your photo</h3>
    <input type="file" value="imgsrc" name="Dimgsrc" id="imgsrc"  >
    <br>
    <h3>Please upload your CV</h3>
      <input type="file" value="CVDoctor" name="CVDoctor">
      <div class="dropdown">
      Hospital:  <select  class="dropbtn" name="DHospital">
      <option value="0">--</option>';
      $sql6 = 'select * from hospitals ORDER BY HospitalName';

// execute the above query on the $con connection
$result6 = mysqli_query($con, $sql6);
for($i=0; $i<mysqli_num_rows($result6); $i++ ){
$row6 = mysqli_fetch_assoc($result6);
echo'
<option value="'.$row6['HospitalName'].'">'.$row6['HospitalName'].'</option>';
}
echo'
     </select> </div>
    </div>


    <div id="Nsignup" style="display:none">
    <br>
    <h3>Please Enter your photo</h3>
    <input type="file" value="imgsrc" name="Nimgsrc" id="imgsrc"  >
    <br>
    <h3>Please upload your CV</h3>
    <br>
    <input type="file"  value="CVNurse" name="CVNurse" >
       <h2> Status</h2>
    <input type="radio" value="OnlineNurse" name="NStatus" checked>
        <label for="Online">Online Nurse</label><br>
        <input type="radio" value="Hospital" name="NStatus">
        <label for="Hospital">Hospital Nurse</label><br>
        <div class="dropdown">
        Hospital:  <select  class="dropbtn" name="NHospital">
        <option value="0">--</option>';
        $sql7 = 'select * from hospitals ORDER BY HospitalName';

// execute the above query on the $con connection
$result7 = mysqli_query($con, $sql7);
for($i=0; $i<mysqli_num_rows($result7); $i++ ){
  $row7 = mysqli_fetch_assoc($result7);
echo'
<option value="'.$row7['HospitalName'].'">'.$row7['HospitalName'].'</option>';
}
echo'
       </select> </div> </div>
  <input type="submit" class="btn" value="Sign up" name="submit" >
  </div>
  </form>';}
  ?>
    </body>
    </html>