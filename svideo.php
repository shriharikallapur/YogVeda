<?php
include 'connection.php';
if (isset($_POST['vcount'])) {
	$vcnt=$_POST['vcount'];
	$cid=$_POST['cid'];
	session_start();
	$sql="UPDATE COURSE SET v_count = '$vcnt' WHERE CID='$cid'";
	$exe=mysqli_query($conn,$sql) or die (mysqli_error($conn));
	$_SESSION['cid']=$cid;
	$_SESSION['vcount']=$vcnt;
	header("Location:upload.php");
}else{
	header("Location:admin_index.php");
}



?>