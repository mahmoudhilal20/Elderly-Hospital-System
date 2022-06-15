<!DOCTYPE html>
<html >
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Donations</title>
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
        <a href="Products.php">Products</a>
        <a href="Hospitals.php">Hospitals</a>
        <a class="red" href="Donation.php">Donation</a>
        <a href="Aboutus.php">About us</a>
      </div>
<form action="donation.php" name="donateform" method="POST" onsubmit="donatee()" >
      <div class="login-box">
    <h1>Dotation</h1>
    <div class="textbox">
      <input type="text" placeholder="Firstname" name="Firstname">
    </div>
  
    <div class="textbox">
      <input type="text" placeholder="Lastname" name="LastName">
    </div>

    <div class="textbox">
    <input type="number" placeholder="Amount of donation" name="amount">
    </div>

    <input type="submit" class="btn" value="Donate">
    </div>
    </form>

    </body>
    <script>
    function donatee() {
      var x = document.forms["donateform"]["Firstname"].value;
      var z = document.forms["donateform"]["amount"].value;
      var y = document.forms["donateform"]["LastName"].value;
      if(x=="" || x==null ){
    event.preventDefault();
    alert("Please Fill the first Name");
  }

  else if(y=="" || y==null )
  {
    event.preventDefault();
    alert("Please Fill the Last Name");
  }
 
  else if(z=="" || z==null || z=="0")
  {
    event.preventDefault();
    alert("Please Choose The amount you want to donate");
  }
   else
  alert("Thank you for your donation");
  
} 
    </script>

</html>      