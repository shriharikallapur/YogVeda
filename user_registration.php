<?php
include 'connection.php';
session_start();
$uname=$_POST['username'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$pass=$_POST['pass'];
$addr=$_POST['addr'];
$state=$_POST['state'];
$dist=$_POST['dist'];
$zipcode=$_POST['zipcode'];
$sql="INSERT INTO user (
    username,
    email,
   password,
    phone,
   address,
   state,
    dist,
    zip
)
VALUES('$uname','$email','$pass','$phone','$addr','$state','$dist','$zipcode')";
$query=mysqli_query($conn,$sql);
if(!mysqli_error($conn)){
	session_destroy();
	$_SESSION['uid']=$phone;
	echo "<script>alert('Successfully Registered')</script>";
	header("refresh:0;url='user_interface.php'");
}else{
	echo "<script>alert('Error in registration')</script>";
	echo mysqli_error($conn);
	header("refresh:15;url='user_signup.html'");

}



?>