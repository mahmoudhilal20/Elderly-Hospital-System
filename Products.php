<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Products </title>
  </head>
  <style>
    .red{
      background-color: red;
    color: white;
    }
    </style>
<body>
    <div class="topnav">
        <a class="active" >Elderly-Care</a>
        <a href="home.php">Home</a>
        <a href="Signup.php">Sign up</a>
        <a class="red" href="Products.php">Products</a>
        <a href="Hospitals.php">Hospitals</a>
        <a href="Donation.php">Donation</a>
        <a href="Aboutus.php">About us</a>
      </div>
      <div class="Products">
      <h2>Have a nice tour between our products and a percentage of profits will be a donation for our hospitals</h2>
  </div>
  <?php
  require('config.php');
  $sql = 'select * from products';
  $result = mysqli_query($con, $sql);
    if(!$result){
        die('Something went wrong!');
    }
    
    for($i=0; $i<mysqli_num_rows($result); $i++ ){
      $row = mysqli_fetch_assoc($result);
      $id = $row['ProductID'];
      if($row['Quantity']!=0){
      echo'
      
<div class="products">
<h3>Name:'.$row['ProductName'].'</h3>
<img src="Products/'.$row['ProductPhoto'].'" >
<div class="desc">Price:'.$row['Price'].' $<br> Category:'.$row['Category'].'<br>Quantity:'.$row['Quantity'].'</div>
<div class="desc"><a href="Buy.php?ProductID='.$id.'">Buy</a></div>
</div>
';}}?>

</body>
</html>