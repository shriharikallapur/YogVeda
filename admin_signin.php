<?php 
include 'connection.php';
session_start();
if(isset($_POST['admin'])){
	$admin=$_POST['admin'];
	$pass=$_POST['pass'];
	$sql="SELECT * from  admin where admin_name='$admin' AND password='$pass'";
	$res=mysqli_query($conn,$sql) or die(mysqli_error($conn));
	if(mysqli_num_rows($res)>0){
		$disp=mysqli_fetch_assoc($res);
		echo "<script>alert('Welcome')</script>";
		$_SESSION['aid']=$disp['chac_phone'];
		
	header('refresh:0;url="admin_index.php"');
		
	}
	else{
		echo "<script>alert('Username or password error')</script>";
		header('refresh:1;url="Admin_signin.html"');
	}

}
?>
