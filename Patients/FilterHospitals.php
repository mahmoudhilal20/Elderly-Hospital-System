<?php
session_start();
require('../config.php');
$UserID=$_SESSION["UserID"];
$q=$_GET['q'];
$sql = "select * from hospitals where HospitalName LIKE '%".$q."%'";

$result = mysqli_query($con, $sql);

if(!$result){
    die($sql);
}
$str='<br>';
 $str.=' <table id="customers">
  <tr>
    <th>Name</th>
    <th>Address</th>
    <th>Phone number</th>
    <th>Request For a Nurse</th>
  </tr>';
  for($i=0; $i<mysqli_num_rows($result); $i++ ){
    $row = mysqli_fetch_assoc($result);
 $str.=' <tr>';
  $str.='  <td>'.$row['HospitalName'].'</td>';
  $str.='  <td>'.$row['HospitalLocation'].'</td>';
  $str.='  <td>'.$row['HospitalPhoneNumber'].'</td>'; 
  $sql1 = "select Request from requestnurse where hospitalName='".$row['HospitalName']."' AND PatientID='".$UserID."'";
// execute the above query on the $con connection
$result1 = mysqli_query($con, $sql1);

$row1= mysqli_fetch_assoc($result1);

if($row1['Request']=="Done")
  {$str.=' <td>Already Rquested</td>';}
  else 
  {$str.='<td><input type="button" id="Request" onclick="Request(\''.$row['HospitalName'].'\')" value="Request" ></td>';}
  $str.=' </tr>';}
  $str.=' </table>';
 
  echo $str;
