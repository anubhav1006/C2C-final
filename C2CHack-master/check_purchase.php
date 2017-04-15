<?php
include('config.php');
include('check.php');
 
 
 $post_id = $_GET['postid'];
$sql = mysqli_query($con,"SELECT price FROM blog WHERE id='$post_id' ");

$row=mysqli_fetch_array($sql,MYSQLI_ASSOC);
$price = $row['price'];

if ($price != 0){

$sql = mysqli_query($con,"SELECT post_id FROM purchase WHERE post_id='$post_id' ");
$row=mysqli_fetch_array($sql,MYSQLI_ASSOC);
if(empty($row['post_id'])){
	header("Location: home.php#cbp=ajax/post1.php?postid=$post_id");
}
}
?>