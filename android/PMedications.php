<?php   
require('../config.php');
$PatientID=$_GET['PatientID'];
$MedcineArrays=array();
$Medicinearray=array();
    $sql="Select * from medications where PatientID =".$PatientID." AND Status='Active'";
    $result= mysqli_query($con, $sql);
 $Date=date("Y-m-d");
 for($i=0; $i<mysqli_num_rows($result); $i++ ){
  $row=mysqli_fetch_assoc($result);
  $DateFrom= $row['DateFrom'];
  $DateTO= $row['DateTo'];
  if ($Date>$DateFrom && $Date<$DateTO ){
  $MedicineName=$row['MedicineName'];
  $Medicinearray['MedicineName']=$MedicineName;
  $sql1="select * from assignedmedications where PatientID =".$PatientID." AND Date='".$Date."' AND MedicineName='".$MedicineName."' AND Time='Morning'";
  $result1= mysqli_query($con, $sql1);
  $row1=mysqli_fetch_assoc($result1);
  if(mysqli_num_rows($result1)==0) {
    $Medicinearray['Morning']="NO";
 }  
 else 
 {
  $Medicinearray['Morning']="Yes";
 }
 $sql2="select * from assignedmedications where PatientID =".$PatientID." AND Date='".$Date."' AND MedicineName='".$MedicineName."' AND 
 Time='AfterNoon'";
 $result2= mysqli_query($con, $sql2);
 $row2=mysqli_fetch_assoc($result2);
 if(mysqli_num_rows($result2)==0) {
  $Medicinearray['AfterNoon']="NO";
}  
else 
{
  $Medicinearray['AfterNoon']="Yes";
}
$sql3="select * from assignedmedications where PatientID =".$PatientID." AND Date='".$Date."' AND MedicineName='".$MedicineName."' AND 
Time='Night'";
$result3= mysqli_query($con, $sql3);
$row3=mysqli_fetch_assoc($result3);
if(mysqli_num_rows($result3)==0) {
  $Medicinearray['Night']="NO";
}  
else 
{
  $Medicinearray['Night']="Yess";
} 
array_push($MedcineArrays,$Medicinearray);
}
}
echo json_encode($MedcineArrays);

?>