
<?php 
include 'connection.php';
session_start();
if(isset($_POST['user'])){
	$user=$_POST['user'];
	$pass=$_POST['pass'];
	$sql="SELECT * from  user where email='$user' AND password='$pass'";
	$res=mysqli_query($conn,$sql) or die(mysqli_error($conn));
	if(mysqli_num_rows($res)>0){
		$disp=mysqli_fetch_assoc($res);
		echo "<script>alert('Welcome')</script>";
		$_SESSION['uid']=$disp['phone'];
		
	header('refresh:0;url="user_interface.php"');
		
	}
	else{
		echo "<script>alert('Username or password error')</script>";
		header('refresh:1;url="User_signin.html"');
	}

}
?>