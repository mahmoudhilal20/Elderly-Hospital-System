<?php
require('../config.php');
$q=$_GET['q'];

$sql = "select Users.FirstName, Users.LastName, Patients.Hospital from Patients 
INNER JOIN users ON patients.PatientID=users.UserID  where users.FirstName LIKE '%".$q."%' ORDER BY Hospital";
$result = mysqli_query($con, $sql);

if(!$result){
    die('Error');
}
$str='<br>';
$str.=' <table id="customers">
<tr>
  <th>Name</th>
  <th>Hospital</th>
</tr>';
for($i=0; $i<mysqli_num_rows($result); $i++ ){
  $row = mysqli_fetch_assoc($result);
$str.=' <tr>';
$str.='  <td>'.$row['FirstName'].' '.$row['LastName'].'</td>';
$str.='  <td>'.$row['Hospital'].'</td>';
$str.=' </tr>';
$str.=' </table>';
  }
  echo $str;
