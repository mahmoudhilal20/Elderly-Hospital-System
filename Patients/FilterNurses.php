<?php
require('../config.php');
$q=$_GET['q'];
$sql = "select users.FirstName, users.LastName, users.Email, users.PhoneNumber, nurserate.Rate, Nurses.WorkingHospital from users
 INNER JOIN nurses INNER JOIN nurserate on users.userID=nurses.NurseID where nurses.Online='1' AND FirstName LIKE '%".$q."%'";

$result = mysqli_query($con, $sql);

if(!$result){
    die('something went wrong');
}
$str='<br>';
 $str.=' <table id="customers">
  <tr>
  <th>Name</th>
  <th>Email</th>
  <th>Phone Number</th>
  <th>Working Hospital</th>
  <th>Rate</th>
  </tr>';
  for($i=0; $i<mysqli_num_rows($result); $i++ ){
    $row = mysqli_fetch_assoc($result);
 $str.=' <tr>';
  $str.='  <td>'.$row['FirstName'].' '.$row['LastName'].'</td>';
  $str.='    <td>'.$row['Email'].'</td>';
  $str.=' <td>'.$row['PhoneNumber'].'</td>';
  $str.='<td>'.$row['WorkingHospital'].'</td>';
  $str.='  <td>'.$row['Rate'].'</td>';
  $str.=' </tr>';}
  $str.=' </table>';
 
  echo $str;
