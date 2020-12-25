<?php
include 'connection.php';
if(isset($_GET['vid'])){
	$vid=$_GET['vid'];
	unlink($_GET['path']);
	$sql="DELETE from c_vided where VID='$vid'";
	$query=mysqli_query($conn,$sql)or die(mysqli_error($conn));
	echo "<script> alert('Deleted Successfully');</script>";
	header("Location:Display_courses.php?c_id=1");
}



?>