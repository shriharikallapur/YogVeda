<?php
include 'connection.php';
if(isset($_GET['c_id'])){
	$cid=$_GET['c_id'];
	$sql='SELECT * from c_vided where CID="$cid"';
	$res=mysqli_query($conn,$sql) or die(mysqli_error($conn));
	while($row=mysqli_fetch_assoc($res)){
		unlink($row['paths']);
	}
	$sql="DELETE from course where CID='$cid'";
	$res=mysqli_query($conn,$sql) or die(mysqli_error($conn));
	$sql="DELETE from c_vided where CID='$cid'";
	$res=mysqli_query($conn,$sql) or die(mysqli_error($conn));
	echo "<script> alert('Deleted Successfully');</script>";
	header("refresh:0;url='admin_index.php'");
}

?>