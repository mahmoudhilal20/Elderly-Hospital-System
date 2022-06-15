<!DOCTYPE html>
<html >
  <head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Buy A Product</title>
  </head>
<script>
function submitt(){
 var x = document.forms["buyform"]["FirstName"].value;
 var y = document.forms["buyform"]["LastName"].value;
 var z = document.forms["buyform"]["Address"].value;
 var h = document.forms["buyform"]["tel"].value;
 var u = document.forms["buyform"]["quantity"].value;
  if(x=="" || x==null )
  {
    event.preventDefault();
    alert("Please Fill the first Name");
  }

  else if(y=="" || y==null )
  {
    event.preventDefault();
    alert("Please Fill the Last Name");
  }
 
  else if(z=="" || z==null || z=="1970-01-01")
  {
    event.preventDefault();
    alert("Please Choose your birth date");
  }

  else if(h=="" || h==null)
  {
    event.preventDefault();
    alert("Please enter your phone number");
  }

  else if(u=="" || u==null)
  {
    event.preventDefault();
    alert("Please choose the quantity that you want");
  }
  }</script>
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
<?php

 if(isset($_POST['submit'])){
  require('config.php');
  if(empty($_POST['ProductID'])){
    die("First Name is empty");
  }
  if(empty($_POST['LastName'])){
    die("Last Name is empty");
  }
  if(empty($_POST['Address'])){
    die("Address is empty");
  }
  if(empty($_POST['tel'])){
    die("tel is empty");
  }
  if(empty($_POST['quantity'])){
    die("quantity is empty");
  }
  $ProductID=$_POST['ProductID'];
  $FirstName = $_POST['FirstName'];
  $LastName = $_POST['LastName'];
  $Address = $_POST['Address'];
  $tel = $_POST['tel'];
  $quantity = $_POST['quantity'];



  $sql="select * from products where ProductID='".$ProductID."'";
  $result = mysqli_query($con, $sql);
  $row=mysqli_fetch_assoc($result);
  $quantityavailable=$row['Quantity'];
  if($quantity>$quantityavailable){
    header("refresh:2,url='Products.php'");
    die('<div class="Products">
    <h2>Sorry the amount you want is not available.</h2>
    </div>');
  }
  
  $sql1 = "insert into purchase (ProductID, CustomerFirstName, CustomerlastName, Address, Phone,Quantity ) 
                   values ('$ProductID','$FirstName','$LastName','$Address','$tel','$quantity')";
$result1 = mysqli_query($con, $sql1);
if(!$result1){
die('something went wrong');}
header("refresh:2,url='products.php'");
echo'     <div class="Products">
<h2>Your order is completed. We will contact you soon when it is available</h2>
</div>';
}


else {
  $ProductID=$_GET['ProductID'];
  echo'
  
<form action="Buy.php" method="POST" name="buyform" onsubmit="submitt()">
<div class="login-box">

      <div class="Yourproducts">
    <h2>Please fill your information to deliver your products</h2>
    </div>
    <h2>Product ID: '.$ProductID.'</h2>
    <div class="Pinfo">
      <input type="text" placeholder="Firstname" name="FirstName">
  </div>
    <div class="Pinfo">
      <input type="text" placeholder="Lastname" name="LastName">
    </div>
    <div class="Pinfo">
      <input type="address" placeholder="Address" name="Address">
    </div>
    <div class="Pinfo">
      <input type="tel" placeholder="Phone" name="tel">
    </div>
    <div class="Pinfo">
    <input type="number" placeholder="quantity" name="quantity">
  </div>
  <input type="number" placeholder="productID" name="ProductID" value="'.$ProductID.'" hidden>
    <input type="submit" class="btn" value="submit" name="submit">
    </form>
    </div>';}
  ?>
  
  </body>
  </html>