<?php
include 'connection.php';
session_start();
$chac=$_POST['chacname'];
$admin=$_POST['admin'];
$phone=$_POST['phone'];
$map=$_POST['map'];
$padd=$_POST['padd'];
$chad=$_POST['chad'];
$chmail=$_POST['chmail'];
$pass=$_POST['pass'];
$chphone=$_POST['chphone'];
$state=$_POST['state'];
$dist=$_POST['dist'];
$zip=$_POST['zip'];
echo "success";
$sql="INSERT INTO Admin(chac_name, admin_name, police_number, police_link, police_add, chac_add, password, chac_phone, state, dist, zipcode) VALUES ('$chac','$admin','$phone','$map','$padd','$chad','$pass','$chphone','$state','$dist','$zip')";
if(mysqli_query($conn,$sql)){
	echo "Successfully Inserted";
	header("refresh:2;url='Admin_signin.html'");
}
else{
	echo "coudn't Insert sorry!!!".mysqli_error($conn);
	header("refresh:2;url='admin_signup.html'");
}
$_SESSION['aid']=$phone;
?>