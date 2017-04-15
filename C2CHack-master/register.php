<?php 
include('config.php');

$con = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password, $mysql_database) or die("Oops something went wrong!"); 

if(isset($_POST['submit'])){ 
     echo "<script>alert('The email address is already registered with us!')</script>";
    session_start();
    $name= $_POST['name']; 
    $email= $_POST['email']; 
    $username= $_POST['username']; 
    $password= $_POST['password'];

$ch = curl_init("registration.php");

$sql = "SELECT userid, email FROM user WHERE email = '$email'";
$result = mysqli_query($con,$sql);
$rows = mysqli_fetch_array($result,MYSQLI_ASSOC); 
$count = mysqli_num_rows($result);

if($count==1)
{
echo "<script>alert('The email address is already registered with us!')</script>";
curl_exec($ch);
exit();
}

$sql = "SELECT userid, username FROM user WHERE username = '$username'";
$result = mysqli_query($con,$sql);
$rows = mysqli_fetch_array($result,MYSQLI_ASSOC); 
$count = mysqli_num_rows($result);

if($count==1)
{
echo "<script>alert('The username is already registered with us!')</script>";
curl_exec($ch);
exit();
}

if($name==''){
		echo "<script>alert('Please enter your name!')</script>";
                curl_exec($ch);
exit();
	}

if($username==''){
		echo "<script>alert('Please enter a username!')</script>";
                curl_exec($ch);
exit();
	}

if($email==''){
		echo "<script>alert('Please enter your email address!')</script>";
		curl_exec($ch);
exit();
}

if($password==''){
		echo "<script>alert('Please enter your password!')</script>";
                curl_exec($ch);
exit();
}

if($count==0)
{
$sql = $con->query("insert into user(name,email,username,password) values ('$name','$email','$username','$password')");
echo "<script>alert('Registered Successfully!')</script>";
header('Location: login.php');
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
 <form  method="post">
            <input required type="text" placeholder="Username" name="username"/>
            <input required type="password" placeholder="Password" name="password"/>
            <input required type="text" placeholder="Email Address" name="email"/>
            <input required type="text" placeholder="Name" name="name"/>
            <input type="submit" name="submit" id="newbtn">
            <p class="message">Already registered? <a href="login.php">Sign In</a></p>
        </form>
    </div>
</div>
</body>
</html>       