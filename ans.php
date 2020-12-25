<?php
include 'connection.php';
$id=$_POST['id'];
$ans=$_POST['ans'];
$s="YES";
$sql1="UPDATE question set checked='$s',answer='$ans' where ID= '$id'";
$q1=mysqli_query($conn,$sql1) or die(mysqli_error($conn));
header('Location:admin_index.php');
?>
