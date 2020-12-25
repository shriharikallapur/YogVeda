<?php
include 'connection.php';
$uid=$_GET['uid'];
$cid=$_GET['cid'];
$sql="INSERT INTO user_course (UID, CID) VALUES ('$uid','$cid')";
$query=mysqli_query($conn,$sql);
if(!mysqli_error($conn)){
	echo "<script> alert('Successfully registered to course start learning')</script>";
	header("refresh:0;url='my_course.php'");
}
else{
	echo "<script> alert('Unable to register please try again')</script>";
	header("refresh:0;url='Display_courses.php?c_id=".$cid."'");
}


?>