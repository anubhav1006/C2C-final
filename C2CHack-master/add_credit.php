<?php

include('profile.php');
include('config.php');
include('check.php');

$username = $_SESSION['username'];
$netbalance = $balance + $_GET['credit'];
$sql = mysqli_query($con,"UPDATE user SET balance='$netbalance' WHERE username='$username' ");
if($sql){
	header('location: profile.php');
}
else {
	echo "<script type='text/javascript'> alert('Payment failed'); </script>";
	header('location: profile.php');
}

?>