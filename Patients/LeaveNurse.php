<?php
require('../config.php');
$q=$_GET['q'];
$sql = "update ordernurse set Status='Ended' where PatientID=".$q."";
$result = mysqli_query($con, $sql);
if(!$result){
    die('something went wrong');
}
