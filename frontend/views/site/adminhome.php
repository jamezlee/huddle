<?php

session_start();
include_once 'dbconnect.php';

if(!isset($_SESSION['admin']))
{
header("Location: index.php");
}

if(isset($_POST['adduserbtn'])) {
$username = $_POST['username'];
$email = $_POST['email'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$password = md5($_POST['password']);


if(mysql_query("INSERT INTO account(username, email, firstname, lastname, password) VALUES ('$username', '$email', '$firstname', '$lastname', '$password')"))
{
  echo '<script type="application/javascript">alert("User Added!");</script>';
}

else
{
  echo '<script type="application/javascript">alert("Failed to add user!");</script>';
}

}


$result = mysql_query("SELECT * FROM account")


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
      <a class="w3-margin-left"><img src ="images/logo.png" width=90 height=40></a>
    </li>
	
	 <li class="w3-right w3-hide-small">
      <a href="logout.php?logout" class="w3-left">Logout</a>
	  </li>
</div>


<!-- admin banner -->
<img src="images/admin.png" alt="admin" style="width:100%">


<ul class="w3-navbar w3-theme">
  <li>Welcome back, <?php echo $_SESSION['admin']; ?>!</li>
  <li class ="w3-right"><?php echo date('l jS \of F Y h:i:s A');?></li>
  </ul>


<table width="100%" border="0">
  <tr>
    <td colspan="2" bgcolor="#EAF2F8">
    </td>
  </tr>
  <tr valign="top">
    <td bgcolor="#EAF2F8" width="50">
      <center><b>Menu</b></center>
	  <br>
	     <a class="w3-btn-block w3-theme w3-hover-light-grey w3-round-xlarge" onclick="document.getElementById('id01').style.display='block'">Add New User</a><br><br>

  
	 <!-- Modal for ADD USER -->
    <div id="id01" class="w3-modal">
        <div class="w3-modal-content w3-card-8 w3-animate-top">
          <header class="w3-container w3-theme-l1">
            <span onclick="document.getElementById('id01').style.display='none'" class="w3-closebtn">×</span>
            <h4>New User Registration</h4>
            
          </header>
		  
          <div class="w3-padding">
		  
		  <form class="w3-container w3-card-4" method="post">

  <p align="center">
  <label class="w3-label w3-validate">Username: </label> <br>
    <input type="text" name="username" required> 
  </p>
  
  
  <p align="center">
  <label class="w3-label w3-validate">Email Address: </label> <br>
    <input type="email" name="email" required>
  </p>
  
  <p align="center"> 
  <label class="w3-label w3-validate">First Name: </label> <br>
    <input type="text" name="firstname" required>
  </p>  
  
	<p align="center">
	 <label class="w3-label w3-validate">Last Name: </label> <br>
    <input type="text" name="lastname" required>
	</p>

  
  <p align="center">
  <label class="w3-label w3-validate">Password: </label> <br>
    <input type="password" name="password" required>
  </p>
  
  <p align="center">
  <button class="w3-btn w3-theme"  type="submit" name="adduserbtn">Add New User</button>
  </p>
  <br>


  </form>
  </div>
  </div>
  </div>
  
  
    <td bgcolor="#F8F9F9" width="1000" height="485">

        <table class="w3-table w3-striped w3-bordered">
<thead>
<tr class="w3-theme">
  <th>Account ID</th>
  <th>Username</th>
  <th>Email</th>
  <th>First Name</th>
  <th>Last Name</th>
  <th>Account Type</th>
  <th>Options</th>
  <th></th>
  
</tr>
</thead>
<tbody>
    <?php
          while( $row = mysql_fetch_array( $result )) {
            echo "<tr>";
            echo '<td>' . $row['id'] . '</td>';
            echo '<td>' . $row['username'] . '</td>';
            echo '<td>' . $row['email'] . '</td>';
            echo '<td>' . $row['firstname'] . '</td>';
            echo '<td>' . $row['lastname'] . '</td>';
            echo '<td>' . $row['type'] . '</td>'; 
		if($row['type'] == 'user'){
			echo "<td><a onClick=\"javascript: return confirm('Remove this account?');\" href='delete.php?id=".$row['id'] ."'>Remove User</a></td>";
			}
            echo "</tr>";
          
          }
        ?>

</tbody>
</table>

    </td>
	</tr>

	</table>

  
  

<!-- Footer -->
<footer class="w3-center w3-light-grey w3-padding-32">
  <p>Powered by DigiWare</a></p>
</footer>

</body>
</html>
