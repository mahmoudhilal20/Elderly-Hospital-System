<?php
  require('../config.php');
  $sql = 'select * from hospitals ORDER BY HospitalName';

  $result = mysqli_query($con, $sql);
    if(!$result){
        die('Something went wrong!');
    }
    
    $items=array();
$item=array();
    for($i=0; $i<mysqli_num_rows($result); $i++ ){
      $row = mysqli_fetch_assoc($result);
      $item['HospitalName']=$row["HospitalName"];
      $item['HospitalLocation']=$row["HospitalLocation"];
      $item['HospitalPhoneNumber']=$row["HospitalPhoneNumber"];

      array_push($items,$item);
    }
    
echo json_encode($items);


?>