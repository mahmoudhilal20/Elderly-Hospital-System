<?php
require('config.php');
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
  </tr>';
  for($i=0; $i<mysqli_num_rows($result); $i++ ){
    $row = mysqli_fetch_assoc($result);
 $str.=' <tr>';
  $str.='  <td>'.$row['HospitalName'].'</td>';
  $str.='  <td>'.$row['HospitalLocation'].'</td>';
  $str.='  <td>'.$row['HospitalPhoneNumber'].'</td>';
  $str.=' </tr>';}
  $str.=' </table>';
  
  echo $str;
