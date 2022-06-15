<?php
  require('../config.php');
  $UserID=$_GET['UserID'];
 

$comment=array();
$comments=array();
  $sql1 = 'Select nursecomments.comment, users.FirstName, users.LastName from nursecomments
   INNER JOIN users ON nursecomments.PatientID=users.UserID
   where nursecomments.nurseID='.$UserID.'';
  // execute the above query on the $con connection
  $result1 = mysqli_query($con, $sql1);
  //  in case the query is not valid or misspelled (problem in the execution)
  if(!$result1){
      die('Something went wrong!');
  }

  for($i=0; $i<mysqli_num_rows($result1); $i++ ){
      $row1 = mysqli_fetch_assoc($result1);
$comment['Name']=$row1['FirstName']." ".$row1['LastName'];
$comment['comment']=$row1['comment'];

array_push($comments,$comment);

  }

  echo json_encode($comments);

  ?>
