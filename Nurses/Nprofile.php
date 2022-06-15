<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" >
  <head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../style.css">
    <title>My Profile</title>
  </head>
  <style>
  .red{
    background-color: red;
    color: white;
  } 
  h4{
    color:red;
  } </style>
  <script>  
  function submitt(){
 var x = document.forms["signupform"]["FirstName"].value;
 var y = document.forms["signupform"]["LastName"].value;
 var z = document.forms["signupform"]["Email"].value;
 var u = document.forms["signupform"]["Gender"].value;
 var p = document.forms["signupform"]["DateofBirth"].value;
 var o = document.forms["signupform"]["MaritalState"].value;
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
  
  else if(z=="" || z==null )
  {
    event.preventDefault();
    alert("Please Fill the Email");
  }

  else if(u=="" || u==null )
  {
    event.preventDefault();
    alert("Please choose the gender");
  }
  else if(p=="" || p==null || p=="1970-01-01" )
  {
    event.preventDefault();
    alert("Please choose the date of Birth");
  }
  else if(o=="" || o==null )
  {
    event.preventDefault();
    alert("Please choose the marital State");
  }


}
    function modify(){
      document.getElementById("initialinfo").style.display="none";
      document.getElementById("info").style.display="block";
      document.getElementById("modify").style.display="none";
      document.getElementById("comments").style.display="none";
    }
    function cancel(){
      document.getElementById("info").style.display="none";
      document.getElementById("initialinfo").style.display="block";
      document.getElementById("modify").style.display="block";
      document.getElementById("comments").style.display="block";
    }
    function Deactivate(x){
      if (confirm("Are you Sure you want to deactivate your Profile?")) {
    
        window.location.href = "DeactivateProfile.php";}}

</script>

  
<body>
  <div class="topnav">
    <a class="active" >Elderly-Care</a>
    <a class="red" href="Nprofile.php">Profile</a>
    <a href="MyPatient.php">My Patient</a>
    <a  href="NSchedule.php">Schedule</a>
    <a href="Contactadmin.php">Contact admin</a>
    <a class="Logout" href="../Logout.php">Logout</a>
  </div>
<?php

if(!isset($_SESSION["Status"])){
    header("refresh:0,url=../home.php");
    die();}
else if(isset($_SESSION["Status"])){
    if($_SESSION["Status"]=="Nurse"){
    require('../config.php');
    $UserID=$_SESSION["UserID"];
    if(isset($_POST['submit'])){
      $FirstName = $_POST['FirstName'];
      $LastName = $_POST['LastName'];
      $Gender = $_POST['Gender'];
      $DateofBirth=date('Y-m-d', strtotime($_POST['DateofBirth']));
      $MaritalState = $_POST['MaritalState'];
      $Email = $_POST['Email'];
      $Online = $_POST['Online'];
      if(!empty($_FILES['CVNurse'])){

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
 move_uploaded_file($file_tmp,"CVNurses/".$UserID.".pdf");
 $CVFile= $UserID.".".$file_ext;
 $sql2 = "update nurses set CVNurse='$CVFile' where NurseID=".$UserID;
 $result2 = mysqli_query($con, $sql2);
        }else{
print_r($errors);
        }

      }
$sql = "update users set FirstName='$FirstName', LastName='$LastName', Gender='$Gender', DateofBirth='$DateofBirth', MaritalState='$MaritalState', Email='$Email' where UserID=".$UserID."";
        $result = mysqli_query($con, $sql);
        if($Online=="Online"){
          $Online="1";
        }else if($Online=="Hospital"){
          $Online="0";
        }
        $sql1 = "update nurses set Online=".$Online." where NurseID=".$UserID;
       $result1 = mysqli_query($con, $sql1);
        if(!$result1)
  die('something went wrong');
        else{
  header("refresh:0;url=NProfile.php");

        }
    

    }

    $sql="Select * from users where UserID =".$UserID."";
    $result = mysqli_query($con, $sql);
    $row=mysqli_fetch_assoc($result);
    $FirstName=$row['FirstName'];
    $LastName=$row['LastName'];
    $Email=$row['Email'];
    $Gender=$row['Gender'];
    $DateofBirth=$row['DateofBirth'];
    $from = new DateTime($DateofBirth);
     $to   = new DateTime('today');
    $MaritalState=$row['MaritalState'];
    $Status=$row['Status'];
    $UserPhoto=$row['UserPhoto'];
    $sql1="Select * from Nurses where NurseID =".$UserID."";
    $result1 = mysqli_query($con, $sql1);
    $row1=mysqli_fetch_assoc($result1);
    $WorkingHospital=$row1['WorkingHospital'];
    $Online=$row1['Online'];
    $CVNurse=$row1['CVNurse'];

    echo'
    <br>
<div class="info" id="initialinfo">
<img src ="../UserPhotos/'.$UserPhoto.'"  width ="100px" height = "100px"/>
<h4> ID: '.$UserID.'</h4>

 <h4>First Name: '.$FirstName.'</h4>
 <h4>Last Name: '.$LastName.'</h4>
 <h4>Email: '.$Email.'</h4>
 <h4>Gender: '.$Gender.'</h4>
 <h4>Date of Birth: '.$DateofBirth.' ('. $from->diff($to)->y.' years Old)</h4>
 <h4>Marital State: '.$MaritalState.'</h4>
 <h4>Working Hospital: '.$WorkingHospital.'</h4>';
 if($Online=='1'){
   echo'
 <h4>Status: Online Nurse</h4>';}
 else if($Online=='0'){
  echo'
<h4>Status: Hospital Nurse</h4>';}
echo'
 </div>
  <div id="info" style="display:none">
  <form name="signupform" action="NProfile.php"  method="POST" enctype="multipart/form-data" onsubmit="submitt()">
  <div class="textbox">
      <input type="text" placeholder="Firstname" value="'.$FirstName.'" name="FirstName">
    </div>
    <div class="textbox">
      <input type="text" placeholder="Lastname" value="'.$LastName.'" name="LastName">
    </div>';
    
if($Gender=="Male"){
  echo'
      <input type="radio" id="male" name="Gender" value="Male" checked>
      <label for="male">Male</label><br>
      <input type="radio" id="female" name="Gender" value="Female">
      <label for="female">Female</label><br>';}
     else if($Gender=="Female"){
        echo'
  <input type="radio" id="male" name="Gender" value="Male"  >
  <label for="male">Male</label><br>
  <input type="radio" id="female" name="Gender" value="Female" checked>
  <label for="female">Female</label><br>';}
    echo'
    <div class="textbox">
      <input type="date" value="'.$DateofBirth.'" name="DateofBirth">
    </div>';

    if($MaritalState=="Single"){
      echo'
<input type="radio" id="Single" name="MaritalState" value="Single" checked>
<label for="Single">Single</label><br>
<input type="radio" id="Married" name="MaritalState" value="Married">
<label for="female">Married</label><br>';}
         else if($MaritalState=="Married"){
  echo'
  <input type="radio" id="Single" name="MaritalState" value="Single" >
  <label for="Single">Single</label><br>
  <input type="radio" id="Married" name="MaritalState" value="Married" checked>
  <label for="female">Married</label><br>';}
echo'<br> Status: <br><br>';
  if($Online=="1"){
    echo'
        <input type="radio" id="Online" name="Online" value="Online" checked>
        <label for="Online">Online Nurse</label><br>
        <input type="radio" id="Hospital" name="Online" value="Hospital">
        <label for="female">Hospital Nurse</label><br>';}
       else if($Online=="0"){
echo'
<input type="radio" id="Online" name="Online" value="Online" >
<label for="Online">Online Nurse</label><br>
<input type="radio" id="Hospital" name="Online" value="Hospital" checked>
<label for="female">Hospital Nurse</label><br>';}
    echo'
    <div class="textbox">
      <input type="email" placeholder="email" value="'.$Email.'" name="Email">
    </div>
    <br>
    <h4>CV</h4>  
    <input type="file" name="CVNurse" > 
    <br>
    <br>';
        echo'
      <input type="submit" class="Sbtn" value="Save" name="submit">
        <input type="button" class="Sbtn" onclick="cancel()" value="Cancel">
      </form>
      <button type="button" class ="Mbtn" onclick="Deactivate()">Deactivate Profile</button>
    </div>
  
  <button type="button" class ="Mbtn" id="modify" onclick="modify('.$UserID.')">Modify</button>
  <button type="button" id="comments" class ="Mbtn" ><a href="comments.php">Comments</a></button>

  ';}
}

?>
</body>
</html>