<?php
session_start();
include 'dbconnect.php';

if(isset($_SESSION['user'])!="")
{
header("Location: userhome.php");
}
elseif(isset($_SESSION['admin']) != ""){
header("Location: adminhome.php");
} 

if(isset($_POST['login_btn']))
{
$username = $_POST['username'];
$password = md5($_POST['password']);

$query = "SELECT * FROM account WHERE username='$username'";


$response = mysql_query($query);
$row = mysql_fetch_array($response);


if($row['password'] == $password)
{
	if($row['type'] == 'admin')
	{
		$_SESSION['admin'] = $row['username'];
		header("Location: adminhome.php");
	}
	else{
		$_SESSION['user'] = $row['username'];
		header("Location: userhome.php");
	}
}
else{
header("Location: login.php");
}

}
?>



<!DOCTYPE html>
<html>
<title>Upbox</title>
<head><link rel="icon" href="favicon.png"></head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<link href='http://fonts.googleapis.com/css?family=Playfair+Display' rel='stylesheet'>
<style>
body {font-family: "Times New Roman", Georgia, Serif;}
h1,h2,h3,h4,h5,h6 {
    font-family: "Playfair Display";
    letter-spacing: 2px;
}
</style>
<body>

<!-- Navbar (sit on top) -->
<div class="w3-top">
  <ul class="w3-navbar w3-white w3-wide w3-padding-8 w3-card-2">
    <li>
      <a href="index.php" class="w3-margin-left"><img src ="images/logo.png" width=90 height=40></a>
    </li>
    <!-- Right-sided navbar links. Hide them on small screens -->
   
	<li class="w3-right w3-hide-small w3-dropdown-hover">
    <a href="javascript:void(0);" title="Notifications">Register / Login <i class="fa fa-caret-down"></i></a>
    <div class="w3-dropdown-content w3-white w3-card-4">
	<a class="w3-padding-16" href="signup.php">Register</a>
      <a class="w3-padding-16" href="login.php">Login</a>
	  </a>
	  
	 <li class="w3-right w3-hide-small">
	  <a href="index.php" class="w3-left">Home</a>
      <a href="aboutus.php" class="w3-left">About Us</a>
      <a href="faq.php" class="w3-left">FAQs</a>
	   <a href="testimonial.php" class="w3-left">Testimonials</a>
	     <a href="contactus.php" class="w3-left">Contact Us</a>
      <!--<a href="contactus.php" class="w3-left w3-margin-right"></a>-->
	  </li>
	
	  </li></div>
	  
	  
    </li>
  </ul>
</div>

<!-- Login Banner -->
<img src="images/login.jpg" alt="login" style="width:100%">


<!-- Login form -->
<div class="w3-white">
<p align="center">Have an existing account? Login here!</p>
<form class="w3-container w3-card-4" method="post">
<table border = "0">

  <p align="center"> 
 <label class="w3-label w3-validate">Username: </label> <br>
 <input type="text" name="username" required> 
  </p>
  
  <p align="center">
<label class="w3-label w3-validate">Password: </label> <br>
<input type="password" name="password" required> 
  </p>
 
  <p align="center"> 
  <button class="w3-btn w3-theme"  type="submit" name="login_btn">Login</button>
  </p>
  <br>

  <p align="center"> Don't have an account yet? Sign up for one <a href="signup.php">here!</a></p>

  </table>
  <hr>
</div>
  
<!-- Footer -->
<footer class="w3-center w3-light-grey w3-padding-32">
  <p>Powered by DigiWare</a></p>
</footer>

</body>
</html>

