<?php
  require('../config.php');
  $sql = 'select * from products';
  $result = mysqli_query($con, $sql);
    if(!$result){
        die('Something went wrong!');
    }
    
    $items=array();
$item=array();
    for($i=0; $i<mysqli_num_rows($result); $i++ ){
      $row = mysqli_fetch_assoc($result);
      $item['ProductID']=$row["ProductID"];
      $item['ProductName']=$row["ProductName"];
      $item['ProductDescrption']=$row["ProductDescrption"];
      $item['ProductCategory']=$row["Category"];
      $item['ProductPrice']=$row["Price"];
      $item['ProductQuantity']=$row["Quantity"];
      $item['ProductPhoto']=$row["ProductPhoto"];
      array_push($items,$item);
    }
    
echo json_encode($items);


?>