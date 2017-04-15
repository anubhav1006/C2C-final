<?php 

   include('config.php');

   $con = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password, $mysql_database) or die("Oops something went wrong!");  
    
   if($_SERVER["REQUEST_METHOD"] == "POST") { 
      // username and password sent from form  
       
      $username = mysqli_real_escape_string($con,$_POST['username']); 
      $password = mysqli_real_escape_string($con,$_POST['password']); 	  
	  
      $sql = "SELECT userid FROM user WHERE username = '$username' and password = '$password'"; 
      $result = mysqli_query($con,$sql); 
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC); 
      $active = $row['active']; 
       
      $count = mysqli_num_rows($result); 
       
      // If result matched $username and $password, table row must be 1 row 
         
      if($count == 1) { 
	  session_start();
         $_SESSION['username'] = $username; 
           header('location: index.php');
      }else { 
         echo "<script>alert('Your Login Name or Password is invalid')</script>"; 
      } 
   } 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>WELCOME|ANSAT Login</title>
    <link rel="stylesheet" type="text/css" href="css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="css/demo.css" />
    <link rel="stylesheet" type="text/css" href="css/component.css" />
    <link rel="stylesheet" type="text/css" href="css/login.css" />
    <script src="js/modernizr.custom.js"></script>
    <script src="js/jquery-3.1.0.min.js"></script>

</head>
<body style="background-image: url('style/images/art/bg1.jpg')">
<div class="login-page">
    <div class="form">
        <form method="post">
            <input required type="text" placeholder="Username" name="username">
			<input required type="password" placeholder="Password" name="password">
            <input type="submit" name="register" class="btn" id="newbtn">
            <p class="message">New user? <a href="register.php">Register here</a></p>
        </form>
    </div>
</div>
</body>
</html>